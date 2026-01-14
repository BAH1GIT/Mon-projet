@extends('client.layout')

@section('content')
    <h3 class="mb-4">Détails de la mission # {{ $mission->id }}</h3>

    <ul class="list-group mb-3">
        <li class="list-group-item"><strong>Titre :</strong> {{ $mission->title }}</li>
        <li class="list-group-item"><strong>Description :</strong><br>{{ $mission->description }}</li>
        <li class="list-group-item"><strong>Budget min :</strong> {{ $mission->budget_min }} FCFA</li>
        <li class="list-group-item"><strong>Budget max :</strong> {{ $mission->budget_max ?? '—' }}</li>
        <li class="list-group-item"><strong>Date limite :</strong> {{ $mission->date_limit ?? '—' }}</li>
        <li class="list-group-item"><strong>Status :</strong> {{ $mission->status }}</li>
        <li class="list-group-item"><strong>Créée le :</strong> {{ $mission->created_at }}</li>
        <li class="list-group-item"><strong>Mise à jour :</strong> {{ $mission->updated_at }}</li>
    </ul>
    @if ($mission->conclusion && !$mission->conclusion->validation_client)
        <form method="POST"action="{{ route('client.mission.valider', $mission->id) }}">
            @csrf
            <div class="mb-2">
                <label for="note" class="form-label">Note</label>
                <select name="rating" id="note" class="fom-control" required>
                    <option value="1">⭐</option>
                    <option value="2">⭐⭐</option>
                    <option value="3">⭐⭐⭐</option>
                    <option value="4">⭐⭐⭐⭐</option>
                    <option value="5">⭐⭐⭐⭐⭐</option>
                </select>
            </div>
            <div class="mb-2">
                <label for="coment" class="form-label">Commentaire</label>
                <textarea class="form-control" name="commentaire" id="coment" rows="3"></textarea>
            </div>
            <button class="btn btn-success">Valider Travail terminer</button>

        </form>
    @else
        {{-- <span class="badge bg-success">Mission validée</span> --}}
    @endif

    <a href="{{ route('client.missions.index') }}" class="btn btn-secondary">
        Retour
    </a>
@endsection
