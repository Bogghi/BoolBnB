<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>

    <form action="" method="POST">
        
        @foreach ($payPlan->all() as $plan)
            {{-- @dd($plan) --}}
            <input type="radio" id="{{$plan->id}}" name="option" value="{{$plan->hours_duration}}">
            <label for="male">{{$plan->hours_duration}} {{$plan->price}}</label><br>
        @endforeach

    </form>

</body>
</html>