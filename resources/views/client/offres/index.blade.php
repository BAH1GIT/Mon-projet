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

        <div class="card shadow-sm">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table align-middle table-hover">
                        <thead class="table-light">
                            <tr>
                                <th>Mission</th>
                                <th>Exécutant</th>
                                <th>Montant</th>
                                <th>Message</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($missions as $mission)
                                @forelse($mission->offres as $offre)
                                    <tr>
                                        <td>{{ $mission->title }}</td>
                                        <td>{{ $offre->executant->name ?? '—' }}</td>
                                        <td>{{ number_format($offre->montant, 0, ',', ' ') }} FCFA</td>
                                        <td>{{ $offre->message ?? '-' }}</td>
                                        <td>
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
                                        </td>
                                        <td>
                                        <td>
                                            {{-- Offre en attente --}}
                                            @if ($offre->status === 'en_attente')
                                                <form action="{{ route('client.offres.accepter', $offre) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    <button class="btn btn-sm btn-outline-success">
                                                        <i class="bi bi-check-lg"></i> Accepter
                                                    </button>
                                                </form>

                                                <a href="{{ route('client.offres.show', $offre) }}"
                                                    class="btn btn-sm btn-outline-primary">
                                                    <i class="bi bi-eye"></i> Voir offre
                                                </a>

                                                {{-- Offre acceptée --}}
                                            @elseif ($offre->status === 'acceptee')
                                                <a href="{{ route('client.paiements.show', $mission) }}"
                                                    class="btn btn-sm btn-success">
                                                    <i class="bi bi-credit-card"></i> Procéder au paiement
                                                </a>

                                                {{-- Offre refusée --}}
                                            @else
                                                <a href="{{ route('client.offres.show', $offre) }}"
                                                    class="btn btn-sm btn-outline-secondary">
                                                    <i class="bi bi-eye"></i> Voir offre
                                                </a>
                                            @endif
                                        </td>

                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">Aucune offre pour {{ $mission->title }}</td>
                                    </tr>
                                @endforelse
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center">Vous n’avez aucune mission</td>
                                </tr>
                            @endforelse


                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
