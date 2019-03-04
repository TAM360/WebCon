<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class biding extends Model
{
    public $table = 'biding';
    public $timestamps = false;
    protected $fillable = ['price'];
}
