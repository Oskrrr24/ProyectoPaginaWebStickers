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
        Schema::create('detalle_compras', function (Blueprint $table) {
            $table->id('id_detalle');

            $table->foreignId('id_compra')
                ->constrained('compras', 'id_compra')
                ->cascadeOnUpdate()
                ->cascadeOnDelete();

            $table->foreignId('id_producto')
                ->constrained('productos', 'id_producto')
                ->cascadeOnUpdate()
                ->restrictionOnDelete();

            $table->unsignedInteger('cantidad');
            
            $table->decimal('precio_unitario', 12, 2);
            $table->decimal('subtotal', 12, 2);
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detalle_compras');
    }
};
