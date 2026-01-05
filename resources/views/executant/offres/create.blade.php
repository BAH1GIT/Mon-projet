@extends('executant.layout')

@section('content')
    <div class="container">
        <h2 class="mt-2 text-center">Nouvelle Offre pour la mission</h2>
        <form action="{{ route('executant.offres.store') }}" method="POST">
            @csrf
            <input type="hidden" name="executant_id" value="{{ auth()->id() }}">
            <div class="row mt-2 ">
                <div class="card mb-3 col-6 ">
                    <div class=" mb-3">
                        <label class="form-label"><strong>Mission</strong></label>
                        <p class="form-control">{{ $mission->title }}</p>
                        <input type="hidden" name="mission_id" value="{{ $mission->id }} ">
                        @error('mission_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class=" mb-3">
                        <label class="form-label"><strong>Budget MAX</strong></label>
                        <p class="form-control">{{ $mission->budget_max }}</p>
                        <input type="hidden" name="mission_id" class="form-control" min="1"
                            value="{{ $mission->id }}" readonly>
                    </div>
                </div>

                <div class="card mb-3 col-6">

                    <div class="mb-3">
                        <label class="form-label">Montant de l'offre </label>
                        <input type="text" name="montant" class="form-control" min="1" required>
                        @error('montant')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Message descriptif</label>
                        <textarea name="message" class="form-control"></textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end me-4">
                <button class="btn btn-outline-success">Envoyer l’offre</button>

            </div>

        </form>
    </div>
@endsection
