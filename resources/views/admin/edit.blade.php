@extends('layouts.guests')

@section('content')
<div id="edit" class="container">
  <section class="form">
    <h1>Edit your apartment</h1>
    <form action="{{route("admin.apartment.update", $apartment->id)}}" method="POST" enctype="multipart/form-data">

      @csrf
      @method("PUT")

      <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control input-style" id="title" name="title" placeholder="Digita un titolo per questo annuncio" max="100" value="{{old("title") ? old("title") : $apartment->title}}">
      </div>
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="form-group">
        <label for="address">Address</label>
        <input type="text" class="form-control input-style" id="address" name="address" placeholder="Digita l'indirizzo del tuo appartamento" value="{{old("address") ? old("address") : $apartment->address}}">
      </div>
      @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="row">
        <div class="col-3">
          <div class="form-group">
            <label for="rooms_number">Number of rooms</label>
            <input type="number" class="form-control input-style" id="rooms_number" name="rooms_number" min="1" value="{{old("rooms_number") ? old("rooms_number") : $apartment->rooms_number}}" required>
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="beds_number">Number of beds</label>
            <input type="number" class="form-control input-style" id="beds_number" name="beds_number" min="1" value="{{old("beds_number") ? old("beds_number") : $apartment->beds_number}}" required>
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="bathrooms_number">Number of bathrooms</label>
            <input type="number" class="form-control input-style" id="bathrooms_number" name="bathrooms_number" min="1" value="{{old("bathrooms_number") ? old("bathrooms_number") : $apartment->bathrooms_number}}" required>
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="square_meters">Size in square meters</label>
            <input type="number" class="form-control input-style" id="square_meters" name="square_meters" value="{{old("square_meters") ? old("square_meters") : $apartment->square_meters}}" required>
          </div>
        </div>
      </div>
      @error('rooms_number')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      @error('beds_number')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      @error('square_meters')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control input-style" id="description" name="description" rows="5" min="150" max="500" placeholder="Scrivi una descrizione del tuo appartamento...">{{old("description") ? old("description") : $apartment->description}}</textarea>
      </div>
      @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      @php
      if (!old("services")) {
          $apartmentServices = [];
          foreach($apartment->services as $service) {
            $apartmentServices[] = $service->id;
          }
        }
      @endphp

      <div class="label">
        <label id="primary">Services</label>
        @if(!old("services"))
        @foreach ($services as $service)
        <div class="form-check form-check-inline">
          <div class="label-style">
            <input class="form-check-input" type="checkbox" id="{{$service->id}}" name="services[]" {{in_array($service->id, $apartmentServices) ? "checked" : ""}} value="{{$service->id}}" hidden>
            <label class="form-check-label" for="{{$service->id}}">{{$service->name}}</label>
          </div>
        </div>
        @endforeach
        @else
          @foreach ($services as $service)
          <div class="form-check form-check-inline">
            <div class="label-style">
              <input class="form-check-input" type="checkbox" id="{{$service->id}}" name="services[]" {{in_array($service->id, old("services")) ? "checked" : ""}} value="{{$service->id}}" hidden>
              <label class="form-check-label" for="{{$service->id}}">{{$service->name}}</label>
            </div>
          </div>
          @endforeach
        @endif
      </div>
      
      @error('services')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="row">
        <div class="col-4">
          <div class="visibility">
            <input type="checkbox" class="form-controll" id="visibility" name="visibility" value="0" {{ $apartment->visibility == 0 ? "checked" : "" }} hidden>
            <label for="visibility">Visible</label>
            @error('visibility')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="col-4">
          <div class="browse">
            <input type="file" id="cover_image" name="cover_image" accept="image/*" hidden>
            <label for="cover_image">Cover Image</label>
          </div>
          
          @error('cover_image')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
          <?php
          $image = $apartment->cover_image;
          $pos = strpos($image, "http");          
          ?> 

          <div class="apartment-cover">
            <?php if ($pos === false) {?>
              <img src="{{asset("storage/" . $apartment->cover_image)}}" alt="">
              <?php } else {?>
              <img src="{{$apartment->cover_image}}" alt="">
            <?php }?>
          </div>
        </div>
        <div class="col-4">
          <div class="browse">
            <label for="images">Extra images <span>max 5 images</span></label>
            <input type="file" id="images" name="images[]" accept="image/*" multiple hidden>
          </div>

          @error('images')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          @if ($apartment_images)
          <div class="apartment-images">
            @foreach ($apartment_images as $apartment_image)
            <?php
              $additional_images = $apartment_image->image_path;
              $pos = strpos($additional_images, "http");          
            ?> 
              <div class="apartment-image">
                <?php if ($pos === false) {?>

                  <div class="img">
                    <img src="{{asset("storage/" . $apartment_image->image_path)}}" alt="">
                  </div>

                <?php } else {?>
                  <div class="img">
                    <img class="border rounded" src="{{$apartment_image->image_path}}" alt="">
                  </div>
                <?php }?>



                {{-- <form action="{{route("admin.image.destroy", $apartment_image->id)}}" method="POST">
                  @csrf
                  @method("DELETE")
                  <input class="delete-button btn btn-outline-danger my-3" type="submit" value="Elimina">
                </form> --}}
                </div>
            @endforeach
          </div>
          @endif

        </div>
      </div>


      <button type="submit" class="btn btn-primary">Save</button>
    </form>
  </section>
</div>

@endsection