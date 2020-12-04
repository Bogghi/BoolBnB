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
        <div class="button-wrapper">
            @{{#if sponsorized}}
                <div class="badge">Superhost</div>
            @{{/if}}
            <a href="http://localhost:8000/admin/apartment/@{{id}}" class="btn-details">Details</a>
        </div>
    </div>
    
</script>
