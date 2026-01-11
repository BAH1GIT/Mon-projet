@extends('executant.layout')
@section('content')
    <h3 class="my-3 text-center">Detail du paiyement</h3>
    <div class="card">
        <div class="card-body">
            <p class="mb-1 form-control">
                <strong>Mission :</strong>
                {{ $paiement->mission->title }}
            </p>
            <p class="mb-1 form-control">
                <strong>Mission :</strong>
                {{ $paiement->client->name }}
            </p>
            <hr>
            <p class="mb-1 form-control">
                <strong>Montant :</strong>
                {{ number_format($paiement->montant, 0, ',', '') }} FCFA
            </p>

            <p class="mb-1 form-control">
                <strong>Commission:</strong>
                {{ number_format($paiement->commision_montant, 0, ',', '') }} FCFA
            </p>
            <p class="mb-1 form-control">
                <strong>Montant Recu :</strong>
                {{ number_format($paiement->montant_net, 0, ',', '') }} FCFA
            </p>
            <p class="mb-1 form-control">
                @php
                    $colors = [
                        'en_attente' => 'warning',
                        'payer' => 'success',
                    ];
                    $text = [
                        'en_attente' => 'dark',
                        'payer' => 'light'
                    ];
                @endphp
                <strong>Status :</strong>
                <span class="badge bg-{{ $colors[$paiement->status] ?? 'secondary' }} text-{{ $text[$paiement->status] ??'secondary' }}">
                {{ ucfirst($paiement->status) }}
                </span>
            </p>
            <p class="form-control mb-1">
                <strong>Date :</strong>
                {{ $paiement->created_at->format('d/m/y H:i') }}
            </p>
             <p class="form-control mb-1">
                <strong>Liberable :</strong>
                @if ($paiement->status === 'en_attente')
                <span class="badge bg-warning text-dark">paiement indisponible avant la fin du travail</span>
                @else
                <span class="badge bg-success">paiement liberer</span>
                @endif
                
            </p>
            <a href="{{ route('executant.paiements.index') }}" class="btn btn-outline-secondary">Retour</a>
        </div>
    </div>
@endsection
