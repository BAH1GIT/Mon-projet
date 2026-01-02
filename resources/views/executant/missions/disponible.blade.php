@extends('executant.layout')

@section('content')
<h3>Mes missions (offres soumises)</h3>

@if($missions->isEmpty())
    <p>Aucune mission trouvée.</p>
@endif

@foreach($missions as $mission)
    <div class="card mb-3">
        <div class="card-body">
            <h5>{{ $mission->title }}</h5>

            <p>{{ $mission->description }}</p>

            @foreach($mission->offres as $offre)
                <span>{{ $offre->executant->name }}</span>
                <p class="text-success">
                    💰 Mon offre : {{ $offre->montant }} FCFA
                </p>
            @endforeach

            <p>
                Statut mission :
                <strong>{{ $mission->status }}</strong>
            </p>

            <a href="{{ route('executant.missions.show', $mission->id) }}"
               class="btn btn-primary btn-sm">
                Voir détails
            </a>
        </div>
    </div>
@endforeach
@endsection
