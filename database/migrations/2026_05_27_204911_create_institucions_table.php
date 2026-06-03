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
      Schema::create('instituciones', function (Blueprint $table) {
    $table->id();

    $table->string('nombre');
    $table->string('nit', 100)->nullable();
    $table->string('ciudad', 100)->nullable();
    $table->string('direccion')->nullable();
    $table->string('telefono', 50)->nullable();
    $table->string('correo')->nullable();

    $table->smallInteger('estado')->default(1);

    $table->timestamps();
});
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('institucions');
    }
};
