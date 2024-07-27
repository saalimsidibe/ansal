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
        Schema::create('ouvrages', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('nom_auteur');
            $table->string('nom_coauteur');
            $table->string('annee_publication') ;
            $table->string('nom_editeur');
            $table->string('nombrePage');
            $table->foreignId('candidat_id')->constrained('candidats')->onDelete('cascade'); // Clé étrangère
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ouvrages');
    }
};