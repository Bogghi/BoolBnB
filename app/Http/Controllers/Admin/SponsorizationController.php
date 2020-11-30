<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Braintree\Gateway;

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
        $alreadyActive = $this->alreadyActive($id);

        if ($alreadyActive) {
            return view("errors.sponsorization");
        }

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $token = $gateway->ClientToken()->generate();
        return view("admin.add-sponsorization", [
            "payPlan" => $payPlan,
            "id" => $id,
            "token" => $token
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

        $data = $request->all();
        $newSpn = new Sponsorization;
        $userId = Auth::id();
        $paymentPlanId = $data["payment_plan_id"];
        $apartmentId = $data["apartment_id"];
        $payPlanInfo = PaymentPlan::find($paymentPlanId)->hours_duration;
        $payAmaunt = PaymentPlan::find($paymentPlanId)->price;

        $alreadyActive = $this->alreadyActive($apartmentId);
        $checkout = $this->checkout($request, $payAmaunt);

        $userApartment = DB::table('apartments')
            ->where('user_id', $userId)
            // ->get();
            ->pluck('id');

        $validator = Validator::make($data, [
            'payment_plan_id' => "required",
            'apartment_id' => Rule::in($userApartment)
        ]);

        $validator->after(function ($validator) use ($alreadyActive) {
            if ($alreadyActive) {
                $validator->errors()->add('apartment_promo', 'A promo is already active on this apartment!');
            }
        });

        if ($validator->fails()) {
            return redirect()->route('admin.sponsorization.create', ["id" => $apartmentId])
                ->withErrors($validator)
                ->withInput();
        }

        $newSpn->apartment_id = $apartmentId;
        $newSpn->payment_plan_id = $paymentPlanId;
        $newSpn->start_date = date("Y-m-d H:i:s");
        $newSpn->end_date = date("Y-m-d H:i:s",strtotime("+{$payPlanInfo} hours"));

        $newSpn->save();

        return redirect()->route('admin.apartment.show', $apartmentId);
    }

    /**
     * Check if the promo is already active
     *
     * @return true if a promo is already active
     * @return flase if there isn't a promo active
     */
    private function alreadyActive($aprId){
        $now = date("Y-m-d H:i:s");

        $promoActive = DB::table('sponsorizations')
            ->where('apartment_id', $aprId)
            ->where('end_date', '>', $now)
            ->get();

        if (count($promoActive) == 0) {
            return false;
        }
        return true;
    }

    /**
     * Checkout handler
     */
    private function checkout($request, $price)
    {

        $gateway = new Gateway([
            'environment' => config('services.braintree.environment'),
            'merchantId' => config('services.braintree.merchantId'),
            'publicKey' => config('services.braintree.publicKey'),
            'privateKey' => config('services.braintree.privateKey')
        ]);

        $amount = $price;
        $nonce = $request->payment_method_nonce;

        $result = $gateway->transaction()->sale([
            'amount' => $amount,
            'paymentMethodNonce' => $nonce,
            'options' => [
                'submitForSettlement' => true
            ]
        ]);

        if ($result->success) {
            $transaction = $result->transaction;
            // header("Location: transaction.php?id=" . $transaction->id);

            return back()->with('success_message', 'Transaction successfull. The ID is: ' . $transaction->id);
        } else {
            $errorString = "";

            foreach ($result->errors->deepAll() as $error) {
                $errorString .= 'Error: ' . $error->code . ": " . $error->message . "\n";
            }

            // $_SESSION["errors"] = $errorString;
            // header("Location: index.php");
            return back()->withErrors('An errorr occurred with the message: ' . $result->message);
        }
    }
}
