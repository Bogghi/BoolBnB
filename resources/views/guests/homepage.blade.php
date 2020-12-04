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


     {{-- Cities mix --}}
     <section class="pt-5 bg-ligth container-fluid">
        <h2 class="text-center mb-5">Best Cities</h2>
        <div class="row">
            {{-- box cities --}}
            <div class="col-lg-2 col-md-4 col-6 text-center">
                <h2>Parigi</h2>                
                <a  href="#">
                    <div class="box-cities" style="background-image: url(http://www.competitiontravel.it/wp-content/uploads/2014/09/Parigi-2-1024x683.jpg)">
                    </div>
                </a> 
            </div>

            <div class="col-lg-2 col-md-4 col-6 text-center">
                <h2>Roma</h2>                
                <a  href="#">
                    <div class="box-cities" style="background-image: url(https://www.fodors.com/wp-content/uploads/2018/10/HERO_UltimateRome_Hero_shutterstock789412159.jpg)">
                    </div>
                </a> 
            </div>
            
            <div class="col-lg-2 col-md-4 col-6 text-center">
                <h2>Londra</h2>                
                <a  href="#">
                    <div class="box-cities" style="background-image: url(https://lh3.googleusercontent.com/proxy/b-7H2WubUDt70ycwlYPDPDo0EpdmHfIDPPLsvnpQgChscpS_1P4AdmAgNtBx7gfAz0VzrHIxomwUWObz3LNcjAy8enyHEZSsmu2dxbhN9TRR0IQIIxGS2Fsl3xkRxP0J6MISWZAcYS29RHOVqFGeotZSggsFJXQn7GYsw_XY8OA6yQp8qDWazoE6jw)">
                    </div>
                </a> 
            </div>
            <div class="col-lg-2 col-md-4 col-6 text-center">
                <h2>Barcellona</h2>                
                <a  href="#">
                    <div class="box-cities" style="background-image: url(https://www.voglioviverecosi.com/wp-content/uploads/2019/09/LAVORO-BARCELLONA-1900x1080.jpg)">
                    </div>
                </a> 
            </div>
            <div class="col-lg-2 col-md-4 col-6 text-center">
                <h2>Berlino</h2>                
                <a  href="#">
                    <div class="box-cities" style="background-image: url(https://www.robintur.it/img/viaggi/germania/image-thumb__6491__galleryCarousel/germania-berlino-porta-di-brandeburgo~-~300w.pjpeg)">
                    </div>
                </a> 
            </div>
            <div class="col-lg-2 col-md-4 col-6 text-center">
                <h2>Vienna</h2>                
                <a  href="#">
                    <div class="box-cities" style="background-image: url(https://www.10cose.it/wp-content/uploads/2015/11/vienna-696x456.jpg)">
                    </div>
                </a> 
            </div>


        </div>

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
