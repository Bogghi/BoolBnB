@extends('layouts.guests')

@section('content')

<div class="container">

    <section>
        <form action="{{route("admin.sponsorization.store")}}" method="POST">
            @csrf
            @method('POST')
            <h1>Seleziona un piano di sponsorizazzione</h1>
            <div class="form-check">
                
                @foreach ($payPlan->all() as $plan)
                    <div class="form-check">
                        <input name="payment_plan_id" class="form-check-input" type="radio" value="{{$plan->id}}" id="{{$plan->id}}">
                        <label class="form-check-label" for="{{$plan->id}}">
                            {{$plan->hours_duration}} {{$plan->price}}
                        </label>
                    </div>
                @endforeach
                
            </div>
            <input type="hidden" name="apartment_id" value="{{$id}}">
    
    
            <button type="submit" class="btn btn-primary">Salva</button>
    
        </form>
    
        @if ($errors->any())
            <ul>    
            @foreach ($errors->all() as $error)
                <li>{{$error}}</li>    
            @endforeach
            </ul>
        @endif
    </section>

</div>
    
@endsection