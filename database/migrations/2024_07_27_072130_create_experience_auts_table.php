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
        Schema::create('experience_auts', function (Blueprint $table) {
            $table->id();
            $table->string('nomFonctionAut');
            $table->string('typeFonctionAut');
            $table->date('debutFonctionAut');
            $table->date('finFonctionAut');
            $table->string('structureFonctionAut');
            $table->string('villeFonctionAut');
            $table->string('paysFonctionAut');
            $table->foreignId('autre_id')->constrained('autres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('experience_auts');
    }
};