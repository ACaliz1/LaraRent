@extends('layouts.app')

@section('title', 'Recuperar Contraseña')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-900 px-6">
        <div class="w-full max-w-md bg-gray-800 p-8 rounded-lg shadow-xl border border-gray-700">
            <h2 class="text-2xl font-semibold text-center text-white mb-6">Recuperar Contraseña</h2>
            <p class="text-gray-400 text-sm text-center mb-4">
                ¿Olvidaste tu contraseña? Introduce tu correo electrónico y te enviaremos un enlace para restablecerla.
            </p>
            @if (session('status'))
                <div class="mb-4 text-green-400 text-center font-medium">
                    {{ session('status') }}
                </div>
            @endif
            <form method="POST" action="{{ route('password.email') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-gray-300 font-medium mb-1">Correo Electrónico</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus
                        class="w-full p-3 border border-gray-600 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 text-white" />
                    @error('email')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full py-3 rounded-lg text-white font-semibold text-lg bg-gradient-to-r from-blue-600 to-indigo-500 shadow-md hover:scale-105 hover:shadow-xl transition">
                    Enviar Enlace de Recuperación
                </button>
            </form>
            <p class="mt-4 text-center text-gray-400 text-sm">
                ¿Recordaste tu contraseña? 
                <a href="{{ route('login') }}" class="text-blue-400 hover:underline">Inicia sesión</a>
            </p>
            <div class="flex my-6 relative z-10 justify-center">
                <a href="{{ route('home') }}"
                    class="flex items-center gap-2 px-6 py-3 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium shadow-md transition-transform transform hover:scale-105 hover:shadow-lg">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12h18"></path>
                        <path d="M9 5l-6 7 6 7"></path>
                    </svg>
                    Home
                </a>
            </div>
        </div>
    </div>
@endsection
