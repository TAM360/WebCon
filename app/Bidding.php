<?php

namespace App;

use App\UserProject;
use App\Company;
use Illuminate\Database\Eloquent\Model;

class Bidding extends Model
{
    protected $fillable = [
        'price', 'bidding_description', 'status',
        'company_id', 'project_id', 'price'
    ];

    public function userProject()
    {
        return $this->belongsTo(UserProject::class);
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
