@extends('layouts.app')
@section('titulo', 'Início - Mindcologist')
@section('conteudo')
<script src="//unpkg.com/alpinejs" defer></script>

<div class="bg-white py-12 px-6">

    <!-- Bem vindo -->
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
        <div class="bg-indigo-50 rounded-2xl p-6 shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-indigo-800 mb-2">🧘‍♀️ Meditação</h3>
            <p class="text-gray-600">Exercícios guiados de respiração e presença.</p>
        </div>
        <div class="bg-indigo-50 rounded-2xl p-6 shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-indigo-800 mb-2">🧠 Mindfulness</h3>
            <p class="text-gray-600">Práticas para viver o agora com atenção e calma.</p>   
        </div>
        <div class="bg-indigo-50 rounded-2xl p-6 shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-indigo-800 mb-2">🔍 Autoconhecimento</h3>
            <p class="text-gray-600">Reflexões e orientações para entender sua mente.</p>
        </div>
        <div class="bg-indigo-50 rounded-2xl p-6 shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-indigo-800 mb-2">💬 Comunicação Não-Violenta</h3>
            <p class="text-gray-600">Aprenda a se expressar com empatia e escuta ativa.</p>
        </div>
        <div class="bg-indigo-50 rounded-2xl p-6 shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-indigo-800 mb-2">💡 Inteligência Emocional</h3>
            <p class="text-gray-600">Desenvolva consciência e controle sobre suas emoções.</p>
        </div>
        <div class="bg-indigo-50 rounded-2xl p-6 shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-indigo-800 mb-2">❤️ Autocuidado</h3>
            <p class="text-gray-600">Rotinas e atitudes para cuidar de você no dia a dia.</p>
        </div>
        <div class="bg-indigo-50 rounded-2xl p-6 shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-indigo-800 mb-2">😴 Higiene do Sono</h3>
            <p class="text-gray-600">Crie hábitos que favorecem um sono mais tranquilo e restaurador.</p>
        </div>
        <div class="bg-indigo-50 rounded-2xl p-6 shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-indigo-800 mb-2">🤝 Relacionamentos Saudáveis</h3>
            <p class="text-gray-600">Dicas para desenvolver vínculos equilibrados e respeitosos.</p>
        </div>
        <div class="bg-indigo-50 rounded-2xl p-6 shadow hover:shadow-lg transition">
            <h3 class="text-xl font-semibold text-indigo-800 mb-2">🧩 Gestão do Estresse</h3>
            <p class="text-gray-600">Técnicas práticas para lidar melhor com a pressão do dia a dia.</p>
        </div>
    </div>
    
    <div class="mt-20 bg-indigo-100 p-8 rounded-2xl text-center">
        <h2 class="text-2xl font-bold text-indigo-800 mb-4">🌿 Um espaço para sua mente respirar</h2>
        <p class="text-gray-700 max-w-3xl mx-auto">
            Navegue por conteúdos pensados com carinho, sem pressa e no seu tempo. O Mindcologist é feito para ajudar você a se reconectar com o que importa: você mesmo.
        </p>
    </div>
</div>

<!-- Tags,imagem -->
<div class="relative h-[60vh] bg-fixed bg-center bg-cover flex items-center justify-center" style='background-image: url("{{ asset("img/nature.jpg") }}");'>

    <div class="absolute inset-0 bg-white/30 backdrop-blur-md z-0" id="comeco"></div>

    <div class="relative z-10 bg-white bg-opacity-80 p-10 rounded-2xl shadow-xl max-w-2xl w-full text-center">
        <h2 class="text-2xl font-bold text-indigo-800 mb-4">🌱 Escolha suas áreas de interesse</h2>
        <p class="text-gray-700 mb-6">Você pode selecionar múltiplas opções. Elas aparecerão acima.</p>

        {{-- Componente de tags --}}
        <div id="tags-component" class="space-y-6">
             
            <div id="selected-tags" class="flex flex-wrap justify-center gap-3 min-h-[2rem] transition-all duration-300"></div>
        
            <!-- Todas as tags -->
            <div id="all-tags" class="h-40 overflow-y-auto flex flex-wrap justify-center gap-3">
                @php
                $tags = ['Meditação', 'Mindfulness', 'Autoconhecimento', 'Respiração', 'Ansiedade', 'Falta de Sono','luto','relacionamentos','autocompaixão'];
                @endphp                
                
                @foreach ($tags as $tag)
                <span class="tag px-4 py-2 bg-indigo-100 text-indigo-800 rounded-xl cursor-pointer transition duration-300 hover:bg-indigo-200 h-10" data-tag="{{ $tag }}">
                    {{ $tag }}
                </span>
                @endforeach
            </div>

            <div id="accept-button-wrapper" class="flex justify-center mt-4 opacity-0 scale-90 transition duration-300 pointer-events-none">
                <button class="bg-indigo-600 text-white px-6 py-2 rounded-xl font-semibold hover:bg-indigo-700 transition">
                    Aceitar Seleção
                </button>
            </div>
        </div>
    </div>
</div>


<div x-data="{ aba: 0 }" class="w-full p-3">

    <!-- Botões das abas -->
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

    <!-- Cards dentro da aba -->
    @foreach ($paginas as $index => $pagina)
        <div x-show="aba === {{ $index }}" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 p-3" x-cloak>
            
            @foreach ($pagina as $card)
                <div x-data="{ open: false }" class="relative">
                    <div class="bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-xl transition active:scale-95 cursor-pointer" @click="open = true">

                        <div class="h-40 bg-indigo-100 flex items-center justify-center">
                            <img src="/img/{{ $card['imagem'] }}" alt="Imagem do card" class="w-full h-full object-cover">
                        </div>
                        <div class="p-4 text-center">
                            <h3 class="text-lg font-semibold text-indigo-800">{{ $card->titulo }}</h3>
                            <p class="text-gray-600 text-sm mt-2">{{ $card->descricao }}</p>
                        </div>
                    </div>

                    <div 
                        class="fixed inset-0 flex items-center justify-center bg-black/50 z-50"
                        x-show="open"
                        x-transition
                        x-cloak
                    >

                        <div class="bg-white rounded-lg shadow-xl w-11/12 max-w-lg relative text-center">

                            <div class="w-full h-64">
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

<footer class="bg-indigo-900 text-white mt-10">
    <div class="max-w-7xl mx-auto px-6 py-10 grid grid-cols-1 md:grid-cols-3 gap-8">
        <!-- Sobre o projeto -->
        <div>
            <h4 class="text-lg font-semibold mb-3">Sobre o Projeto</h4>
            <p class="text-sm text-indigo-100">
                Este projeto tem como objetivo oferecer apoio psicológico e promover o autoconhecimento por meio de recursos visuais e informativos acessíveis.
            </p>
        </div>

        <!-- Contato -->
        <div>
            <h4 class="text-lg font-semibold mb-3">Contato</h4>
            <p class="text-sm text-indigo-100">Email: contato@Mindcologist.com</p>
            <p class="text-sm text-indigo-100">WhatsApp: (47) 99999-9999</p>
        </div>

        <!-- Redes Sociais -->
        <div>
            <h4 class="text-lg font-semibold mb-3">Siga-nos</h4>
            <div class="flex space-x-4">
                <a href="#" class="hover:text-indigo-300 transition">Instagram</a>
                <a href="#" class="hover:text-indigo-300 transition">Facebook</a>
                <a href="#" class="hover:text-indigo-300 transition">LinkedIn</a>
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