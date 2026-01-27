@extends('executant.layout')

@section('content')
<div class="container mt-4">

    <div class="row g-3 align-items-stretch">

        {{-- Offres --}}
        <div class="col-12 col-md-4 d-flex">
            <div class="card bg-primary text-white w-100 h-100">
                <div class="card-body text-center">
                    <h6>Total des offres</h6>
                    <h2>{{ $offre }}</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 d-flex">
            <div class="card bg-info text-white w-100 h-100">
                <div class="card-body text-center">
                    <h6>Offres en attente</h6>
                    <h2>{{ $offreEnAttente }}</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 d-flex">
            <div class="card bg-success text-white w-100 h-100">
                <div class="card-body text-center">
                    <h6>Offres acceptées</h6>
                    <h2>{{ $offreAccepter }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row g-3 mt-2 align-items-stretch">

        <div class="col-12 col-md-4 d-flex">
            <div class="card bg-danger text-white w-100 h-100">
                <div class="card-body text-center">
                    <h6>Offres refusées</h6>
                    <h2>{{ $offreRefuser }}</h2>
                </div>
            </div>
        </div>

        {{-- Missions --}}
        <div class="col-12 col-md-4 d-flex">
            <div class="card bg-warning text-white w-100 h-100">
                <div class="card-body text-center">
                    <h6>Missions attribuées</h6>
                    <h2>{{ $missionAttribuer }}</h2>
                </div>
            </div>
        </div>

        <div class="col-12 col-md-4 d-flex">
            <div class="card bg-secondary text-white w-100 h-100">
                <div class="card-body text-center">
                    <h6>Missions en cours</h6>
                    <h2>{{ $missionEnCours }}</h2>
                </div>
            </div>
        </div>

    </div>

    <div class="row g-3 mt-2">

        <div class="col-12 col-md-4 d-flex">
            <div class="card bg-dark text-white w-100 h-100">
                <div class="card-body text-center">
                    <h6>Missions terminées</h6>
                    <h2>{{ $missionTerminer }}</h2>
                </div>
            </div>
        </div>

    </div>

</div>
@endsection
