<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Apartment;
use App\Sponsorization;
use App\View;
use Illuminate\Support\Facades\Auth;

class ApartmentController extends Controller
{
    public function index() {


      $active_sponsorizations = Sponsorization::where("end_date", ">", date("Y-m-d H:i:s"))->get();

      $sponsored_apartments = [];

      foreach ($active_sponsorizations as $active) {

        $apartment_id = $active->apartment_id;

        $apartment = Apartment::find($apartment_id);

        if ($apartment->visibility == 1) {

          $sponsored_apartments[] = $apartment;
        }

      }

      return view('guests.homepage', compact('sponsored_apartments'));
    }

    public function show($id) {

      $apartment = Apartment::findOrFail($id);

      if ($apartment->visibility == 0) {

        abort(404);
      }

      $owner_id = $apartment->user_id;

      $current_user_id = Auth::id();

      if ($owner_id != $current_user_id) {

        $newView = new View();

        $newView->apartment_id = $id;
        $newView->date = date("Y-m-d H:i:s");

        $newView->save();

      }

      return view('admin.show', compact('apartment'));
    }
}
