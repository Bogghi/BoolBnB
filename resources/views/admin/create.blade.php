@extends('layouts.guests')

@section('content')
<div class="container">
  <section class="form">
    <h1>Aggiungi un appartamento</h1>
    <form action="{{route("admin.apartment.store")}}" method="POST" enctype="multipart/form-data">

      @csrf
      @method("POST")

      <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" class="form-control input-style" id="title" name="title" placeholder="Digita un titolo per questo annuncio" max="100" value="{{old("title") ?? old("title")}}">
      </div>
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="form-group">
        <label for="address">Indirizzo</label>
        <input type="text" class="form-control input-style" id="address" name="address" placeholder="Digita l'indirizzo del tuo appartamento" value="{{old("address") ?? old("address")}}">
      </div>
      @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="row">
        <div class="col-md-3">
          <div class="form-group">
            <label for="rooms_number">Numero di stanze</label>
            <input type="number" class="form-control input-style" id="rooms_number" name="rooms_number" min="1" value="{{old("rooms_number") ? old("rooms_number") : 1}}" required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="beds_number">Numeri di posti letto</label>
            <input type="number" class="form-control input-style" id="beds_number" name="beds_number" min="1" value="{{old("beds_number") ? old("beds_number") : 1}}" required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="bathrooms_number">Numero di bagni</label>
            <input type="number" class="form-control input-style" id="bathrooms_number" name="bathrooms_number" min="1" value="{{old("bathrooms_number") ? old("bathrooms_number") : 1}}" required>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <label for="square_meters">Dimensione in metri quadrati</label>
            <input type="number" class="form-control input-style" id="square_meters" name="square_meters" value="{{old("square_meters") ? old("square_meters") : 1}}" required>
          </div>
        </div>
      </div>
      @error('rooms_number')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      @error('beds_number')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      @error('bathrooms_number')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="form-group">
        <label for="description">Descrizione</label>
        <textarea class="form-control input-style" id="description" name="description" rows="5" min="50" max="150" placeholder="Scrivi una descrizione del tuo appartamento...">{{old("description") ?? old("description")}}</textarea>
      </div>
      @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      
      <div class="label">
        <label id="primary">Services</label>
        @foreach ($services as $service)
        <div class="form-check form-check-inline">
          @if (old("services"))
            <div class="label-style">
              <input class="form-check-input" type="checkbox" id="{{$service->id}}" name="services[]" {{in_array($service->id, old("services")) ? "checked" : ""}} value="{{$service->id}}" hidden>
              {{-- <input class="form-check-input" type="checkbox" id="{{$service->id}}" name="services[]" {{in_array($service->id, old("services")) ? "checked" : ""}} value="{{$service->id}}"> --}}
              <label class="form-check-label" for="{{$service->id}}">{{$service->name}}</label>
            </div>
            
          @else
            <div class="label-style">
              <input class="form-check-input" type="checkbox" id="{{$service->id}}" name="services[]" value="{{$service->id}}" hidden>
              {{-- <input class="form-check-input" type="checkbox" id="{{$service->id}}" name="services[]" value="{{$service->id}}"> --}}
              <label class="form-check-label" for="{{$service->id}}">{{$service->name}}</label>
            </div>
          @endif
        </div>
        @endforeach
      </div>
    
      @error('services')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="row">
        <div class="col-md-4">
          <div class="visibility">
            <input type="checkbox" class="form-controll" id="visibility" name="visibility" hidden checked="" value=1>
            <label for="visibility">Visible</label>
            @error('visibility')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror
          </div>
        </div>
        <div class="col-md-4">
          <div class="browse">
            <input type="file" id="cover_image" name="cover_image" accept="image/*" hidden>
            <label for="cover_image">Cover Image</label>
          </div>
          
          @error('cover_image')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="preview-apartment-cover">
            <p>None image selected</p>
          </div>
        </div> 
        <div class="col-md-4">
          <div class="browse">
            <label for="images">Extra images <span>max 5 images</span></label>
            <input type="file" id="images" name="images[]" accept="image/*" multiple hidden>
          </div>

          @error('images')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror

          <div class="preview-apartment-images" id="preview">
            <p>None images selected</p>
          </div>

        </div>
      </div>

      <div class="btn-custom">
        <button type="submit" class="">Save</button>
      </div>
    </form>
  </section>

</div>

@endsection