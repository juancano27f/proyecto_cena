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
     Schema::create('estudiantes', function (Blueprint $table) {
    $table->id();

    $table->foreignId('institucion_id')
        ->constrained('instituciones')
        ->onDelete('cascade');

    $table->foreignId('usuario_id')
        ->constrained('usuarios')
        ->onDelete('cascade');

    $table->string('documento', 100)->unique();
    $table->string('grado', 50)->nullable();

    $table->string('nombre_acudiente')->nullable();
    $table->string('telefono_acudiente', 50)->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('estudiantes');
    }
};
