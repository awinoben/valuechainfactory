<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Retailer extends Model
{
    //
    function user(){
        return $this->hasOne('App\User');
    }
}
