<?php

namespace App\Http\Controllers;

use App\Models\Card;

class HomeController extends Controller
{
    public function index()
    {
        $cards = Card::all();        
        $paginas = $cards->chunk(12); 
        return \view('home', compact('paginas'));
    }
}