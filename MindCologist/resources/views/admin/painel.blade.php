@extends('layouts.app')
@section('titulo', 'Painel Administrativo')

@section('conteudo')
<script src="//unpkg.com/alpinejs" defer></script>

<div x-data="{ aba: 'tags' }" class="max-w-6xl mx-auto px-6 py-10">

    <!-- Abas -->
    <div class="flex space-x-4 mb-6">
        <button @click="aba = 'tags'"
            :class="aba === 'tags' ? 'bg-indigo-600 text-white' : 'bg-indigo-100 text-indigo-700'"
            class="px-4 py-2 rounded-xl font-semibold transition">
            Tags
        </button>
        <button @click="aba = 'cards'"
            :class="aba === 'cards' ? 'bg-indigo-600 text-white' : 'bg-indigo-100 text-indigo-700'"
            class="px-4 py-2 rounded-xl font-semibold transition">
            Cards
        </button>
    </div>

    <!-- ABA DE TAGS (CRUD COMPLETO) -->
    <div x-show="aba === 'tags'" x-cloak>
        <h2 class="text-xl font-bold text-indigo-800 mb-4">Gerenciar Tags</h2>

        <!-- Formulário de Criação -->
        <form method="POST" action="{{ route('admin.tags.store') }}" class="bg-white p-6 rounded-lg shadow mb-8">
            @csrf
            <h3 class="text-lg font-semibold mb-4">Adicionar Nova Tag</h3>
            <div class="flex gap-4">
                <input type="text" name="nome" placeholder="Nome da tag" class="border rounded px-4 py-2 w-full" required>
                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-xl whitespace-nowrap">
                    Adicionar Tag
                </button>
            </div>
        </form>

        <!-- Lista de Tags -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Nome</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ações</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($tags as $tag)
                    <tr>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $tag->id }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $tag->nome }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <!-- Formulário de Edição (simplificado) -->
                            <form method="POST" action="{{ route('admin.tags.update', $tag) }}" class="inline">
                                @csrf
                                @method('PUT')
                                <input type="text" name="nome" value="{{ $tag->nome }}" class="border rounded px-2 py-1 text-sm w-32">
                                <button type="submit" class="ml-2 text-indigo-600 hover:text-indigo-900">Atualizar</button>
                            </form>
                            
                            <!-- Formulário de Exclusão -->
                            <form method="POST" action="{{ route('admin.tags.destroy', $tag) }}" class="inline ml-2">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900">Excluir</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- ABA DE CARDS (CRUD COMPLETO) -->
    <div x-show="aba === 'cards'" x-cloak>
        <h2 class="text-xl font-bold text-indigo-800 mb-4">Gerenciar Cards</h2>

        <!-- Formulário de Criação -->
        <form method="POST" action="{{ route('admin.cards.store') }}" enctype="multipart/form-data" class="bg-white p-6 rounded-lg shadow mb-8">
            @csrf
            <h3 class="text-lg font-semibold mb-4">Adicionar Novo Card</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                    <input type="text" name="titulo" class="border rounded px-4 py-2 w-full" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Nome da Imagem (com extensão)</label>
                    <input type="text" name="image" placeholder="exemplo.png" class="border rounded px-4 py-2 w-full" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Arquivo da Imagem</label>
                    <input type="file" name="arquivo_imagem" accept="image/*" class="border rounded px-4 py-2 w-full" required>
                </div>
                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                    <div class="flex flex-wrap gap-2 border rounded p-2">
                        @foreach($tags as $tag)
                            <label class="flex items-center space-x-1">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}">
                                <span>{{ $tag->nome }}</span>
                            </label>
                        @endforeach
                    </div>
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                    <textarea name="descricao" class="border rounded px-4 py-2 w-full" required></textarea>
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Conteúdo</label>
                    <textarea name="conteudo" class="border rounded px-4 py-2 w-full" required></textarea>
                </div>
            </div>
            
            <button type="submit" class="mt-4 bg-indigo-600 text-white px-6 py-2 rounded-xl">Salvar Card</button>
        </form>

        <!-- Lista de Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($cards as $card)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    <!-- Imagem do card -->
                    <div class="h-40 bg-indigo-100 flex items-center justify-center">
                        <img src="{{ asset('img/' . $card->imagem) }}" alt="Imagem do card" class="w-full h-full object-cover">
                    </div>
                    
                    <!-- Informações do card -->
                    <div class="p-4 space-y-2">
                        <div class="text-xs text-gray-500">
                            <span class="font-semibold">ID:</span> {{ $card->id }}
                        </div>
                        
                        <div class="text-lg font-semibold text-indigo-800">
                            {{ $card->título }}
                        </div>
                        
                        <div class="text-sm text-gray-600 break-all">
                            <span class="font-semibold">Arquivo:</span> {{ $card->imagem }}
                        </div>
                        
                        <div class="text-sm text-gray-700">
                            {{ $card->desercioso }}
                        </div>
                        
                        <!-- Botões de Ação -->
                        <div class="flex justify-between mt-3">
                            <!-- Editar -->
                            <a href="{{ route('admin.cards.edit', $card) }}" class="text-indigo-600 hover:text-indigo-900 text-sm">Editar</a>
                            
                            <!-- Excluir -->
                            <form method="POST" action="{{ route('admin.cards.destroy', $card) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-600 hover:text-red-900 text-sm">Excluir</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</div>
@endsection