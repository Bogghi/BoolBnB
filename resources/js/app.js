const { includes, isNull } = require('lodash');

require('./bootstrap');
var $ = require('jquery');
const Handlebars = require("handlebars");




// QUI VANNO LE FUNZIONI !!!!!!!!!

function renderSponsorized(data) {
  var source = $("#search-result-template").html();
  var template = Handlebars.compile(source);
  for (var i = 0; i < 5 && i < data.length; i++) {
    context = {
      "id": data[i].id,
      "sponsorized": true,
      "cover_image": data[i].cover_image,
      "title": data[i].title,
      "description": data[i].description,
      "address": data[i].address,
      "latitude": data[i].latitude,
      "longitude": data[i].longitude,
      "beds_number": data[i].beds_number,
      "bathrooms_number": data[i].bathrooms_number,
      "rooms_number": data[i].rooms_number,
      "square_meters": data[i].square_meters,
      "id": data[i].id
    }
    if (!data[i].cover_image.includes("placeholder")) {
      context.asset = true;
    };
    var html = template(context);
    $(".results-wrapper").append(html);
  }
}

function renderResults(data) {
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
      "id": apartments[i].id,
      "sponsorized": true,
      "cover_image": apartments[i].cover_image,
      "title": apartments[i].title,
      "description": apartments[i].description,
      "address": apartments[i].address,
      "latitude": apartments[i].latitude,
      "longitude": apartments[i].longitude,
      "beds_number": apartments[i].beds_number,
      "bathrooms_number": apartments[i].bathrooms_number,
      "rooms_number": apartments[i].rooms_number,
      "square_meters": apartments[i].square_meters,
      "id": apartments[i].id
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

function getFilter() {
  var roomsNumber = $(".content input#rooms_number").prop('value');
  var bedsNumber = $(".content input#beds_number").prop('value');
  var radius = $(".content input#radius").prop('value');
  var labels = $(".label-options span");
  var services = [];

  labels.each(function () {

    if ($(this).hasClass('active')) {
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

  console.log(responses);

  return responses;
}

// tomtom api call nested with our api call
function tomtomBoolbBnB() {
  var address = $(".filter #user-search").prop('value');

  $.ajax({
    "url": 'https://api.tomtom.com/search/2/geocode/' + address + '.json?limit=1&key=sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo',
    "method": "GET",
    "success": function (data) {
      var latitude = data.results[0].position.lat;
      var longitude = data.results[0].position.lon;
      var filter = getFilter();
      console.log(latitude + " " + longitude);

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
          renderResultsMap();

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

// Generate map on Search Results page
function renderResultsMap() {

  var search = $("#user-search").val();

  $.ajax({
    "url": "https://api.tomtom.com/search/2/search/" + search + ".json",
    "method": "GET",
    "data": {
      "key": "sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo",
      "countrySet": "IT",
      "limit": 1
    },
    "success": function (data) {
      var lon = data.results[0].position.lon;
      var lat = data.results[0].position.lat;

      var map = tt.map({
        key: "sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo",
        container: "map-container",
        style: "tomtom://vector/1/basic-main",
        zoom: 12,
        center: [lon, lat]
      });

      var element = document.createElement('div');
      element.classList.add("marker-search");

      var marker = new tt.Marker()
        .setLngLat([lon, lat])
        .addTo(map);

      if ($(".marker-house").length > 0) {

        $(".marker-house").remove();

      }

      $(".apartment-card").each(function () {

        var markerLon = $(this).find(".apartment-lon").val();
        var markerLat = $(this).find(".apartment-lat").val();
        var markerId = $(this).find(".apartment-id").val();

        var element = document.createElement('div');
        element.classList.add("marker-house");
        $(element).attr("data-id", markerId);

        var marker = new tt.Marker({ element: element })
          .setLngLat([markerLon, markerLat])
          .addTo(map);

        $(marker._element).on("click", function () {
          var dataId = $(this).attr("data-id");
          $(".apartment-card").removeClass("selected");
          $("input[value='" + dataId + "']").parents(".apartment-card").addClass("selected");
          var card = $("input[value='" + dataId + "']").parents(".apartment-card");
          var positionTop = card.get(0).offsetTop;
          $(".results-wrapper").animate({ scrollTop: positionTop - 60 + "px" });
        });
      });
    }
  });

}
// Generate map on Search Results page

// TomTom utility functions

function isMobileOrTablet() {
  var check = false;
  // eslint-disable-next-line
  (function (a) { if (/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino|android|ipad|playbook|silk/i.test(a) || /1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i.test(a.substr(0, 4))) check = true; })(navigator.userAgent || navigator.vendor || window.opera);
  return check;
}

window.isMobileOrTablet = window.isMobileOrTablet || isMobileOrTablet;

function createMarker(icon, position, color, popupText) {
  var markerElement = document.createElement('div');
  markerElement.className = 'marker';

  var markerContentElement = document.createElement('div');
  markerContentElement.className = 'marker-content';
  markerContentElement.style.backgroundColor = color;
  markerElement.appendChild(markerContentElement);

  var iconElement = document.createElement('div');
  iconElement.className = 'marker-icon';
  iconElement.style.backgroundImage =
    'url(https://api.tomtom.com/maps-sdk-for-web/5.x/assets/images/' + icon + ')';
  markerContentElement.appendChild(iconElement);

  var popup = new tt.Popup({ offset: 30 }).setText(popupText);
  // add marker to map
  new tt.Marker({ element: markerElement, anchor: 'bottom' })
    .setLngLat(position)
    .setPopup(popup)
    .addTo(map);
}

// TomTom utility functions

function visibilitControll () { 
  var visibility = $(".visibility");
  var input = visibility.find("input");
  var label = visibility.find("label");

  if(input.is(":checked")){
    visibility.removeClass("bg-red");
    visibility.addClass("bg-green");
    label.text("Visible");
  }else {
    visibility.removeClass("bg-green");
    visibility.addClass("bg-red");
    label.text("Invisible");
  }
}

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
    },
    labels: {
      placeholder: "Dove vuoi andare?"
    }
  };


  var ttSearchBox = new tt.plugins.SearchBox(tt.services, options);
  var searchBoxHTML = ttSearchBox.getSearchBoxHTML();
  document.getElementById("search-input").append(searchBoxHTML);
  $(".tt-search-box-input").attr("name", "search");
  $('.tt-search-box-input-container').append($(".search-btn"));

  $("#search-button").click(function () {
    var userInput = $(".tt-search-box-input").val();

  });

}


if (window.location.pathname == '/') {
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

// Map generation in show view
if (($("#map-container").length > 0) && (window.location.pathname.includes("show"))) {
  var address = $("#address").text();

  console.log(address);

  $.ajax({
    "url": "https://api.tomtom.com/search/2/search/" + address + ".json",
    "method": "GET",
    "data": {
      "key": "sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo",
      "countrySet": "IT",
      "limit": 1
    },
    "success": function (data) {
      console.log(data);
      var lon = data.results[0].position.lon;
      var lat = data.results[0].position.lat;

      var map = tt.map({
        key: "sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo",
        container: "map-container",
        style: "tomtom://vector/1/basic-main",
        zoom: 12,
        center: [lon, lat]
      });

      var element = document.createElement('div');
      element.classList.add("marker-house");

      var marker = new tt.Marker({ element: element })
        .setLngLat([lon, lat])
        .addTo(map);

    }
  });
}

//Modal-api-show

$('.single-message').on('click', function () {
  var id = $(this).attr('data-id');
  console.log(id);

  $.ajax({
    "url": "http://localhost:8000/api/message?" + "id=" + id,

    "method": "GET",
    "success": function (data) {
      $('#message-email').text(data.email);
      $('#message-text').text(data.content);
    },
    "error": function (error) {
      console.log(error);
    }
  })

});

//HORIZONTAL SCROLL HOMEPAGE 
// var winmed = window.matchMedia("(min-width: 1500px)");
// if (winmed.matches){

var box = $('#scroll');
var boxScroll;
$('.arrow').click(function () {
  if ($(this).hasClass("next")) {
    boxScroll = ((box.width() / 2)) + box.scrollLeft();
    box.animate({
      scrollLeft: boxScroll,
    })
  } else {
    x = ((box.width() / 3)) - box.scrollLeft();
    box.animate({
      scrollLeft: -boxScroll,
    })
  }
})
// }

if (($("#map-container").length > 0) && (window.location.pathname == '/search')) {

  renderResultsMap();

  $("#more-option").on('click', function () {
    var button = $('.filter-option');
    if (button.hasClass('active')) {
      button.removeClass('active');
    } else {
      button.addClass('active');
    }
  });

  $(".label-options span").on('click', function () {
    var label = $(this);
    if (label.hasClass('active')) {
      label.removeClass('active');
    } else {
      label.addClass('active');
    }
    tomtomBoolbBnB();
  });

  $(".content input").on('change', function () {
    tomtomBoolbBnB();
  });

  $(".content input").on('keyup', function () {
    tomtomBoolbBnB();
  });

  $(".marker-house::after").on("click", function () {
    console.log("ciao");
  });
}



if(window.location.pathname.includes("edit")){

  $(function () { 
    var inputs = $(".label .label-style input");

    visibilitControll();

    inputs.each(function() {
      if($(this).is(":checked")){
        var label = $(this).parent();
        label.addClass("active");
      }else {
        var label = $(this).parent();
        label.removeClass("active");
      }
    });


  });

  $(".visibility input").on('click',function() {
    visibilitControll();
  });

  $(".label-style input").on('click',function() {
    var label = $(this).parent();
    if($(this).is(":checked")){
      label.addClass('active');
    }else {
      label.removeClass('active');
    }
  });

}