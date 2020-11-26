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
      
          <div class="container image-sponsored ml-5 pt-5">
              @foreach ($sponsored_apartments as $apartments)

              <?php
              $image = $apartments->cover_image;
              $pos = strpos($image, "placeholder");
    
              ?> 
              
              <div class="border mr-5 d-flex rounded sponsored">
                <?php if ($pos === false) {?>
                  <img class="responsive-image" src=" {{asset('storage/'.$image)}}" alt="image">
      
                <?php } else {?>
                    <img class="responsive-image" src="{{$apartments->cover_image}}" alt="image">
              </div>
              <?php }?>

              @endforeach
            </div>
    </section>
@endsection