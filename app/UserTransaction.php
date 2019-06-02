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
       'user_id', 'total_amount', 'total_items', 'stripe_token', 'items'
    ];

    // protected $guarded = ['items'];

    public function user() 
    {
        return HasOne(User::class);
    }
}
