<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class Company extends Model
{
    use Searchable; 

    protected $fillable = [
        'name', 'email', 'password',
    ];

    protected $hidden = [
        'password', 'remember_token'
    ];

    public function companyProduct()
    {
        return $this->hasMany("App\CompanyProduct");
    }

    public function companyAddress()
    {
        return $this->hasMany('App\CompanyAddress');
    }
}
