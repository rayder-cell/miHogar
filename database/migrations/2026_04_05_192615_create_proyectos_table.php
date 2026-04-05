<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('proyectos', function (Blueprint $table) {
            $table->increments('id_proyecto');
            $table->string('nombre_proyecto', 200)->unique();
            $table->string('distrito', 100)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->text('descripcion')->nullable();
            $table->text('fotos')->nullable();
            $table->text('videos')->nullable();
            $table->text('mapa')->nullable();
            $table->decimal('precio', 10, 2)->nullable();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
