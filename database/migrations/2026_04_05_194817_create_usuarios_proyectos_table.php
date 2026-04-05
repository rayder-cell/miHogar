<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('usuarios_proyectos', function (Blueprint $table) {
            $table->unsignedInteger('id_usuario');
            $table->unsignedInteger('id_proyecto');
            $table->timestamp('fecha_acceso')->useCurrent();

            $table->primary(['id_usuario', 'id_proyecto']);

            $table->foreign('id_usuario')
                  ->references('id_usuario')->on('usuarios')
                  ->onDelete('cascade');

            $table->foreign('id_proyecto')
                  ->references('id_proyecto')->on('proyectos')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('usuarios_proyectos');
    }
};