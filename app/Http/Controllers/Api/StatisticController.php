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

      switch ($month) {
        case '1':
          $totalContents[$month - 1]++;
          break;
        case '2':
          $totalContents[$month - 1]++;
          break;
        case '3':
          $totalContents[$month - 1]++;
          break;
        case '4':
          $totalContents[$month - 1]++;
          break;
        case '5':
          $totalContents[$month - 1]++;
          break;
        case '6':
          $totalContents[$month - 1]++;
          break;
        case '7':
          $totalContents[$month - 1]++;
          break;
        case '8':
          $totalContents[$month - 1]++;
          break;
        case '9':
          $totalContents[$month - 1]++;
          break;
        case '10':
          $totalContents[$month - 1]++;
          break;
        case '11':
          $totalContents[$month - 1]++;
          break;
        case '12':
          $totalContents[$month - 1]++;
          break;
        default:
          break;
      }
    }

    foreach ($totalContents as $key => $totalContent) {

      $totalContents[$key] = $totalContent / 10;
    }

    return $totalContents;
  }
}
