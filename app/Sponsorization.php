<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sponsorization extends Model
{
    public function apartment() {
        return $this->belongsTo('App\Apartment');
    }

    public function payment_plan() {
        return $this->belongsTo('App\Apartment');
    }
}
