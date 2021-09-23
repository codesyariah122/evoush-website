<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Konsultasi extends Model
{
    use HasFactory;

    protected $fillable = [
        'fullname',
        'phone',
        'message',
        'city',
        'age',
        'gender',
        'status'
    ];
}
