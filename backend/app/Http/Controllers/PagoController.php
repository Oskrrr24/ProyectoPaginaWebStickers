<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Pago;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Transbank\Webpay\Options;
use Transbank\Webpay\WebpayPlus\Transaction;
use App\Models\Sorteo;
use App\Models\Participacion;

class PagoController extends Controller
{
    private function webpayTransaction(): Transaction
    {
        $options = new Options(
            env('WEBPAY_API_KEY'),
            env('WEBPAY_COMMERCE_CODE'),
            Options::ENVIRONMENT_INTEGRATION
        );

        return new Transaction($options);
    }

    public function iniciar(Request $request)
    {
        $datos = $request->validate([
            'id_compra' => 'required|integer|exists:compras,id_compra',
        ]);

        $compra = Compra::findOrFail($datos['id_compra']);

        if ($compra->estado !== 'PENDING') {
            return response()->json([
                'message' => 'La compra no está disponible para pago.'
            ], 422);
        }

        $buyOrder = 'COMPRA-' . $compra->id_compra;

        $sessionId = 'SESION-' . $compra->id_compra . '-' . time();

        $amount = (float) $compra->total;

        $returnUrl = url('/api/pagos/webpay/confirmar');

        $transaction = $this->webpayTransaction();

        $response = $transaction->create(
            $buyOrder,
            $sessionId,
            $amount,
            $returnUrl
        );

        $pago = Pago::create([
            'id_compra' => $compra->id_compra,
            'proveedor' => 'WEBPAY',
            'estado' => 'PENDING',
            'monto' => $compra->total,
            'token' => $response->getToken(),
        ]);

        return response()->json([
            'id_pago' => $pago->id_pago,
            'token' => $response->getToken(),
            'url' => $response->getUrl(),
        ]);
    }

    public function confirmar(Request $request)
    {
        $token = $request->input('token_ws');

        if (!$token) {
            return response()->json([
                'message' => 'No se recibió token de Webpay.'
            ], 400);
        }

        $pago = Pago::where('token', $token)->firstOrFail();

        $transaction = $this->webpayTransaction();

        $response = $transaction->commit($token);

        return DB::transaction(function () use ($response, $pago) {

            if ($response->getStatus() === 'AUTHORIZED') {

                $compra = $pago->compra;

                $compra->load('detalles.producto');

                $idSorteo = $compra
                    ->detalles
                    ->first()
                    ->producto
                    ->id_sorteo;

                $sorteo = Sorteo::where('id_sorteo', $idSorteo)
                    ->lockForUpdate()
                    ->firstOrFail();

                $totalParticipaciones = 0;

                foreach ($compra->detalles as $detalle) {

                    if ($detalle->producto->id_sorteo !== $idSorteo) {
                        abort(422, 'La compra contiene productos de distintos sorteos.');
                    }

                    $totalParticipaciones +=
                        $detalle->cantidad *
                        $detalle->producto->cant_participaciones;
                }

                $ultimoNumeroExistente = Participacion::where(
                    'id_sorteo',
                    $sorteo->id_sorteo
                )->max('numero') ?? 0;

                $ultimoNumero = max(
                    $sorteo->ultimo_numero_asignado,
                    $ultimoNumeroExistente
                );

                $numeroInicial = $ultimoNumero + 1;
                $numeroFinal = $ultimoNumero + $totalParticipaciones;

                for ($numero = $numeroInicial; $numero <= $numeroFinal; $numero++) {
                    Participacion::create([
                        'id_compra' => $compra->id_compra,
                        'id_sorteo' => $sorteo->id_sorteo,
                        'numero' => $numero,
                        'created_at' => now(),
                    ]);
                }

                $sorteo->ultimo_numero_asignado = $numeroFinal;
                $sorteo->saveOrFail();

                $pago->update([
                    'estado' => 'APPROVED',
                    'provider_transaction_id'
                        => $response->getBuyOrder(),
                    'authorization_code'
                        => $response->getAuthorizationCode(),
                    'payment_method'
                        => $response->getPaymentTypeCode(),
                    'paid_at' => now(),
                ]);

                $compra->update([
                    'estado' => 'PAID',
                ]);

                return response()->json([
                    'message' => 'Pago aprobado correctamente',
                    'id_compra' => $compra->id_compra,
                    'estado' => 'PAID',
                    'participaciones' =>
                        $compra
                            ->participaciones()
                            ->pluck('numero'),
                ]);
            }

            $pago->update([
                'estado' => 'FAILED',
            ]);

            return response()->json([
                'message' => 'Pago rechazado',
                'estado_webpay' => $response->getStatus(),
            ], 422);
        });
    }
}
