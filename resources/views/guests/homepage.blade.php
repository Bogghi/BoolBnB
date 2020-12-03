@extends('layouts.guests')

@section('content')

    {{-- Apartment sponsorization --}}
    <section id="sponsorizations" class="py-5 ">
        <h2 class="text-center mb-5 text-white">Sponsored</h2>
        <div class="container">
            <div id="carouselExampleIndicators" class="carousel slide" data-pause="carousel">
                <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner">
                <div class="carousel-item active">
                    <div class="d-flex container flex-wrap justify-content-space-between" id="sponsor">
            
                        {{-- apartment with control if img is storaged in db else img default --}}                
                        @for ($i = 0; $i < 8 ; $i++)
                            <?php                  
                            $image = $sponsored_apartments[$i]->cover_image;
                            $pos = strpos($image, "placeholder");
                            ?>
                        
                            <?php if ($pos === false) {?>
                            <a href="{{route('admin.apartment.show', $sponsored_apartments)}}">
                                <div class="sponsored-item" style="background-image: url({{asset('storage/'.$sponsored_apartments[$i]->cover_image)}})">
                                    {{-- Info Apartment --}}
                                    <h5 id="hover-title">{{$sponsored_apartments[$i]->title}}Prova titolo</h5>                     
                                </div>
                            </a>
                            <?php } else {?>
                            <a href="{{route('admin.apartment.show', $sponsored_apartments)}}">
                                 <div class="sponsored-item" style="background-image: url({{$sponsored_apartments[$i]->cover_image}})">
                                    {{-- Info Apartment --}}
                                    <h5 id="hover-title" class="p-3">{{$sponsored_apartments[$i]->title}}</h5>
                                </div>
                             </a>
                            <?php }?>
                        @endfor
            
                    </div>
                </div>
                <div class="carousel-item">
                   <div class="d-flex container flex-wrap justify-content-space-between" id="sponsor">
            
                        {{-- apartment with control if img is storaged in db else img default --}}                
                        @for ($i = 0; $i < 8 ; $i++)
                            <?php                  
                            $image = $sponsored_apartments[$i]->cover_image;
                            $pos = strpos($image, "placeholder");
                            ?>
                        
                            <?php if ($pos === false) {?>
                            <a href="{{route('admin.apartment.show', $sponsored_apartments)}}">
                                <div class="sponsored-item" style="background-image: url({{asset('storage/'.$sponsored_apartments[$i]->cover_image)}})">
                                    {{-- Info Apartment --}}
                                    <h5 id="hover-title">{{$sponsored_apartments[$i]->title}}Prova titolo</h5>                     
                                </div>
                            </a>
                            <?php } else {?>
                            <a href="{{route('admin.apartment.show', $sponsored_apartments)}}">
                                 <div class="sponsored-item" style="background-image: url({{$sponsored_apartments[$i]->cover_image}})">
                                    {{-- Info Apartment --}}
                                    <h5 id="hover-title" class="p-3">{{$sponsored_apartments[$i]->title}}</h5>
                                </div>
                             </a>
                            <?php }?>
                        @endfor
            
                    </div>
                </div>
                <div class="carousel-item">
                   <div class="d-flex container flex-wrap justify-content-space-between" id="sponsor">
            
                        {{-- apartment with control if img is storaged in db else img default --}}                
                        @for ($i = 0; $i < 8 ; $i++)
                            <?php                  
                            $image = $sponsored_apartments[$i]->cover_image;
                            $pos = strpos($image, "placeholder");
                            ?>
                        
                            <?php if ($pos === false) {?>
                            <a href="{{route('admin.apartment.show', $sponsored_apartments)}}">
                                <div class="sponsored-item" style="background-image: url({{asset('storage/'.$sponsored_apartments[$i]->cover_image)}})">
                                    {{-- Info Apartment --}}
                                    <h5 id="hover-title">{{$sponsored_apartments[$i]->title}}Prova titolo</h5>                     
                                </div>
                            </a>
                            <?php } else {?>
                            <a href="{{route('admin.apartment.show', $sponsored_apartments)}}">
                                 <div class="sponsored-item" style="background-image: url({{$sponsored_apartments[$i]->cover_image}})">
                                    {{-- Info Apartment --}}
                                    <h5 id="hover-title" class="p-3">{{$sponsored_apartments[$i]->title}}</h5>
                                </div>
                             </a>
                            <?php }?>
                        @endfor
            
                    </div>
                </div>
                </div>
            </div>
        </div>

        
          {{-- buttom sx --}}
          <a class="angle prev" id="scroll-click" href="#carouselExampleIndicators" role="button" data-slide="prev"><i class="fas fa-angle-left"></i></a>
       
          {{-- buttom dx --}}
          <a class="angle next" href="#carouselExampleIndicators" role="button" data-slide="next"><i class="fas fa-angle-right"></i></a>
       

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
