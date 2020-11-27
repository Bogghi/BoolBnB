@extends('layouts.guests')

@section('content')
    <section>

        {{-- container pagina --}}
        <div class="container-fluid search-container">

            <div class="row">
                <div class="col-12 col-md-5">
                    <h2 class="text-center py-5">Sponsorized</h2>
                    @for ($i = 0; $i < 5; $i++)
                        
                    
                    <div class="d-flex flex-column">
                            <?php
                                $image = $all_sponsorized_apartments[$i]->cover_image;
                                $pos = strpos($image, "placeholder");
                    
                            ?> 
                        <div class="d-flex border rounded  container-apartment">
                            <?php if ($pos === false) {?>
                            <div class="search-image">
                            <img class="border rounded" width="180px" height="180px" src="{{asset('storage/'.$image)}}" alt="cover">
                            </div>
                            <?php } else {?>
                            <div class="search-image">
                            <img class="border rounded" width="180px" height="180px" src="{{$all_sponsorized_apartments[$i]->cover_image}}" alt="Cover">
                            </div>
                            <?php }?>
                            <div class="info-apartment d-flex flex-column">

                            

                                <h5 class="text-center">{{$all_sponsorized_apartments[$i]->title}}</h5>
                                <p class="pl-2 info-text">{{$all_sponsorized_apartments[$i]->description}}</p>
                                <div class="info-tag d-flex">
                                    <ul class="list-info d-flex">
                                        <li><p> <small> Address: {{$all_sponsorized_apartments[$i]->address}} </small> </p></li>
                                        <li><p> <span><i class="fas fa-circle"></i></span><small> Beds number:  {{$all_sponsorized_apartments[$i]->beds_number}} </small></p></li>
                                        <li><p> <span><i class="fas fa-circle"></i></span><small> Square meters: {{$all_sponsorized_apartments[$i]->square_meters}}</small></p></li>
                                    </ul>
                                        @if ($all_sponsorized_apartments[$i]->sponsorizations[0]->end_date)
                                            <div id="sponsorized">
                                                 <h4><span class="badge badge-success">Superhost</span></h4>
                                                </div>
                                            @else
                                            
                                        @endif 
                                        
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
                                <div class="search-image">
                                <img class="border rounded" width="180px" height="180px" src="{{asset('storage/'.$image)}}" alt="cover">
                                </div>
                                <?php } else {?>
                                <div class="search-image">
                                <img class="border rounded" width="180px" height="180px" src="{{$all_sponsorized_apartments[$i]->cover_image}}" alt="Cover">
                                </div>
                                <?php }?>
                            <div class="info-apartment d-flex flex-column">



                                <h5 class="text-center">{{$apartment->title}}</h5>
                                <p class="pl-2 info-text">{{$apartment->description}}</p>
                                <div class="info-tag d-flex">
                                    <ul class="list-info d-flex">
                                        <li><p><small> Address: {{$apartment->address}}</small> </p></li>
                                        <li><p><span><i class="fas fa-circle"></i></span><small> Beds number:</small>  {{$apartment->beds_number}} </p></li>
                                        <li><p><span><i class="fas fa-circle"></i></span><small> Square meters:</small> {{$apartment->square_meters}}</p></li>
                                    </ul>
                                        @if (count($apartment->sponsorizations->where('end_date', '>', date('Y-m-d h:m:s'))) == 1)
                                        <div id="sponsorized">
                                             <h4><span class="badge badge-success ">Superhost</span></h4>
                                            </div>
                                        @else
                                            
                                    @endif 

                                    
                                </div>
                            </div>
                        </div>
                        
                    </div> 
                    @endforeach
                </div>

                <div class="d-none d-sm-block col-md-7">
                    <div id="carouselExampleIndicators" class="carousel slide carousel-pers" data-ride="carousel">
                        <ol class="carousel-indicators">
                          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                          <div class="carousel-item active">
                            <img class="d-block w-100" src="https://www.nightcity.love/build/images/districts/city-center-2c2defef.jpg" alt="First slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="https://www.nightcity.love/build/images/og-share-3248bc34.jpg" alt="Second slide">
                          </div>
                          <div class="carousel-item">
                            <img class="d-block w-100" src="https://www.nightcity.love/build/images/metro2-26b4938a.jpg" alt="Third slide">
                          </div>
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                          <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="sr-only">Next</span>
                        </a>
                      </div>
                </div>

            </div>

        </div>
        {{-- fine container pagina --}}
    </section>  
@endsection