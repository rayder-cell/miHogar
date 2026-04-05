<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('asesores_proyectos', function (Blueprint $table) {
            $table->unsignedInteger('id_asesor');
            $table->unsignedInteger('id_proyecto');
            $table->timestamp('fecha_acceso')->useCurrent();

            $table->primary(['id_asesor', 'id_proyecto']);

            $table->foreign('id_asesor')
                  ->references('id_asesor')->on('asesores_venta')
                  ->onDelete('cascade');

            $table->foreign('id_proyecto')
                  ->references('id_proyecto')->on('proyectos')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('asesores_proyectos');
    }
};
