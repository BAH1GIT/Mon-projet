@extends('executant.layout')

@section('content')
<div class="container">
    <h2>Détails de l’Offre</h2>

    <ul class="list-group">
        <li class="list-group-item">
            <strong>Mission :</strong> {{ $offre->mission->title }}
        </li>
        <li class="list-group-item">
            <strong>Client :</strong> {{ $offre->mission->client->name }}
        </li>
        <li class="list-group-item">
            <strong>Montant :</strong> {{ number_format($offre->montant, 0, ',', ' ') }} FCFA
        </li>
        <li class="list-group-item">
            <strong>Message :</strong> {{ $offre->message }}
        </li>
        <li class="list-group-item">
            <strong>Status :</strong> {{ ucfirst($offre->status) }}
        </li>
    </ul>

    <a href="{{ route('executant.offres.index') }}" class="btn btn-secondary mt-3">
        Retour
    </a>
</div>
@endsection
