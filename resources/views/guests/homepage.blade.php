@extends('layouts.guests')

@section('content')
    <section id="jumbotron-home">
      <div class="jumbo-home jumbotron-fluid">
        <div class="container">
          <div class=" info-jumbo">
              <h1 class="display-4">BoolBnB</h1>
              <p class="lead">The website of your dream</p>
              <a class="btn btn-outline-primary " href="">Cerca un appartamento</a>

          </div>
        </div>
      </div>
    </section>
    <section class="container-fluid" id="sponsorizations">
      
        <div class="row pt-5">
          <div class="col-10 offset-1">
          <div class="border rounded sponsored">
            TEST SPONSORSHIPS
          </div>
        </div>
        </div>
      
      
    </div>
      {{-- @foreach ($apartments as $apartment)
          
      @endforeach --}}
    </section>
@endsection