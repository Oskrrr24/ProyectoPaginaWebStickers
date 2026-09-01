<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    public function run(): void
    {
        Producto::create([
            'id_sorteo' => 1,
            'nombre' => 'Producto individual',
            'descripcion' => 'Producto digital de prueba',
            'precio' => 5000,
            'cant_participaciones' => 1,
            'activo' => true,
        ]);

        Producto::create([
            'id_sorteo' => 1,
            'nombre' => 'Pack 5',
            'descripcion' => 'Pack promocional de prueba',
            'precio' => 20000,
            'cant_participaciones' => 5,
            'activo' => true,
        ]);
    }
}