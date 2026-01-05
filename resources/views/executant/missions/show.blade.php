@extends('executant.layout')

@section('content')
<div class="container m-2">

    {{-- Vérifier que l'offre existe --}}
    @if(!$offre)
        <div class="alert alert-warning">
            Aucune offre trouvée.
        </div>
        <a href="{{ route('executant.missions.disponible') }}" class="btn btn-secondary">⬅ Retour</a>
        @return
    @endif

    {{-- Vérifier que la mission existe --}}
    @php
        $mission = $offre->mission;
    @endphp

    @if(!$mission)
        <div class="alert alert-warning">
            La mission associée à cette offre est introuvable.
        </div>
        <a href="{{ route('executant.missions.disponible') }}" class="btn btn-secondary">⬅ Retour</a>
        @return
    @endif

    {{-- Mission --}}
    <div class="card mb-3">
        <div class="card-body">
            <h3 class="mb-3">Titre : <strong>{{ $mission->title ?? '-' }}</strong></h3>

            <p class="mb-3">
                Statut :
                <span class="badge bg-info">
                    {{ ucfirst(str_replace('_', ' ', $mission->status ?? '-')) }}
                </span>
            </p>

            <h5>Description</h5>
            <p>{{ $mission->description ?? '-' }}</p>
        </div>
    </div>

    {{-- Infos financières --}}
    <div class="card mb-3">
        <div class="card-body">
            <h5>Budget</h5>
            <p>
                Minimum : <strong>{{ number_format($mission->budget_min ?? 0, 0, ',', ' ') }} FCFA</strong><br>
                Maximum : <strong>{{ number_format($mission->budget_max ?? 0, 0, ',', ' ') }} FCFA</strong>
            </p>
        </div>
    </div>

    {{-- Date limite --}}
    @if(!empty($mission->date_limit))
        <div class="card mb-3">
            <div class="card-body">
                <h5>Date limite</h5>
                <p>{{ \Carbon\Carbon::parse($mission->date_limit)->format('d/m/Y') }}</p>
            </div>
        </div>
    @endif

    {{-- Offre de l'exécutant --}}
    <div class="card mb-4 border-success">
        <div class="card-body">
            <h5 class="text-success">Mon offre</h5>

            <p>💰 Montant : <strong>{{ number_format($offre->montant ?? 0, 0, ',', ' ') }} FCFA</strong></p>

            <p>
                Statut de l’offre :
                <span class="badge bg-secondary">
                    {{ ucfirst(str_replace('_', ' ', $offre->status ?? 'en attente')) }}
                </span>
            </p>

            @if(!empty($offre->message))
                <p>Message : {{ $offre->message }}</p>
            @endif
        </div>
    </div>

    {{-- Bouton retour --}}
    <div class="d-flex justify-content-end">
        <a href="{{ route('executant.missions.disponible') }}" class="btn btn-secondary">
            ⬅ Retour
        </a>
    </div>

</div>
@endsection
