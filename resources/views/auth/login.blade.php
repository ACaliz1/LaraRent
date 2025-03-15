@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-900 px-6">
        <div class="w-full max-w-md bg-gray-800 p-8 rounded-lg shadow-xl border border-gray-700">
            <h2 class="text-3xl font-semibold text-center text-white mb-6">Bienvenido de nuevo</h2>
            <form method="POST" action="{{ route('login') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="email" class="block text-gray-300 font-medium mb-1">Correo Electrónico</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus autocomplete="username"
                        class="w-full p-3 border border-gray-600 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 text-white" />
                    @error('email')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-gray-300 font-medium mb-1">Contraseña</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full p-3 border border-gray-600 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 text-white" />
                    @error('password')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div class="flex items-center justify-between text-gray-300">
                    <label for="remember_me" class="flex items-center text-sm">
                        <input id="remember_me" type="checkbox" class="mr-2 rounded border-gray-500 text-indigo-400 focus:ring-indigo-500" name="remember">
                        Recordarme
                    </label>
                    
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-400 hover:underline">¿Olvidaste tu contraseña?</a>
                    @endif
                </div>
                <button type="submit"
                    class="w-full py-3 rounded-lg text-white font-semibold text-lg bg-gradient-to-r from-blue-600 to-indigo-500 shadow-md hover:scale-105 hover:shadow-xl transition">
                    Iniciar Sesión
                </button>
            </form>
            <p class="mt-4 text-center text-gray-400 text-sm">
                ¿No tienes una cuenta? 
                <a href="{{ route('register') }}" class="text-blue-400 hover:underline">Regístrate</a>
            </p>
        </div>
    </div>
@endsection
