<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected  $fillable = [
        'item_id',
        'status',
        'quantity'
    ];

    protected $guarded = ['id'];

    public function scopeOfType($query, $type = 'processed')
    {
        if($type == 'processed') {
            return $query->where('status', 1);
        }

        return $query->where('status', 0);
    }

    public function product()
    {
        return $this->belongsTo(Item::class, 'item_id');
    }
}
