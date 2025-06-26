@extends('layouts.app')
@section('titulo', 'Criar Card')
@section('conteudo')

<div class="max-w-3xl mx-auto bg-white p-8 rounded-xl shadow mt-10">
    <h1 class="text-2xl font-bold text-indigo-700 mb-6">Criar Novo Card</h1>

    <form method="POST" action="{{ route('admin.cards.store') }}" enctype="multipart/form-data" class="space-y-6">
        @csrf

        <div>
            <label class="block text-gray-700 font-semibold">Título</label>
            <input type="text" name="titulo" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Descrição</label>
            <input type="text" name="descricao" class="w-full p-2 border rounded" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Conteúdo</label>
            <textarea name="conteudo" rows="5" class="w-full p-2 border rounded"></textarea>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Imagem</label>
            <input type="file" name="imagem" accept="image/*" class="w-full border p-2 rounded" required>
        </div>

        <div>
            <label class="block text-gray-700 font-semibold">Tags</label>
            <div class="flex flex-wrap gap-2">
                @foreach($tags as $tag)
                    <label class="inline-flex items-center">
                        <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="mr-2">
                        {{ $tag->nome }}
                    </label>
                @endforeach
            </div>
        </div>

        <div class="text-right">
            <button type="submit" class="bg-indigo-600 text-white px-6 py-2 rounded hover:bg-indigo-700">
                Criar
            </button>
        </div>
    </form>
</div>

@endsection
