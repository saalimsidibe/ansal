<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidat extends Model
{
    use HasFactory;

    public function diplomes()
    {
        return $this->hasMany(Diplome::class, 'candidat_id');
    }

    public function ouvrages()
    {
        return $this->hasMany(Ouvrage::class, 'candidat_id');
    }

    public function articles()
    {
        return $this->hasMany(Article::class, 'candidat_id');
    }

    public function distinctions()
    {
        return $this->hasMany(Distinction::class, 'candidat_id');
    }

    public function responsabilites()
    {
        return $this->hasMany(Responsabilite::class, 'candidat_id');
    }

    public function fonctions()
    {
        return $this->hasMany(Fonction::class);
    }

    public function parrains()
    {
        return $this->hasMany(Parrain::class, 'candidat_id');
    }

    public function experiences()
    {
        return $this->hasMany(Experience::class, 'candidat_id');
    }

    public function brevets()
    {
        return $this->hasMany(Brevet::class, 'candidat_id');
    }

    public function commissions()
    {
        return $this->hasMany(Commission::class, 'candidat_id');
    }

    public function preuveChercheurs()
    {
        return $this->hasMany(PreuveChercheur::class, 'candidat_id');
    }
}
