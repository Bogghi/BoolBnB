@extends('layouts.guests')

@section('content')
    <section class="result container-fluid">
        <div class="row">
            <div class="col-xl-5 col-lg-6">
                <div class="filter">
                    <h6>Accommodation in the area</h6>
                    <a id="more-option">More filter</a>
                    <input type="hidden" value="{{$address}}" id="user-search">  
                </div>
                <div class="filter-option">
                    <div class="static-options">
                        <div class="content">
                            <label for="rooms_number">Min Rooms</label>
                            <input name="rooms_number" id="rooms_number" class="form-control" type="number" placeholder="0" value="2">
                        </div>
                        <div class="content">
                            <label for="beds_number">Min Beds</label>
                            <input name="beds_number" id="beds_number" class="form-control" type="number" placeholder="0" value="1">
                        </div>
                        <div class="content">
                            <label for="radius">Radius</label>
                            <input name="radius" value="20" id="radius" class="form-control" type="number" placeholder="20">
                        </div>
                    </div>
                    <div class="label-options">
                        @foreach ($services as $service)
                            <span id="{{$service->id}}">{{$service->name}}</span>    
                        @endforeach
                    </div>
                </div>

                <div class="results-wrapper">
                    @for ($i = 0; $i < 5 && $i < count($all_sponsorized_apartments); $i++)
                        <?php
                            $image = $all_sponsorized_apartments[$i]->cover_image;
                            $pos = strpos($image, "placeholder");
                        ?>

                        <div class="apartment-card">
                            <div class="image-wrapper">
                                @if ($pos === false)
                                    <img src="{{asset('storage/'.$image)}}" alt="immagine casa">
                                @else
                                    <img src="{{$all_sponsorized_apartments[$i]->cover_image}}" alt="immagine casa">
                                @endif
                            </div>
                            <div class="info-wrapper">
                                <div class="main">
                                    <div class="title">
                                        <h5>{{$all_sponsorized_apartments[$i]->title}}</h5>
                                    </div>
                                    <p class="apartment-address">{{$all_sponsorized_apartments[$i]->address}}</p>
                                    <input type="hidden" value="{{$all_sponsorized_apartments[$i]->longitude}}" class="apartment-lon">
                                    <input type="hidden" value="{{$all_sponsorized_apartments[$i]->latitude}}" class="apartment-lat">
                                </div>
                                <ul>
                                    <li>
                                        <strong>Rooms:</strong> {{$all_sponsorized_apartments[$i]->rooms_number}}
                                    </li>
                                    <li>
                                        <strong>Bathrooms:</strong> {{$all_sponsorized_apartments[$i]->bathrooms_numbers}}
                                    </li>
                                    <li>
                                        <strong>Beds:</strong> {{$all_sponsorized_apartments[$i]->beds_number}}
                                    </li>
                                    <li>
                                        <strong>mq:</strong> {{$all_sponsorized_apartments[$i]->square_meters}}
                                    </li>
                                </ul>
                            </div>
                            <div class="button-wrapper space-between">
                                <div class="badge">Superhost</div>
                                <a href="{{ route("apartment.show", $all_sponsorized_apartments[$i]->id) }}" class="btn-details">Details</a>
                            </div>
                        </div>
                    @endfor
                    @foreach ($apartments as $apartment)

                        <?php
                        $image = $apartment->cover_image;
                        $pos = strpos($image, "placeholder");
                        ?>

                        <div class="apartment-card">
                            <div class="image-wrapper">
                                @if ($pos === false)
                                    <img src="{{asset('storage/'.$image)}}" alt="immagine casa">
                                @else
                                    <img src="{{$apartment->cover_image}}" alt="immagine casa">
                                @endif
                            </div>
                            <div class="info-wrapper">
                                <div class="main">
                                    <div class="title">
                                        <h5>{{$apartment->title}}</h5>
                                    </div>
                                    <p class="apartment-address">{{$apartment->address}}</p>
                                    <input type="hidden" value="{{$apartment->longitude}}" class="apartment-lon">
                                    <input type="hidden" value="{{$apartment->latitude}}" class="apartment-lat">
                                </div>
                                <ul>
                                    <li>
                                        <strong>Rooms:</strong> {{$apartment->rooms_number}}
                                    </li>
                                    <li>
                                        <strong>Bathrooms:</strong> {{$apartment->bathrooms_numbers}}
                                    </li>
                                    <li>
                                        <strong>Beds:</strong> {{$apartment->beds_number}}
                                    </li>
                                    <li>
                                        <strong>mq:</strong> {{$apartment->square_meters}}
                                    </li>
                                </ul>
                            </div>
                            @if (count($apartment->sponsorizations->where('end_date', '>', date('Y-m-d h:i:s'))) == 1)
                                <div class="button-wrapper space-between">
                                    <div class="badge">Superhost</div>
                                    <a href="{{ route("apartment.show", $apartment->id) }}" class="btn-details">Details</a>
                                </div>
                            @else
                                <div class="button-wrapper flex-end">
                                    <a href="{{ route("apartment.show", $apartment->id) }}" class="btn-details">Details</a>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>


            <div class="col-xl-7 col-lg-6 d-none d-lg-block " id="map-container"></div>
        </div>
    </section>
@endsection