<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asesores_venta', function (Blueprint $table) {
            $table->increments('id_asesor');
            $table->string('nombre', 100);
            $table->text('foto')->nullable();
            $table->string('contacto', 150)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asesores_venta');
    }
};