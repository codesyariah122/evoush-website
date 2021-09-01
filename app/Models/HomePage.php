<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomePage extends Model
{
    use HasFactory;

    protected $home = [
    	'hero' => [
    		'image' => asset('images/kantor/3.jpg'),
    		'brand' => 'evoush',
    		'country' => 'Indonesia'
    	],
    	'panelHeader' => [
    		'vector' => asset('images/animated/anim31.gif'),
    		'header' => "Buat Rencana Besar Bersama",
    		'brand' => 'Evoush',
    		'paragraph' => "Mulailah berkembang bersama <b><u></u>Evoush</b>.  Buat kejutan dengan menentukan rencana <i class='fas fa-tags text-info'></i> penjualan anda diawal, jual produk, kreativitas dan kemampuan anda bersama team terhebat anda di Evoush. <b><u>Tunjukkan Pada Dunia</u></b> , bahwa anda mampu menciptakan sesuatu yang dapat membantu orang lain."
    	],
    ];

    public function getHomeContent()
    {
    	return $home;
    }
}
