@extends('layouts.guests')

@section('content')
    <section>

        {{-- container pagina --}}
        <div class="container-fluid search-container">

            <div class="row">
                <div class="col-12 col-md-7">
                    <h2 class="text-center py-5">Sponsorized</h2>
                    @for ($i = 0; $i < 5; $i++)
                        
                    
                    <div class="d-flex flex-column">
                            <?php
                                $image = $all_sponsorized_apartments[$i]->cover_image;
                                $pos = strpos($image, "placeholder");
                    
                            ?> 
                        <div class="d-flex border rounded container-apartment">
                            <?php if ($pos === false) {?>

                            <img class="border rounded search-image" src="{{asset('storage/'.$image)}}" alt="cover">
                            
                            <?php } else {?>
                                
                            <img class="border rounded search-image" src="{{$all_sponsorized_apartments[$i]->cover_image}}" alt="Cover">
                            <?php }?>
                            <div class="info-apartment d-flex flex-column">

                            

                                <h4 class="text-center">{{$all_sponsorized_apartments[$i]->title}}</h4>
                                <p class="pl-2 info-text"><small>{{$all_sponsorized_apartments[$i]->description}}</small></p>
                                <div class="info-tag d-flex">
                                    <ul class="list-info">
                                        <li><p> Address: {{$all_sponsorized_apartments[$i]->address}} </p></li>
                                        <li><p> Beds number:  {{$all_sponsorized_apartments[$i]->beds_number}} </p></li>
                                        <li><p> Square meters: {{$all_sponsorized_apartments[$i]->square_meters}}</p></li>
                                        {{-- <li><p>{{$all_sponsorized_apartments[$i]->sponsorizations}}</p></li> --}}
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    @endfor
                    <h2 class="text-center py-5">Risultati</h2>
                    @foreach ($apartments as $apartment)
                        
                       <div class="d-flex flex-column">
                            <?php
                                $image = $apartment->cover_image;
                                $pos = strpos($image, "placeholder");
                    
                            ?> 
                        <div class="d-flex border rounded container-apartment">
                            <?php if ($pos === false) {?>

                            <img class="border rounded search-image" src="{{asset('storage/'.$image)}}" alt="cover">
                            
                            <?php } else {?>
                                
                            <img class="border rounded search-image" src="{{$apartment->cover_image}}" alt="Cover">
                            <?php }?>
                            <div class="info-apartment d-flex flex-column">

                            

                                <h4 class="text-center">{{$apartment->title}}</h4>
                                <p class="pl-2 info-text"><small>{{$apartment->description}}</small></p>
                                <div class="info-tag d-flex">
                                    <ul class="list-info">
                                        <li><p> Address: {{$apartment->address}} </p></li>
                                        <li><p> Beds number:  {{$apartment->beds_number}} </p></li>
                                        <li><p> Square meters: {{$apartment->square_meters}}</p></li>
                                        
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                    @endforeach
                </div>
                

            </div>

        </div>
        {{-- fine container pagina --}}
    </section>  
@endsection