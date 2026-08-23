<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    protected $table = 'productos';

    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'id_sorteo',
        'nombre',
        'descripcion',
        'precio',
        'cant_participaciones',
        'activo',
    ];

    protected $casts = [
        'precio' => 'decimal:2',
        'cant_participaciones' => 'integer',
        'activo' => 'boolean',
    ];

    public function sorteo()
    {
        return $this->belongsTo(
            Sorteo::class,
            'id_sorteo',
            'id_sorteo'
        );
    }

    public function detalles()
    {
        return $this->hasMany(
            DetalleCompra::class,
            'id_producto',
            'id_producto'
        );
    }
}
