@extends("layouts.guests")

@section('content')
<section id="show">
  <div class="container">
    {{-- row title  --}}
    <div class="row">
      <div class="col-12 pt-4">
        <div class="apartment-header">
          <div class="ovr-hid">
          <h1>{{$apartment->title}}</h1>
          </div>  
          <p id="address" class="mt-2">{{$apartment->address}}</p>
        </div>
        @if (Auth::id() == $apartment->user_id )
        <div class="col-12 d-flex align-items-center my-3 pl-0">
          <a class="btn btn-outline-primary mr-3" href="{{route('admin.sponsorization.create',["id"=>$apartment->id])}}">Sponsorizza</a>
          <form action="{{route("admin.apartment.destroy", $apartment->id)}}" method="POST">
            @method("DELETE")
            @csrf
            <input class="btn btn-outline-danger mt-0" type="submit" value="Cancella">
          </form>
        </div>
        @endif
      </div>
    </div>
    {{-- row title  --}}
    {{-- row carousel  --}}
    <div class="row mb-5">
      <div class="col-12">
        {{-- carousel --}}
        <div id="carousel-show" class="carousel slide" data-pause="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-show" data-slide-to="0" class="active"></li>
            @php
            $i = 1;
            @endphp
            @foreach ($apartment->images as $image)

            <li data-target="#carousel-show" data-slide-to="{{$i}}"></li>
            @php
                $i++ ;
            @endphp
            @endforeach
          </ol>
          <div class="carousel-inner">
            <?php
            $image = $apartment->cover_image;
            $pos = strpos($image, "http");          
            ?> 
            <div class="carousel-item active">
              <?php if ($pos === false) {?>
                <div class="border rounded image-car-person" style="background-image: url({{asset('storage/'.$apartment->cover_image)}})"></div>
              <?php } else {?>
                <div class="border rounded image-car-person" style="background-image: url({{$apartment->cover_image}})"></div>    
                <?php }?>
            </div>  
            @foreach ($apartment->images as $image)
            <div class="carousel-item">
              <?php if ($pos === false) {?>
                <div class="border rounded image-car-person" style="background-image: url({{asset('storage/'.$image->image_path)}})"></div>
              <?php } else {?>
                <div class="border rounded image-car-person" style="background-image: url({{$image->image_path}})"></div>    
              <?php }?>
            </div>
            @endforeach
          </div>

          <a class="carousel-control-prev" href="#carousel-show" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carousel-show" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        {{-- carousel --}}
      </div>
    </div>
    {{-- row carousel  --}}
    {{-- row info --}}
    <div class="container-info d-lg-flex">
      <div class="container-show" >
        <div class="row mb-5">
          <div class="col-12 col-md-12 mb-5">
            <h2 class="py-2">Description</h2>
            <p class="mb-5">{{$apartment->description}}</p>
            <p>Rooms: <span class="font-weight-bold ml-1 mr-3">{{$apartment->rooms_number}}</span> Beds: <span class="font-weight-bold ml-1 mr-3">{{$apartment->beds_number}}</span> Bathrooms: <span class="font-weight-bold ml-1 mr-3">{{$apartment->bathrooms_number}}</span> m&sup2;: <span class="font-weight-bold ml-1 mr-3">{{$apartment->square_meters}}</span>  </p>
          </div>
          <div class="col-12 col-md-12 services">
            <h2 class="pb-2">Services</h2>
            <ul class="d-flex flex-wrap pl-0 pt-4">
              @foreach ($apartment->services as $service)
              <li class="d-flex align-items-center col-6 col-sm-4 col-lg-3 pb-4">
                <span class="service-icon d-flex justify-content-center align-items-center mr-2">
                  @switch($service->id)
                      @case(1)
                          <i class="fas fa-wifi"></i>
                          @break
                      @case(2)
                          <i class="fas fa-car"></i>
                          @break
                      @case(3)
                          <i class="fas fa-swimmer"></i>
                          @break
                      @case(4)
                          <i class="fas fa-concierge-bell"></i>
                          @break
                      @case(5)
                          <i class="fas fa-hot-tub"></i>
                          @break
                      @case(6)
                          <i class="fas fa-umbrella-beach"></i>
                          @break
                      @default
                          <i class="fas fa-concierge-bell"></i>
                  @endswitch
                </span>
                {{$service->name}}</li>
              @endforeach
            </ul>
          </div>

        </div>
        
      </div>
      
      @if (Auth::id() == $apartment->user_id )


        
        <div class="message">
          <h2 class="py-2">Messages</h2>
          <ul class="mt-3">
            @foreach ($apartment->messages as $message)
            <li data-toggle="modal" data-target="#staticBackdrop" data-id="{{$message->id}}" class="single-message py-1 px-1 my-1 d-flex"><span class="align-middle d-flex justify-content-center align-items-center mr-2"><i class="far fa-envelope"></i></span><p>{{$message->email}}</p></li>
            @endforeach
          </ul>
        </div>
      

      {{-- MODAL --}}
      <div class="modal fade color-primary modal-tr" id="staticBackdrop" data-backdrop="static" data-keyboard="false"tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
              {{-- title Modal --}}
              <div class="modal-header">
                  <h5 class="modal-title color-secondary" id="staticBackdropLabel">Messaggio ricevuto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
              </div>
              <div class="modal-body">
                  <h4 id="message-email"></h4>
                  <p id="message-text"></p>
              </div>
              {{-- Buttom Close Modal --}}
              <div class="modal-footer">
                  <button type="button" class="btn btn-outline-info btm-link"
                      data-dismiss="modal">Close</button>
              </div>
          </div>
        </div>
      </div>
      {{-- MODAL --}}

      @else

      <div class="contatti">

        <form class="padding-pers" action="{{route("message.store", $apartment->id)}}" method="POST">
          @csrf
          @method('POST')
          <p class="h4 mb-4 ">Contact the owner</p>
      
          <input type="email" name="email" id="email" class="form-control mb-4" placeholder="e-mail" value=@guest " {{old("email") ? old("email") : ''}} " @else{{Auth::user()->email}}" readonly @endguest required>
          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <textarea class="form-control rounded-0" name="content" id="content" rows="3" placeholder="Message..." required style="resize: none;">{{old("content") ?? old("content")}}</textarea>
          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <button class="btn btn-outline-primary mx-auto mt-4 d-block" type="submit">Send</button>

        </form>

      </div>
      @endif
    </div>
    <div class="col-12 col-md-12 px-0">
      <div id="map-container"></div>
  </div>
  

  </div>
</section>
@endsection