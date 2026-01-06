@extends('client.layout')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Mes Offres Reçues</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif


        @forelse($missions as $mission)
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-briefcase"></i>
                        {{ $mission->title }}
                    </h5>
                    <span class="badge bg-primary">
                        {{ $mission->offres->count() }} offre(s)
                    </span>
                </div>

                <div class="card-body">
                    @forelse($mission->offres as $offre)
                        <div class="border rounded p-3 mb-3">
                            <div class="row align-items-center">
                                <div class="col-md-3">
                                    <strong>Exécutant</strong><br>
                                    {{ $offre->executant->name ?? '—' }}
                                </div>

                                <div class="col-md-2">
                                    <strong>Montant</strong><br>
                                    {{ number_format($offre->montant, 0, ',', ' ') }} FCFA
                                </div>

                                <div class="col-md-3">
                                    <strong>Message</strong><br>
                                    {{ $offre->message ?? '-' }}
                                </div>

                                <div class="col-md-2">
                                    <strong>Statut</strong><br>
                                    @php
                                        $statusColors = [
                                            'en_attente' => 'warning',
                                            'accepter' => 'success',
                                            'refuser' => 'danger',
                                        ];
                                    @endphp
                                    <span class="badge bg-{{ $statusColors[$offre->status] ?? 'secondary' }}">
                                        {{ ucfirst(str_replace('_', ' ', $offre->status)) }}
                                    </span>
                                </div>

                                <div class="col-md-2 text-end">
                                    @if ($offre->status === 'en_attente')
                                        <form action="{{ route('client.offres.accepter', $offre) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            <button class="btn btn-sm btn-outline-success w-100 mb-1">
                                                <i class="bi bi-check-lg"></i> Accepter
                                            </button>
                                        </form>

                                        <a href="{{ route('client.offres.show', $offre->id) }}"
                                            class="btn btn-sm btn-outline-primary w-100">
                                            Voir offre
                                        </a>
                                    @elseif ($offre->status === 'payer')
                                        <a href="{{ route('client.paiements.show', $offre->id) }}"
                                            class="btn btn-sm btn-success w-100">
                                            <i class="bi bi-credit-card"></i> Paiement
                                        </a>
                                    @else
                                        <a href="{{ route('client.paiements.show', $offre->id) }}"
                                            class="btn btn-sm btn-outline-secondary w-100">
                                            Voir offre
                                        </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted mb-0">
                            Aucune offre pour cette mission
                        </p>
                    @endforelse
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">
                Vous n’avez aucune mission
            </div>
        @endforelse
    </div>

    </div>
@endsection
