@extends('layouts.guests')

@section('content')
<div id="error-500" class="cotainer-fluid">


    <div class="message">
        <h1 class="py-5">500</h1>
        <h3>Server Error</h3>
        <h2>It's not you, it's me.</h2>
        <!-- use window.history.back(); to go back -->
        <a href="{{route('homepage')}}">Go Back</a>
    </div>
</div>
@endsection