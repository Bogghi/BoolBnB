<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Apartment;

class MessageController extends Controller
{
    public function store(Request $request,$apartment_id) {

      $data = $request->all();


      $request->validate([
        'email' => "required|email:rfc,dns",
        'content' => "required|min:3|max:1000"
      ]);

      $newMessage = new Message();

      $newMessage->apartment_id = $apartment_id;
      $newMessage->email = $data["email"];
      $newMessage->content = $data["content"];

      $newMessage->save();
    }
}
