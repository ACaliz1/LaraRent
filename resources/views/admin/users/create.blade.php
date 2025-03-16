@extends('layouts.app')

@section('title', 'Crear Usuario')

@section('content')
    <div class="min-h-screen flex flex-col items-center p-36 bg-gray-100 text-gray-900 relative">
        <div class="absolute inset-0 bg-cover bg-center opacity-60"
            style="background-image: url('{{ asset('images/back.png') }}'); min-height: 100vh;">
        </div>

        <div class="max-w-4xl mx-auto mt-16 bg-white p-10 rounded-xl shadow-xl border border-gray-200 relative z-10">
            <h2 class="text-4xl font-extrabold text-gray-800 mb-6">Nuevo Usuario</h2>

            <form action="{{ route('users.store') }}" method="POST" class="space-y-6">
                @csrf

                <div class="flex flex-col">
                    <label class="text-gray-700 font-medium">Nombre</label>
                    <input type="text" name="name" value="{{ old('name') }}"
                        class="mt-1 w-full p-4 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div class="flex flex-col">
                    <label class="text-gray-700 font-medium">Email</label>
                    <input type="email" name="email" value="{{ old('email') }}"
                        class="mt-1 w-full p-4 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div class="flex flex-col">
                    <label class="text-gray-700 font-medium">Contraseña</label>
                    <input type="password" name="password"
                        class="mt-1 w-full p-4 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                </div>

                <div class="flex flex-col">
                    <label class="text-gray-700 font-medium">Rol</label>
                    <select name="role_id"
                        class="mt-1 w-full p-4 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                        @foreach ($roles as $role)
                            <option value="{{ $role->id }}">{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="flex gap-4 mt-6">
                    <a href="{{ route('users.index') }}"
                        class="w-1/2 flex items-center justify-center gap-2 px-6 py-3 border border-gray-500 text-gray-600 rounded-lg font-medium transition transform hover:bg-gray-500 hover:text-white hover:shadow-lg hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancelar
                    </a>

                    <button type="submit"
                        class="w-1/2 flex items-center justify-center gap-2 px-6 py-3 border border-blue-500 text-blue-500 rounded-lg font-medium transition transform hover:bg-blue-500 hover:text-white hover:shadow-lg hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5v14"></path>
                            <path d="M5 12h14"></path>
                        </svg>
                        Crear Usuario
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
