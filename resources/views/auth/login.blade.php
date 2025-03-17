@extends('layouts.app')

@section('title', 'Iniciar Sesión')

@section('content')
    <div class="relative min-h-screen flex flex-col items-center justify-center bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/fondo2.webp') }}');">

        <div class="absolute inset-0 bg-black bg-opacity-50 backdrop-blur-sm"></div>

        <div class="w-full max-w-md bg-white p-8 rounded-xl shadow-xl border border-gray-300 relative z-10">
            <h2 class="text-3xl font-extrabold text-center text-gray-800 mb-6">Bienvenido de nuevo</h2>

            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-gray-700 font-medium mb-1">Correo Electrónico</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autofocus
                        autocomplete="username"
                        class="w-full p-3 border border-gray-300 bg-gray-50 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                    @error('email')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div>
                    <label for="password" class="block text-gray-700 font-medium mb-1">Contraseña</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                        class="w-full p-3 border border-gray-300 bg-gray-50 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none" />
                    @error('password')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex items-center justify-between text-gray-600">
                    <label for="remember_me" class="flex items-center text-sm">
                        <input id="remember_me" type="checkbox"
                            class="mr-2 rounded border-gray-500 text-indigo-400 focus:ring-indigo-500" name="remember">
                        Recordarme
                    </label>

                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-blue-600 hover:underline">¿Olvidaste
                            tu contraseña?</a>
                    @endif
                </div>

                <button type="submit"
                    class="w-full px-6 py-3 border border-blue-500 text-blue-500 rounded-lg font-medium transition transform hover:bg-blue-500 hover:text-white hover:shadow-lg hover:scale-105">
                    Iniciar Sesión
                </button>
            </form>

            <p class="mt-4 text-center text-gray-600 text-sm">
                ¿No tienes una cuenta?
                <a href="{{ route('register') }}" class="text-blue-600 hover:underline">Regístrate</a>
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
