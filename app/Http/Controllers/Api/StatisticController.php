<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\View;
use App\Message;

class StatisticController extends Controller
{
  public function getData()
  {
    $apartment_id = $_GET['apartment_id'];
    $period = date('Y-m-d', strtotime('-10 years'));
    $views = View::where('apartment_id', $apartment_id)->where('date', '>', $period)->get();
    $messages = Message::where('apartment_id', $apartment_id)->where('date', '>', $period)->get();
    $totalViews = $this->filterResults($views);
    $totalMessages = $this->filterResults($messages);

    $response = [
      "totalViews" => $totalViews,
      "totalMessages" => $totalMessages
    ];

    return response()->json($response);

  }

  private function filterResults($contents) {

    $totalContents = [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0];

    foreach ($contents as $content) {
      $date = $content->date;
      $month = date("m", strtotime($date));
      $totalContents[$month-1]++;
    }

    foreach ($totalContents as $key => $totalContent) {
      $totalContents[$key] = $totalContent / 10;
    }

    return $totalContents;
  }
}
