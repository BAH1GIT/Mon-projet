<x-app-layout>
    <x-slot name="header">
        <div class="d-flex justify-content-between align-items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight mb-0">
                {{ __('Dashboard Client') }}
            </h2>

            {{-- Bouton mobile --}}
            <button class="btn btn-outline-secondary d-md-none" id="toggleSidebar">
                ☰
            </button>
        </div>
    </x-slot>

    <div class="container-fluid">
        <div class="row">

           

            {{-- MAIN --}}
            <div id="mainContent" class="main">
                @yield('content')
           

        </div>
    </div>


</x-app-layout>
