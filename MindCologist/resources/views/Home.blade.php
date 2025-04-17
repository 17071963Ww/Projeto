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
    class="relative min-h-screen bg-cover bg-center flex items-center justify-center" 
    style='background-image: url("{{ asset("img/nature.jpg") }}");'
>
    <!-- Camada de blur -->
    <div class="absolute inset-0 bg-white/30 backdrop-blur-md z-0"></div>

    <!-- Conteúdo por cima -->
    <div class="relative z-10 bg-white bg-opacity-80 p-10 rounded-2xl shadow-xl max-w-xl text-center">
        <h1 class="text-3xl font-bold text-indigo-800 mb-4">Fundo Embaçado</h1>
        <p class="text-gray-700">Essa caixa aparece por cima da imagem com efeito blur no fundo.</p>
    </div>
</div>


@endsection