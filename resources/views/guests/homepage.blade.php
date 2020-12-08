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
                            $pos = strpos($image, "http");
                            ?>
                        
                            <?php if ($pos === false) {?>
                            <a href="{{route('admin.apartment.show', $sponsored_apartments)}}">
                                <div class="sponsored-item" style="background-image: url({{asset('storage/'.$sponsored_apartments[$i]->cover_image)}})">
                                    {{-- Info Apartment --}}
                                    <h5 id="hover-title">{{$sponsored_apartments[$i]->title}}</h5>                     
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
                            $pos = strpos($image, "http");
                            ?>
                        
                            <?php if ($pos === false) {?>
                            <a href="{{route('admin.apartment.show', $sponsored_apartments)}}">
                                <div class="sponsored-item" style="background-image: url({{asset('storage/'.$sponsored_apartments[$i]->cover_image)}})">
                                    {{-- Info Apartment --}}
                                    <h5 id="hover-title">{{$sponsored_apartments[$i]->title}}</h5>                     
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
                            $pos = strpos($image, "http");
                            ?>
                        
                            <?php if ($pos === false) {?>
                            <a href="{{route('admin.apartment.show', $sponsored_apartments)}}">
                                <div class="sponsored-item" style="background-image: url({{asset('storage/'.$sponsored_apartments[$i]->cover_image)}})">
                                    {{-- Info Apartment --}}
                                    <h5 id="hover-title">{{$sponsored_apartments[$i]->title}}</h5>                     
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
     <section class="py-5 mb-5 bg-ligth container-fluid">
        <h2 class="text-center font-xl">Best Cities</h2>
        <div class="row">

            {{-- box cities --}}
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 text-center my-5">
                <h3>Parigi</h3>    
                <form action="{{route('search')}}" method="post">
                    @csrf
                    @method("POST")

                    <input type="hidden" value="parigi" name="search">
                    <button type="submit" class="box-cities mx-auto" style="background-image: url(http://www.competitiontravel.it/wp-content/uploads/2014/09/Parigi-2-1024x683.jpg)"></button>
                </form>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-12 text-center my-5">
                <h3>Roma</h3> 
                <form action="{{route('search')}}" method="post">
                    @csrf
                    @method("POST")

                    <input type="hidden" value="roma" name="search">
                    <button type="submit" class="box-cities mx-auto" style="background-image: url(https://www.fodors.com/wp-content/uploads/2018/10/HERO_UltimateRome_Hero_shutterstock789412159.jpg)"></button>
                </form>             
            </div>
            
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 text-center my-5">
                <h3>Londra</h3> 

                <form action="{{route('search')}}" method="post">
                    @csrf
                    @method("POST")

                    <input type="hidden" value="londra" name="search">
                    <button type="submit" class="box-cities mx-auto" style="background-image: url(https://www.metamorphic.co.uk/wp-content/uploads/2018/05/london-1900x1080.jpg)"></button>
                </form>        
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-12 text-center my-5">
                <h3>Barcellona</h3>
                <form action="{{route('search')}}" method="post">
                    @csrf
                    @method("POST")

                    <input type="hidden" value="barcellona" name="search">
                    <button type="submit" class="box-cities mx-auto" style="background-image: url(https://www.voglioviverecosi.com/wp-content/uploads/2019/09/LAVORO-BARCELLONA-1900x1080.jpg)"></button>
                </form>          
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-12 text-center my-5">
                <h3>Berlino</h3>  
                <form action="{{route('search')}}" method="post">
                    @csrf
                    @method("POST")

                    <input type="hidden" value="berlino" name="search">
                    <button type="submit" class="box-cities mx-auto" style="background-image: url(https://www.robintur.it/img/viaggi/germania/image-thumb__6491__galleryCarousel/germania-berlino-porta-di-brandeburgo~-~300w.pjpeg)"></button>
                </form>          
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-12 text-center my-5">
                <h2>Vienna</h2>
                <form action="{{route('search')}}" method="post">
                    @csrf
                    @method("POST")

                    <input type="hidden" value="vienna" name="search">
                    <button type="submit" class="box-cities mx-auto" style="background-image: url(https://www.10cose.it/wp-content/uploads/2015/11/vienna-696x456.jpg)"></button>
                </form>              
            </div>

        </div>

    </section>

    {{-- Developer pics team --}}
    <section id="developers" style="background-image: url(https://cdn.pixabay.com/photo/2017/08/07/15/25/galaxies-2604911_960_720.jpg)">
        <div class="box-ghost ">
        </div>
        <div class="container pt-5">
            <div class="developer-container py-5">
                <h1 class="text-center text-white mb-4 mt-5">Our Team</h1>
                <div class="developer d-flex justify-content-center">

                    <div class="pic d-flex flex-column text-center p-3">
                        <a href="https://www.linkedin.com/in/lorenzo-d-amico/">
                            <img class="img-responsive img-personalized rounded-circle" src="https://media-exp1.licdn.com/dms/image/C4E03AQHC1dg3x4RwGw/profile-displayphoto-shrink_800_800/0/1606154522135?e=1613001600&v=beta&t=Fq6DEI1on8aJ5yvjqdOeMEPTInquQ7M4-Sf6g5QokAM" alt="Lorenzo">
                        </a>
                        <h4 class="text-white">Lorenzo</h4>
                    </div>

                    <div class="pic d-flex flex-column text-center p-3">
                        <a href="https://www.linkedin.com/in/matteosimoneborghi/">
                            <img class="img-responsive img-personalized rounded-circle" src="https://media-exp1.licdn.com/dms/image/C5603AQFHvqD8mzSazg/profile-displayphoto-shrink_800_800/0/1556965358340?e=1613001600&v=beta&t=OfUd69bBZwxHTx-Z7z4b6zbR64kS0kbAxBb_Bc-FvpU" alt="Matteo">
                        </a>
                        <h4 class="text-white">Matteo</h4>
                    </div>

                    <div class="pic d-flex flex-column text-center p-3">
                        <a href="https://www.linkedin.com/in/andreacontestabile/">
                            <img class="img-responsive img-personalized rounded-circle" src="https://media-exp1.licdn.com/dms/image/C4E03AQH5nLXiQOM5MQ/profile-displayphoto-shrink_800_800/0/1562578629282?e=1613001600&v=beta&t=WameMQLa_d5aZqGC_DODhCWWiBnMWno1bVMhDJs9rCs" alt="Andrea">
                        </a>
                        <h4 class="text-white">Andrea</h4>
                    </div>

                    <div class="pic d-flex flex-column text-center p-3">
                        <a href="https://www.linkedin.com/in/danilo-patan%C3%A9/">
                            <img class="img-responsive img-personalized rounded-circle" src="https://media-exp1.licdn.com/dms/image/C4E03AQGY6ORkDSHAMQ/profile-displayphoto-shrink_800_800/0/1605979378804?e=1613001600&v=beta&t=UxCDvkF9I28q_Sn1AmmmfqvtxfrXiBnaAbNpoXhvud4" alt="Danilo">
                        </a>
                        <h4 class="text-white">Danilo</h4>
                    </div>

                    <div class="pic d-flex flex-column text-center p-3">
                        
                        <a href="https://www.linkedin.com/in/gabriele-musumeci-51aa551bb/">
                            <img class="img-responsive img-personalized rounded-circle" src="https://media-exp1.licdn.com/dms/image/C4E03AQEX0dlhwkuIgg/profile-displayphoto-shrink_200_200/0/1605545011980?e=1613001600&v=beta&t=THh1-d5d6eHobVi474AIKn6urQNeiiePLXp0Xs9KcSs" alt="Gabriele">
                        </a>
                        <h4 class="text-white">Gabriele</h4>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
