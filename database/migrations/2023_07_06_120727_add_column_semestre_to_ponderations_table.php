<?php

use App\Models\Semestre;
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
        Schema::table('ponderations', function (Blueprint $table) {
            $table->foreignIdFor(Semestre::class)->constrained();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('ponderations', function (Blueprint $table) {
            $table->dropColumn('semestre_id');
        });
    }
};
