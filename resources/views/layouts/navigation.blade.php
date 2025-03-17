<nav x-data="{ open: false }" class="bg-white border-b border-gray-200 shadow-md">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-6 sm:px-8 lg:px-10">
        <div class="flex justify-between h-16 items-center">
            <!-- Logo -->
            <div class="shrink-0 flex items-center">
                <a href="{{ route('home') }}">
                    <p class="text-2xl font-bold text-blue-600 px-4 py-2 rounded-lg">LaraRent</p>
                </a>
            </div>

            <!-- Navigation Links -->
            <div class="hidden space-x-8 sm:flex items-center">
                @auth
                    <x-nav-link :href="route('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                @endauth
                <x-nav-link :href="route('properties.index')" :active="request()->routeIs('properties.index')">
                    {{ __('Propiedades') }}
                </x-nav-link>

                @auth
                    <x-nav-link :href="route('properties.my')" :active="request()->routeIs('properties.my')">
                        {{ __('Mis Propiedades') }}
                    </x-nav-link>

                    @if (Auth::user() && Auth::user()->hasRole('admin'))
                        <x-nav-link :href="route('users.index')" :active="request()->routeIs('users.index')">
                            {{ __('Administrar Usuarios') }}
                        </x-nav-link>
                    @endif
                @endauth
            </div>

            <!-- Profile Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <x-dropdown align="right" width="48">
                        <x-slot name="trigger">
                            <button
                                class="inline-flex items-center px-4 py-2 border border-gray-300 text-sm font-medium rounded-md text-gray-700 bg-gray-100 hover:bg-gray-200 transition">
                                <div>{{ Auth::user()->name }}</div>
                                <div class="ml-2">
                                    <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg"
                                        viewBox="0 0 20 20">
                                        <path fill-rule="evenodd"
                                            d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                            clip-rule="evenodd" />
                                    </svg>
                                </div>
                            </button>
                        </x-slot>

                        <x-slot name="content">
                            <x-dropdown-link :href="route('profile.edit')">
                                {{ __('Perfil') }}
                            </x-dropdown-link>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                    {{ __('Cerrar sesión') }}
                                </x-dropdown-link>
                            </form>
                        </x-slot>
                    </x-dropdown>
                @else
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('login') }}"
                            class="px-4 py-2 text-sm font-medium text-gray-700 bg-gray-100 border border-gray-300 rounded-md transition hover:bg-gray-200">
                            {{ __('Iniciar sesión') }}
                        </a>
                        <a href="{{ route('register') }}"
                            class="px-4 py-2 text-sm font-medium text-white bg-blue-600 rounded-md transition hover:bg-blue-700">
                            {{ __('Registrarse') }}
                        </a>
                    </div>
                @endauth
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        @auth
            <div class="pt-2 pb-3 space-y-1">
                <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                </x-responsive-nav-link>
            </div>

            <div class="pt-4 pb-1 border-t border-gray-200">
                <div class="px-4">
                    <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                </div>

                <div class="mt-3 space-y-1">
                    <x-responsive-nav-link :href="route('profile.edit')">
                        {{ __('Perfil') }}
                    </x-responsive-nav-link>

                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                            {{ __('Cerrar sesión') }}
                        </x-responsive-nav-link>
                    </form>
                </div>
            </div>
        @else
            <div class="pt-2 pb-3 border-t border-gray-200">
                <div class="px-4 space-y-1">
                    <a href="{{ route('login') }}"
                        class="block px-4 py-2 text-sm text-gray-700 bg-gray-100 rounded-md transition hover:bg-gray-200">
                        {{ __('Iniciar sesión') }}
                    </a>
                    <a href="{{ route('register') }}"
                        class="block px-4 py-2 text-sm text-white bg-blue-600 rounded-md transition hover:bg-blue-700">
                        {{ __('Registrarse') }}
                    </a>
                </div>
            </div>
        @endauth
    </div>
</nav>
