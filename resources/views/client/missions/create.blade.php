@extends('client.layout')

@section('content')
<h3 class="mb-4">Créer une mission</h3>

<form method="POST" action="{{ route('client.missions.store') }}">
    @csrf

    <div class="mb-3">
        <label class="form-label">Titre</label>
        <input type="text" name="title" class="form-control" value="{{ old('title') }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control" rows="4">{{ old('description') }}</textarea>
    </div>

    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Budget minimum</label>
            <input type="number" name="budget_min" class="form-control" value="{{ old('budget_min') }}">
        </div>

        <div class="col-md-6 mb-3">
            <label class="form-label">Budget maximum</label>
            <input type="number" name="budget_max" class="form-control" value="{{ old('budget_max') }}">
        </div>
    </div>

    <div class="mb-3">
        <label class="form-label">Date limite</label>
        <input type="date" name="date_limit" class="form-control" value="{{ old('date_limit') }}">
    </div>

    <button class="btn btn-success">
        Enregistrer
    </button>
</form>
@endsection
