<?php

namespace App\Http\Controllers;

use App\Models\Card;

class HomeController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        $cardsPorPagina = 12;
        $paginas = $cards->chunk($cardsPorPagina);
        return view('home', compact('paginas'));
    }
}

