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
                {{-- title --}}
                <div class="jumbo-text" data-aos="fade-right" data-aos-duration="1000">
                    <h1 class="display-4">Book your holiday</h1>
                    <p class="lead">Find your apartment</p>
                </div>
                {{-- searchbar --}}
                <div class="searchbar" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="200">
                    <form class="form-inline d-flex md-form form-sm form-color mt-2" action="{{route('search')}}" method="POST" autocomplete="off">
                        @csrf
                        @method("POST")
                        <div id="search-input"></div>
                        <button class="search-btn" type="submit">
                            <i class="fas fa-search"></i>
                        </button>
                    </form>
                </div>

                {{-- Scroll to Apartment in evidence --}}
                <div class="cta" data-aos="fade-right" data-aos-duration="1000" data-aos-delay="400">
                    <p>View the apartments in evidence</p>
                    <a href="#sponsorizations"><i class="fas fa-chevron-down"></i></a> 
                </div>
                
            </div>
        </div>  
    </header>
@endif



