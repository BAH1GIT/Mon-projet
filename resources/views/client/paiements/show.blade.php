@extends('client.layout')

@section('content')
    <div class="container py-5">
        <h1 class="mb-4">Paiement de la mission : {{ $mission->title }}</h1>

        @if (session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        <div class="card shadow-sm">
            <div class="card-body">

                <h5>Détails de la mission</h5>
                <ul>
                    <li><strong>Titre de la mission :</strong> {{ $mission->title }}</li>
                    <li><strong>Description :</strong> {{ $mission->description }}</li>
                    <li><strong>Exécutant :</strong> {{ $paiement->executant->name ?? '—' }}</li>
                </ul>

                <h5>Montant du paiement</h5>
                <ul>
                    <li><strong>Montant total :</strong> {{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</li>
                    <li><strong>Commission : </strong> {{ $paiement->commission_pourcentage }}% </li>
                    <li><strong>Montant net pour l’exécutant :</strong>
                        {{ number_format($paiement->montant_net, 0, ',', ' ') }} FCFA</li>
                    <li><strong>Status :</strong>
                        <span
                            class="badge bg-{{ $paiement->status == 'en_attente' ? 'warning' : ($paiement->status == 'payer' ? 'success' : 'danger') }}">
                            {{ ucfirst(str_replace('_', ' ', $paiement->status)) }}
                        </span>
                    </li>
                </ul>

                @if ($paiement->status === 'en_attente')
                    <form action="{{ route('client.offres.index',$mission->id)}}" method="GET">
                        {{-- @csrf --}}

                        <button type="submit" class="btn btn-outline-success">
                            <i class="bi bi-credit-card"></i> Procéder au paiement
                        </button>
                    </form>
                @elseif($paiement->status === 'payer')
                    <span class="text-muted mt-3 d-block">Paiement déjà effectué</span>
                @else
                    <span class="text-muted mt-3 d-block">Paiement déjà Refusé</span>
                @endif

            </div>
        </div>
    </div>
@endsection
