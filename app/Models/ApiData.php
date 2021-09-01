<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ApiData extends Model
{
    use HasFactory;
    public $table = "api_data_test";
    protected $fillabel = [
    	'id',
    	'title',
    	'content'
    ];
}
