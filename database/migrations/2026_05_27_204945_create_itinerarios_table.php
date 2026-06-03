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
    Schema::create('itinerarios', function (Blueprint $table) {
    $table->id();

    $table->foreignId('viaje_id')
        ->constrained('viajes')
        ->onDelete('cascade');

    $table->integer('dia');

    $table->string('titulo');
    $table->text('descripcion')->nullable();

    $table->time('hora_inicio')->nullable();
    $table->time('hora_fin')->nullable();

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('itinerarios');
    }
};
