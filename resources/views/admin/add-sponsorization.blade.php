@extends('layouts.guests')

@section('content')

    <div class="container">

        <section class="sponsorization">
            <form action="{{ route('admin.sponsorization.store') }}" method="POST" id="hosted-form">
                @csrf
                @method('POST')
                <h1 class="d-flex justify-content-center">Sponsor your apartment</h1>

                {{-- @foreach ($payPlan->all() as $plan)
                    <input type="radio" name="payment_plan_id_test" value="{{ $plan->id }}">    
                @endforeach --}}

                <input type="hidden" value="{{$id}}" name="apartment_id">
                <div class="plan-container">
                    @foreach ($payPlan->all() as $plan)
                        <div class="content">
                            <div class="label size d-flex justify-content-center align-items-center flex-nowrap ">
                                <label class="flex-row justify-content-center align-items-center" for="{{ $plan->id }}">
                                    <span id="hours">{{ $plan->hours_duration }}h</span><br>
                                    <span id="price">{{ $plan->price }} &euro;</span>
                                </label>
                            </div>
                            <div class="radio d-flex justify-content-center align-items-center">
                                <input name="payment_plan_id" type="radio" value="{{ $plan->id }}" id="{{ $plan->id }}">
                            </div>
                        </div>
                    @endforeach
                </div>

                <div class="bt-drop-in-wrapper">
                    <div id="bt-dropin"></div>
                </div>

                <input id="nonce" name="payment_method_nonce" type="hidden" />

                <div class="d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-primary">Salva</button>
                </div>

            </form>


            @if ($errors->any())
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            @endif
        </section>

    </div>

    <script type="text/javascript">

        var form = document.querySelector('#payment-form');
        var client_token = "{{ $token }}";

        braintree.dropin.create({
            authorization: client_token,
            selector: '#bt-dropin',
        }, function (createErr, instance) {
            if (createErr) {
                console.log('Create Error', createErr);
                return;
            }
            form.addEventListener('submit', function (event) {
                console.log("io non funziono");
                event.preventDefault();
                instance.requestPaymentMethod(function (err, payload) {
                    if (err) {
                        console.log('Request Payment Method Error', err);
                        return;
                    }

                    // Add the nonce to the form and submit
                    document.querySelector('#nonce').value = payload.nonce;
                    form.submit();
                });
            });
        });

    </script>

@endsection
