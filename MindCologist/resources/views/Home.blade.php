@extends('layouts.app')
@section('titulo', 'Início - Mindcologist')
@section('conteudo')
<script src="//unpkg.com/alpinejs" defer></script>

<div class="bg-white py-12 px-6">

    <div class="max-w-7xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-indigo-700 mb-4">
            Bem-vindo ao Mindcologist 🧠
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
            Um espaço acolhedor para explorar o autoconhecimento, reduzir a ansiedade e praticar mindfulness com conteúdo feito para você.
        </p>
        <a href="#comeco" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-indigo-700 transition">
            Comece sua jornada
        </a>
    </div>

    
    <div class="mt-16 grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-8">
        
    </div>

    <div class="mt-20 bg-indigo-100 p-8 rounded-2xl text-center">
        <h2 class="text-2xl font-bold text-indigo-800 mb-4">🌿 Um espaço para sua mente respirar</h2>
        <p class="text-gray-700 max-w-3xl mx-auto">
            Navegue por conteúdos pensados com carinho, sem pressa e no seu tempo. O Mindcologist é feito para ajudar você a se reconectar com o que importa: você mesmo.
        </p>
    </div>
</div>


<div 
    x-data="{
        aba: 0,
        selectedTags: [],
        toggleTag(tag) {
            if (this.selectedTags.includes(tag)) {
                this.selectedTags = this.selectedTags.filter(t => t !== tag);
            } else {
                this.selectedTags.push(tag);
            }
        },
        removeTag(tag) {
            this.selectedTags = this.selectedTags.filter(t => t !== tag);
        },
        isCardVisible(cardTags) {
            if (this.selectedTags.length === 0) return true;
            return this.selectedTags.some(tag => cardTags.includes(tag));
        }
    }"
>
    
    <div class="relative h-[60vh] bg-fixed bg-center bg-cover flex items-center justify-center" style='background-image: url("{{ asset("img/nature.jpg") }}");' id="comeco">

        <div class="absolute inset-0 bg-white/30 backdrop-blur-md z-0"></div>

        <div class="relative z-10 bg-white bg-opacity-80 p-10 rounded-2xl shadow-xl max-w-2xl w-full text-center">
            <h2 class="text-2xl font-bold text-indigo-800 mb-4">🌱 Escolha suas áreas de interesse</h2>
            <p class="text-gray-700 mb-6">Você pode selecionar múltiplas opções. Clique na tag acima para removê‑la.</p>

            <div id="tags-component" class="space-y-6">

                
                <div class="flex flex-wrap justify-center gap-3 mb-4">
                    <template x-if="selectedTags.length === 0">
                        <span class="text-gray-500">Nenhuma tag selecionada</span>
                    </template>

                    <template x-for="tag in selectedTags" :key="tag">
                        <span 
                            class="flex items-center bg-indigo-600 text-white px-4 py-2 rounded-xl cursor-pointer transition hover:bg-indigo-700"
                            @click="removeTag(tag)"
                        >
                            <span x-text="tag"></span>
                            <span class="ml-2">&times;</span>
                        </span>
                    </template>
                </div>

                
                <div class="h-40 overflow-auto flex flex-wrap justify-center gap-3">
                    @foreach ($tags as $tag)
                        <span 
                            class="px-4 py-2 bg-indigo-100 text-indigo-800 rounded-xl cursor-pointer transition hover:bg-indigo-200"
                            :class="selectedTags.includes({{ json_encode($tag->nome) }}) ? 'bg-indigo-600 text-white' : ''"
                            @click="toggleTag({{ json_encode($tag->nome) }})"
                        >
                            {{ $tag->nome }}
                        </span>
                    @endforeach
                </div>

            </div>
        </div>
    </div>

    
    <div class="w-full p-3">

        
        <div class="flex space-x-2 mb-4 justify-center">
            @foreach ($paginas as $index => $pagina)
                <button
                    class="px-4 py-2 rounded-full text-white"
                    :class="{ 'bg-indigo-600': aba === {{ $index }}, 'bg-indigo-300': aba !== {{ $index }} }"
                    @click="aba = {{ $index }}"
                >
                    {{ $index + 1 }}
                </button>
            @endforeach
        </div>

        
        @foreach ($paginas as $index => $pagina)
            <div x-show="aba === {{ $index }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 p-3" x-cloak>

                @foreach ($pagina as $card)
                    <div 
                        x-data="{ open: false }" 
                        class="relative"
                        x-show="isCardVisible({{ json_encode($card->tags->pluck('nome')) }})"
                        x-cloak
                    >
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition active:scale-95 cursor-pointer relative" @click="open = true">
                            <div class="h-40 bg-indigo-100 flex items-center justify-center">
                                <img src="/img/{{ $card['imagem'] }}" alt="Imagem do card" class="w-full h-full object-cover">
                            </div>
                            <div class="p-4 text-center relative">
                                <h3 class="text-lg font-semibold text-indigo-800">{{ $card->titulo }}</h3>
                                <p class="text-gray-600 text-sm mt-2">{{ $card->descricao }}</p>
                                <div class="absolute bottom-1 left-1 flex flex-wrap gap-1 justify-start pointer-events-none" style="font-size: 0.65rem; color: #bbb;">
                                    @foreach ($card->tags as $tag)
                                        <span>#{{ $tag->nome }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>

                        
                        <div 
                            class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
                            x-show="open"
                            x-transition
                            x-cloak
                        >
                            <div class="bg-white rounded-lg shadow-xl w-11/12 max-w-lg relative text-center">
                                <div class="w-full h-72">
                                    <img src="/img/{{ $card['imagem'] }}" alt="Imagem do card" class="w-full h-full object-cover rounded-t-lg">
                                </div>
                                <button class="absolute top-2 right-2 text-red-700 hover:text-black text-4xl font-bold" @click="open = false">
                                    &times;
                                </button>
                                <div class="p-6">
                                    <h2 class="text-2xl font-bold mb-2 text-indigo-800">{{ $card->titulo }}</h2>
                                    <p class="text-gray-600">{{ $card->conteudo }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endforeach

    </div>
</div>


    </div>
  </div>
</div>
 
    <div class="w-full p-3">

        
        <div class="flex space-x-2 mb-4 justify-center">
            @foreach ($paginas as $index => $pagina)
                <button
                    class="px-4 py-2 rounded-full text-white"
                    :class="{ 'bg-indigo-600': aba === {{ $index }}, 'bg-indigo-300': aba !== {{ $index }} }"
                    @click="aba = {{ $index }}"
                >
                    {{ $index + 1 }}
                </button>
            @endforeach
        </div>

        
        @foreach ($paginas as $index => $pagina)
            <div x-show="aba === {{ $index }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 p-3" x-cloak>

                @foreach ($pagina as $card)
                    <div 
                        x-data="{ open: false }" 
                        class="relative"
                        x-show="isCardVisible({{ json_encode($card->tags->pluck('nome')) }})"
                        x-cloak
                    >
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition active:scale-95 cursor-pointer relative" @click="open = true">

                            <div class="h-40 bg-indigo-100 flex items-center justify-center">
                                <img src="/img/{{ $card['imagem'] }}" alt="Imagem do card" class="w-full h-full object-cover">
                            </div>

                            <div class="p-4 text-center relative">
                                <h3 class="text-lg font-semibold text-indigo-800">{{ $card->titulo }}</h3>
                                <p class="text-gray-600 text-sm mt-2">{{ $card->descricao }}</p>

                                
                                <div class="absolute bottom-1 left-1 flex flex-wrap gap-1 justify-start pointer-events-none" style="font-size: 0.65rem; color: #bbb;">
                                    @if(isset($card->tags) && $card->tags->count() > 0)
                                        @foreach ($card->tags as $tag)
                                            <span>#{{ $tag->nome }}</span>
                                        @endforeach
                                    @endif
                                </div>
                            </div>
                        </div>

                        
                        <div 
                            class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
                            x-show="open"
                            x-transition
                            x-cloak
                        >
                            <div class="bg-white rounded-lg shadow-xl w-11/12 max-w-lg relative text-center">

                                <div class="w-full h-72">
                                    <img 
                                        src="/img/{{ $card['imagem'] }}" 
                                        alt="Imagem do card" 
                                        class="w-full h-full object-cover rounded-t-lg"
                                    >
                                </div>

                                <button 
                                    class="absolute top-2 right-2 text-red-700 hover:text-black text-4xl font-bold"
                                    @click="open = false"
                                >
                                    &times;
                                </button>

                                <div class="p-6">
                                    <h2 class="text-2xl font-bold mb-2 text-indigo-800">
                                        {{ $card->titulo }}
                                    </h2>

                                    <p class="text-gray-600">
                                        {{ $card->conteudo }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        @endforeach
    </div>
</div>


</div>

<footer class="bg-indigo-900 text-white mt-10">
    <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">
        
        <div>
            <h4 class="text-lg font-semibold mb-3">Sobre o Projeto</h4>
            <p class="text-sm text-indigo-100">
                Este projeto tem como objetivo oferecer apoio psicológico e promover o autoconhecimento por meio de recursos visuais e informativos acessíveis.
            </p>
        </div>

        
        <div>
            <h4 class="text-lg font-semibold mb-3">Contato</h4>
            <p class="text-sm text-indigo-100">Email: contato@Mindcologist.com</p>
            <p class="text-sm text-indigo-100">WhatsApp: (47) 99999-9999</p>
        </div>

        
        <div>
            <h4 class="text-lg font-semibold mb-3">Siga-nos</h4>
            <div class="flex space-x-4">
                <a href="https://www.instagram.com.br" class="hover:text-indigo-300 transition" target="_blank" rel="noopener">Instagram</a>
                <a href="https://www.facebook.com.br" class="hover:text-indigo-300 transition" target="_blank" rel="noopener">Facebook</a>
                <a href="https://www.linkedin.com.br" class="hover:text-indigo-300 transition" target="_blank" rel="noopener">LinkedIn</a>
            </div>
        </div>

    </div>

    <div class="text-center text-sm text-indigo-200 border-t border-indigo-700 py-4">
        &copy; {{ date('Y') }} Mindcologist. Todos os direitos reservados.
    </div>
</footer>

@push('scripts')
    @vite('resources/js/home.js')
@endpush

@endsection