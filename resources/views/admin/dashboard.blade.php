@extends('admin.layout')
@section('content')
    <div class="row mt-3">

        <div class="col-md-3">
            <div class="card bg-primary text-white mb-3">
                <div class="card-body">
                    <h6>Clients</h6>
                    <h2>{{ $client }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-success text-white mb-3">
                <div class="card-body">
                    <h6>Exécutants</h6>
                    <h2>{{ $executant }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-warning text-white mb-3">
                <div class="card-body">
                    <h6>Toutes les missions</h6>
                    <h2>{{ $mission }}</h2>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card bg-info text-white mb-3">
                <div class="card-body">
                    <h6>Terminées</h6>
                    <h2>{{ $terminer }}</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
            <div class="card mt-4">
                <div class="card-header">Mission par mois</div>
                <div class="cad-body">
                    <canvas id="missionChart"></canvas>
                </div>
            </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
const ctx = document.getElementById('missionChart');

new Chart(ctx, {
    type: 'line',
    data: {
        labels: {!! $label !!},
        datasets: [{
            label: 'Missions',
            data: {!! $data !!},
            borderWidth: 2,
            fill: false,
        }]
    },
});
</script>

@endsection
