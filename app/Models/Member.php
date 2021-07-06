<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Member extends Model
{
    // use HasFactory;
    use softDeletes;
    
    public $table = "member";


    public function joining()
    {
    	return $this->belongsToMany('App\Models\Joining');
    }

    public function users()
    {
    	// return $this->hasMany('App\Models\User');
        return $this->belongsTo('App\Models\User');
    }

    public function profile()
    {
        return $this->belongsToMany('App\Models\Profile');
    }
}
