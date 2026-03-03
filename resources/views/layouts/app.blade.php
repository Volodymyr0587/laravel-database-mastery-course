<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Databases & Eloquent') }}</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-gray-900 via-gray-900 to-gray-800 text-gray-200 antialiased">

    {{-- Navigation --}}
    <header class="border-b border-gray-800">
        <div class="max-w-6xl mx-auto px-6 py-6 flex items-center justify-between">

            {{-- Logo / Brand --}}
            <a href="{{ route('posts.index') }}"
                class="text-xl font-bold text-white tracking-wide hover:text-gray-300 transition">
                Databases & Eloquent
            </a>

            {{-- Right Nav --}}
            <nav class="space-x-6 text-sm font-medium">
                <a href="{{ route('posts.index') }}" class="text-gray-400 hover:text-white transition">
                    Articles
                </a>

                @auth
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        Dashboard
                    </a>

                    <form method="POST" action="#" class="inline">
                        @csrf
                        <button type="submit" class="text-gray-400 hover:text-red-500 transition">
                            Logout
                        </button>
                    </form>
                @else
                    <a href="#" class="text-gray-400 hover:text-white transition">
                        Login
                    </a>

                    <a href="#" class="text-gray-400 hover:text-white transition">
                        Register
                    </a>
                @endauth
            </nav>

        </div>
    </header>

    {{-- Flash Messages --}}
    @if (session('success'))
        <div class="max-w-4xl mx-auto px-6 mt-6">
            <div class="bg-green-600/20 border border-green-600 text-green-400 px-4 py-3 rounded-lg">
                {{ session('success') }}
            </div>
        </div>
    @endif

    @if (session('error'))
        <div class="max-w-4xl mx-auto px-6 mt-6">
            <div class="bg-red-600/20 border border-red-600 text-red-400 px-4 py-3 rounded-lg">
                {{ session('error') }}
            </div>
        </div>
    @endif

    {{-- Page Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="border-t border-gray-800 mt-20">
        <div class="max-w-6xl mx-auto px-6 py-8 text-center text-sm text-gray-500">
            © {{ now()->year }} {{ config('app.name', 'Databases & Eloquent') }}.
            All rights reserved.
        </div>
    </footer>

</body>

</html>
