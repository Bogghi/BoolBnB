<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsorization;

class ApartmentController extends Controller
{
    public function index() {


      $active_sponsorizations = Sponsorization::where("end_date", ">", date("Y-m-d H:m:s"))->get();

      $sponsored_apartments = [];

      foreach ($active_sponsorizations as $active) {

        $apartment_id = $active->apartment_id;

        $apartment = Apartment::find($apartment_id);

        $sponsored_apartments[] = $apartment;
      }



      return view('guests.homepage', compact('sponsored_apartments'));
    }

    public function show($id) {

      $apartment = Apartment::find($id);

      return view('guests.show', compact('apartment'));
    }
}
