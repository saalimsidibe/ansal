<?php

namespace App\Livewire;

use Livewire\Component;

class Etape3Component extends Component
{
    public $nom;
    public $prenom;

    public function render()
    {
        return view('livewire.etape3-component');
    }
}
