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
        Schema::create('commission_chercheurs', function (Blueprint $table) {
            $table->id();
            $table->string('nomComm');
            $table->foreignId('candidat_id')->constrained('candidats')->onDelete('cascade'); // Clé étrangère
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('commission_chercheurs');
    }
};
