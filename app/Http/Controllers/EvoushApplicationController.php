<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EvoushApplicationController extends Controller
{
    //
    public function healthy()
    {
    	return "Evoush Healthy Product";
    }

    public function beauty()
    {
    	return "Evoush Beauty Product";
    }

    public function salaam()
    {
    	$context = [
            'title' => 'Evoush::Application | Salaam',
            'meta_desc' => 'Evoush::Application',
            'meta_key' => 'Bisnis Network Marketing Zaman Now Ya Evoush Indonesia',
            'meta_author' => 'Evoush::Indonesia-Quran',
            'og_title' => 'Evoush::Application',
            'og_desc' => 'Your Eternal Future',
            'og_image' => 'Masuk.jpg',
            'og_url' => 'https://evoush.com/',
            // 'user' => User::where('name', Auth::user()->name)
        ];
        return view('application.quran.index', $context);
    }

    public function cargo()
    {
    	return "Cargo Shippment Application";
    }
}
