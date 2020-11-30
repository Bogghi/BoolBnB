@extends('layouts.guests')

@section('content')
    <section class="spn-error">
        <div class="container">
            <h1 class="d-flex justify-content-center align-center">Sponsorization Alredy active</h1>
        </div>
        <form action="{{ route('admin.apartment.index') }}">
            
            <div class="d-flex justify-content-center align-items-center">
                <button type="submit" class="sbm-button">Return to index</button>
            </div>

        </form>
    </section>
@endsection