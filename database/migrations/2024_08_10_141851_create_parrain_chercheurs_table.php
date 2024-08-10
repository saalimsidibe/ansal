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
        Schema::create('parrain_chercheurs', function (Blueprint $table) {
            $table->id();
            $table->string('prenomPremierP');
            $table->string('nomPremierP');
            $table->string('prenomDeuxiemeP');
            $table->string('nomDeuxiemeP');
            $table->string('college');
            $table->string('specialite');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('parrain_chercheurs');
    }
};
