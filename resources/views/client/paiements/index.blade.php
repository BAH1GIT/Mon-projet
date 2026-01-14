@extends('client.layout')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Mes Paiements</h1>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @forelse ($paiements as $paiement)
            {{-- Carte Mission --}}
            <div class="card shadow-sm mb-4">
                <div class="card-header bg-light d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">
                        <i class="bi bi-briefcase"></i>
                        {{ $paiement->mission->title }}
                    </h5>

                    <span class="badge bg-info">
                        {{ $paiement->mission->offres->where('status', 'accepter')->count() }} paiement
                    </span>
                </div>

                <div class="card-body">
                    @forelse ( $paiement->mission->offres->where('status', 'accepter') as $offre)
                        {{-- Carte Paiement --}}
                        <div class="card border-success mb-3">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-3">
                                        <strong>Exécutant</strong><br>
                                        {{ $paiement->executant->name ?? '—' }}
                                    </div>

                                    <div class="col-md-3">
                                        <strong>Montant de l'offre</strong><br>
                                        {{ number_format($paiement->montant, 0, ',', ' ') }} FCFA

                                    </div>

                                    <div class="col-md-3">
                                        <strong>Statut du paiement</strong><br>
                                        @php
                                            $paiementStatus =  [
                                                'en_attente' =>'warning',
                                                'payer'=> 'success',
                                            ]
                                        @endphp

                                        <span class="badge bg-{{ $paiementStatus[$paiement->status] ?? 'warning' }}">
                                            {{ ucfirst(str_replace('_',' ',$paiement->status)) }}
                                        </span>

                                    </div>


                                    <div class="col-md-3">
                                        <a href="{{ route('client.paiements.show', $paiement->id ) }}" class="btn btn-success ">
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
