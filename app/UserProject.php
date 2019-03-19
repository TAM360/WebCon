<?php

namespace App;

use App\User;
use Illuminate\Database\Eloquent\Model;

class UserProject extends Model
{
    public $table = 'user_projects';
    protected $fillable = ['project_description','price','project_title', 'user_id'];

    public function users()
    {
        return $this->belongsTo(User::class);
    }
}
