@auth
    @php
        $dashboardRoute = match (Auth::user()->role) {
            'admin' => 'admin.dashboard',
            'executant' => 'executant.dashboard',
            default => 'client.dashboard',
        };
    @endphp
@endauth

<nav x-data="{ open: false }" class="van1  border-b border-slate-800 fixed z-50 top-0 left-0 w-full">

    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="relative flex items-center h-16">

            
            @auth
                <div class=" flex items-center h-full">
                    <a href="{{ route($dashboardRoute) }}" class="flex items-center">
                        <x-application-logo class="h-9 w-auto object-contain" />
                    </a>
                </div>
            @endauth

            
            <div class="mx-auto hidden sm:flex items-center gap-6">

                @auth
                    @php $role = Auth::user()->role; @endphp

                    {{-- ADMIN --}}
                    @if ($role === 'admin')
                        <x-nav-link :href="route('admin.dashboard')" :active="request()->routeIs('admin.dashboard')">Accueil</x-nav-link>
                        <x-nav-link :href="route('admin.missions.index')" :active="request()->routeIs('admin.missions.*')">Missions</x-nav-link>
                        <x-nav-link :href="route('admin.offres.index')" :active="request()->routeIs('admin.offres.*')">Offres</x-nav-link>
                        <x-nav-link :href="route('admin.paiements.index')" :active="request()->routeIs('admin.paiements.*')">Paiements</x-nav-link>
                    @endif

                    {{-- EXECUTANT --}}
                    @if ($role === 'executant')
                        <x-nav-link :href="route('executant.dashboard')" :active="request()->routeIs('executant.dashboard')">Accueil</x-nav-link>
                        <x-nav-link :href="route('executant.missions.disponibles')" :active="request()->routeIs('executant.missions.*')">Missions</x-nav-link>
                        <x-nav-link :href="route('executant.offres.index')" :active="request()->routeIs('executant.offres.*')">Mes offres</x-nav-link>
                        <x-nav-link :href="route('executant.paiements.index')" :active="request()->routeIs('executant.paiements.*')">Paiements</x-nav-link>
                    @endif

                    {{-- CLIENT --}}
                    @if ($role === 'client')
                        <x-nav-link :href="route('client.dashboard')" :active="request()->routeIs('client.dashboard')">Accueil</x-nav-link>
                        <x-nav-link :href="route('client.missions.index')" :active="request()->routeIs('client.missions.*')">Missions</x-nav-link>
                        <x-nav-link :href="route('client.offres.index')" :active="request()->routeIs('client.offres.*')">Offres</x-nav-link>
                        <x-nav-link :href="route('client.paiements.index')" :active="request()->routeIs('client.paiements.*')">Paiements</x-nav-link>
                    @endif
                @endauth

            </div>

          
            <div class=" flex items-center h-full">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-600 bg-white hover:text-gray-800 transition">
                            <div>{{ Auth::user()->name }}</div>
                            <svg class="ms-1 h-4 w-4 fill-current" viewBox="0 0 20 20">
                                <path fill-rule="evenodd"
                                    d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                    clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">Profile</x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                Log Out
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <div class="absolute right-0 flex items-center sm:hidden">
                <button @click="open = ! open"
                    class="inline-flex items-center justify-center p-2 rounded-md text-gray-500 hover:bg-gray-100">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{ 'hidden': open, 'inline-flex': !open }" class="inline-flex"
                            stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{ 'hidden': !open, 'inline-flex': open }" class="hidden" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>
    </div>

  
    <div :class="{ 'block': open, 'hidden': !open }" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            @auth
                @php $role = Auth::user()->role; @endphp

                {{-- ADMIN --}}
                @if ($role === 'admin')
                    <x-responsive-nav-link :href="route('admin.dashboard')">Dashboard</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.missions.index')">Missions</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.offres.index')">Offres</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('admin.paiements.index')">Paiements</x-responsive-nav-link>
                @endif

                {{-- EXECUTANT --}}
                @if ($role === 'executant')
                    <x-responsive-nav-link :href="route('executant.dashboard')">Dashboard</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('executant.missions.disponibles')">Missions</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('executant.offres.index')">Mes offres</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('executant.paiements.index')">Paiements</x-responsive-nav-link>
                @endif

                {{-- CLIENT --}}
                @if ($role === 'client')
                    <x-responsive-nav-link :href="route('client.dashboard')">Dashboard</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('client.missions.index')">Missions</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('client.offres.index')">Offres</x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('client.paiements.index')">Paiements</x-responsive-nav-link>
                @endif
            @endauth
        </div>



     
        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
