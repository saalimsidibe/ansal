<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Impression extends Controller
{
    public function affiche()
    {
        return view('aver');
    }
}