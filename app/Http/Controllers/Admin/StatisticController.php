<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    //controller to manage statitics routing

    public function index($id){
        return view('admin.statistics');
    }
}
