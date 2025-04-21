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
        Schema::create('materials', function (Blueprint $table) {
            $table->uuid('id_material')->primary(); // ID UUID
            $table->string('nombre');
            $table->text('descripcion')->nullable();
            $table->integer('cantidad')->default(0);
            $table->decimal('precio', 10, 2)->default(0.00); // Precio simple
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
