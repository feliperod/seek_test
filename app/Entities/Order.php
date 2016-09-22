<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'subtotal',
        'total',
        'discount',
        'customer_id',
    ];

    public function items()
    {
        return $this->belongsToMany('App\Entities\AdType', 'orders_items')->withPivot('quantity');
    }

    public function customer()
    {
        return $this->belongsTo('App\Entities\Customer');
    }
}
