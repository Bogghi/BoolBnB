@extends('layouts.guests')

@section('content')
    <section class="result">
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
                <div class="result">

                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block " id="map">
                mappa
            </div>
        </div>
    </section>
@endsection