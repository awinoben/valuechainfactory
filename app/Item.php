<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $table = "items";

    protected $fillable = ['name','quantity', 'reorder_level', 'description'];

    function product(){
        return $this->hasOne('App\Item');
    }
}
