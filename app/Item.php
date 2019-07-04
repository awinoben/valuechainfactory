<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    //
    //defining primary key for items table
    protected $table = "items";
    protected $primaryKey = 'item_id';
    protected $fillable = ['name','quantity','description'];


    function product(){
        return $this->hasOne('App\Item');
    }
}
