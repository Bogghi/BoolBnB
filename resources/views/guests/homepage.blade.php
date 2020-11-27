@extends('layouts.guests')

@section('content')
    <section id="jumbotron-home">
      <div class="jumbo-home jumbotron-fluid">
        <div class="container">
          <div class="col-sm-6 mx-auto">
            <div class="info-jumbo text-center">
              <h1 class="display-4">BoolBnB</h1>
              <p class="lead">The website of your dreams</p>
            </div>
            <div class="searchbar mt-5">
              <form class="form-inline d-flex justify-content-center md-form form-sm form-color mt-2" method="GET">
                @csrf
                @method("GET")
                <div id="search-input"></div>
              </form>
            </div>
          </div>
          
        </div>
      </div>
    </section>
    <section id="sponsorizations" class="pt-4">
      <h2 class="text-center mb-5">Appartamenti in evidenza</h2>
      <div class="container-fluid d-flex flex-no-wrap">
        @foreach ($sponsored_apartments as $apartment)
        <div class="sponsored-item flex-shrink-0" style="background-image: url('https://dfdnews.com/uploads/istockphoto-1026205392-612x612.jpg')">
        </div>    
        @endforeach
        
      </div>
          
    </section>
@endsection