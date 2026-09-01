<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Comprador;
use App\Models\DetalleCompra;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompraController extends Controller
{
    public function store(Request $request)
    {
        $datos = $request->validate([
            'comprador.nombre' => 'required|string|max:255',
            'comprador.apellidos' => 'required|string|max:255',
            'comprador.email' => 'required|email|max:255',
            'comprador.direccion' => 'required|string|max:255',
            'comprador.rut' => 'nullable|string|max:20',
            'comprador.telefono' => 'nullable|string|max:30',
            'comprador.region' => 'required|string|max:100',
            'comprador.ciudad' => 'required|string|max:100',
            'comprador.codigo_postal' => 'nullable|string|max:20',
            'comprador.espec_hogar' => 'nullable|string|max:255',

            'productos' => 'required|array|min:1',
            'productos.*.id_producto' => 'required|integer|exists:productos,id_producto',
            'productos.*.cantidad' => 'required|integer|min:1',
        ]);

        return DB::transaction(function () use ($datos) {

            $comprador = Comprador::create(
                $datos['comprador']
            );

            $total = 0;

            $productosProcesados = [];

            foreach ($datos['productos'] as $item) {

                $producto = Producto::findOrFail(
                    $item['id_producto']
                );

                if (!$producto->activo) {
                    abort(422, 'Uno de los productos seleccionados no está activo.');
                }

                $subtotal =
                    $producto->precio *
                    $item['cantidad'];

                $total += $subtotal;

                $productosProcesados[] = [
                    'producto' => $producto,
                    'cantidad' => $item['cantidad'],
                    'subtotal' => $subtotal,
                ];
            }

            $compra = Compra::create([
                'id_comprador' => $comprador->id_comprador,
                'estado' => 'PENDING',
                'total' => $total,
            ]);

            foreach ($productosProcesados as $item) {
                DetalleCompra::create([
                    'id_compra' => $compra->id_compra,
                    'id_producto' => $item['producto']->id_producto,
                    'cantidad' => $item['cantidad'],
                    'precio_unitario' => $item['producto']->precio,
                    'subtotal' => $item['subtotal'],
                ]);
            }

            return response()->json([
                'message' => 'Compra creada correctamente',
                'compra' => $compra->load(
                    'comprador',
                    'detalles.producto'
                ),
            ], 201);
        });
    }
}