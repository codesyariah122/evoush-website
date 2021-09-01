<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    // use HasFactory;
	use SoftDeletes;
	public $table = "products";

	protected $fillable = [
		'title',
		'slug',
		'description',
		'mini_description',
		'cover',
		'price',
		'views',
		'stock',
		'status',
		'slider'
	];


    public function categories(){
    	return $this->belongsToMany('App\Models\Category');
    }

    public function orders(){
    	return $this->belongsToMany('App\Models\Order');
    }
}
