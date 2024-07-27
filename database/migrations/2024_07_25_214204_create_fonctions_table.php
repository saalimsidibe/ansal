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
        Schema::create('fonctions', function (Blueprint $table) {
            $table->id();
            $table->string('nomFonct');
            $table->date('dateDebutFonc');
            $table->date('dateFinFonc');
            $table->string('nomStructureFonc');
            $table->string('villeFonc');
            $table->string('paysFonc');
            $table->foreignId('candidat_id')->constrained('candidats')->onDelete('cascade'); // Clé étrangère

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations. 
     */
    public function down(): void
    {
        Schema::dropIfExists('fonctions');
    }
};