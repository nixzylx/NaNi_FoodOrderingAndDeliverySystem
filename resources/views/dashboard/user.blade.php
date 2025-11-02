@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <h2 class="text-3xl font-bold text-gray-800 mb-6">Today's Menu</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-8">
        @forelse ($menus as $menu)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4 flex flex-col">
                <h3 class="text-xl font-bold text-gray-800">{{ $menu->name }}</h3>
                <p class="text-gray-600 mt-1 flex-1">{{ $menu->description }}</p>
                <div class="flex justify-between items-center mt-4">
                    <span class="text-orange-600 font-semibold text-lg">₱{{ number_format($menu->price, 2) }}</span>
                    <button class="bg-orange-500 text-white font-semibold px-4 py-2 rounded-lg hover:bg-orange-600 transition">
                        Add to Cart
                    </button>
                </div>
            </div>
        @empty
            <p class="text-gray-500 col-span-full text-center">No available menu today.</p>
        @endforelse
    </div>
</div>
@endsection
