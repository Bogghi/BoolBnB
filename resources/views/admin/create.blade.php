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
        <input type="text" class="form-control" id="title" name="title" placeholder="Digita un titolo per questo annuncio" max="100" value="{{old("title") ?? old("title")}}">
      </div>
      @error('title')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="form-group">
        <label for="address">Indirizzo</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Digita l'indirizzo del tuo appartamento" value="{{old("address") ?? old("address")}}">
      </div>
      @error('address')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="row">
        <div class="col-3">
          <div class="form-group">
            <label for="rooms_number">Numero di stanze</label>
            <input type="number" class="form-control" id="rooms_number" name="rooms_number" min="1" value="{{old("rooms_number") ? old("rooms_number") : 1}}" required>
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="beds_number">Numeri di posti letto</label>
            <input type="number" class="form-control" id="beds_number" name="beds_number" min="1" value="{{old("beds_number") ? old("beds_number") : 1}}" required>
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="bathrooms_number">Numero di bagni</label>
            <input type="number" class="form-control" id="bathrooms_number" name="bathrooms_number" min="1" value="{{old("bathrooms_number") ? old("bathrooms_number") : 1}}" required>
          </div>
        </div>
        <div class="col-3">
          <div class="form-group">
            <label for="square_meters">Dimensione in metri quadrati</label>
        <input type="number" class="form-control" id="square_meters" name="square_meters" value="{{old("square_meters") ? old("square_meters") : 1}}" required>
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
        <textarea class="form-control" id="description" name="description" rows="5" min="50" max="150" placeholder="Scrivi una descrizione del tuo appartamento...">{{old("description") ?? old("description")}}</textarea>
      </div>
      @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      
      <div>
        <label>Servizi</label>
      </div>

      @foreach ($services as $service)
      <div class="form-check form-check-inline">
        @if (old("services"))
        <input class="form-check-input" type="checkbox" id="{{$service->id}}" name="services[]" {{in_array($service->id, old("services")) ? "checked" : ""}} value="{{$service->id}}">
        @else
        <input class="form-check-input" type="checkbox" id="{{$service->id}}" name="services[]" value="{{$service->id}}">
        @endif
        <label class="form-check-label" for="{{$service->id}}">{{$service->name}}</label>
      </div>
      @endforeach
      @error('services')
          <div class="alert alert-danger">{{ $message }}</div>
      @enderror

      <div class="form-check mt-sm-4">
        <label for="visibility">Non visibile</label>

      <input type="checkbox" class="form-controll mb-2 m-sm-2" id="visibility" name="visibility" value="0">
      </div>

      <div class="form-group mt-sm-4">
        <label for="cover_image">Immagine di copertina</label>
        <input type="file" class="d-block" id="cover_image" name="cover_image" accept="image/*">
      </div>
      @error('cover_image')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <div class="form-group mt-sm-4">
        <label for="images">Immagini aggiuntive (fino a 5)</label>
        <input type="file" class="d-block" id="images" name="images[]" accept="image/*" multiple>
      </div>
      @error('images')
        <div class="alert alert-danger">{{ $message }}</div>
      @enderror
      <button type="submit" class="btn btn-primary">Salva</button>
    </form>
  </section>
</div>

@endsection