@extends('layouts.guests')

@section('content')
<div class="container">
  <section>
    <h1>Aggiungi un appartamento</h1>
    <form action="{{route("admin.apartment.store")}}" method="POST" enctype="multipart/form-data">

      @csrf
      @method("POST")

      <div class="form-group">
        <label for="title">Titolo</label>
        <input type="text" class="form-control" id="title" name="title" placeholder="Digita un titolo per questo annuncio" max="255" value="{{old("title") ?? old("title")}}">
      </div>
      <div class="form-group">
        <label for="address">Indirizzo</label>
        <input type="text" class="form-control" id="address" name="address" placeholder="Digita l'indirizzo del tuo appartamento" value="{{old("address") ?? old("address")}}">
      </div>
      <div class="form-inline mt-sm-5">
        <label for="rooms_number">Numero di stanze</label>
        <input type="number" class="form-control mb-2 m-sm-2" id="rooms_number" name="rooms_number" min="1" value="{{old("rooms_number") ? old("rooms_number") : 1}}" required>
      
      
        <label for="beds_number">Numeri di posti letto</label>
        <input type="number" class="form-control mb-2 m-sm-2" id="beds_number" name="beds_number" min="1" value="{{old("beds_number") ? old("beds_number") : 1}}" required>
      
      
        <label for="bathrooms_number">Numero di bagni</label>
        <input type="number" class="form-control mb-2 m-sm-2" id="bathrooms_number" name="bathrooms_number" min="1" value="{{old("bathrooms_number") ? old("bathrooms_number") : 1}}" required>
      
      
        <label for="square_meters">Dimensione in metri quadrati</label>
        <input type="number" class="form-control mb-2 m-sm-2" id="square_meters" name="square_meters" value="{{old("square_meters") ? old("square_meters") : 1}}" required>
      </div>
      <div class="form-group mt-sm-4">
        <label for="description">Descrizione</label>
        <textarea class="form-control" id="description" name="description" rows="5" min="50" placeholder="Scrivi una descrizione del tuo appartamento..." value="{{old("description") ?? old("description")}}" style="resize: none;">
        </textarea>
      </div>
        <div>
          <label>Servizi</label>
        </div>

        @foreach ($services as $service)
        <div class="form-check form-check-inline">
          <input class="form-check-input" type="checkbox" id="{{$service->id}}" name="services[]" value="{{$service->id}}">
          <label class="form-check-label" for="{{$service->id}}">{{$service->name}}</label>
        </div>
        
        @endforeach


        <div class="form-check form-check-inline">
          <input type="number" class="form-controll mb-2 m-sm-2" id="visibility" name="visibility" value="1" required>
        </div>
        
      <div class="form-group mt-sm-4">
        <label for="cover_image">Immagine di copertina</label>
        <input type="file" class="d-block" id="cover_image" name="cover_image" accept="image/*">
      </div>
      <button type="submit" class="btn btn-primary">Salva</button>
    </form>
  </section>
</div>
    
@endsection