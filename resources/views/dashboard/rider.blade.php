@extends('layouts.app')

@section('content')
<div class="container mx-auto p-8">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-3xl font-bold text-gray-800">Delivery Dashboard</h2>
        <div class="flex items-center space-x-3">
            <span id="rider-status-text" class="font-semibold text-lg">Unavailable</span>
            <label for="rider-status-toggle" class="flex items-center cursor-pointer">
                <div class="relative">
                    <input type="checkbox" id="rider-status-toggle" class="sr-only" onchange="toggleRiderStatus()">
                    <div class="block bg-gray-600 w-14 h-8 rounded-full"></div>
                    <div class="dot absolute left-1 top-1 bg-white w-6 h-6 rounded-full transition"></div>
                </div>
            </label>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow text-center">
        <i class="fas fa-motorcycle text-6xl text-gray-300"></i>
        <h3 class="mt-4 text-2xl font-semibold text-gray-700">Waiting for Orders...</h3>
        <p class="text-gray-500">You'll be notified when a new delivery is assigned.</p>
    </div>
</div>

<script>
function toggleRiderStatus() {
    const toggle = document.getElementById('rider-status-toggle');
    const text = document.getElementById('rider-status-text');
    if (toggle.checked) {
        text.textContent = 'Available';
        text.classList.remove('text-gray-600');
        text.classList.add('text-green-600');
    } else {
        text.textContent = 'Unavailable';
        text.classList.remove('text-green-600');
        text.classList.add('text-gray-600');
    }
}
</script>
@endsection
