<script id="search-result-template" type="text/x-handlebars-template">

    <div class="apartment-card">
        <div class="image-wrapper">
            @{{#if asset}}
                <img src="http://localhost:8000/storage/@{{cover_image}}" alt="immagine casa">
            @{{else}}
                <img src="@{{cover_image}}" alt="immagine casa">
            @{{/if}}
        </div>
        <div class="info-wrapper">
            <div class="main">
                <div class="title">
                    <h5>@{{title}}</h5>
                </div>
                <p>@{{address}}</p>
            </div>
            <ul>
                <li>
                    <strong>Rooms:</strong> @{{rooms_number}}
                </li>
                <li>
                    <strong>Bathrooms:</strong> @{{bathrooms_numbers}}
                </li>
                <li>
                    <strong>Beds:</strong> @{{beds_number}}
                </li>
                <li>
                    <strong>mq:</strong> @{{square_meters}}
                </li>
            </ul>
        </div>
        @{{#if sponsorized}}
            <div class="button-wrapper space-between">
                <div class="badge">Superhost</div>
                <a href="http://localhost:8000/show/@{{id}}" class="btn-details">Details</a>
            </div>
        @{{else}}
            <div class="button-wrapper flex-end">
                <a href="http://localhost:8000/show/@{{id}}" class="btn-details">Details</a>
            </div>
        @{{/if}}
    </div>
    
</script>
