@extends('layouts.app')

@section('title', 'Registro')

@section('content')
    <div class="min-h-screen flex items-center justify-center bg-gray-900 px-6">
        <div class="w-full max-w-md bg-gray-800 p-8 rounded-lg shadow-xl border border-gray-700">
            
            <h2 class="text-3xl font-semibold text-center text-white mb-6">Crear una Cuenta</h2>
            <form method="POST" action="{{ route('register') }}" class="space-y-5">
                @csrf
                <div>
                    <label for="name" class="block text-gray-300 font-medium mb-1">Nombre</label>
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                        class="w-full p-3 border border-gray-600 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 text-white" />
                    @error('name')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="email" class="block text-gray-300 font-medium mb-1">Correo Electrónico</label>
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                        class="w-full p-3 border border-gray-600 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 text-white" />
                    @error('email')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password" class="block text-gray-300 font-medium mb-1">Contraseña</label>
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full p-3 border border-gray-600 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 text-white" />
                    @error('password')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <div>
                    <label for="password_confirmation" class="block text-gray-300 font-medium mb-1">Confirmar Contraseña</label>
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="w-full p-3 border border-gray-600 bg-gray-700 rounded-lg focus:ring-2 focus:ring-blue-500 text-white" />
                    @error('password_confirmation')
                        <span class="text-red-400 text-sm">{{ $message }}</span>
                    @enderror
                </div>
                <button type="submit"
                    class="w-full py-3 rounded-lg text-white font-semibold text-lg bg-gradient-to-r from-blue-600 to-indigo-500 shadow-md hover:scale-105 hover:shadow-xl transition">
                    Registrarse
                </button>
            </form>
            <p class="mt-4 text-center text-gray-400 text-sm">
                ¿Ya tienes una cuenta? 
                <a href="{{ route('login') }}" class="text-blue-400 hover:underline">Inicia sesión</a>
            </p>
        </div>
    </div>
@endsection
