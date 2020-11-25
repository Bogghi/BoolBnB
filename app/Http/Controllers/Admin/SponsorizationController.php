<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

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
        return view("admin.sponsorization",[
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
        $apartmentId = $data["apartment_id"];
        $payPlanInfo = PaymentPlan::find($paymentPlanId)->hours_duration;
        $alreadyActive = $this->alreadyActive($apartmentId);

        $userApartment = DB::table('apartments')
                            ->where('user_id', $userId)
                            // ->get();
                            ->pluck('id');

        $validator = Validator::make($data,[
            'payment_plan_id' => "required",
            'apartment_id' => Rule::in($userApartment)
        ]);

        $validator->after(function ($validator) use ($alreadyActive){
            if ($alreadyActive) {
                $validator->errors()->add('apartment_promo', 'A promo is already active on this apartment!');
            }
        });

        if ($validator->fails()) {
            return redirect()->route('admin.sponsorization.create',["id"=>$apartmentId])
                ->withErrors($validator)
                ->withInput();
        }

        $newSpn->apartment_id = $apartmentId;
        $newSpn->payment_plan_id = $paymentPlanId;
        $newSpn->start_date = date("Y-m-d H:m:s");
        $newSpn->end_date = date("Y-m-d H:m:s",strtotime("+{$payPlanInfo} hours"));

        $newSpn->save();


    }

    /**
     * Check if the promo is already active 
     * 
     * @return true if a promo is already active
     * @return flase if there isn't a promo active
     */
    private function alreadyActive($aprId){
        $now = date("Y-m-d H:m:s");

        $promoActive = DB::table('sponsorizations')
                           ->where('apartment_id',$aprId)
                           ->where('end_date','>',$now)
                           ->get();

        if(empty($promoActive)){
            return false;
        }
        return true;
    }

}
