@extends('executant.layout')

@section('content')
<h3 class="text-center">Toutes les missions</h3>
<div class="table-responsive">
<table class="table table-striped table-sm">
    <thead>
        <tr>
            <th>Titre</th>
            <th>Client</th>
            <th>Budget min</th>
            <th>Budget max</th>
            <th>Date limite</th>
            <th>Status</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($missions as $mission)
            <tr>
                <td>{{ $mission->title }}</td>
                <td>{{ $mission->client->name ?? '—' }}</td>
                <td>{{ $mission->budget_min }}</td>
                <td>{{ $mission->budget_max ?? '—' }}</td>
                <td>{{ $mission->date_limit ?? '—' }}</td>
                <td>{{ $mission->status }}</td>

                 <td>
                        <div class="d-flex justify-content-center align-item-center gap-1">


                            <a href="{{ route('executant.offres.create', $mission->id) }}" class="btn btn-outline-warning">
                               Soummetre une offre
                            </a>

                        </div>
                    </td>
            </tr>
        @endforeach
    </tbody>
</table>
</div>
@endsection
