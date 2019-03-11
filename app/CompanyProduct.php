<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyProduct extends Model
{
    
    // if you want to make all attributes mass assignable
    protected $guarded = [];

    public function company()
    {
        return $this->hasOne("App\Company", "foreign_key", "id");
    }
}