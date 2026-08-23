<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    protected $table = 'pagos';

    protected $primaryKey = 'id_pago';

    protected $fillable = [
        'id_compra',
        'provider_transaction_id',
        'proveedor',
        'estado',
        'estado',
        'monto',
        'token',
        'authorization_code',
        'payment_method',
        'paid_at',
    ];

    protected $casts = [
        'monto' => 'decimal:2',
        'paid_at' => 'datetime',
    ];

    public function compra()
    {
        return $this->belongsTo(
            Compra::class,
            'id_compra',
            'id_compra'
        );
    }
}
