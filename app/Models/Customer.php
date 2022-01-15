<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    /**
     * customer is created when he places order for the 1st time
     */

    use HasFactory;

    protected $fillable = [
        'user_id',
        'region_id',
        'email', //should customer have email??? it takes it from user anyway
        'f_name',
        'l_name',
        'age',
        'inst',
        'fb',
        'desired_delivery',
        'last_np_office',
        'zip',
        'city',
        //todo ? --> order
//        'street',
//        'house',
//        'apart',
//        'floor',
//        'intercom'
        // todo ?
    ];

    //todo enum
    const DELIVERY_NP = 1;
    const DELIVERY_UKRP = 2;
    const DELIVERY_EXPRESS = 3;
    const DELIVERY_SHOP = 4;
}
