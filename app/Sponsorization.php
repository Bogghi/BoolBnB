<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorization extends Model
{
    public function apartment() {
        return $this->belongsTo('App\Apartment');
    }

    public function paymentPlan() {
        return $this->belongsTo('App\PaymentPlan');
    }
}
