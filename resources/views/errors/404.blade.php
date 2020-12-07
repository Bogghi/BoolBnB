@extends('layouts.guests')

@section('content')
<div id="error-500" class="cotainer-fluid">


    <div class="message">
        <h1 class="py-5">404</h1>
        <h3>Something went wrong </h3>
        <h2>It's you, not me.</h2>
        <!-- use window.history.back(); to go back -->
        <a href="{{route('homepage')}}">Go Back</a>
    </div>
</div>
@endsection