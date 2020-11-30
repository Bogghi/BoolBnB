<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsorization;
use App\Service;
class SearchController extends Controller
{
    public function search(Request $request) {
      $services = Service::all();
      $data = $request->all();
      $request->validate([
        "search" => "required|string"
      ]);

      // Api call to get latitude and longitude from the passed address.
      $address = $data['search'];
      $geocode = file_get_contents('https://api.tomtom.com/search/2/geocode/' . $address . '.json?limit=1&key=sVorgm5GUAIyuOOj6t6WLNHniiKmKUSo');
      $output = json_decode($geocode);
      $latitude = $output->results[0]->position->lat;
      $longitude = $output->results[0]->position->lon;

      // Set the search radius to 20km by default.
      $radius = 20;

      // Searching the apartments that are in a radius of 20km from the searched address.
      $apartments = Apartment::
                   selectRaw("*,
                    ( 6371 * acos( cos( radians(?) ) *
                      cos( radians( latitude ) )
                      * cos( radians( longitude ) - radians(?)
                      ) + sin( radians(?) ) *
                      sin( radians( latitude ) ) )
                    ) AS distance", [$latitude, $longitude, $latitude])
       ->having("distance", "<", $radius)
       ->orderBy("distance",'asc')
       ->get();

      // Searching for all sponsorized apartments.
      $all_apartments = Apartment::selectRaw("*,
             ( 6371 * acos( cos( radians(?) ) *
               cos( radians( latitude ) )
               * cos( radians( longitude ) - radians(?)
               ) + sin( radians(?) ) *
               sin( radians( latitude ) ) )
             ) AS distance", [$latitude, $longitude, $latitude])
      ->orderBy("distance",'asc')
      ->get();


      $all_sponsorized_apartments = [];

      foreach ($all_apartments as $all_apartment) {

        $active_sponsorization = count($all_apartment->sponsorizations->where("end_date", ">", date("Y-m-d H:m:s")));

        if ($active_sponsorization != 0) {

          $all_sponsorized_apartments[] = $all_apartment;
        }
      }


      return view("guests.search", compact("apartments", "all_sponsorized_apartments", "services"));
    }
}
