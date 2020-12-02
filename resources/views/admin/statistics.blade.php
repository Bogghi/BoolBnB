@extends('layouts.guests')

@section('content')

<canvas id="chartjs-0" class="chartjs" width="770" height="385" style="display: block; width: 770px; height: 385px;"></canvas>

<canvas id="myChart" width="400" height="400"></canvas>

<script>

    var ctx = document.getElementById('chartjs-0').getContext('2d');
    var chart = new Chart(ctx, {
        // The type of chart we want to create
        type: 'line',

        // The data for our dataset
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: 'My First dataset',
                borderColor: 'rgb(0, 240, 135)',
                pointBackgroundColor: 'rgb(0, 21, 51)',
                pointRadius: 5,
                fill: 'false',
                data: [0, 10, 5, 2, 20, 30, 45,0, 10, 5, 2, 20, 30, 45]
            }]
        },

        // Configuration options go here
        options: {
            responsive: false
        }
    });

    var ctx = document.getElementById('myChart').getContext('2d');

    Chart.defaults.global.elements.rectangle.backgroundColor = 'rgba(0, 240, 135, 0.2)';
    Chart.defaults.global.elements.rectangle.borderColor = 'rgba(0, 21, 51, 1)';
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Aug','Sep','Oct','Nov','Dec'],
            datasets: [{
                label: '# of Votes',
                data: [12, 10, 3, 5, 2, 3, 12, 10, 3, 5, 2, 3],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            },
            responsive: false
        },
    });

</script>

@endsection