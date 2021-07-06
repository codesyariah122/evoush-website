<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class CategoryArticles extends Model
{
    use SoftDeletes;
    public $table = "category_articles";
    protected $fillable = [
    	'id',
    	'category_name',
    	'caption'
    ];

    public function articles()
    {
    	return $this->belongsToMany('App\Models\Articles');
    }
}
