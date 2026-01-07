@extends('admin.layout')

@section('content')
<div class="container py-4">

    <h2 class="mb-4">Modifier Paiement #{{ $paiement->id }}</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-sm">
        <div class="card-body">

            <form method="POST" action="{{ route('admin.paiements.update', $paiement) }}">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label class="form-label">Statut du paiement</label>

                    <select name="status" class="form-select" required>
                        <option value="en_attente" @selected($paiement->status == 'en_attente')>
                            En attente
                        </option>

                        <option value="payer" @selected($paiement->status == 'payer')>
                            Payé
                        </option>

                        <option value="refuser" @selected($paiement->status == 'refuser')>
                            Refusé
                        </option>
                    </select>
                </div>

                <div class="d-flex gap-2">
                    <button class="btn btn-outline-success">
                        Enregistrer
                    </button>

                    <a href="{{ route('admin.paiements.show', $paiement) }}" class="btn btn-outline-secondary">
                        Annuler
                    </a>
                </div>
            </form>

        </div>
    </div>

</div>
@endsection
