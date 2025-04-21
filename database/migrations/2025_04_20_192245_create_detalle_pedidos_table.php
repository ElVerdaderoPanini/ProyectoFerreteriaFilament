<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('detalle_pedidos', function (Blueprint $table) {
            $table->uuid('id')->primary(); // ID UUID para el detalle
            $table->uuid('pedidos_id'); // FK hacia pedidos
            $table->uuid('material_id'); // FK hacia materials
            $table->integer('cantidad'); // Cantidad solicitada

            $table->timestamps();

            // Claves foráneas
            $table->foreign('pedidos_id')->references('id')->on('pedidos')->onDelete('cascade');
            $table->foreign('material_id')->references('id_material')->on('materials')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detalle_pedidos');
    }
};
