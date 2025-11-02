<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NaNi - Food Delivery System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>

<body class="bg-gray-100 text-gray-800 font-[Inter]">
    <header class="bg-white shadow-md sticky top-0 z-40">
        <nav class="container mx-auto px-6 py-3 flex justify-between items-center">
            <div>
                <a href="/" class="text-3xl font-bold text-orange-500">NaNi</a>
            </div>

            {{-- Show menu only if user is logged in --}}
            @if(session('user'))
                <div class="flex items-center space-x-6">
                    @if(session('user.role') === 'User')
                        <a href="{{ route('user.dashboard') }}" class="text-gray-600 hover:text-orange-500 transition-colors">Home</a>
                        <a href="{{ route('cart') }}" class="text-gray-600 hover:text-orange-500 transition-colors">Cart</a>
                    @elseif(session('user.role') === 'Owner')
                        <a href="{{ route('owner.dashboard') }}" class="text-gray-600 hover:text-orange-500 transition-colors">Dashboard</a>
                    @elseif(session('user.role') === 'Rider')
                        <a href="{{ route('rider.dashboard') }}" class="text-gray-600 hover:text-orange-500 transition-colors">Deliveries</a>
                    @endif

                    <span class="text-gray-700 font-medium">{{ session('user.email') }}</span>
                    <a href="{{ route('logout') }}" class="ml-4 bg-gray-200 text-gray-700 font-semibold px-4 py-2 rounded-lg hover:bg-gray-300 transition-colors text-sm">Logout</a>
                </div>
            @endif
        </nav>
    </header>

    <main class="container mx-auto p-6">
        @yield('content')
    </main>
</body>
</html>
