@extends('layouts.app')

@section('title', 'LaraRent - Tu plataforma inmobiliaria')

@section('content')

    <div class="relative p-8 w-full h-screen flex flex-col justify-center items-center text-white text-center bg-black bg-opacity-50">
        <div class="relative z-10">
            <h1 class="text-5xl font-bold tracking-tight">Encuentra o vende tu hogar con facilidad</h1>
            <p class="text-lg text-gray-300 mt-4">Explora las mejores propiedades y maximiza el valor de tu inversión.</p>
            
            <div class="mt-6 flex gap-4 justify-center">
                <a href="{{ route('properties.index') }}"
                    class="px-8 py-3 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-lg font-semibold shadow-lg transition hover:scale-105 hover:shadow-xl">
                    Ver Propiedades
                </a>
                <a href="{{ route('properties.create') }}"
                    class="px-8 py-3 rounded-full bg-white text-blue-600 text-lg font-semibold shadow-lg transition hover:bg-gray-200 hover:scale-105 hover:shadow-xl">
                    Publicar Propiedad
                </a>
            </div>
        </div>
    </div>

    <section class="w-full py-20 bg-gray-100">
        <div class="max-w-6xl mx-auto grid grid-cols-1 md:grid-cols-3 gap-8 text-center">
            
            <div class="p-6">
                <h2 class="text-6xl font-extrabold text-blue-600">{{ Auth::user()->properties()->count() }}</h2>
                <p class="text-gray-700 mt-2 text-lg font-medium">Propiedades Publicadas</p>
            </div>

            <div class="p-6">
                <h2 class="text-6xl font-extrabold text-gray-800">{{ Auth::user()->created_at->format('Y') }}</h2>
                <p class="text-gray-700 mt-2 text-lg font-medium">Miembro desde</p>
            </div>

            <div class="p-6">
                <h2 class="text-6xl font-extrabold text-green-600">98%</h2>
                <p class="text-gray-700 mt-2 text-lg font-medium">Clientes Satisfechos</p>
            </div>

        </div>
    </section>

    <section class="w-full py-24 bg-black bg-opacity-50 text-white text-center">
        <div class="max-w-5xl mx-auto px-6">
            <h2 class="text-4xl font-bold mb-4">¿Listo para vender o alquilar tu propiedad?</h2>
            <p class="text-lg text-gray-300 mb-6">Publica tu propiedad con nosotros y llega a miles de compradores y arrendatarios.</p>
            
            <a href="{{ route('properties.create') }}"
                class="px-10 py-4 rounded-full bg-gradient-to-r from-blue-600 to-indigo-600 text-white text-lg font-semibold shadow-lg transition hover:scale-105 hover:shadow-xl">
                Publicar Ahora
            </a>
        </div>
    </section>

    <section class="w-full py-24 bg-white text-center">
        <div class="max-w-6xl mx-auto">
            <h2 class="text-4xl font-bold text-gray-800 mb-6">Lo que dicen nuestros clientes</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 mt-10">
                <div class="p-6 shadow-lg rounded-lg bg-gray-100">
                    <p class="text-lg text-gray-600">"Publicar mi casa en LaraRent fue lo mejor que hice. Se vendió en menos de 30 días."</p>
                    <p class="text-blue-600 mt-4 font-semibold">— Sofía G.</p>
                </div>
                <div class="p-6 shadow-lg rounded-lg bg-gray-100">
                    <p class="text-lg text-gray-600">"La plataforma es intuitiva y fácil de usar. Encontré mi hogar perfecto sin problemas."</p>
                    <p class="text-blue-600 mt-4 font-semibold">— Carlos R.</p>
                </div>
                <div class="p-6 shadow-lg rounded-lg bg-gray-100">
                    <p class="text-lg text-gray-600">"Increíble servicio al cliente y una amplia oferta de propiedades. 100% recomendado."</p>
                    <p class="text-blue-600 mt-4 font-semibold">— María P.</p>
                </div>
            </div>
        </div>
    </section>

@endsection
