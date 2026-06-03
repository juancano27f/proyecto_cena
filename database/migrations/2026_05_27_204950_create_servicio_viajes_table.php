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
   Schema::create('servicios_viaje', function (Blueprint $table) {
    $table->id();

    $table->foreignId('viaje_id')
        ->constrained('viajes')
        ->onDelete('cascade');

    $table->foreignId('proveedor_id')
        ->constrained('proveedores')
        ->onDelete('cascade');

    $table->string('tipo_servicio', 100);
    $table->string('descripcion', 500)->nullable();

    $table->decimal('costo', 10, 2)->default(0);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servicio_viajes');
    }
};
