{{-- Page view list apartment of admin --}}

@extends('layouts.guests')

@section('content')
    <div class="container margin-top ">
        <h1>Your Apartments:</h1>

        {{-- Call to apartment's table and stamp apartment list of admin --}}
        @foreach ($apartments as $apartment)

            <div id="admin-index" class="container-fluid">

                <div class="row shadow bg-light border-bottom">

                    <?php
                        $image = $apartment->cover_image;
                        $pos = strpos($image, "placeholder");          
                    ?> 

                    {{-- Cover Apartment --}}
                    <div class="col-md-3 p-3 d-flex">
                        <?php if ($pos === false) {?>
                            <img class="align-items-center card-img rounded-personalized my-2" src="{{asset('storage/'.$image)}}" alt="image">
                
                            <?php } else {?>
                                <img class="align-items-center card-img rounded-personalized my-2" src="{{$apartment->cover_image}}" alt="image">
                        <?php }?>
                    </div>
                   
                    {{-- Description Apartments --}}
                    <div class="col-md-9">

                        {{-- Description --}}
                        <div class="card-body">
                            <h5 class="card-title">{{$apartment->title}}</h5>
                            
                            <p class="card-text">{{$apartment->description}}</p>
                            
                            <p class="card-text"><small class="text-muted">Created on {{$apartment->created_at->format('d-m-Y')}}.</small></p>
                        </div>
                        {{-- {{-- bottom for link pages --}}
                        <div  class="d-flex flex-wrap justify-content-end align-items-end   mb-1">
                            <a href="{{route('admin.apartment.show', $apartment)}}" class="btn-personalized btn mr-2 mb-2">Show</a>
                            <a href="{{route('admin.apartment.edit', $apartment)}}" class="btn-personalized btn mr-2 mb-2">Edit</a>
                            <a href="#" class="btn-personalized btn mr-2 mb-2">Statistic</a>
                            <a href="{{route('admin.sponsorization.create', ["id"=>$apartment->id])}}" class="btn-personalized btn mr-2 mb-2">Sponsorization</a>
                        </div>

                    </div>
                </div>

            </div>

        @endforeach


    </div>
@endsection
