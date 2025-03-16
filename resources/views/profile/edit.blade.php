@extends('layouts.app')

@section('title', 'Perfil')

@section('header', 'Gestión de Perfil')

@section('content')
    <div class="py-12">

        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-6 bg-white/80 border-l-4 border-yellow-500 shadow-md rounded-lg">
                <h3 class="text-lg font-semibold">Última modificación en el perfil</h3>
                <p class="text-md">{{ Auth::user()->updated_at->diffForHumans() }}</p>
            </div>

            <div class="p-6 bg-white/80 border-l-4 border-green-500 shadow-md rounded-lg">
                <h3 class="text-lg font-semibold">Role del usuario</h3>
                <p class="text-md font-medium text-gray-800">
                    <ul class="list-disc ml-4">
                        @foreach(Auth::user()->roles as $role)
                            <li>{{ $role->name }}</li>
                        @endforeach
                    </ul>
                </p>
                
            </div>
            
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-profile-information-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.update-password-form')
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    @include('profile.partials.delete-user-form')
                </div>
            </div>
        </div>
    </div>
@endsection
