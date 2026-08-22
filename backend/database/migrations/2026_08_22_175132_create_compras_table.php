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
        Schema::create('compras', function (Blueprint $table) {
            $table->id('id_compra');

            $table->foreignId('id_comprador')
                ->constrained('compradores', 'id_comprador')
                ->cascadeOnUpdate()
                ->restrictOnDelete();

            $table->decimal('total', 12, 2);    
            $table->string('estado')->default('PENDING');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
    }
};
