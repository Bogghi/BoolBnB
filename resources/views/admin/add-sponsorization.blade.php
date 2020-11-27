@extends('layouts.guests')

@section('content')

<div class="container">

    <section class="sponsorization">

        <div class="test resp">ciao</div>
        <form action="{{route("admin.sponsorization.store")}}" method="POST">
            @csrf
            @method('POST')
            <h1 class="d-flex justify-content-center">Sponsor your apartment</h1>
            

            <div class="plan-container">
                @foreach ($payPlan->all() as $plan)
                    <div class="content">
                        <div class="label size d-flex justify-content-center align-items-center flex-nowrap ">
                            <label class="flex-row justify-content-center align-items-center" for="{{$plan->id}}">
                                <span id="hours">{{$plan->hours_duration}}h</span><br>
                                <span id="price">{{$plan->price}} &euro;</span>  
                            </label>
                        </div>
                        <div class="radio d-flex justify-content-center align-items-center">
                            <input name="payment_plan_id" class="form-check-input" type="radio" value="{{$plan->id}}" id="{{$plan->id}}">
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="desc d-flex justify-content-center align-items-center">
                Select one of the above option and your apartment will be presented first to your audience
            </div>
            
            <input type="hidden" name="apartment_id" value="{{$id}}">
    
            <div class="d-flex justify-content-center align-items-center">
                <button type="submit" class="btn btn-primary">Salva</button>
            </div>
    
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