@extends('layouts.guests')

@section('content')

    {{-- Apartment sponsorization --}}
    <section id="sponsorizations" class="py-5">
        <h2 class="text-center mb-3 text-white">Sponsored</h2>
        <div  class="container-fluid d-flex pb-4">
          <div id="scroll" class="container-fluid d-flex">
            @foreach ($sponsored_apartments as $apartment)
            <?php
            $image = $apartment->cover_image;
            $pos = strpos($image, "http");          
            ?> 
            <?php if ($pos === false) {?>
              <div class="border rounded d-flex flex-column flex-shrink-0 sponsored-apartment" style="background-image: url({{asset('storage/'.$apartment->cover_image)}})">
              <h3 class="text-center mt-5 ">{{$apartment->address}}</h3>
              <a href="{{route('apartment.show', $apartment->id)}}" class="m-auto btn">Show the apartment</a>
              </div>
            <?php } else {?>
              <div class="border rounded d-flex flex-column flex-shrink-0 sponsored-apartment" style="background-image: url({{$apartment->cover_image}})">
                <h3 class="text-center mt-5">{{$apartment->address}}</h3>
                <a href="{{route('apartment.show', $apartment->id)}}" class="m-auto btn">Show the apartment</a>
              </div>    
              <?php }?>
               
            @endforeach
           
          </div>
          <span id="prev" class="arrow prev "><i class="fas fa-angle-left"></i></span>
          <span id="next" class="arrow next "><i class="fas fa-angle-right"></i></span>

        </div>
      

    </section>

     {{-- Cities mix --}}
     <section id="cities" class="py-5 mb-5 bg-ligth container-fluid">
        <h2 class="text-center">Best Cities</h2>
        <div class="row">

            {{-- box cities --}}
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 text-center my-5" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="0" data-aos-once="true">
                <h3>Parigi</h3>    
                <form action="{{route('search')}}" method="post">
                    @csrf
                    @method("POST")

                    <input type="hidden" value="parigi" name="search">
                    <button type="submit" class="box-cities mx-auto" style="background-image: url(http://www.competitiontravel.it/wp-content/uploads/2014/09/Parigi-2-1024x683.jpg)"></button>
                </form>
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-12 text-center my-5" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="150" data-aos-once="true">
                <h3>Roma</h3> 
                <form action="{{route('search')}}" method="post">
                    @csrf
                    @method("POST")

                    <input type="hidden" value="roma" name="search">
                    <button type="submit" class="box-cities mx-auto" style="background-image: url(https://www.fodors.com/wp-content/uploads/2018/10/HERO_UltimateRome_Hero_shutterstock789412159.jpg)"></button>
                </form>             
            </div>
            
            <div class="col-lg-4 col-md-6 col-sm-12 col-12 text-center my-5" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="300" data-aos-once="true">
                <h3>Londra</h3> 

                <form action="{{route('search')}}" method="post">
                    @csrf
                    @method("POST")

                    <input type="hidden" value="londra" name="search">
                    <button type="submit" class="box-cities mx-auto" style="background-image: url(https://www.metamorphic.co.uk/wp-content/uploads/2018/05/london-1900x1080.jpg)"></button>
                </form>        
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-12 text-center my-5" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="0" data-aos-once="true">
                <h3>Barcellona</h3>
                <form action="{{route('search')}}" method="post">
                    @csrf
                    @method("POST")

                    <input type="hidden" value="barcellona" name="search">
                    <button type="submit" class="box-cities mx-auto" style="background-image: url(https://www.voglioviverecosi.com/wp-content/uploads/2019/09/LAVORO-BARCELLONA-1900x1080.jpg)"></button>
                </form>          
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-12 text-center my-5" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="150" data-aos-once="true">
                <h3>Berlino</h3>  
                <form action="{{route('search')}}" method="post">
                    @csrf
                    @method("POST")

                    <input type="hidden" value="berlino" name="search">
                    <button type="submit" class="box-cities mx-auto" style="background-image: url(https://www.robintur.it/img/viaggi/germania/image-thumb__6491__galleryCarousel/germania-berlino-porta-di-brandeburgo~-~300w.pjpeg)"></button>
                </form>          
            </div>

            <div class="col-lg-4 col-md-6 col-sm-12 col-12 text-center my-5" data-aos="flip-right" data-aos-duration="1000" data-aos-delay="300" data-aos-once="true">
                <h3>Vienna</h3>
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
    <section id="developers">
        <div class="box-ghost ">
        </div>
        <div class="container pt-5">
            <div class="developer-container py-5">
                <h2 class="text-center text-white mb-4 mt-5">Our Team</h2>
                <div class="developer d-flex justify-content-center">

                    <div class="pic d-flex flex-column text-center p-3" data-aos="zoom-out-down" data-aos-duration="1000" data-aos-delay="0" data-aos-once="true">
                        <a href="https://www.linkedin.com/in/lorenzo-d-amico/">
                            <img class="img-responsive img-personalized rounded-circle" src="https://media-exp1.licdn.com/dms/image/C4E03AQHC1dg3x4RwGw/profile-displayphoto-shrink_800_800/0/1606154522135?e=1613001600&v=beta&t=Fq6DEI1on8aJ5yvjqdOeMEPTInquQ7M4-Sf6g5QokAM" alt="Lorenzo">
                        </a>
                        <h4>Lorenzo</h4>
                    </div>

                    <div class="pic d-flex flex-column text-center p-3" data-aos="zoom-out-down" data-aos-duration="1000" data-aos-delay="150" data-aos-once="true">
                        <a href="https://www.linkedin.com/in/matteosimoneborghi/">
                            <img class="img-responsive img-personalized rounded-circle" src="https://media-exp1.licdn.com/dms/image/C5603AQFHvqD8mzSazg/profile-displayphoto-shrink_800_800/0/1556965358340?e=1613001600&v=beta&t=OfUd69bBZwxHTx-Z7z4b6zbR64kS0kbAxBb_Bc-FvpU" alt="Matteo">
                        </a>
                        <h4>Matteo</h4>
                    </div>

                    <div class="pic d-flex flex-column text-center p-3" data-aos="zoom-out-down" data-aos-duration="1000" data-aos-delay="300" data-aos-once="true">
                        <a href="https://www.linkedin.com/in/andreacontestabile/">
                            <img class="img-responsive img-personalized rounded-circle" src="https://media-exp1.licdn.com/dms/image/C4E03AQH5nLXiQOM5MQ/profile-displayphoto-shrink_800_800/0/1562578629282?e=1613001600&v=beta&t=WameMQLa_d5aZqGC_DODhCWWiBnMWno1bVMhDJs9rCs" alt="Andrea">
                        </a>
                        <h4>Andrea</h4>
                    </div>

                    <div class="pic d-flex flex-column text-center p-3" data-aos="zoom-out-down" data-aos-duration="1000" data-aos-delay="450" data-aos-once="true">
                        <a href="https://www.linkedin.com/in/danilo-patan%C3%A9/">
                            <img class="img-responsive img-personalized rounded-circle" src="https://media-exp1.licdn.com/dms/image/C4E03AQGY6ORkDSHAMQ/profile-displayphoto-shrink_800_800/0/1605979378804?e=1613001600&v=beta&t=UxCDvkF9I28q_Sn1AmmmfqvtxfrXiBnaAbNpoXhvud4" alt="Danilo">
                        </a>
                        <h4>Danilo</h4>
                    </div>

                    <div class="pic d-flex flex-column text-center p-3" data-aos="zoom-out-down" data-aos-duration="1000" data-aos-delay="600" data-aos-once="true">
                        <a href="https://www.linkedin.com/in/gabriele-musumeci-51aa551bb/">
                        <img class="img-responsive img-personalized rounded-circle" src="https://media-exp1.licdn.com/dms/image/C4E03AQEX0dlhwkuIgg/profile-displayphoto-shrink_200_200/0/1605545011980?e=1613001600&v=beta&t=THh1-d5d6eHobVi474AIKn6urQNeiiePLXp0Xs9KcSs" alt="Gabriele">
                         </a>
                        <h4>Gabriele</h4>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection
