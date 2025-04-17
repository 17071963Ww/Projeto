<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Mindcologist')</title>
    @vite('resources/css/app.css') <!-- Tailwind via Vite -->
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen">

    {{-- Cabeçalho --}}
    <header class="bg-gray-100 border-b border-gray-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-700 hover:text-indigo-600 transition">
                🧠 Mindcologist
            </a>
            <nav class="space-x-6 text-gray-600 font-medium text-sm">
                <a href="{{ url('/') }}" class="hover:text-indigo-600 transition">Início</a>
                <a href="#" class="hover:text-indigo-600 transition">Sobre</a>
                <a href="#" class="hover:text-indigo-600 transition">Contato</a>
            </nav>
        </div>
    </header>

    {{-- Conteúdo da página --}}
    <main class="p-6">
        @yield('conteudo')
    </main>

</body>
</html>
