<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
           {{__(' Dashboard Executant')}}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row">

            {{-- SIDEBAR --}}
            <div class="col-md-2 sidebar bg-secondary text-white">
                Sidebar
                <ul>
                    <li><a href="{{ route('executant.missions.disponible') }}">mission Avec Offre</a></li>
                    <li><a href="{{ route('executant.offres.index') }}">offres</a></li>
                    <li><a href="{{ route('executant.mission.dispo') }}">Mission disponible</a></li>
                </ul>
            </div>

            {{-- MAIN --}}
            <div class="col-md-10 main">
                @yield('content')
            </div>

        </div>
    </div>

    @push('styles')
    <style>
        .sidebar{
            position: fixed;
            top: 64px; /* navbar */
            left: 0;
            width: 16.6667%;
            height: calc(100vh - 64px);
            background-color: #505350ff;
        }

        .main{
            margin-left: 16.6667%;
            min-height: calc(100vh - 64px);
            /* background-color: yellow; */
        }
        .headers{
            padding-top: 64px;
        }
    </style>
    @endpush
</x-app-layout>
