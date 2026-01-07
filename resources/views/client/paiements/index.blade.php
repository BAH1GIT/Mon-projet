@extends('client.layout')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Mes Paiements</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @forelse ($missions as $mission)
            {{-- Carte Mission --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-briefcase"></i>
                        {{ $mission->title }}
                    </h5>

                    <span class="badge bg-info">
                        {{ $mission->offres->where('status', 'accepter')->count() }} paiement(s)
                    </span>
                </div>

                <div class="card-body">
                    @forelse ($mission->offres->where('status', 'accepter') as $offre)
                        {{-- Carte Paiement --}}
                        <div class="card border-success mb-3">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <strong>Exécutant</strong><br>
                                        {{ $offre->executant->name ?? '—' }}
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Montant</strong><br>
                                        {{ number_format($offre->montant, 0, ',', ' ') }} FCFA
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Statut</strong><br>
                                        @php
                                            $statusColors = [
                                                'en_attente' => 'warning',
                                                'payer' => 'success',
                                            ];
                                            $paiementStatus = $offre->paiement->status ?? 'en_attente';
                                        @endphp
                                        <span class="badge bg-{{ $statusColors[$paiementStatus] ?? 'secondary' }}">
                                            {{ ucfirst(str_replace('_', ' ', $paiementStatus)) }}
                                        </span>
                                    </div>


                                    <div class="col-md-3">
                                        <a href="{{ route('client.paiements.show', $mission) }}" class="btn btn-success ">
                                            Voir Paiement
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p class="text-muted mb-0">
                            Aucune offre acceptée pour cette mission
                        </p>
                    @endforelse
                </div>
            </div>
        @empty
            <div class="alert alert-info text-center">
                Aucun paiement disponible
            </div>
        @endforelse
    </div>
@endsection
