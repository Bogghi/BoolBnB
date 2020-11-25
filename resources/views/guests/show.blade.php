@extends("layouts.guests")

@section('content')
<div class="container">
  <section>
    
    <div class="card mb-4">
      
      <div class="row">
  
        <div class="col-md-6 m-auto">
          <img class="img-fluid mx-auto d-block rounded-left" src="{{$apartment->cover_image}}" alt="project image">
        </div>
  
        <div class="col-md-6 p-5 align-self-center">
  
          <h5 class="font-weight-normal mb-3">{{$apartment->title}}</h5>

          <p>{{$apartment->address}}</p>

          <p class="text-muted">{{$apartment->description}}</p>
          
          <ul class="list-unstyled font-small mt-5 mb-0">
            <li>
              <p class="text-uppercase mb-2"><strong>DIMENSIONE</strong></p>
              <p class="text-muted mb-4">{{$apartment->square_meters}}m²</p>
            </li>
            <li>
              <p class="text-uppercase mb-2"><strong>N° STANZE</strong></p>
              <p class="text-muted mb-4">{{$apartment->rooms_number}}</p>
            </li>
  
            <li>
              <p class="text-uppercase mb-2"><strong>N° LETTI</strong></p>
              <p class="text-muted mb-4">{{$apartment->beds_number}}</p>
            </li>
  
            <li>
              <p class="text-uppercase mb-2"><strong>N° BAGNI</strong></p>
              <p class="text-muted mb-4">{{$apartment->bathrooms_number}}</p>
            </li>
  
          </ul>
  
        </div>
  
      </div>
      
      <div class="row">
        
        <div class="col-md-8 mx-auto">

          <form class="border border-light p-5" action="{{route("message.store", $apartment->id)}}" method="POST">

            <p class="h4 mb-4 text-center">Contatta il proprietario</p>
        
            <input type="email" id="email" class="form-control mb-4" placeholder="Il tuo indirizzo e-mail" value="{{old("email") ?? old("email")}}" required>
            @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <textarea class="form-control rounded-0" id="exampleFormControlTextarea2" rows="3" placeholder="Il tuo messaggio..." required style="resize: none;">{{old("content") ?? old("content")}}</textarea>
            @error('email')
              <div class="alert alert-danger">{{ $message }}</div>
            @enderror

            <button class="btn btn-info mx-auto mt-4 d-block px-5" type="submit">Invia messaggio</button>

          </form>

        </div>
        
      </div>

    </div>
       
  </section>
</div>

@endsection