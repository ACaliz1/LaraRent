@extends('layouts.app')

@section('title', 'Editar Propiedad')

@section('content')
    <div class="min-h-screen flex flex-col items-center p-6 bg-gray-100 text-gray-900 relative">

        <div class="absolute inset-0 bg-cover bg-center opacity-60" 
            style="background-image: url('{{ asset('images/back.png') }}');">
        </div>

        <div class="max-w-4xl mx-auto bg-white p-10 rounded-xl shadow-xl border border-gray-200 relative z-10 my-16">
            <a href="{{  url()->previous() }}" class="flex items-center gap-2 text-blue-500 hover:underline mb-4">
                ← Volver
            </a>
            <h2 class="text-4xl font-extrabold text-gray-800 mb-6">Editar Propiedad</h2>

            <form action="{{ route('properties.update', $property) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                @csrf
                @method('PUT')

                <div class="flex flex-col">
                    <label class="text-gray-700 font-medium">Título</label>
                    <input type="text" name="title" value="{{ old('title', $property->title) }}"
                        class="mt-1 w-full p-4 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>
                    @error('title')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="flex flex-col">
                    <label class="text-gray-700 font-medium">Descripción</label>
                    <textarea name="description" rows="4"
                        class="mt-1 w-full p-4 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                        required>{{ old('description', $property->description) }}</textarea>
                    @error('description')
                        <span class="text-red-500 text-sm">{{ $message }}</span>
                    @enderror
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col">
                        <label class="text-gray-700 font-medium">Ubicación</label>
                        <input type="text" name="location" value="{{ old('location', $property->location) }}"
                            class="mt-1 w-full p-4 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required>
                        @error('location')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label class="text-gray-700 font-medium">Precio (€)</label>
                        <input type="number" name="price" step="0.01" value="{{ old('price', $property->price) }}"
                            class="mt-1 w-full p-4 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none"
                            required>
                        @error('price')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-6">
                    <div class="flex flex-col">
                        <label class="text-gray-700 font-medium">Tipo</label>
                        <select name="type"
                            class="mt-1 w-full p-4 bg-gray-50 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:outline-none">
                            <option value="venta" {{ $property->type == 'venta' ? 'selected' : '' }}>Venta</option>
                            <option value="alquiler" {{ $property->type == 'alquiler' ? 'selected' : '' }}>Alquiler</option>
                        </select>
                        @error('type')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="flex flex-col">
                        <label class="text-gray-700 font-medium">Imagen (opcional)</label>
                        <input type="file" name="image" class="mt-1 w-full p-4 bg-gray-50 border border-gray-300 rounded-lg">
                        @error('image')
                            <span class="text-red-500 text-sm">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                @if ($property->image)
                    <div class="mt-4 text-center">
                        <p class="text-gray-600 text-sm">Imagen actual:</p>
                        <img src="{{ asset('storage/' . $property->image) }}" alt="Imagen actual"
                            class="w-full h-48 object-cover mt-2 rounded-lg shadow-md">
                    </div>
                @endif

                <div class="flex gap-4 mt-6">
                    <a href="{{ route('properties.index') }}"
                        class="w-1/2 flex items-center justify-center gap-2 px-6 py-3 border border-gray-500 text-gray-600 rounded-lg font-medium transition transform hover:bg-gray-500 hover:text-white hover:shadow-lg hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                        Cancelar
                    </a>

                    <button type="submit"
                        class="w-1/2 flex items-center justify-center gap-2 px-6 py-3 border  border-yellow-500 text-yellow-500 rounded-lg font-medium transition transform  hover:bg-yellow-500 hover:text-white hover:shadow-lg hover:scale-105">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="M12 5v14"></path>
                            <path d="M5 12h14"></path>
                        </svg>
                        Actualizar
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection
