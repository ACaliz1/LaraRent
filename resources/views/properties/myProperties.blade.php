@extends('layouts.app')

@section('title', 'Mis Propiedades')

@section('content')
    <div class="min-h-screen flex flex-col items-center p-36 bg-gray-100 text-gray-900 relative">
        <div class="absolute inset-0 bg-cover bg-center opacity-60"
            style="background-image: url('{{ asset('images/back.png') }}');">
        </div>

        <main class="w-full max-w-6xl bg-white p-6 rounded-md shadow-lg relative z-10">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-2xl font-semibold">Mis Propiedades</h2>
                <div class="flex align-center flex-wrap justify-center gap-8">
                    <a href="{{ route('properties.index') }}"
                        class="filter-btn py-2 px-4 rounded-md {{ request('type') ? 'bg-gray-300 text-gray-800' : 'bg-blue-600 text-white' }}">
                        Ver Todas
                    </a>
                    <a href="{{ route('properties.index', ['type' => 'venta']) }}"
                        class="filter-btn py-2 px-4 rounded-md {{ request('type') == 'venta' ? 'bg-blue-600 text-white' : 'bg-gray-300 text-gray-800' }}">
                        Venta
                    </a>
                    <a href="{{ route('properties.index', ['type' => 'alquiler']) }}"
                        class="filter-btn py-2 px-4 rounded-md {{ request('type') == 'alquiler' ? 'bg-blue-600 text-white' : 'bg-gray-300 text-gray-800' }}">
                        Alquiler
                    </a>
                </div>
                <a href="{{ route('properties.create') }}"
                    class="px-4 py-2 border border-blue-500 text-blue-500 font-medium rounded-md transition hover:bg-blue-500 hover:text-white flex items-center gap-2">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M12 5v14"></path>
                        <path d="M5 12h14"></path>
                    </svg>
                    Nueva Propiedad
                </a>
            </div>

            @if ($properties->count())
                <div class="overflow-x-auto">
                    <table class="w-full border-collapse rounded-lg overflow-hidden shadow-sm">
                        <thead>
                            <tr class="bg-gray-200 text-gray-700 text-center">
                                <th class="p-3">Imagen</th>
                                <th class="p-3">Título</th>
                                <th class="p-3">Ubicación</th>
                                <th class="p-3">Precio</th>
                                <th class="p-3">Tipo</th>
                                <th class="p-3">Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($properties as $property)
                                <tr class="border-b border-gray-300 hover:bg-gray-100 transition text-center">
                                    <td class="p-3">
                                        @if ($property->image)
                                        <img src="{{ Storage::url($property->image) }}" alt="Imagen de propiedad"
                                        class="w-16 h-16 object-cover rounded-md shadow">
                                        @else
                                            <span class="text-gray-500">Sin imagen</span>
                                        @endif
                                    </td>
                                    <td class="p-3">{{ ucfirst($property->title) }}</td>
                                    <td class="p-3">{{ ucfirst($property->location) }}</td>
                                    <td class="p-3 font-semibold text-green-600">
                                        €{{ number_format($property->price, 2) }}
                                    </td>
                                    <td class="p-3 text-center">{{ ucfirst($property->type) }}</td>

                                    <td class="p-3 text-center">
                                        <div class="flex items-center justify-center gap-2">
                                            <a href="{{ route('properties.show', $property) }}"
                                                class="flex items-center gap-2 px-3 py-1 border border-blue-500 text-blue-500 rounded-md text-sm hover:bg-blue-500 hover:text-white transition">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                                    viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                                    <circle cx="12" cy="12" r="3"></circle>
                                                </svg>
                                                Ver
                                            </a>

                                            @can('update', $property)
                                                <a href="{{ route('properties.edit', $property) }}"
                                                    class="flex items-center gap-2 px-3 py-1 border border-yellow-500 text-yellow-500 rounded-md text-sm hover:bg-yellow-500 hover:text-white transition">
                                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2"
                                                        viewBox="0 0 24 24" stroke-linecap="round" stroke-linejoin="round">
                                                        <path d="M12 20h9"></path>
                                                        <path d="M16.5 3.5a2.121 2.121 0 1 1 3 3L7 19l-4 1 1-4 12.5-12.5z">
                                                        </path>
                                                    </svg>
                                                    Editar
                                                </a>
                                            @endcan

                                            @can('delete', $property)
                                                <form action="{{ route('properties.destroy', $property) }}" method="POST"
                                                    onsubmit="return confirm('¿Eliminar esta propiedad?');">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="flex items-center gap-2 px-3 py-1 border border-red-500 text-red-500 rounded-md text-sm hover:bg-red-500 hover:text-white transition">
                                                        <svg class="w-5 h-5" fill="none" stroke="currentColor"
                                                            stroke-width="2" viewBox="0 0 24 24" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path d="M3 6h18"></path>
                                                            <path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                            <path d="M10 11v6"></path>
                                                            <path d="M14 11v6"></path>
                                                            <path d="M5 6l1 14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2l1-14"></path>
                                                        </svg>
                                                        Eliminar
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <p class="text-center text-gray-600 mt-4">No hay propiedades disponibles.</p>
            @endif
        </main>

        <div class="flex gap-4 my-6 pb-10 relative z-10">
            <a href="{{ url()->previous() }}"
                class="flex items-center gap-2 px-6 py-3 rounded-lg bg-gradient-to-r from-gray-700 to-gray-900 text-white font-medium shadow-md transition-transform transform hover:scale-105 hover:shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M15 18l-6-6 6-6"></path>
                </svg>
                Volver
            </a>
            <a href="{{ route('home') }}"
                class="flex items-center gap-2 px-6 py-3 rounded-lg bg-gradient-to-r from-blue-600 to-indigo-600 text-white font-medium shadow-md transition-transform transform hover:scale-105 hover:shadow-lg">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path d="M3 12h18"></path>
                    <path d="M9 5l-6 7 6 7"></path>
                </svg>
                Inicio
            </a>
        </div>
    </div>
@endsection
