<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Tag;  

class HomeController extends Controller
{
    public function index()
    {
        $cards = Card::all();
        $paginas = $cards->chunk(12);
        
        $tags = Tag::orderBy('nome')->get();
        
        return view('home', compact('paginas', 'tags'));  
    }
}
