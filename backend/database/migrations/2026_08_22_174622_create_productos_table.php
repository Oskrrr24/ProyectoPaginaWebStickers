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
        Schema::create('productos', function (Blueprint $table) {
            
            $table->id('id_producto');

            $table->foreignId('id_sorteo')
                ->constrained('sorteos', 'id_sorteo')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            
            $table->string('nombre');
            $table->text('descripcion')->nullable();

            $table->decimal('precio', 12, 2);

            $table->unsignedInteger('cant_participaciones');

            $table->boolean('activo')->default(true);

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
