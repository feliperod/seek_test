<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PricingRule extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'rule_type',
        'rule',
        'ad_type_id',
        'customer_id',
    ];

    public function customer()
    {
        return $this->belongsTo('App\Entities\Customer');
    }

    public function adType()
    {
        return $this->belongsTo('App\Entities\AdType');
    }
}
