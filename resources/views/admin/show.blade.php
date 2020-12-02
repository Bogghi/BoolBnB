@extends("layouts.guests")

@section('content')
<div class="container">
  <section>
    
    <div class="card mb-4">
      
      <div class="row">
  
        <div class="col-md-6 m-auto">
          <img class="img-fluid mx-auto d-block rounded-left" src="{{asset('storage/'.$apartment->cover_image)}}" alt="project image">
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
        

        <a class="btn btn-info my-4 px-5 mx-auto d-block background-color-primary" href="{{route('admin.sponsorization.create',["id"=>$apartment->id])}}">Sponsorizza questo appartamento</a>

        <form action="{{route('admin.apartment.destroy', $apartment->id)}}" method="POST">
          @method('DELETE')
          @csrf
          <button type="submit" value="delete" class="btn btn-danger">Delete</button>
        </form>
  
      </div>

    </div>

    
  </section>
</div>

@endsection