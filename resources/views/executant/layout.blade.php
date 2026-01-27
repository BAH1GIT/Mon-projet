<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl  text-gray-800 leading-tight">
           {{__(' Dashboard Executant')}}
        </h2>
    </x-slot>

    <div class="container-fluid">
        <div class="row">
            
            {{-- MAIN --}}
            <div class="     main">
                @yield('content')
            </div>
        </div>
    </div>

    @push('styles')
    <style>
    
        .main{
            min-height: calc(100vh - 64px);
            /* background-color: yellow; */
        }
        .headers{
            padding-top: 64px;
        }
    </style>
    @endpush
</x-app-layout>
