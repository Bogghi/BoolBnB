<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Apartment;

class SearchController extends Controller
{
  public function search()
  {

    $latitude = $_GET["latitude"];
    $longitude = $_GET["longitude"];
    $radius = $_GET["radius"];
    $rooms = $_GET["rooms"];
    $beds = $_GET["beds"];
    if ($_GET["services"] == "") {
      $requested_services = [];
    } else {
      $requested_services = explode(",", $_GET["services"]);
    }

    // For debug

    // $latitude = 41.918171;
    // $longitude = 12.511850;
    // $radius = 50;
    // $rooms = 1;
    // $beds = 1;
    // $requested_services = ["1", "2", "6"];


    // Filter apartments for distance, rooms and beds.
    $apartments = Apartment::selectRaw("*,
                    ( 6371 * acos( cos( radians(?) ) *
                      cos( radians( latitude ) )
                      * cos( radians( longitude ) - radians(?)
                      ) + sin( radians(?) ) *
                      sin( radians( latitude ) ) )
                    ) AS distance", [$latitude, $longitude, $latitude])
      ->having("distance", "<", $radius)
      ->orderBy("distance", 'asc')
      ->where("rooms_number", ">=", $rooms)
      ->where("beds_number", ">=", $beds)
      ->get();

    //Search if the apartments matching with the requested services.
    $matched_apartments = [];

    foreach ($apartments as $apartment) {

      $services = [];
      $apartment->sponsorizations;

      foreach ($apartment->services as $service) {
        $services[] = $service->id;
      }

      $service_quantity = count($requested_services);
      $counter = 0;
      foreach ($requested_services as $requested_service) {

        if(in_array($requested_service, $services)) {

          $counter++;
        }
      }

      if ($counter == $service_quantity) {

        $matched_apartments[] = $apartment;
      }
    }

    // Searching for all sponsorized apartments.
    $all_apartments = Apartment::selectRaw("*,
             ( 6371 * acos( cos( radians(?) ) *
               cos( radians( latitude ) )
               * cos( radians( longitude ) - radians(?)
               ) + sin( radians(?) ) *
               sin( radians( latitude ) ) )
             ) AS distance", [$latitude, $longitude, $latitude])
      ->orderBy("distance", 'asc')
      ->get();


    $all_sponsorized_apartments = [];

    foreach ($all_apartments as $all_apartment) {

      $active_sponsorization = count($all_apartment->sponsorizations->where("end_date", ">", date("Y-m-d H:i:s")));

      if ($active_sponsorization == 1) {

        $all_sponsorized_apartments[] = $all_apartment;
      }
    }

    $data = [
      "matched_apartments" => $matched_apartments,
      "all_sponsorized_apartments" => $all_sponsorized_apartments
    ];

    return response()->json($data);
  }
}
