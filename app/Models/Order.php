<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    public function user(){
    	return $this->belongsTo('App\Models\User');
    }

    public function products(){
    	return $this->belongsToMany('App\Models\Product')->withPivot('quantity');;
    }

    public function getTotalQuantityAttribute(){
    	$total_quantity = 0;

    	foreach($this->products as $product){
    		$total_quantity += $product->pivot->quantity;
    	}
    	return $total_quantity;
    }


}
