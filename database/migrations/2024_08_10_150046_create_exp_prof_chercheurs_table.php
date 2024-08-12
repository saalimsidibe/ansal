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
        Schema::create('exp_prof_chercheurs', function (Blueprint $table) {
            $table->id();
            $table->string('intitule');
            $table->date('debut');
            $table->date('fin');
            $table->string('ville');
            $table->timestamps();
            $table->foreignId('candidat_id')->constrained('candidats')->onDelete('cascade'); // Clé étrangère

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exp_prof_chercheurs');
    }
};
