<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class UserTransaction extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
       'user_id', 'items', 'total_amount', 'total_price', 'stripe_token',
    ];

    public function user() 
    {
        return HasOne(User::class);
    }
}
