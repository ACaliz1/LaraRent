@extends('layouts.app')

@section('title', 'Dashboard - Inmobiliaria')

@section('content')
    <div class="relative min-h-screen flex flex-col items-center p-6 text-gray-900">

        <div class="absolute inset-0 bg-cover bg-center bg-no-repeat"
            style="background-image: url('{{ asset('images/back.png') }}');">
            <div class="absolute inset-0"></div>
        </div>

        <div class="relative w-[80%] mx-auto my-16 max-w-5xl z-10">

            <section class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
                <div class="p-6 bg-white/60 backdrop-blur-lg border-l-4 border-blue-500 shadow-md rounded-xl">
                    <h3 class="text-lg font-semibold text-gray-800">🏡 Propiedades Publicadas</h3>
                    <p class="text-3xl font-extrabold text-blue-600">{{ Auth::user()->properties()->count() }}</p>
                </div>
                <div class="p-6 bg-white/60 backdrop-blur-lg border-l-4 border-yellow-500 shadow-md rounded-xl">
                    <h3 class="text-lg font-semibold text-gray-800">📅 Miembro desde</h3>
                    <p class="text-md font-medium text-gray-700">{{ Auth::user()->created_at->diffForHumans() }}</p>
                </div>
            </section>

            <section class="mt-6">
                <div class="bg-white/60 backdrop-blur-lg p-6 rounded-xl shadow-lg">
                    <h2 class="text-2xl font-semibold mb-4 text-gray-800 text-center">Acciones Rápidas</h2>
                    <div class="flex flex-wrap gap-4 justify-center">
                        <a href="{{ route('properties.index') }}"
                            class="flex items-center gap-3 px-10 py-4 bg-gradient-to-r from-gray-500 to-black text-white font-medium rounded-md shadow-md transition hover:scale-105 hover:shadow-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg>
                            Ver Propiedades
                        </a>

                        <a href="{{ route('properties.create') }}"
                            class="flex items-center gap-3 px-10 py-4 bg-gradient-to-r from-blue-500 to-indigo-500 text-white font-medium rounded-md shadow-md transition hover:scale-105 hover:shadow-xl">
                            <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                                viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M12 5v14"></path>
                                <path d="M5 12h14"></path>
                            </svg>
                            Nueva Propiedad
                        </a>
                    </div>
                </div>
            </section>

        </div>

    </div>
@endsection
