@extends('layouts.guests')

@section('content')
    <section class="result container-fluid">
        <div class="row">
            <div class="col-lg-5">
                <div class="filter">
                    {{-- @foreach ($services as $service)
                        <div class="form-check form-check-inline">
                            <input class="form-check-input services" type="checkbox" id="{{$service->id}}" name="services[]" value="{{$service->id}}">
                            <label class="form-check-label" for="{{$service->id}}">{{$service->name}}</label>
                        </div>
                    @endforeach --}}
                    <h4>Accommodation in the arena</h4>
                    <a href="#">More filter</a>
                </div>
                <div class="filter-option">
                    <div class="static-options">
                        <div class="content">
                            <label for="rooms_number">Rooms</label>
                            <input name="rooms_number" id="rooms_number" class="form-control" type="number" placeholder="0">
                        </div>
                        <div class="content">
                            <label for="beds_number">Beds</label>
                            <input name="beds_number" id="beds_number" class="form-control" type="number" placeholder="0">
                        </div>
                        <div class="content">
                            <label for="radius">Radius</label>
                            <input name="radius" value="20" id="radius" class="form-control" type="number" placeholder="20">
                        </div>
                    </div>
                    <div class="label-options">
                        <span>Wifi</span>
                        <span>Parking</span>
                        <span>Pool</span>
                        <span>reception</span>
                        <span>Sauna</span>
                        <span>Sea view</span>
                    </div>
                </div>


                <div class="results-wrapper">
                  <div class="apartment-card">
                    <div class="image-wrapper" style="background-image: url('https://blog.unioneprofessionisti.com/wp-content/uploads/2019/11/quali-sono-le-caratteristiche-e-i-benefici-del-bosco-verticale-bioedilizia-1024x1024.jpg'); background-size: cover; background-position: center;"></div>
                    <div class="info-wrapper">
                      <h4>Titolo Appartamento</h4>
                      <p>Indirizzo appartamento</p>
                      <ul>
                        <li><strong>Stanze:</strong> 4</li>
                        <li><strong>Bagni:</strong> 2</li>
                        <li><strong>Letti:</strong> 3</li>
                        <li><strong>mq:</strong> 120</li>
                      </ul>

                    </div>
                    <div class="button-wrapper">
                      <div class="badge">Superhost</div>
                      <a href="#" class="btn-details">Dettagli</a>
                    </div>
                  </div>
                </div>
            </div>


            <div class="col-lg-7 d-none d-lg-block " id="map">
                mappa
            </div>
        </div>
    </section>
@endsection