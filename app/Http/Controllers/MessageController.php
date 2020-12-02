<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;
use App\Apartment;

class MessageController extends Controller
{
    public function store(Request $request,$id) {

      $data = $request->all();

      $request->validate([
        'email' => "required|email:rfc,dns",
        'content' => "required|min:3|max:1000"
      ]);

      $newMessage = new Message();

      $newMessage->apartment_id = $id;
      $newMessage->email = $data["email"];
      $newMessage->content = $data["content"];
      $newMessage->date = date('Y-m-d H:i:s');

      $newMessage->save();
      return redirect()->route('apartment.show', $id);
    }
}
