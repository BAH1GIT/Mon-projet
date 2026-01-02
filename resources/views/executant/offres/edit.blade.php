@extends('executant.layout')

@section('content')
    <div class="container">
        <h2>Modifier l’Offre</h2>

       

        <form action="{{ route('executant.offres.update',$offre->id) }}" method="POST">
            @csrf
            @method('PUT')

            <input type="hidden" name="executant_id" value="{{ auth()->id() }}">
            <div class="row mt-2 ">
                <div class="card mb-3 col-6 ">
                    <div class=" mb-3">
                        <label class="form-label"><strong>Mission</strong></label>
                        <p class="form-control">{{$offre->mission->title }}</p>
                        <input type="hidden" name="mission_id" value="{{ $offre->mission->id }} ">
                        @error('mission_id')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class=" mb-3">
                        <label class="form-label"><strong>Budget MAX</strong></label>
                        <input type="text" name="montant" class="form-control" min="1"
                            value="{{ $offre->mission->budget_max }}    ">
                    </div>
                </div>

                <div class="card mb-3 col-6">

                    <div class="mb-3">
                        <label class="form-label">Montant de l'offre </label>
                        <input type="text" name="montant" value="{{ $offre->montant }}" class="form-control" min="1" required>
                        @error('montant')
                            <small class="text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label">Message descriptif</label>
                        <textarea name="message" class="form-control">{{ $offre->message }}</textarea>
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end me-4">
                <button class="btn btn-outline-primary me-2">Mettre à jour</button>
                <a href="{{ route('executant.offres.index') }}" class="btn btn-outline-secondary">
                    Retour
                </a>
            </div>

        </form>
    </div>
@endsection
