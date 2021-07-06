<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


class Profile extends Model
{
    // use HasFactory;
    use SoftDeletes;

    public $table = "profile";
    public $fillable = [
    	'quotes',
    	'cover',
    	'about'
    ];

    public function users()
    {
    	// return $this->hasMany('App\Models\User');
        return $this->belongsToMany('App\Models\User');
    }

    public function member()
    {
        return $this->belongsTo('App\Models\Member');
    }

    public function joining()
    {
        return $this->belongsTo('App\Models\Joining');
    }
}
