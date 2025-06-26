<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('titulo', 'Mindcologist')</title>

    {{-- CSS principal via Vite --}}
    @vite('resources/css/app.css')

    {{-- Slot para scripts específicos da view --}}
    @stack('head-scripts')
</head>
<body class="bg-gray-50 text-gray-900 min-h-screen w-full overflow-x-hidden">

    {{-- Cabeçalho --}}
    <header class="bg-gray-100 border-b border-gray-300">
        <div class="max-w-7xl mx-auto px-6 py-4 flex items-center justify-between">
            <a href="{{ url('/') }}" class="text-2xl font-bold text-gray-700 hover:text-indigo-600 transition">
                🧠 Mindcologist
            </a>
            <nav class="space-x-6 text-gray-600 font-medium text-sm">
                <a href="{{ url('/') }}" class="hover:text-indigo-600 transition">Início</a>
                <a href="{{ url('/admin') }}" class="hover:text-indigo-600 transition">Admin</a>
            </nav>
        </div>
    </header>
   
    <main>
        @yield('conteudo')
    </main>
    
    @vite('resources/js/app.js')

    @stack('scripts')
</body>
</html>
