<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="{{route("admin.sponsorization.store")}}" method="POST">
        @csrf
        @method('POST')
        <input type="hidden" name="apartment_id" value="{{$id}}">
        @foreach ($payPlan->all() as $plan)
            {{-- @dd($plan) --}}
            <input type="radio" id="{{$plan->id}}" name="payment_plan_id" value="{{$plan->id}}">
            <label for="male">{{$plan->hours_duration}} {{$plan->price}}</label><br>
        @endforeach

        <button type="submit">salva</button>

    </form>
    {{-- @dd($errors) --}}
    @if ($errors->any())
    <ul>    
    @foreach ($errors->all() as $error)
        <li>{{$error}}</li>    
    @endforeach
    </ul>
@endif

</body>
</html>