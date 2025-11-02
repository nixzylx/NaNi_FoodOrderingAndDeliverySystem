@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Menu Management</h2>
        <button class="bg-green-500 text-white font-semibold px-6 py-2 rounded-lg hover:bg-green-600 transition flex items-center">
            <i class="fas fa-plus mr-2"></i> Create New Menu Item
        </button>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
        @forelse ($menus as $menu)
            <div class="bg-white rounded-xl shadow hover:shadow-lg transition p-4">
                <h3 class="text-lg font-bold text-gray-800">{{ $menu->name }}</h3>
                <p class="text-gray-600 mt-1">{{ $menu->description }}</p>
                <p class="text-orange-600 font-semibold mt-2">₱{{ number_format($menu->price, 2) }}</p>
            </div>
        @empty
            <p class="text-gray-500 col-span-full text-center">No menu items yet.</p>
        @endforelse
    </div>
</div>
@endsection
