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
        Schema::create('ouvrage_auts', function (Blueprint $table) {
            $table->id();
            $table->string('nomAuteurOuvrageAut');
            $table->string('nomCoAuteurOuvrageAut');
            $table->date('anneePublicationOuvrageAut');
            $table->string('titreOuvrageAut');
            $table->string('nomEditeurOuvrageAut');
            $table->string('nombrePageOuvrageAut');
            $table->foreignId('autre_id')->constrained('autres')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ouvrage_auts');
    }
};