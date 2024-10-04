<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PreuveAutre extends Model
{
    use HasFactory;

    public function candidat()
    {
        return
            $this->belongsTo(Candidat::class, 'candidat_id');
    }
}
