<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    //this model rappresent all messages recived by the owners

    public function apartment(){
        return $this->belongsTo("App\Apartment");
    }
}
