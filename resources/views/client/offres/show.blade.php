@extends('client.layout')

@section('content')
<div class="container py-5">
    <h1 class="mb-4">Détails de l'Offre</h1>

    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
    @endif

    <div class="card shadow-sm mb-4">
        <div class="card-header bg-light d-flex justify-content-between align-items-center">
            <h5 class="mb-0">
                <i class="bi bi-briefcase"></i>
                Offre pour : {{ $offre->mission->title ?? 'Mission inconnue' }}
            </h5>
            @php
                $statusColors = [
                    'en_attente' => 'warning',
                    'accepter' => 'success',
                    'refuser' => 'danger',
                    'payer' => 'info',
                ];
            @endphp
            <span class="badge bg-{{ $statusColors[$offre->status] ?? 'secondary' }}">
                {{ ucfirst(str_replace('_', ' ', $offre->status)) }}
            </span>
        </div>

        <div class="card-body">
            <div class="row mb-3">
                <div class="col-md-4">
                    <strong>Exécutant :</strong><br>
                    {{ $offre->executant->name ?? '—' }}
                </div>
                <div class="col-md-4">
                    <strong>Montant :</strong><br>
                    {{ number_format($offre->montant, 0, ',', ' ') }} FCFA
                </div>
                <div class="col-md-4">
                    <strong>Date de soumission :</strong><br>
                    {{ $offre->created_at->format('d/m/Y H:i') }}
                </div>
            </div>

            <div class="mb-3">
                <strong>Message :</strong><br>
                <p>{{ $offre->message ?? '-' }}</p>
            </div>

            <div class="d-flex gap-2">
                @if ($offre->status === 'en_attente')
                    <form action="{{ route('client.offres.accepter', $offre) }}" method="POST">
                        @csrf
                        <button class="btn btn-success">
                            <i class="bi bi-check-lg"></i> Accepter l'offre
                        </button>
                    </form>
                @elseif ($offre->status === 'payer')
                    <a href="{{ route('client.paiements.show', $offre->id) }}" class="btn btn-primary">
                        <i class="bi bi-credit-card"></i> Procéder au paiement
                    </a>
                @endif

                <a href="{{ route('client.offres.index') }}" class="btn btn-secondary">
                    <i class="bi bi-arrow-left"></i> Retour
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
