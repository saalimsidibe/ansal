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
        Schema::create('diplomes', function (Blueprint $table) {
            $table->id();
            $table->string('nom_diplome');
            $table->date('date_acquisition');
            $table->string('nom_college');
            $table->string('ville');
            $table->string('pays');
            $table->foreignId('candidat_id')->constrained('candidats')->onDelete('cascade'); // Clé étrangère
            $table->timestamps();
        });
    }

    /*
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('diplomes');
    }
};