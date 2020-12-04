@extends('layouts.guests')

@section('content')

    {{-- Apartment sponsorization --}}
    <section id="sponsorizations" class="py-5 ">
        <h2 class="text-center mb-5 text-white">Sponsored</h2>
        <div  class="container-fluid d-flex">
          <div id="test" class="container-fluid d-flex">
            @foreach ($sponsored_apartments as $apartment)
            <?php
            $image = $apartment->cover_image;
            $pos = strpos($image, "placeholder");          
            ?> 
            <?php if ($pos === false) {?>
              <div class="border rounded d-flex flex-shrink-0 sponsored-apartment" style="background-image: url({{asset('storage/'.$apartment->cover_image)}})"></div>
            <?php } else {?>
              <div class="border rounded d-flex flex-shrink-0 sponsored-apartment" style="background-image: url({{$apartment->cover_image}})"></div>    
              <?php }?>
                
            @endforeach
           
          </div>
          <span id="prev" class="arrow prev "><i class="fas fa-angle-left"></i></span>
          <span id="next" class="arrow next "><i class="fas fa-angle-right"></i></span>

        </div>
      

    </section>

    {{-- Apartment mix --}}
    <section class="pt-5 bg-ligth">
      <h2 class="text-center mb-5">Our Apartments</h2>
      
  </section>

    {{-- Developer pics team --}}
    <section id="developers">
        <div class="container">
            <div class="developer-container mx-auto py-5">
                <h2 class="text-center text-white mb-4">Our Team</h2>
                <div class="developer d-flex justify-content-center ">

                    <div class="pic d-flex flex-column">
                        <img class="img-responsive footer-img rounded-circle border" src="https://via.placeholder.com/300"
                            alt="">
                        <a class="text-center pt-3" href="#"> <span><i
                                    class="fab fa-linkedin-in custom-social rounded-circle"></i></span></a>
                    </div>

                    <div class="pic d-flex flex-column">
                        <img class="img-responsive footer-img rounded-circle border" src="https://via.placeholder.com/300"
                            alt="">
                        <a class="text-center pt-3" href="#"> <span><i
                                    class="fab fa-linkedin-in custom-social rounded-circle"></i></span></a>
                    </div>

                    <div class="pic d-flex flex-column">
                        <img class="img-responsive footer-img rounded-circle border" src="https://via.placeholder.com/300"
                            alt="">
                        <a class="text-center pt-3" href="#"> <span><i
                                    class="fab fa-linkedin-in custom-social rounded-circle"></i></span></a>
                    </div>

                    <div class="pic d-flex flex-column">
                        <img class="img-responsive footer-img rounded-circle border" src="https://via.placeholder.com/300"
                            alt="">
                        <a class="text-center pt-3" href="#"> <span><i
                                    class="fab fa-linkedin-in custom-social rounded-circle"></i></span></a>
                    </div>

                    <div class="pic d-flex flex-column">
                        <img class="img-responsive footer-img rounded-circle border" src="https://via.placeholder.com/300"
                            alt="">
                        <a class="text-center pt-3" href="#"> <span><i class="fab fa-linkedin-in custom-social rounded-circle"></i></span></a>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
