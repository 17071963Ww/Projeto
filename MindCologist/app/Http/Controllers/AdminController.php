<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use App\Models\Card;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    private function formatImageName($title)
    {
        $formatted = preg_replace('/[^A-Za-z0-9\-]/', '', str_replace(' ', '-', $title));
        return strtolower($formatted) . '.png';
    }

    public function painel()
    {
        $tags = Tag::all();
        $cards = Card::with('tags')->get();
        return view('admin.painel', compact('tags', 'cards'));
    }

    public function storeTag(Request $request)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:tags,nome'
        ]);

        Tag::create(['nome' => $request->nome]);

        return back()->with('success', 'Tag criada com sucesso!');
    }

    public function updateTag(Request $request, Tag $tag)
    {
        $request->validate([
            'nome' => 'required|string|max:255|unique:tags,nome,'.$tag->id
        ]);

        $tag->update(['nome' => $request->nome]);

        return back()->with('success', 'Tag atualizada com sucesso!');
    }

    public function destroyTag(Tag $tag)
    {
        $tag->cards()->detach();
        $tag->delete();
        return back()->with('success', 'Tag removida com sucesso!');
    }

    public function storeCard(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'arquivo_imagem' => 'required|image|mimes:png|max:2048',
            'descricao' => 'required|string',
            'conteudo' => 'required|string',
            'tags' => 'nullable|array',
        ]);

        $imageName = $this->formatImageName($request->titulo);
        
        $request->arquivo_imagem->move(public_path('img'), $imageName);

        $card = Card::create([
            'título' => $request->titulo,
            'imagem' => $imageName,
            'descricao' => $request->descricao,
            'conteudo' => $request->conteudo,
        ]);

        if ($request->tags) {
            $card->tags()->attach($request->tags);
        }

        return back()->with('success', 'Card criado com sucesso!');
    }

    public function updateCard(Request $request, Card $card)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'arquivo_imagem' => 'nullable|image|mimes:png|max:2048',
            'descricao' => 'required|string',
            'conteudo' => 'required|string',
            'tags' => 'nullable|array',
        ]);

        $titleChanged = $request->titulo != $card->título;
        $newImageName = $titleChanged ? $this->formatImageName($request->titulo) : $card->imagem;

        if ($titleChanged || $request->hasFile('arquivo_imagem')) {
            if (file_exists(public_path('img/' . $card->imagem))) {
                unlink(public_path('img/' . $card->imagem));
            }
    
            if ($request->hasFile('arquivo_imagem')) {
                $request->arquivo_imagem->move(public_path('img'), $newImageName);
            } elseif ($titleChanged) {
                rename(
                    public_path('img/' . $card->imagem),
                    public_path('img/' . $newImageName)
                );
            }
        }

        $card->update([
            'título' => $request->titulo,
            'imagem' => $newImageName,
            'descricao' => $request->descricao,
            'conteudo' => $request->conteudo,
        ]);

        $card->tags()->sync($request->tags ?? []);

        return back()->with('success', 'Card atualizado com sucesso!');
    }

    public function destroyCard(Card $card)
    {
        if (file_exists(public_path('img/' . $card->imagem))) {
            unlink(public_path('img/' . $card->imagem));
        }

        $card->tags()->detach();
        $card->delete();

        return back()->with('success', 'Card removido com sucesso!');
    }
}