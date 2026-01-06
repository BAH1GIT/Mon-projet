@extends('admin.layout')

@section('content')
    <h3 class="mb-4">Mission #{{ $mission->id }}</h3>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Client :</strong> {{ $mission->client->name }}</li>
        <li class="list-group-item"><strong>Exécutant :</strong> {{ $mission->client->name ?? '—' }}</li>
        <li class="list-group-item"><strong>Titre :</strong> {{ $mission->title }}</li>
        <li class="list-group-item"><strong>Description :</strong><br>{{ $mission->description }}</li>
        <li class="list-group-item"><strong>Budget min :</strong> {{ $mission->budget_min }}</li>
        <li class="list-group-item"><strong>Budget max :</strong> {{ $mission->budget_max ?? '—' }}</li>
        <li class="list-group-item"><strong>Date limite :</strong> {{ $mission->date_limit ?? '—' }}</li>
        <li class="list-group-item">
            <div class="col-md-2">
                <strong>Statut</strong><br>
                @php
                    $statusColors = [
                        'en_attente' => 'info',
                        'reception_offre' => 'warning',
                        'attribuer' => 'success',
                        'terminer' => 'danger',
                    ];
                @endphp
                <span class="badge bg-{{ $statusColors[$mission->status] ?? 'secondary' }}">
                    {{ ucfirst(str_replace('_', ' ', $mission->status)) }}
                </span>
            </div>
        </li>
        <li class="list-group-item"><strong>Créée le :</strong> {{ $mission->created_at }}</li>
        <li class="list-group-item"><strong>Mise à jour :</strong> {{ $mission->updated_at }}</li>
    </ul>

    <a href="{{ route('admin.missions.index') }}" class="btn btn-secondary">
        Retour
    </a>
@endsection
