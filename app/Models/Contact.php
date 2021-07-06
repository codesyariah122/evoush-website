<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Contact extends Model
{
    // use HasFactory;
    use SoftDeletes;
    
    public $table = "contact_message";
    protected $fillable = [
        'name',
        'email',
        'phone',
        'category_id',
        'message',
        'country',
        'city',
        'ip_address'
    ];

    public function category_message()
    {
        return $this->belongsTo('App\Models\CategoryMessage');
    }
}
