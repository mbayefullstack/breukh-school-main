<?php

use App\Models\AnneeScolaire;
use App\Models\Classe;
use App\Models\Discipline;
use App\Models\Evaluation;
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
        Schema::create('ponderations', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Discipline::class)->constrained();
            $table->foreignIdFor(Classe::class)->constrained();
            $table->foreignIdFor(AnneeScolaire::class)->constrained();
            $table->foreignIdFor(Evaluation::class)->constrained();
            $table->float('valeur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ponderations');
    }
};
