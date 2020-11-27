<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class SearchController extends Controller
{
    public function search() {

      // Take passed variable from the query string.
      $latitude = $_GET["latitude"];
      $longitude = $_GET["longitude"];
      $radius = $_GET["radius"];
      $rooms = $_GET["rooms"];
      $beds = $_GET["beds"];
      $services = $_GET["services"];

      // For debug
      // $latitude = 41.918171;
      // $longitude = 12.511850;
      // $radius = 50;
      // $rooms = 3;
      // $beds = 4;
      // $requested_services = [1, 2];

      // Filter apartments for distance, rooms and beds.
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
       ->where("rooms_number", ">=", $rooms)
       ->where("beds_number", ">=", $beds)
       ->get();

      //Search if the apartments matching with the requested services.
      $matched_apartments = [];

      foreach ($apartments as $apartment) {

        $services = [];

        foreach ($apartment->services as $service) {
          $services[] = $service->id;
        }

        if (count(array_diff_assoc($requested_services, $services)) == 0 ) {

          $matched_apartments[] = $apartment;
        }
      }

      return response()->json($matched_apartments);
    }
}
