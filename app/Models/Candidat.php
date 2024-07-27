<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;

    public function diplomes()
    {
        return $this->hasMany(Diplome::class);
    }

    public function ouvrages()
    {
        return $this->hasMany(Ouvrage::class);
    }

    public function articles()
    {
        return $this->hasMany(Article::class);
    }

    public function distinctions()
    {
        return $this->hasMany('Distinction::class');
    }

    public function responsabilites()
    {
        return $this->hasMany(Responsabilite::class);
    }

    public function fonctions()
    {
        return $this->hasMany(Fonction::class);
    }
}