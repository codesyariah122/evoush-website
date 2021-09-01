<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Joining extends Model
{
    // use HasFactory;
    use softDeletes;
    public $table = "joining";

    public function member()
    {
    	return $this->belongsToMany('App\Models\Member');
    }
}
