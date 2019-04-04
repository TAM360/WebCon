<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estimate extends Model
{
     protected $table = 'estimates';
     protected $fillable = ['bricks','steels','cements','tiles'];
}
