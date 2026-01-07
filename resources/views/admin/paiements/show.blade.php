@extends('admin.layout')

@section('content')
<div class="container py-4">

    <h2 class="mb-4">Détails du Paiement #{{ $paiement->id }}</h2>

    <div class="card shadow-sm">
        <div class="card-body">

            <table class="table table-bordered">
                <tr>
                    <th>Mission</th>
                    <td>{{ $paiement->mission->title ?? '—' }}</td>
                </tr>

                <tr>
                    <th>Client</th>
                    <td>{{ $paiement->client->name ?? '—' }}</td>
                </tr>

                <tr>
                    <th>Exécutant</th>
                    <td>{{ $paiement->executant->name ?? '—' }}</td>
                </tr>

                <tr>
                    <th>Montant</th>
                    <td>{{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</td>
                </tr>

                <tr>
                    <th>Commission</th>
                    <td>{{ $paiement->commission_pourcentage }} %</td>
                </tr>

                <tr>
                    <th>Montant Net</th>
                    <td>{{ number_format($paiement->montant_net, 0, ',', ' ') }} FCFA</td>
                </tr>

                <tr>
                    <th>Statut</th>
                    <td>
                        @php
                            $colors = [
                                'en_attente' => 'warning',
                                'payer' => 'success',
                                'refuser' => 'danger',
                            ];
                        @endphp

                        <span class="badge bg-{{ $colors[$paiement->status] ?? 'secondary' }}">
                            {{ ucfirst(str_replace('_',' ', $paiement->status)) }}
                        </span>
                    </td>
                </tr>

                <tr>
                    <th>Date création</th>
                    <td>
                        {{ $paiement->created_at?->format('d/m/Y H:i') ?? '—' }}
                    </td>
                </tr>
            </table>

            <div class="mt-3">
                <a href="{{ route('admin.paiements.edit', $paiement) }}" class="btn btn-warning">
                    Modifier
                </a>

                <a href="{{ route('admin.paiements.index') }}" class="btn btn-secondary">
                    Retour
                </a>
            </div>

        </div>
    </div>

</div>
@endsection
