<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    protected $table = 'compras';

    protected $primaryKey = 'id_compra';

    protected $fillable = [
        'id_comprador',
        'estado',
        'total',
    ];

    protected $casts = [
        'total' => 'decimal:2',
    ];

    public function comprador()
    {
        return $this->belongsTo(
            Comprador::class,
            'id_comprador',
            'id_comprador'
        );
    }

    public function detalles()
    {
        return $this->hasMany(
            DetalleCompra::class,
            'id_compra',
            'id_compra'
        );
    }

    public function pagos()
    {
        return $this->hasMany(
            Pago::class,
            'id_compra',
            'id_compra'
        );
    }

    public function participaciones()
    {
        return $this->hasMany(
            Participacion::class,
            'id_compra',
            'id_compra'
        );
    }
}
