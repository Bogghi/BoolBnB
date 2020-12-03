@extends("layouts.guests")

@section('content')
<section id="show">
  <div class="container">
    {{-- row title  --}}
    <div class="row">
      <div class="col-12 d-flex pt-4">
        <h1>{{$apartment->title}}</h1>
        <div class="ml-auto">
          <a class="btn btn-outline-primary" href="{{route('admin.sponsorization.create',["id"=>$apartment->id])}}">Sponsorizza il tuo appartamento</a>
        </div>
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
            $pos = strpos($image, "placeholder");          
            ?> 
            <div class="carousel-item active">
              <?php if ($pos === false) {?>
                <div class="border rounded test" style="background-image: url({{asset('storage/'.$apartment->cover_image)}})"></div>
              <?php } else {?>
                <div class="border rounded test" style="background-image: url({{$apartment->cover_image}})"></div>    
                <?php }?>
            </div>  
            @foreach ($apartment->images as $image)
            <div class="carousel-item">
              <?php if ($pos === false) {?>
                <div class="border rounded test" style="background-image: url({{asset('storage/'.$image->image_path)}})"></div>
              <?php } else {?>
                <div class="border rounded test" style="background-image: url({{$image->image_path}})"></div>    
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
    <div class="row mb-5">
      <div class="col-12 col-md-7 border-pers">
        <h2 class="py-2">Description</h2>
        <p>{{$apartment->description}}</p>
      </div>
      <div class="col-5 col-md-5 services">
        <h2>Services</h2>
        <ul class="d-flex flex-column flex-wrap">
          @foreach ($apartment->services as $service)
          <li><span><i class="fas fa-circle dot-pers mr-2"></i></span>{{$service->name}}</li>
          @endforeach
        </ul>
      </div>
      <div class="col-7 col-md-6 map-container">

      </div>
      <div class="col-12 offset-md-1 col-md-5 message">
        <h2 class="pb-3">Messaggi ricevuti</h2>
        <ul class="">
          @foreach ($apartment->messages as $message)
          <li data-toggle="modal" data-target="#staticBackdrop" data-id="{{$message->id}}" class="single-message pb-2 d-flex"><span class="align-middle"><i class="fas fa-circle dot-pers mr-2"></i></span><p>{{$message->email}}</p></li>
          @endforeach
        </ul>
      </div>
      <div class="modal fade color-primary modal-tr" id="staticBackdrop" data-backdrop="static" data-keyboard="false"
      tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
      <div class="modal-dialog">
          <div class="modal-content">
              {{-- title Modal --}}
              <div class="modal-header">
                  <h5 class="modal-title color-secondary" id="staticBackdropLabel">Messaggio ricevuto</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              {{-- Model Privacy Policy --}}
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


    </div>
  </div>
</section>
@endsection