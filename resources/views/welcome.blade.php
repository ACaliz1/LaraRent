@extends('layouts.app')

@section('title', 'Bienvenido a LaraRent')

@section('content')
    <div class="relative min-h-screen flex flex-col items-center justify-center bg-cover bg-center bg-no-repeat"
        style="background-image: url('{{ asset('images/back.png') }}');">
        
        <div class="absolute inset-0 bg-black bg-opacity-60"></div>

        <div class="relative text-center text-white px-6 max-w-3xl">
            <h1 class="text-6xl font-extrabold tracking-tight leading-tight mb-6">
                Encuentra tu hogar ideal con <span class="text-blue-400">LaraRent</span>
            </h1>
            <p class="text-xl text-gray-300 mb-8">
                Descubre las mejores oportunidades en venta y alquiler con una experiencia premium.
            </p>

            <div class="flex flex-wrap gap-6 justify-center">
                <a href="{{ route('properties.index') }}"
                    class="flex items-center gap-3 px-8 py-4 bg-gradient-to-r from-blue-500 to-indigo-500 text-white text-lg font-semibold shadow-lg transition-all transform hover:scale-105 hover:shadow-2xl">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M3 12h18"></path>
                        <path d="M3 6h18"></path>
                        <path d="M3 18h18"></path>
                    </svg>
                    Explorar Propiedades
                </a>

                @auth
                    <a href="{{ route('properties.create') }}"
                        class="flex items-center gap-3 px-8 py-4 rounded-full bg-white text-blue-600 text-lg font-semibold shadow-lg transition-all transform hover:scale-105 hover:shadow-2xl hover:bg-gray-100">
                        <svg class="w-7 h-7" fill="none" stroke="currentColor" stroke-width="2"
                            viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5v14"></path>
                            <path d="M5 12h14"></path>
                        </svg>
                        Crear una Propiedad
                    </a>
                @endauth
            </div>
        </div>
    </div>
@endsection
