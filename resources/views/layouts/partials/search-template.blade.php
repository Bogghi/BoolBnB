<script id="search-result-template" type="text/x-handlebars-template">
    <div class="d-flex flex-column">
        <div class="d-flex border rounded container-apartment">
            @{{#if asset}}
            <div class="search-image">
                <img class="border rounded" width="180px" height="180px" src="http://localhost:8000/storage/@{{cover_image}}" alt="cover">
            </div>
            @{{else}}
            <div class="search-image">
                <img class="border rounded" width="180px" height="180px" src="@{{cover_image}}" alt="cover">
            </div>
            @{{/if}}
                        
            <div class="info-apartment d-flex flex-column">

                <h5 class="text-center">@{{title}}</h5>
                <p class="pl-2 info-text">@{{description}}</p>
                <div class="info-tag d-flex">
                    <ul class="list-info d-flex">
                        <li><p><small> Address: @{{address}}</small> </p></li>
                        <li><p><span><i class="fas fa-circle"></i></span><small> Beds number:</small> @{{beds_number}} </p></li>
                        <li><p><span><i class="fas fa-circle"></i></span><small> Square meters:</small> @{{square_meters}}</p></li>
                    </ul>
                    @{{#if sponsorized}}
                    <div id="sponsorized">
                        <h4><span class="badge badge-success">Superhost</span></h4>
                    </div>
                    @{{/if}}           
                </div>
            </div>
        </div>
    </div>
</script>