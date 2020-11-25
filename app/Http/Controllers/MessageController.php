<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Apartment;

class MessageController extends Controller
{
    public function store(Request $request) {

      $data = $request->all();

      $apartment_max_id = Apartment::orderByDesc("id")->first()->id;

      $request->validate([
        'apartment_id' => "required|integer|min:0|max:" . $apartment_max_id,
        'email' => "required|email:rfc,dns",
        'content' => "required|min:3|max:1000"
      ]);

      $newMessage = new Message();

      $newMessage->apartment_id = $data["apartment_id"];
      $newMessage->email = $data["email"];
      $newMessage->content = $data["content"];

      $newMessage->save();
    }
}
