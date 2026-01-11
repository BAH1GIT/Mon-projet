@extends('executant.layout')

@section('content')
    <h3>Mes missions (offres soumises)</h3>

    @if ($missions->isEmpty())
        <p>Aucune mission trouvée.</p>
    @endif

    @foreach ($missions as $mission)
        <div class="card mb-3">
            <div class="card-body">
                <h5 class="form-control mb-2"><strong>Titre de la mission :</strong>{{ $mission->title }}</h5>
                <p class="form-control mb-2"><strong>Client :</strong>{{ $mission->client->name }}</p>

                <p class="form-control mb-2"><strong>Description :</strong>{{ $mission->description }}</p>

                @foreach ($mission->offres as $offre)
                    <span class="form-control mb-2"><strong>Executant :</strong>{{ $offre->executant->name }}</span>
                    <p class="text-success form-control  mb-2">
                        💰 Mon offre : {{ $offre->montant }} FCFA
                    </p>
                @endforeach

                <p class="form-control ">
                    <strong>Statut mission :</strong>
                    {{ $mission->status }}
                </p>

                @if (in_array($mission->status, ['en_attente', 'reception_offre']))
                    

                    <a href="{{ route('executant.missions.show', $offre->id) }}" class="btn btn-primary btn-sm">
                        Voir détails
                    </a>
                    
                @endif
            </div>
        </div>
    @endforeach
@endsection
