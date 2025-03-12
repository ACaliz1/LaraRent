@extends('layouts.app')

@section('title', 'Detalles de Propiedad')

@section('header', 'Detalles de la Propiedad')

@section('content')
    <div class="max-w-3xl mx-auto bg-white shadow-lg rounded-lg p-6 border border-gray-200">
        <a href="{{ route('properties.index') }}" class="flex items-center gap-2 text-blue-500 hover:underline mb-4">
            ← Volver
        </a>

        @if ($property->image)
            <img src="{{ asset('storage/' . $property->image) }}" alt="Imagen de la propiedad"
                class="w-full h-64 object-cover rounded-lg mb-4 shadow-md">
        @endif

        <h2 class="text-3xl font-bold text-gray-900">{{ $property->title }}</h2>
        <p class="text-gray-700 text-lg mt-2">{{ $property->description }}</p>

        <div class="mt-4">
            <p class="text-lg"><strong>Ubicación:</strong> {{ $property->location }}</p>
            <p class="text-lg font-semibold text-green-600"><strong>Precio:</strong>
                €{{ number_format($property->price, 2) }}</p>
        </div>

        <div class="mt-6 flex gap-4">
            @auth
                @if (auth()->user()->hasRole('admin') || auth()->user()->id === $property->user_id)
                    <a href="{{ route('properties.edit', $property) }}"
                        class="flex items-center gap-2 px-4 py-2 border border-yellow-500 text-yellow-500 rounded-md text-sm font-medium transition hover:bg-yellow-500 hover:text-white shadow-md">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                            stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 20h9"></path>
                            <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5z"></path>
                        </svg>
                        Editar
                    </a>

                    <form action="{{ route('properties.destroy', $property) }}" method="POST"
                        onsubmit="return confirm('¿Eliminar esta propiedad?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="flex items-center gap-2 px-4 py-2 border border-red-500 text-red-500 rounded-md text-sm font-medium transition hover:bg-red-500 hover:text-white shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                                stroke-linecap="round" stroke-linejoin="round">
                                <path d="M3 6h18"></path>
                                <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                <path d="M10 11v6"></path>
                                <path d="M14 11v6"></path>
                                <path d="M5 6l1 14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-14"></path>
                            </svg>
                            Eliminar
                        </button>
                    </form>
                @endif
            @endauth
        </div>
    </div>
@endsection
