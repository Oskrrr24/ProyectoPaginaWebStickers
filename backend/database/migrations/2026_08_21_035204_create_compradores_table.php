<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('compradores', function (Blueprint $table) {
            $table->id('id_comprador');

            $table->string('nombre');
            $table->string('apellidos');
            $table->string('email');
            $table->string('direccion');

            $table->string('rut')->nullable();
            $table->string('telefono')->nullable();

            $table->string('region');
            $table->string('ciudad');

            $table->string('codigo_postal')->nullable();
            $table->string('espec_hogar')->nullable();

            $table->timestamps();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compradores');
    }
};
