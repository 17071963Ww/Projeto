@extends('layouts.app')
@section('titulo', 'Início - Mindcologist')
@section('conteudo')

<div class="bg-white py-12 px-6">
    <div class="max-w-7xl mx-auto text-center">
        <h1 class="text-4xl md:text-5xl font-bold text-indigo-700 mb-4">
            Bem-vindo ao Mindcologist 🧠
        </h1>
        <p class="text-lg text-gray-600 max-w-2xl mx-auto mb-8">
            Um espaço acolhedor para explorar o autoconhecimento, reduzir a ansiedade e praticar mindfulness com conteúdo feito para você.
        </p>
        <a href="#" class="inline-block bg-indigo-600 text-white px-6 py-3 rounded-xl font-semibold hover:bg-indigo-700 transition">
            Comece sua jornada
        </a>
    </div>

    <!-- Blocos temáticos -->
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
    </div>

    <!-- Seção extra (opcional) -->
    <div class="mt-20 bg-indigo-100 p-8 rounded-2xl text-center">
        <h2 class="text-2xl font-bold text-indigo-800 mb-4">🌿 Um espaço para sua mente respirar</h2>
        <p class="text-gray-700 max-w-3xl mx-auto">
            Navegue por conteúdos pensados com carinho, sem pressa e no seu tempo. O Mindcologist é feito para ajudar você a se reconectar com o que importa: você mesmo.
        </p>
    </div>
</div>

<div 
    class="relative h-[60vh] bg-fixed bg-center bg-cover flex items-center justify-center" 
    style='background-image: url("{{ asset("img/nature.jpg") }}");'
>

    <div class="absolute inset-0 bg-white/30 backdrop-blur-md z-0"></div>

    <div class="relative z-10 bg-white bg-opacity-80 p-10 rounded-2xl shadow-xl max-w-2xl w-full text-center">
        <h2 class="text-2xl font-bold text-indigo-800 mb-4">🌱 Escolha suas áreas de interesse</h2>
        <p class="text-gray-700 mb-6">Você pode selecionar múltiplas opções. Elas aparecerão acima.</p>

        {{-- Componente de tags --}}
        <div id="tags-component" class="space-y-6">
             
            <div id="selected-tags" class="flex flex-wrap justify-center gap-3 min-h-[2rem] transition-all duration-300"></div>

            
            <!-- Todas as tags -->
            <div id="all-tags" class="flex flex-wrap justify-center gap-3">
                @php
                $tags = ['Meditação', 'Mindfulness', 'Autoconhecimento', 'Respiração', 'Ansiedade', 'Sono'];
                @endphp
                
                
                @foreach ($tags as $tag)
                <span 
                class="tag px-4 py-2 bg-indigo-100 text-indigo-800 rounded-xl cursor-pointer transition duration-300 hover:bg-indigo-200"
                data-tag="{{ $tag }}"
                >
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


@push('scripts')
    @vite('resources/js/home.js')
@endpush

@endsection