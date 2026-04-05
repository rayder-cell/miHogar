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
    Schema::create('proyectos', function (Blueprint $table) {
        $table->id('id_proyecto'); // Tu Primary Key del script
        $table->string('nombre_proyecto', 200)->unique();
        $table->string('distrito', 100)->nullable();
        $table->string('direccion', 255)->nullable();
        $table->text('descripcion')->nullable();
        $table->text('fotos')->nullable();
        $table->text('videos')->nullable();
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('proyectos');
    }
};
