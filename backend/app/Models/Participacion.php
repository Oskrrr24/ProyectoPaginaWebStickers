<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Participacion extends Model
{
    protected $table = 'participaciones';

    protected $primaryKey = 'id_participacion';

    public $timestamps = false;

    protected $fillable = [
        'id_compra',
        'id_sorteo',
        'numero',
        'created_at',
    ];

    protected $casts = [
        'numero' => 'integer',
        'created_at' => 'datetime',
    ];

    public function compra()
    {
        return $this->belongsTo(
            Compra::class,
            'id_compra',
            'id_compra'
        );
    }

    public function sorteo()
    {
        return $this->belongsTo(
            Sorteo::class,
            'id_sorteo',
            'id_sorteo'
        );
    }
    
}
