@extends('layouts.app')

@section('content')

    <div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm border-0 mb-5">
                <div class="card-header text-center">Hasil Pemilihan
             
                </div>

                <div class="card-body">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                @foreach ($candidates as $r)
                                    <th class="text-center">{{ $r->name }}</th>
                                @endforeach
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                @foreach ($candidates as $r)
                                    <th class="text-center">{{ App\Vote::where('candidate_id', $r->id)->get()->count() }} orang</th>
                                @endforeach
                            </tr>
                        </tbody>
                    </table>

                    <canvas id="ketua_osis" height="280" width="600"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
var url = "{{ url('report/chart') }}";
var candidates = new Array();
var votes = new Array();

$(document).ready(function(){
    $.get(url, function(response){
        var ctx = document.getElementById("ketua_osis").getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: response.names,
                datasets: [{
                    label: 'Hasil Pemilihan',
                    data: response.votes,
                    backgroundColor: [
                        'rgba(255, 99, 132)',
                        'rgba(255, 206, 86)',
                        'rgba(54, 162, 235)',
                    ],
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        }
                    }]
                }
            }
        });
    });
});
</script>
@endsection