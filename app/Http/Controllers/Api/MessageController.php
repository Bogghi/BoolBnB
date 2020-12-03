<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;
use Illuminate\Support\Facades\DB;

class MessageController extends Controller
{
    public function message() {
        $message_id = $_GET['id'];
        $messages = Message::find($message_id);
        return response()->json($messages);
    }
}
