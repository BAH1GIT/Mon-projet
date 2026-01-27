@extends('client.layout')
@section('content')
    <div class="row mt-3 align-items-stretch">
        <div class="col-12 col-md-3 d-flex ">
            <div class="card bg-primary text-white d-flex align-items-center mb-3 h-100 w-100">
                <div class="card-body">
                    <h6 class="text-center">Nombres de mission</h6>
                    <h2 class="text-center h3 mb-0">{{ $mission }}</h2>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-3 d-flex  ">
            <div class="card bg-info text-white d-flex align-items-center mb-3 h-100 w-100">
                <div class="card-body">
                    <h6 class="text-center">Nombres de mission en cours</h6>
                    <h2 class="text-center h3 mb-0">{{ $missionEnCour }}</h2>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 ">
            <div class=" ">
                {{-- <div class="col-6">
                    <div class="row"> --}}
                <div class="row mb-2">

                    <div class="col-6">
                        <div class="card bg-success text-white flex-fill ">
                            <div class="card-body">
                                <h6 class="text-center">Offre Accepter</h6>
                                <h2 class="text-center h3 mb-0">{{ $offreAccepter }}</h2>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="card bg-warning text-white flex-fill ">
                            <div class="card-body">
                                <h6 class="text-center">Offre en attente</h6>
                                <h2 class="text-center h3 mb-0">{{ $offreEnAttente }}</h2>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">

                <div class="col-6">
                    <div class="card bg-secondary text-white flex-fill ">
                        <div class="card-body">
                            <h6 class="text-center">Mission avec 0 offre</h6>
                            <h2 class="text-center h3 mb-0">{{ $missionSansOffre }}</h2>

                        </div>
                    </div>
                </div>
                <div class="col-6">
                    <div class="card bg-danger text-white flex-fill ">
                        <div class="card-body">
                            <h6 class="text-center">Offre refuser</h6>
                            <h2 class="text-center h3 mb-0">{{ $offreRefuser }}</h2>
                        </div>
                    </div>
                </div>
                {{-- </div>

                </div> --}}
                {{-- <div class="col-6"></div> --}}
            </div>

        </div>

    </div>
@endsection
