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
        Schema::create('participaciones', function (Blueprint $table) {
            $table->id('id_participacion');

            $table->foreignId('id_compra')
                ->constrained('compras', 'id_compra')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->foreignId('id_sorteo')
                ->constrained('sorteos', 'id_sorteo')
                ->cascadeOnUpdate()
                ->restrictOnDelete();
            
            $table->unsignedBigInteger('numero');

            $table->timestamp('created_at')->useCurrent();

            $table->unique(
                ['id_sorteo', 'numero'], 'participaciones_sorteo_numero_unique'
            );

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('participaciones');
    }
};
