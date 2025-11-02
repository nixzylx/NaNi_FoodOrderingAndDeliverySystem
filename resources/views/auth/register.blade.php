@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-[70vh]">
    <div class="bg-white p-10 rounded-2xl shadow-xl w-full max-w-md">
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold text-orange-500">Create Account</h1>
            <p class="text-gray-500 mt-2">Join NaNi Food Delivery today!</p>
        </div>

        {{-- Success or error messages --}}
        @if(session('success'))
            <div class="bg-green-100 text-green-700 p-3 rounded mb-4 text-center">{{ session('success') }}</div>
        @endif

        @if($errors->any())
            <div class="bg-red-100 text-red-700 p-3 rounded mb-4 text-center">
                <ul class="list-disc list-inside">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.post') }}" method="POST">
            @csrf
            {{-- Full Name --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Full Name</label>
                <input 
                    type="text" 
                    name="name" 
                    value="{{ old('name') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400" 
                    placeholder="Your full name"
                    required>
            </div>

            {{-- Email --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Email</label>
                <input 
                    type="email" 
                    name="email"
                    value="{{ old('email') }}"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400" 
                    placeholder="you@example.com"
                    required>
            </div>

            {{-- Password --}}
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-600 mb-1">Password</label>
                <input 
                    type="password" 
                    name="password"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400" 
                    placeholder="••••••••"
                    required>
            </div>

            {{-- Confirm Password --}}
            <div class="mb-6">
                <label class="block text-sm font-medium text-gray-600 mb-1">Confirm Password</label>
                <input 
                    type="password" 
                    name="password_confirmation"
                    class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-orange-400" 
                    placeholder="Re-enter password"
                    required>
            </div>

            <button 
                type="submit" 
                class="w-full bg-orange-500 text-white font-semibold py-3 rounded-lg hover:bg-orange-600 transition">
                Register
            </button>
        </form>

        {{-- Back to Login --}}
        <div class="mt-6 text-center">
            <p class="text-gray-600">Already have an account?</p>
            <a href="{{ route('login') }}" class="text-orange-500 font-semibold hover:underline">
                Back to Login
            </a>
        </div>
    </div>
</div>
@endsection
