const { includes, isNull } = require('lodash');

require('./bootstrap');
var $ = require('jquery');
const Handlebars = require("handlebars");

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
var searchInput = document.getElementById("search-input");
var element = $(".tt-search-box-input");

if(isNull(element) && isNull(searchInput)){
  element.attr("name", "search");
  searchInput.append(searchBoxHTML);
}

$("#search-button").click(function () {
  var userInput = $(".tt-search-box-input").val();
  // prima funziona ajax
  $.ajax({
    "url": 'https://api.tomtom.com/search/2/geocode/' + userInput + '.json?limit=1&key=sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo',
    "method": "GET",
    "success": function (data) {
      var latitude = data.results[0].position.lat;
      var longitude = data.results[0].position.lon;
      var rooms = $("#rooms_number").val();
      var beds = $("#beds_number").val();
      var radius = $("#radius").val();
      var services = "";
      $(".services").each(function () {
        if (this.checked) {
          services += this.value + ",";

        }

      })

      // seconda funzione ajax
      $.ajax({
        "url": "http://localhost:8000/api/search",
        "data": {
          "latitude": latitude,
          "longitude": longitude,
          "radius": radius,
          "rooms": rooms,
          "beds": beds,
          "services": services,
        },
        "method": "GET",
        "success": function (data) {
          console.log(data);
          renderSponsorized(data);
          renderResults(data);
        },
        "error": function (error) {
          console.log(error);
        },

      })
      // seconda funzione ajax


    },
    "error": function (error) {
      console.log(error);
    }
  })
  // prima funziona ajax
});

function renderSponsorized(data) {
  $("#sponsorized-apartments").empty();
  var source = $("#search-result-template").html();
  var template = Handlebars.compile(source);
  var sponsorized = data.all_sponsorized_apartments;
  for (var i = 0; i < 5 && i < sponsorized.length; i++) {
    context = {
      "sponsorized": true,
      "cover_image": sponsorized[i].cover_image,
      "title": sponsorized[i].title,
      "description": sponsorized[i].description,
      "address": sponsorized[i].address,
      "beds_number": sponsorized[i].beds_number,
      "square_meters": sponsorized[i].square_meters
    }
    if (!sponsorized[i].cover_image.includes("placeholder")) {
      context.asset = true;
    };
    var html = template(context);
    $("#sponsorized-apartments").append(html);
  }
}

function renderResults(data) {
  $("#searched-apartments").empty();
  var source = $("#search-result-template").html();
  var template = Handlebars.compile(source);
  var apartments = data.matched_apartments;
  var sponsorized = data.all_sponsorized_apartments;
  var sponsorizedIds = [];
  for (var i = 0; i < sponsorized.length; i++) {
    sponsorizedIds.push(sponsorized[i].id);
  }
  for (var i = 0; i < apartments.length; i++) {
    context = {
      "cover_image": apartments[i].cover_image,
      "title": apartments[i].title,
      "description": apartments[i].description,
      "address": apartments[i].address,
      "beds_number": apartments[i].beds_number,
      "square_meters": apartments[i].square_meters
    }
    if (!apartments[i].cover_image.includes("placeholder")) {
      context.asset = true;
    };
    if (sponsorizedIds.includes(apartments[i].id)) {
      context.sponsorized = true;
    }
    var html = template(context);
    $("#searched-apartments").append(html);
  }
}

// ------------------------------------------------------------------------------------------------------ //
// ----------------------------------------------statistc section---------------------------------------- //

const apartment_id = window.location.pathname.split('/').pop();

$(function(){

  $.ajax({
    "url": "http://localhost:8000/api/statistics",
    "data": {
      "apartment_id": apartment_id
    },
    "method": "GET",
    "success": function (data) {
      let views = data.averageViews;
      let messages = data.averageMessages;

      renderViews(views);
      renderMessages(messages);
      $('#total-views').text(data.totalViews);
      $('#total-messages').text(data.totalMessages);
    },
    "error": function (error) {
      console.log(error);
    }
  })

});

function renderViews(views){
  var ctx = document.getElementById('chartjs-0').getContext('2d');
  var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Aug','Sep','Oct','Nov','Dec'],
          datasets: [{
              label: 'Average Views',
              borderColor: 'rgb(0, 240, 135)',
              pointBackgroundColor: 'rgb(0, 21, 51)',
              pointRadius: 5,
              fill: 'false',
              data: views
              // data: [0, 0.7, 5, 2, 20, 30, 45,0, 10, 5, 2, 20, 30, 45]
          }]
      },

      // Configuration options go here
      options: {
          responsive: false
      }
  });
}

function renderMessages(messages){
  var ctx = document.getElementById('myChart').getContext('2d');

  Chart.defaults.global.elements.rectangle.backgroundColor = 'rgba(0, 240, 135, 0.2)';
  Chart.defaults.global.elements.rectangle.borderColor = 'rgba(0, 21, 51, 1)';
  var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
          labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July','Aug','Sep','Oct','Nov','Dec'],
          datasets: [{
              label: 'Average Messages',
              data: messages,
              // data: [12, 10, 3, 5, 2, 3, 12, 10, 3, 5, 2, 3],
              borderWidth: 1
          }]
      },
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  }
              }]
          },
          responsive: false
      },
  });
}