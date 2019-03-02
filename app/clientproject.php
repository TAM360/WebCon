<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class clientproject extends Model
{
    public $table = 'clientproject';
    public $timestamps = false;
    protected $fillable = ['description','price','project_title'];
}
