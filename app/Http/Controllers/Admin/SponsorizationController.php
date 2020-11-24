<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\PaymentPlan;
use App\Sponsorization;
use App\Apartment;

class SponsorizationController extends Controller
{

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $id)
    {
        //
        $payPlan = PaymentPlan::all();
        $id = $id->id;
        return view("admin.add-sponsorization",[
            "payPlan"=>$payPlan,
            "id"=>$id
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data = $request->all();
        $newSpn = new Sponsorization;
        $userId = Auth::id();
        $paymentPlanId = $data["payment_plan_id"];
        $payPlanInfo = PaymentPlan::find($paymentPlanId)->hours_duration;
        
        $userApartment = DB::table('apartments')
                            ->where('user_id', $userId)
                            ->pluck('id');

        $request->validate([
            'payment_plan_id' => "required",
            'appartment_id' => [
                'required',
                Rule::in($userApartment)
            ]
        ]);
        
        $newSpn->apartment_id = $data["appartment_id"];
        $newSpn->payment_plan_id = $data["payment_plan_id"];
        $newSpn->start_date = date("Y-m-d H:m:s");
        $newSpn->end_date = date("Y-m-d H:m:s",strtotime("+{$payPlanInfo} hours"));

        $newSpn->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

}
