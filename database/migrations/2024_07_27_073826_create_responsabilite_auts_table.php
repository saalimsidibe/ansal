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
        Schema::create('responsabilite_auts', function (Blueprint $table) {
            $table->id();
            $table->string('nomResponsabilteAut');
            $table->string('typeResponsabiliteAut');
            $table->date('debutResponsabiliteAut');
            $table->date('finResponsabiliteAut');
            $table->string('structureResponsabiliteAut');
            $table->string('villeResponsabiliteAut');
            $table->string('paysResponsabiliteAut');
            $table->foreignId('autre_id')->constrained('autres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('responsabilite_auts');
    }
};