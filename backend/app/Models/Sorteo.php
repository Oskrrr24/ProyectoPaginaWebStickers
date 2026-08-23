<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sorteo extends Model
{
    protected $table = 'sorteos';

    protected $primaryKey = 'id_sorteo';

    protected $fillable = [
        'nombre',
        'descripcion',
        'fecha_inicio',
        'fecha_fin',
        'estado',
        'ultimo_numero asignado',
    ];

    protected $casts = [
        'fecha_inicio' => 'datetime',
        'fecha_fin ' => 'datetime',
        'ultimo_numero_asignado' => 'integer',
    ];

    public function productos()
    {
        return $this->hasMany(
            Producto::class,
            'id_sorteo',
            'id_sorteo'
        );
    }

    public function participaciones()
    {
        return $this->hasMany(
            Participacion::class,
            'id_sorteo',
            'id_sorteo'
        );
    }
}
