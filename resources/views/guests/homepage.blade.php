@extends('layouts.guests')

@section('content')
    {{-- Jumbotron with searchbar --}}
    <section id="jumbotron-home">
        <div class="jumbo-home jumbotron-fluid">
            <div class="container">
                <div class="col-sm-6 mx-auto">
                    <div class="info-jumbo text-center">
                        <h1 class="display-4">BoolBnB</h1>
                        <p class="lead">The website of your dreams</p>
                    </div>
                    <div class="searchbar mt-5">
                        <form class="form-inline d-flex justify-content-center md-form form-sm form-color mt-2"
                            action="{{ route('search') }}" method="POST">
                            @csrf
                            @method("POST")
                            <div id="search-input"></div>
                            <input type="submit" value="SEARCH">
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Apartment sponsorization --}}
    <section id="sponsorizations" class="py-5 ">
        <h2 class="text-center mb-5 text-white">Sponsored</h2>

        <div class="d-flex container box-sponsor" id="sponsor">
            
            {{-- apartment with control if img is storaged in db else img default --}}                
            @foreach ($sponsored_apartments as $apartments)
                <?php                  
                $image = $apartments->cover_image;
                $pos = strpos($image, "placeholder");
                ?>
            
                <?php if ($pos === false) {?>
                <a href="{{route('admin.apartment.show', $apartments)}}">
                    <div class="sponsored-item" style="background-image: url({{asset('storage/'.$apartments->cover_image)}})">
                        {{-- Info Apartment --}}
                        <h5 id="hover-title">{{$apartments->titl}}Prova titolo</h5>                     
                    </div>
                </a>
                <?php } else {?>
                <a href="{{route('admin.apartment.show', $apartments)}}">
                     <div class="sponsored-item" style="background-image: url({{$apartments->cover_image}})">
                        {{-- Info Apartment --}}
                        <h5 id="hover-title" class="p-3">{{$apartments->title}}</h5>
                    </div>
                 </a>
                <?php }?>
            @endforeach 

                        
            
        
        </div>

        
          {{-- buttom sx --}}
          <div class="angle prev" id="scroll-click"><i class="fas fa-angle-left"></i></div>
       
          {{-- buttom dx --}}
          <div class="angle next"><i class="fas fa-angle-right"></i></div>
       

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
