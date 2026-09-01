<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comprador extends Model
{
    protected $table = 'compradores';

    protected $primaryKey = 'id_comprador';

    protected $fillable = [
        'nombre', 
        'apellidos',
        'email',
        'direccion',
        'rut',
        'telefono',
        'region',
        'ciudad',
        'codigo_postal',
        'espec_hogar',
    ];

    public function compras()
    {
        return $this->hasMany(
            Compra::class,
            'id_comprador',
            'id_comprador'
        );
    }

}
