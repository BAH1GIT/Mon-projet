@extends('admin.layout')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Détails de l’Offre #{{$offre->id}}</h1>

    <div class="card shadow-sm">
        <div class="card-body">
            <ul class="list-group list-group-flush">
                <li class="list-group-item"><strong>Mission :</strong> {{ $offre->mission->title ?? '-' }}</li>
                <li class="list-group-item"><strong>Exécutant :</strong> {{ $offre->executant->name ?? '-' }}</li>
                <li class="list-group-item"><strong>Montant :</strong> {{ number_format($offre->montant, 0, ',', ' ') }} FCFA</li>
                <li class="list-group-item"><strong>Message :</strong> {{ $offre->message ?? '-' }}</li>
                <li class="list-group-item">
                    <strong>Status :</strong>
                    @php
                        $statusColors = [
                            'en_attente' => 'warning',
                            'acceptee' => 'success',
                            'refusee' => 'danger'
                        ];
                    @endphp
                    <span class="badge bg-{{ $statusColors[$offre->status] ?? 'secondary' }}">
                        {{ ucfirst(str_replace('_', ' ', $offre->status)) }}
                    </span>
                </li>
            </ul>

            <div class="mt-4">
                <a href="{{ route('admin.offres.index') }}" class="btn btn-secondary">Retour</a>

                <form action="{{ route('admin.offres.destroy', $offre->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" onclick="return confirm('Supprimer cette offre ?')">
                        Supprimer
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
