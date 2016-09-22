<?php

namespace App\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class AdType extends Model
{
    use SoftDeletes;

    protected $table = 'ad_types';

    protected $fillable = [
        'id',
        'code',
        'name',
        'price',
    ];
}
