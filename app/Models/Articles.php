<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Articles extends Model
{
    // use HasFactory;
    use SoftDeletes;
    
    public $table = "articles";
    protected $fillable = [
        'id',
        'author',
        'category_id',
        'title',
        'slug',
        'headline',
        'cover',
        'content',
        'status'
    ];

    public function category_articles()
    {
        return $this->belongsToMany('App\Models\CategoryArticles');
    }
}
