@extends('layouts.guests')

@section('content')

<section class="charts">

    <div class="content">

        <h1>Your apartment statistics</h1>
        <p>Over here you find the average views and messages that you apartment had has during the past 10 years divided by months</p>

        <div class="stats-title">


        </div>

        <div class="stats">
            <div class="stats-box">
                <h2>Views</h2>
                <canvas id="chartjs-0"></canvas>
            </div>
            <div class="stats-box">
                <h2>Messages</h2>
                <canvas id="myChart"></canvas>
            </div>
        </div>
        
    </div>

</section>

@endsection