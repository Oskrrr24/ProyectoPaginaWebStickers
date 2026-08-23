<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sorteo;

class SorteoSeeder extends Seeder
{
    public function run(): void
    {
        Sorteo::create([
            'nombre' => 'Sorteo de prueba',
            'descripcion' => 'Sorteo utilizado durante el desarrollo',
            'fecha_inicio' => now(),
            'fecha_fin' => now()->addMonth(),
            'estado' => 'ACTIVO',
            'ultimo_numero_asignado' => 0,
        ]);
    }
}
