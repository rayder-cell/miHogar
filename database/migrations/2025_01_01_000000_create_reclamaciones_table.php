<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reclamaciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 150);
            $table->string('dni', 8);
            $table->string('correo', 150);
            $table->string('telefono', 9);
            $table->string('tipo', 200);
            $table->text('detalle');
            $table->string('ip', 45)->nullable();
            $table->timestamps(); // created_at = fecha de registro
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reclamaciones');
    }
};