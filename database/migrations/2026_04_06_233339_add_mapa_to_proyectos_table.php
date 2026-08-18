<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        if (!Schema::hasColumn('proyectos', 'mapa')) {
            Schema::table('proyectos', function (Blueprint $table) {
                $table->string('mapa')->nullable()->after('videos');
            });
        }
    }

    public function down(): void
    {
        if (Schema::hasColumn('proyectos', 'mapa')) {
            Schema::table('proyectos', function (Blueprint $table) {
                $table->dropColumn('mapa');
            });
        }
    }
};