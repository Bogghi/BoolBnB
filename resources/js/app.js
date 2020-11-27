const { includes } = require('lodash');

require('./bootstrap');
var $ = require('jquery');

var options = {
  searchOptions: {
    key: 'sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo',
    language: 'en-GB',
    limit: 5
  },
  autocompleteOptions: {
    key: 'sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo',
    language: 'it-IT'
  }
};
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
document.getElementById("search-input").append(searchBoxHTML);
$(".tt-search-box-input").attr("name", "search");





$("#search-button").click(function(){
  var userInput = $(".tt-search-box-input").val();
  // prima funziona ajax
  $.ajax({
    "url": 'https://api.tomtom.com/search/2/geocode/'+ userInput + '.json?limit=1&key=sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo',
    "method": "GET",
    "success": function (data) {
      var latitude = data.results[0].position.lat;
      var longitude = data.results[0].position.lon;
      var rooms = $("#rooms_number").val();
      var beds = $("#beds_number").val();
      var radius = $("#radius").val();
      var services = "";
      $(".services").each(function(){
        if (this.checked) {
          services += this.value + ",";

        }

      })
 
      // seconda funzione ajax 
      $.ajax({
        "url": "localhost:8000/api/search",
        "data":{
          "latitude": latitude,
          "longitude": longitude,
          "radius": radius,
          "rooms": rooms,
          "beds": beds,
          "services": services,
        },
        "method": "GET",
        "success": function(data){
          console.log(data);
        },
        "error":function(error){
          console.log(error);
        },

      })
      // seconda funzione ajax 


    },
    "error": function (error){
      console.log(error);
    }
  })
   // prima funziona ajax
});