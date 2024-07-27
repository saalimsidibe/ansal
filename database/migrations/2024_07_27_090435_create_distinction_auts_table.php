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
        Schema::create('distinction_auts', function (Blueprint $table) {
            $table->id();
            $table->string('nomDistinctionAut');
            $table->string('typeDistinctionAut');
            $table->foreignId('autre_id')->constrained('autres')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('distinction_auts');
    }
};
