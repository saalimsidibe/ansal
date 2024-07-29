<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

use App\Models\Diplome;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('candidats', function (Blueprint $table) {
            $table->id();
            $table->string('nom');
            $table->string('prenom');
            $table->string('sexe');
            $table->date('datenaissance');
            $table->string('titre');
            $table->string('telephone');
            $table->date('datenomin');
            $table->string('email');
            $table->string('college');
            $table->string('specialite');
            $table->string('expertise');
            $table->string('honneur');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */



    public function down(): void
    {
        Schema::dropIfExists('candidats');
    }
};
