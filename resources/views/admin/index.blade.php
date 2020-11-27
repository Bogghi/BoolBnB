{{-- Page view list apartment of admin --}}

@extends('layouts.guests')

@section('content')
    <div class="container">
        <h1>Your Apartments:</h1>

        {{-- Call to apartment's table and stamp apartment list of admin --}}
        @foreach ($apartments as $apartment)

            <div class="mb-3" style="width: 100%;">

                <div class="row shadow p-3 mb-5 bg-light rounded bordergreen">

                    <?php
                        $image = $apartment->cover_image;
                        $pos = strpos($image, "placeholder");          
                    ?> 

                    {{-- Cover Apartment --}}
                    <div class="col-md-4 mx-auto my-auto">
                        <?php if ($pos === false) {?>
                            <img class="card-img" src="{{asset('storage/'.$image)}}" alt="image">
                
                            <?php } else {?>
                                <img class="card-img" src="{{$apartment->cover_image}}" alt="image">
                        <?php }?>
                    </div>
                   
                    {{-- Description Apartments --}}
                    <div class="col-md-8">

                        {{-- Description --}}
                        <div class="card-body">
                            <h5 class="card-title">{{$apartment->title}}</h5>
                            
                            <p class="card-text">{{$apartment->description}}</p>
                            
                            <p class="card-text"><small class="text-muted">Created on {{$apartment->created_at->format('d-m-Y')}}.</small></p>
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
