@extends('executant.layout')

@section('content')
    <div class="container m-2">
        <h3 class=" mb-3">Titre : <strong>{{ $mission->title ?? '_' }}</strong></h3>

        {{-- Statut --}}
        <p class=" mb-3">Statut :
            <span class="badge bg-info">
                {{ ucfirst(str_replace('_', ' ', $mission->status)) }}
            </span>
        </p>


        {{-- Description --}}
        <div class="card mb-3">
            <div class="card-body">
                <h5>Description</h5>
                <p>{{ $mission->description }}</p>
            </div>
        </div>

        {{-- Infos financières --}}
        <div class="card mb-3">
            <div class="card-body">
                <h5>Budget</h5>
                <p>
                    Minimum : <strong>{{ $mission->budget_min }} FCFA</strong><br>
                    Maximum :
                    <strong>{{ $mission->budget_max ?? '—' }} FCFA</strong>
                </p>
            </div>
        </div>

        {{-- Date limite --}}
        @if ($mission->date_limit)
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

                @if (!$offre)
                    <p class="text-muted">Aucune offre soumise.</p>
                @else
                    <p>
                        💰 Montant :
                        <strong>{{ $offre->montant }} FCFA</strong>
                    </p>

                    <p>
                        Statut de l’offre :
                        <span class="badge bg-secondary">
                            {{ ucfirst($offre->status ?? 'en attente') }}
                        </span>
                    </p>
                @endif
            </div>
        </div>

        {{-- Boutons --}}
        <div class="d-flex justify-content-end">
            <a href="{{ route('executant.missions.disponible') }}" class="btn btn-secondary">
                ⬅ Retour
            </a>
        </div>


    </div>
@endsection
