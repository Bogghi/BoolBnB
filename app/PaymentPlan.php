<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaymentPlan extends Model
{
     public function sponsorizations() {
        return $this->hasMany('App\PaymentPlan');
    }
}
