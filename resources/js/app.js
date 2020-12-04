const { includes, isNull } = require('lodash');

require('./bootstrap');
var $ = require('jquery');
const Handlebars = require("handlebars");




// QUI VANNO LE FUNZIONI !!!!!!!!!

function renderSponsorized(data) {
  console.log("sponsorizzati");
  var source = $("#search-result-template").html();
  var template = Handlebars.compile(source);
  for (var i = 0; i < 5 && i < data.length; i++) {
    console.log(i+"sponsorizzati");
    context = {
      "sponsorized": true,
      "cover_image": data[i].cover_image,
      "title": data[i].title,
      "description": data[i].description,
      "address": data[i].address,
      "beds_number": data[i].beds_number,
      "square_meters": data[i].square_meters
    }
    if (!data[i].cover_image.includes("placeholder")) {
      context.asset = true;
    };
    var html = template(context);
    $(".results-wrapper").append(html);
  }
}

function renderResults(data) {
  console.log("risultati");
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
    $(".results-wrapper").append(html);
  }
}

function getFilter(){
  var roomsNumber = $(".content input#rooms_number").prop('value');
  var bedsNumber = $(".content input#beds_number").prop('value');
  var radius = $(".content input#radius").prop('value');
  var labels = $(".label-options span");
  var services = [];

  labels.each(function() {
    
    if($(this).hasClass('active')){
      var id = $(this).prop('id');
      services.push(id);
    }

  });

  responses = {
    'roomsNumber': roomsNumber,
    'bedsNumber': bedsNumber,
    'radius': radius,
    'services': services.toString()
  };

  return responses;
}

// tomtom api call nested with our api call
function tomtomBoolbBnB(){
  var address = $(".filter #address").prop('value');

  $.ajax({
    "url": 'https://api.tomtom.com/search/2/geocode/' + address + '.json?limit=1&key=sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo',
    "method": "GET",
    "success": function (data) {
      var latitude = data.results[0].position.lat;
      var longitude = data.results[0].position.lon;
      var filter = getFilter();
  
      // seconda funzione ajax
      $.ajax({
        "url": "http://localhost:8000/api/search",
        "data": {
          "latitude": latitude,
          "longitude": longitude,
          "radius": filter.radius,
          "rooms": filter.roomsNumber,
          "beds": filter.bedsNumber,
          "services": filter.services
        },
        "method": "GET",
        "success": function (data) {
          console.log(data);
          $(".results-wrapper").empty();
          renderSponsorized(data.all_sponsorized_apartments);
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
  });
}
// tomtom api call nested with our api call

// QUI VANNO LE FUNZIONI !!!!!!!!!



// if (window.location.pathname == '/' || window.location.pathname == '/search') {
if (window.location.pathname == '/') {
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


  $("#search-button").click(function () {
    var userInput = $(".tt-search-box-input").val();
    
  });

  


}
// ------------------------------------------------------------------------------------------------------ //
// ----------------------------------------------statistc section---------------------------------------- //
if (window.location.pathname.includes("statistics")) {
  const apartment_id = window.location.pathname.split('/').pop();

  $(function () {

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

  function renderViews(views) {


    var ctx = document.getElementById('chartjs-0').getContext('2d');
    var chart = new Chart(ctx, {
      // The type of chart we want to create
      type: 'line',

      // The data for our dataset
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Average Views',
          borderColor: 'rgb(0, 240, 135)',
          pointBackgroundColor: 'rgb(0, 21, 51)',
          pointRadius: 5,
          fill: 'false',
          data: views
        }]
      },

      // Configuration options go here
      options: {

      }
    });
  }

  function renderMessages(messages) {
    var ctx = document.getElementById('myChart').getContext('2d');

    Chart.defaults.global.elements.rectangle.backgroundColor = 'rgba(0, 240, 135, 0.2)';
    Chart.defaults.global.elements.rectangle.borderColor = 'rgba(0, 21, 51, 1)';
    var myChart = new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        datasets: [{
          label: 'Average Messages',
          data: messages,
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
        }
      },
    });
  }
}

if(window.location.pathname == '/search'){

  $("#more-option").on('click',function(){
    var button = $('.filter-option');
    if(button.hasClass('active')){
      button.removeClass('active');
    }else {
      button.addClass('active');
    }
  });

  $(".label-options span").on('click',function(){
    var label = $(this);
    if(label.hasClass('active')){
      label.removeClass('active');
    }else {
      label.addClass('active');
    }
    tomtomBoolbBnB();
  });

  $(".content input").on('change',function () { 
    tomtomBoolbBnB();
  });
   
}



