<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('asesores_venta', function (Blueprint $table) {
            $table->string('cargo', 100)->nullable()->after('contacto');
            $table->text('descripcion')->nullable()->after('cargo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('asesores_venta', function (Blueprint $table) {
            //
        });
    }
};
