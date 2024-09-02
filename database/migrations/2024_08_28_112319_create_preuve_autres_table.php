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
        Schema::create('preuve_autres', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('chemin');
            $table->string('nom_originale');
            $table->foreignId('candidat_id')->constrained('candidats')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preuve_autres');
    }
};