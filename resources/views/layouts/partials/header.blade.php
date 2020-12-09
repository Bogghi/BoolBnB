{{-- Header --}}

@if (Route::currentRouteName() != 'homepage')
    <header>
        @include("layouts.partials.navbar")
    </header>
@else 
    <header class="jumbo-header">
        @include("layouts.partials.navbar")
        <div class="container">
            <div class="jumbo-content col-12 px-0">
                <div class="jumbo-text" data-aos="fade-right" data-aos-duration="1000">
                    <h1 class="display-4">Programma la tua vacanza</h1>
                    <p class="lead">Trova il tuo appartamento ideale</p>
                </div>
                <div class="searchbar" >
                    <form class="form-inline d-flex md-form form-sm form-color mt-2" action="{{route('search')}}" method="POST" autocomplete="off" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200" data-aos-once="true">
                        @csrf
                        @method("POST")
                        <div id="search-input"></div>
                        <button class="search-btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>
                <div class="cta" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
                    <p>Visualizza gli appartamenti in evidenza</p>
                    <a href="#sponsorizations"><i class="fas fa-chevron-down"></i></a> 
                </div>
                
            </div>
        </div>  
    </header>
@endif



