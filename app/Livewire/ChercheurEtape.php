<?php

namespace App\Livewire;

use Livewire\Component;

class ChercheurEtape extends Component
{
    public $etape = 1;
    public $donneesEta1;
    public $donneesEta2;


    public function render()
    {
        return view('livewire.chercheur-etape');
    }

    public function valider()
    {
    }

    public function suivant()
    {
        $this->etape++;
    }

    public function arriere()
    {
        $this->etape--;
    }
}
