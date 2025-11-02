<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NaNi Food Delivery</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">

    {{-- ✅ Only show navbar if NOT on login/register pages --}}
    @if (!request()->is('login') && !request()->is('register'))
        <header class="bg-white shadow-md sticky top-0 z-40">
            <nav class="container mx-auto px-6 py-4 flex justify-between items-center">
                <h1 class="text-3xl font-bold text-orange-500">NaNi</h1>
                <div class="flex items-center space-x-4">
                    @auth
                        <span class="text-gray-700 font-medium">{{ Auth::user()->name }}</span>
                        <form action="{{ route('logout') }}" method="POST" class="inline">
                            @csrf
                            <button type="submit" class="bg-orange-500 text-white px-4 py-2 rounded-lg hover:bg-orange-600 transition">
                                Logout
                            </button>
                        </form>
                    @endauth
                </div>
            </nav>
        </header>
    @endif

    <main class="flex-grow">
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="bg-gray-900 text-white py-4 text-center">
        <p>&copy; {{ date('Y') }} NaNi Food Delivery. All Rights Reserved.</p>
    </footer>

</body>
</html>
