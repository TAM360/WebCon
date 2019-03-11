<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function companyProduct()
    {
        return $this->hasMany("App\CompanyProduct");
    }

    public function companyAddress()
    {
        return $this->hasMany('App\CompanyAddress');
    }
}
