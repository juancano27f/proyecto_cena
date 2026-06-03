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
     Schema::create('viajes', function (Blueprint $table) {
    $table->id();

    $table->foreignId('institucion_id')
        ->constrained('instituciones')
        ->onDelete('cascade');

    $table->string('titulo');
    $table->string('destino');
    $table->text('descripcion')->nullable();

    $table->date('fecha_inicio');
    $table->date('fecha_fin');

    $table->integer('cantidad_estudiantes')->default(0);
    $table->integer('cantidad_acompanantes')->default(0);

    $table->decimal('presupuesto', 10, 2)->default(0);

    $table->string('estado', 50)->default('pendiente');

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};
