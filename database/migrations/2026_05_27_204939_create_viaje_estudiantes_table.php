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
    Schema::create('viaje_estudiantes', function (Blueprint $table) {
    $table->id();

    $table->foreignId('viaje_id')
        ->constrained('viajes')
        ->onDelete('cascade');

    $table->foreignId('estudiante_id')
        ->constrained('estudiantes')
        ->onDelete('cascade');

    $table->timestamps();

    $table->unique(['viaje_id', 'estudiante_id']);
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viaje_estudiantes');
    }
};
