<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pedidos', function (Blueprint $table) {
            $table->uuid('id')->primary(); // 👈 Cambio clave aquí
            $table->uuid('usuario_id');
            $table->date('fecha');
            $table->decimal('total', 10, 2);
            $table->timestamps();

            $table->foreign('usuario_id')->references('id_usuario')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};
