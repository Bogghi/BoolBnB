@extends('layouts.guests')

@section('content')
    <section>

        {{-- container pagina --}}
        <div class="container-fluid">

            <div class="row">
                <div class="col-8">
                    @for ($i = 0; $i < 5; $i++)
                        
                    
                    <div class="d-flex flex-column">
                        <img class="border rounded search-image" src="{{$all_sponsorized_apartments[$i]->cover_image}}" alt="Cover">
                    </div>
                    @endfor
                </div>
                

            </div>

        </div>
        {{-- fine container pagina --}}
    </section>  
@endsection