<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyAddress extends Model
{
    public function company()
    {
        return $this->hasOne('App\Company', 'foreign_key', 'id');
    }
}
