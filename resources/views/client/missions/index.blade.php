@extends('client.layout')

@section('content')
    <h1 class="mb-4 fw-bold h3 text-center">Mes missions</h1>

    <a href="{{ route('client.missions.create') }}" class="btn btn-outline-primary mb-3">
        + Nouvelle mission
    </a>

    {{-- <table class="table table-responsive table-striped table-bordered ">
       
        <thead>
            <tr>
                <th>Titre</th>
                <th>Budget min</th>
                <th>Budget max</th>
                <th>Date limite</th>
                <th>Status</th>
                <th>Créée le</th>
                <th>Actions</th>
            </tr>
        </thead>

        
        <tbody>
            @forelse ($missions as $mission)
                <tr>
                    <td>{{ $mission->title }}</td>
                    <td>{{ $mission->budget_min }} FCFA</td>
                    <td>{{ $mission->budget_max ?? '—' }}</td>
                    <td>{{ $mission->date_limit ?? '—' }}</td>
                    <td>
                        @php
                            $statusColors = [
                                'en_attente' => 'warning',
                                'accepter' => 'success',
                                'refuser' => 'danger',
                            ];
                        @endphp
                        <span class="badge bg-{{ $statusColors[$mission->status] ?? 'secondary' }}">
                            {{ ucfirst(str_replace('_', ' ', $mission->status)) }}
                        </span>
                    </td>
                    <td>{{ $mission->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="d-flex justify-content-center align-item-center gap-1">

                            <a href="{{ route('client.missions.show', $mission->id) }}" class="btn btn-outline-info">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-eye" viewBox="0 0 16 16">
                                    <path
                                        d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8M1.173 8a13 13 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5s3.879 1.168 5.168 2.457A13 13 0 0 1 14.828 8q-.086.13-.195.288c-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5s-3.879-1.168-5.168-2.457A13 13 0 0 1 1.172 8z" />
                                    <path
                                        d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5M4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0" />
                                </svg>
                            </a>
                            <a href="{{ route('client.missions.edit', $mission->id) }}" class="btn btn-outline-warning">
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg>
                            </a>

                           <form action="{{ route('client.missions.destroy', $mission->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                        fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                                        <path
                                            d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z" />
                                        <path
                                            d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z" />
                                    </svg>
                                </button>
                            </form> 
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center">
                        Aucune mission
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table> --}}

    <div id="missions-slider" class="splide">
        <div class="splide__track">
            <ul class="splide__list">

                @forelse ($missions as $mission)
                    @php
                        $statusColors = [
                            'en_attente' => 'warning',
                            'reception_offre' => 'info',
                            'accepter' => 'success',
                            'refuser' => 'danger',
                        ];
                    @endphp


                    <li class="splide__slide">
                        <div class="card shadow-sm h-100">
                            <div class="card-body">

                                <h5 class="fw-bold">{{ $mission->title }}</h5>

                                <p class="mb-1">
                                    💰 Budget Max:
                                    {{ $mission->budget_max ?? '—' }} FCFA
                                </p>

                                <p class="mb-1">
                                    📅 Date limite : {{ $mission->date_limit ?? 'indefini' }}
                                </p>

                                <p class="mb-2">
                                    <span class="badge bg-{{ $statusColors[$mission->status] ?? 'secondary' }}">
                                        {{ ucfirst(str_replace('_', ' ', $mission->status)) }}
                                    </span>
                                </p>

                                <small class="text-muted">
                                    Créée le {{ $mission->created_at->format('d/m/Y') }}
                                </small>

                                <div class="d-flex gap-2 mt-3">
                                    <a href="{{ route('client.missions.show', $mission->id) }}"
                                        class="btn btn-outline-info btn-sm">
                                        Voir
                                    </a>

                                    <a href="{{ route('client.missions.edit', $mission->id) }}"
                                        class="btn btn-outline-warning btn-sm">
                                        Modifier
                                    </a>
                                </div>

                            </div>
                        </div>
                    </li>

                @empty
                    <li class="splide__slide text-center">
                        <p>Aucune mission</p>
                    </li>
                @endforelse

            </ul>
        </div>
    </div>
  <script>
    document.addEventListener('DOMContentLoaded', function() {
        const totalMissions = {{ $missions->count() }};

        const splide = new Splide('#missions-slider', {
            type: totalMissions >= 3 ? 'loop' : 'slide',
            perPage: Math.min(3, totalMissions),
            gap: '1rem',
            arrows: totalMissions > 1,
            pagination: totalMissions > 1,
            speed: 800, // animation plus fluide
            easing: 'ease-in-out', // douceur
            autoplay: totalMissions > 2,
            interval: 3000,
            pauseOnHover: true,
            breakpoints: {
                992: {
                    perPage: Math.min(2, totalMissions)
                },
                576: {
                    perPage: 1
                },
            }
        });

        splide.mount();

        // 👉 Centrer les slides si moins de 3 missions
        if (totalMissions < 3) {
            const track = document.querySelector('#missions-slider .splide__list');
            track.classList.add('justify-center');
        }
    });
</script>
@endsection
