@extends("layouts.guests")

@section('content')
  <div class="container">
    <div class="row">
      <div class="col-12 d-flex pt-4">
        <h1>{{$apartment->title}}</h1>
        <div class="ml-auto">
          <a class="btn btn-outline-primary" href="{{route('admin.sponsorization.create',["id"=>$apartment->id])}}">Sponsorizza il tuo appartamento</a>
        </div>
      </div>
    </div>
    <div class="row">
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
  </div>

@endsection