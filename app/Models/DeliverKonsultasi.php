<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliverKonsultasi extends Model
{
    use HasFactory;

    protected $fillable = [
    	'consult_id',
    	'message'
    ];
}
