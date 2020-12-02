{{-- Page view list apartment of admin --}}

@extends('layouts.guests')

@section('content')
    <div class="container margin-top ">
        <h1 class="pl-3 title-pers pt-3">Your Apartments:</h1>

        {{-- Call to apartment's table and stamp apartment list of admin --}}
        @foreach ($apartments as $apartment)

            <div id="admin-index" class="container-fluid">

                <div class="row border-bottom">

                    <?php
                        $image = $apartment->cover_image;
                        $pos = strpos($image, "placeholder");          
                    ?> 

                    {{-- Cover Apartment --}}
                    <?php if ($pos === false) {?>
                    <div class="col-12 col-md-2 p-3 d-flex rounded-personalized mt-4" style="background-image: url({{asset('storage/'.$apartment->cover_image)}})"></div>
                    <?php } else {?>
                    <div class="col-12 col-md-2 p-3 d-flex rounded-personalized mt-4" style="background-image: url({{$apartment->cover_image}})"></div>    
                    <?php }?>
                    
                   
                    {{-- Description Apartments --}}
                    <div class="col-12 col-md-10">

                        {{-- Description --}}
                        <div class="card-body">
                            <h5 class="card-title">{{$apartment->title}}</h5>
                            
                            <p class="card-text">{{$apartment->description}}</p>
                            
                            <p class="card-text"><small class="text-muted">Created on {{$apartment->created_at->format('d-m-Y')}}.</small></p>
                        </div>
                        {{-- {{-- bottom for link pages --}}
                        <div  class="d-flex flex-wrap link-personalized mb-1">
                            <a href="{{route('admin.apartment.show', $apartment)}}" class="btn-personalized btn mr-2 mb-2">Show</a>
                            <a href="{{route('admin.apartment.edit', $apartment)}}" class="btn-personalized btn mr-2 mb-2">Edit</a>
                            <a href="{{route('admin.statistics',$apartment->id)}}" class="btn-personalized btn mr-2 mb-2">Statistic</a>
                            <a href="{{route('admin.sponsorization.create', ["id"=>$apartment->id])}}" class="btn-personalized btn mr-2 mb-2">Sponsorization</a>
                        </div>

                    </div>
                </div>

            </div>

        @endforeach


    </div>
@endsection
