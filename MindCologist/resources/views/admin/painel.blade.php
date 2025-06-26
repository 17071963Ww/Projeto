@extends('layouts.app')
@section('titulo', 'Painel Administrativo')

@section('conteudo')
<script src="//unpkg.com/alpinejs" defer></script>

<div x-data="{ 
    aba: 'tags',
    editingCard: null,
    formData: {
        titulo: '',
        image: '',
        arquivo_imagem: null,
        descricao: '',
        conteudo: '',
        tags: []
    }
}" class="max-w-6xl mx-auto px-6 py-10">

    <div class="flex space-x-4 mb-6">
        <button @click="aba = 'tags'; editingCard = null"
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

    <div x-show="aba === 'tags'" x-cloak>
        <h2 class="text-xl font-bold text-indigo-800 mb-4">Gerenciar Tags</h2>


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
                          
                            <form method="POST" action="{{ route('admin.tags.update', $tag) }}" class="inline">
                                @csrf
                                @method('PUT')
                                <input type="text" name="nome" value="{{ $tag->nome }}" class="border rounded px-2 py-1 text-sm w-32">
                                <button type="submit" class="ml-2 text-indigo-600 hover:text-indigo-900">Atualizar</button>
                            </form>
                            
                        
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

    <div x-show="aba === 'cards'" x-cloak>
        <h2 class="text-xl font-bold text-indigo-800 mb-4">Gerenciar Cards</h2>


        <form 
            x-bind:action="editingCard ? '/admin/cards/' + editingCard.id : '/admin/cards'"
            method="POST" 
            enctype="multipart/form-data"
            class="bg-white p-6 rounded-lg shadow mb-8"
            @submit.prevent="
                const form = $event.target;
                const formData = new FormData(form);
                
                if (editingCard) {
                    formData.append('_method', 'PUT');
                }
                
                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name=csrf-token]').content
                    }
                })
                .then(response => {
                    if (response.ok) {
                        window.location.reload();
                    }
                });
            "
        >
            <h3 class="text-lg font-semibold mb-4" x-text="editingCard ? 'Editar Card' : 'Adicionar Novo Card'"></h3>
            
            <input type="hidden" name="_method" x-bind:value="editingCard ? 'PUT' : 'POST'">
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Arquivo da Imagem</label>
                    <input type="file" name="arquivo_imagem" class="border rounded px-4 py-2 w-full" x-ref="fileInput">
                    <p class="text-xs text-gray-500 mt-1" x-show="editingCard">Deixe em branco para manter a imagem atual</p>
                    <template x-if="editingCard">
                        <div class="mt-2">
                            <span class="text-sm font-medium text-gray-700">Imagem Atual:</span>
                            <img x-bind:src="'/img/' + editingCard.imagem" alt="Imagem atual" class="h-20 mt-1 border rounded">
                        </div>
                    </template>
                </div>

                
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-1">Tags</label>
                    <div class="flex flex-wrap gap-2 border rounded p-2">
                        @foreach($tags as $tag)
                            <label class="flex items-center space-x-1">
                                <input type="checkbox" name="tags[]" value="{{ $tag->id }}" 
                                       x-model="formData.tags" x-bind:checked="formData.tags.includes({{ $tag->id }})">
                                <span>{{ $tag->nome }}</span>
                            </label>
                            @endforeach
                            </div>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Título</label>
                            <input type="text" name="titulo" x-model="formData.titulo" class="border rounded px-4 py-2 w-full" required>
                        </div>                        
                        
                        
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Descrição</label>
                    <textarea name="descricao" x-model="formData.descricao" class="border rounded px-4 py-2 w-full" required></textarea>
                </div>
                
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700 mb-1">Conteúdo</label>
                    <textarea name="conteudo" x-model="formData.conteudo" class="border rounded px-4 py-2 w-full" required></textarea>
                </div>
            </div>
            
            <div class="flex justify-end space-x-3 mt-6">
                <button type="button" @click="editingCard = null; formData = {
                    titulo: '',
                    image: '',
                    arquivo_imagem: null,
                    descricao: '',
                    conteudo: '',
                    tags: []
                }; $refs.fileInput.value = ''" 
                    x-show="editingCard"
                    class="px-4 py-2 border rounded-lg">
                    Cancelar
                </button>
                <button type="submit" class="px-4 py-2 bg-indigo-600 text-white rounded-lg">
                    <span x-text="editingCard ? 'Atualizar Card' : 'Salvar Card'"></span>
                </button>
            </div>
        </form>


        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
            @foreach($cards as $card)
                <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition">
                    
                    <div class="h-40 bg-indigo-100 flex items-center justify-center">
                        <img src="{{ asset('img/' . $card->imagem) }}" alt="Imagem do card" class="w-full h-full object-cover">
                    </div>
                    
                    
                    <div class="p-4 space-y-2">
                        <div class="text-xs text-gray-500">
                            <span class="font-semibold">ID:</span> {{ $card->id }}
                        </div>
                        
                        <div class="text-lg font-semibold text-indigo-800">
                            {{ $card->título }}
                        </div>
                        
                        <div class="text-sm text-gray-600 break-all">
                            {{ pathinfo($card->imagem, PATHINFO_FILENAME) }}
                        </div>
                        
                        <div class="text-sm text-gray-700 line-clamp-2">
                            {{ $card->desercioso }}
                        </div>
                        
                        <div class="flex justify-between mt-3">
                            <button @click="
                                editingCard = {
                                    id: {{ $card->id }},
                                    título: `{{ addslashes($card->titulo) }}`, 
                                    imagem: `{{ $card->imagem }}`,
                                    descricao: `{{ addslashes($card->descricao) }}`,
                                    conteudo: `{{ addslashes($card->conteudo) }}`,
                                    tags: {{ json_encode($card->tags->pluck('id')) }}
                                };
                                formData = {
                                    titulo: editingCard.título,  
                                    descricao: editingCard.descricao,
                                    conteudo: editingCard.conteudo,
                                    tags: editingCard.tags
                                };
                                $nextTick(() => window.scrollTo({ top: 0, behavior: 'smooth' }));
                            " class="text-indigo-600 hover:text-indigo-900 text-sm">
                                Editar
                            </button>
                            
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