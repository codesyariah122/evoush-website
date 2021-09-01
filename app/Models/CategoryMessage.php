<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoryMessage extends Model
{
    use SoftDeletes;

    public $table = "category_message";
    protected $fillable = [
    	'id',
    	'category_name',
    	'caption'
    ];

    public function contact_message(){
    	return $this->belongsToMany('App\Models\Contact');
    }
}
