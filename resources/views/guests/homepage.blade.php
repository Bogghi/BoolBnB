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
    <section id="sponsorizations" class="pt-5">
      <h2 class="text-center mb-5">Appartamenti in evidenza</h2>
      <div class="container-fluid d-flex flex-no-wrap pb-4">
        @foreach ($sponsored_apartments as $apartment)
        <div class="sponsored-item flex-shrink-0" style="background-image: url('https://dfdnews.com/uploads/istockphoto-1026205392-612x612.jpg')">
        </div>    
        @endforeach
        
      </div>
          
    </section>
    <section id="developers">
      <div class="container">
        <div class="developer-container mx-auto py-5">
          <h2 class="text-center text-white mb-4">Il nostro team</h2>
          <div class="developer d-flex justify-content-center ">
            <div class="pic d-flex flex-column">
              <img class="img-responsive footer-img rounded-circle border" src="https://via.placeholder.com/300" alt="">
              <a class="text-center pt-3" href="#"> <span><i class="fab fa-linkedin-in custom-social rounded-circle"></i></span></a>
            </div>
    
            <div class="pic d-flex flex-column">
              <img class="img-responsive footer-img rounded-circle border" src="https://via.placeholder.com/300" alt="">
              <a class="text-center pt-3" href="#"> <span><i class="fab fa-linkedin-in custom-social rounded-circle"></i></span></a>
            </div>
    
            <div class="pic d-flex flex-column">
              <img class="img-responsive footer-img rounded-circle border" src="https://via.placeholder.com/300" alt="">
              <a class="text-center pt-3" href="#"> <span><i class="fab fa-linkedin-in custom-social rounded-circle"></i></span></a>
            </div>
            <div class="pic d-flex flex-column">
              <img class="img-responsive footer-img rounded-circle border" src="https://via.placeholder.com/300" alt="">
              <a class="text-center pt-3" href="#"> <span><i class="fab fa-linkedin-in custom-social rounded-circle"></i></span></a>
            </div>
            <div class="pic d-flex flex-column">
              <img class="img-responsive footer-img rounded-circle border" src="https://via.placeholder.com/300" alt="">
              <a class="text-center pt-3" href="#"> <span><i class="fab fa-linkedin-in custom-social rounded-circle"></i></span></a>
            </div>
          </div>
        </div>
      </div>
    </section>
@endsection