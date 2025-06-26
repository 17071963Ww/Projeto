<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Tag;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function painel()
    {
        return view('admin.painel', [
            'tags' => Tag::all(),
            'cards' => Card::with('tags')->get()
        ]);
    }

    public function storeTag(Request $request)
    {
        $request->validate(['nome' => 'required']);
        Tag::create($request->only('nome'));
        return redirect()->route('admin.painel');
    }

    public function destroyTag(Tag $tag)
    {
        $tag->delete();
        return redirect()->route('admin.painel');
    }

    public function storeCard(Request $request)
    {
        $request->validate([
            'titulo' => 'required',
            'descricao' => 'required',
            'image' => 'required',
            'tags' => 'array'
        ]);

        $card = Card::create($request->only('titulo', 'descricao', 'image'));
        $card->tags()->sync($request->tags);

        return redirect()->route('admin.painel');
    }

    public function destroyCard(Card $card)
    {
        $card->tags()->detach();
        $card->delete();
        return redirect()->route('admin.painel');
    }
}
