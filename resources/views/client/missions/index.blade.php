@extends('client.layout')

@section('content')
    <h1 class="mb-4 fw-bold h3 text-center">Mes missions</h1>
    <div class="d-flex justify-content-between mb-3">
        <a href="{{ route('client.missions.create') }}" class="btn btn-primary ">
            + Nouvelle mission
        </a>
        <span class="btn btn-info">
            {{ $missions->count() }} mission(s)
        </span>
    </div>

    <div id="missions-slider" class="splide">
        <div class="splide__track">
            <ul class="splide__list">

                @forelse ($missions as $mission)
                    @php
                        $statusColors = [
                            'en_attente' => 'warning',
                            'reception_offre' => 'info',
                            'attribuer' => 'primary',
                            'terminer' => 'success'
                        ];
                    @endphp


                    <li class="splide__slide mb-5 ">
                        <div class="card shadow-sm h-100">
                            <div class="card-body ">



                                <h5 class="fw-bold">{{ $mission->title }}</h5>
                                <p class="mb-1">

                                    Validation travail :
                                    @if ($mission->conclusion)
                                        @if ($mission->conclusion->validation_client)
                                            <span class="badge bg-success">Mission validée</span>
                                        @else
                                            <span class="badge bg-warning">Mission terminée par l'exécutant</span>
                                        @endif
                                    @else
                                        <span class="badge bg-info">En cours</span>
                                    @endif
                                </p>
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
                                    @if (in_array($mission->status, ['en_attente', 'reception_offre']))
                                        <a href="{{ route('client.missions.edit', $mission->id) }}"
                                            class="btn btn-outline-warning btn-sm">
                                            Modifier
                                        </a>
                                    @endif

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
