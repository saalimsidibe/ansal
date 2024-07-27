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
        Schema::table('articles', function (Blueprint $table) {
            //

            $table->string('nomAuteur');
            $table->string('nomCoaouteur');
            $table->date('anneePublication');
            $table->string('titre');
            $table->string('editeur');
            $table->string('numeroPage');
            $table->string('articleDoc');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('articles', function (Blueprint $table) {
            //
        });
    }
};
