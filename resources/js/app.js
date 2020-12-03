const { includes } = require('lodash');

require('./bootstrap');
var $ = require('jquery');
const Handlebars = require("handlebars");


var options = {
  searchOptions: {
    key: 'sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo',
    language: 'it-IT',
    limit: 5
  },
  autocompleteOptions: {
    key: 'sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo',
    language: 'it-IT'
  },
  labels: {
    placeholder: "Dove vuoi cercare?",
    noResultsMessage: "Nessun risultato trovato."
  },
  language: "it-IT",
  minNumberOfCharacters: 1,
  resultSet: "resultSet=category"
};
var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
document.getElementById("search-input").append(searchBoxHTML);
$(".tt-search-box-input").attr("name", "search");
$('.tt-search-box-input-container').append($(".search-btn"));




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

var searchbarOffsetTop = $(".searchbar").offset().top;
var scrolled = 0;

$(window).scroll(function () {
  if ($(window).scrollTop() > 0) {
    $(".navbar").addClass("navbar-fixed");
    $("header").addClass("margin-fixed");
    $("#logo").attr("src", "/img/boolbnb-logo-dark.svg");


  } else {
    $(".navbar").removeClass("navbar-fixed");
    $("header").removeClass("margin-fixed");
    $("#logo").attr("src", "/img/boolbnb-logo-light.svg");
  }

  if (($(window).scrollTop() > (searchbarOffsetTop - 40)) && scrolled == 0) {
    scrolled = 1;
    $(".searchbar").fadeOut(300, function () {
      $("header .logo").after($(".searchbar"));
      $(".cta").addClass("searchbar-margin");
      $(".searchbar").addClass("searchbar-nav");
      $(".searchbar").fadeIn(300);
    });

  } else if (($(window).scrollTop() < (searchbarOffsetTop - 40)) && scrolled == 1) {
    scrolled = 0;
    $(".searchbar").fadeOut(300, function () {
      $("header .jumbo-text").after($(".searchbar"));
      $(".cta").removeClass("searchbar-margin");
      $(".searchbar").removeClass("searchbar-nav");
      $(".searchbar").fadeIn(300);
    });
  }
});