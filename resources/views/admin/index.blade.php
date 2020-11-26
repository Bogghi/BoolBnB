{{-- Page view list apartment of admin --}}

@extends('layouts.guests')

@section('content')
    <div class="container">
        <h1>Your Apartments:</h1>

        {{-- Call to apartment's table and stamp apartment list of admin --}}
        @foreach ($apartments as $apartment)

            <div class="mb-3" style="width: 100%;">

                <div class="row shadow p-3 mb-5 bg-light rounded bordergreen">

                    {{-- Cover Apartment --}}
                    <div class="col-md-2 mx-auto my-auto">
                        <img class="card-img" style="width: 100%" src="{{asset("storage/" . $apartment->cover_image)}}" alt="{{$apartment->title}}">
                    </div>

                    {{-- Description Apartments --}}
                    <div class="col-md-8">

                        {{-- Description --}}
                        <div class="card-body">
                            <h5 class="card-title">Title Apartmet</h5>
                            {{-- {{$apartment->title}} --}}
                            <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                            {{-- {{$apartment->description}}  --}}
                            <p class="card-text"><small class="text-muted">Created 30 mins ago. {{$apartment->created_id}}</small></p>
                        </div>


                        {{-- {{-- bottom for link pages --}}

                       <div  class="d-flex flex-wrap justify-content-end">
                            <a href="{{route('admin.apartment.show', $apartment)}}" class="btn btn-outline-info mr-2 mb-2 btm-link">Show</a>
                            <a href="{{route('admin.apartment.edit', $apartment)}}" class="btn btn-outline-info mr-2 mb-2 btm-link">Edit</a>
                            <a href="#" class="btn btn-outline-info mr-2 mb-2 btm-link">Statistic</a>
                            <a href="{{route('admin.sponsorization.create', ["id"=>$apartment->id])}}" class="btn btn-outline-info mr-2 mb-2 btm-link">Sponsorization</a>
                        </div>

                    </div>
                </div>

            </div>

        @endforeach


    </div>
@endsection
