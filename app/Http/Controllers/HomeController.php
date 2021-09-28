<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Member;
use App\Models\Profile;
use App\Models\Joining;


use Validator;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        // return json_encode(['message' => 'Evoush::Official | Website']);
        $context = [
            'title' => 'Evoush::Official',
            'canonical' => 'https://app.evoush.com',
            'meta_desc' => 'Your Eternal Future',
            'meta_key' => 'Product Kosmetik Dan Nutrisi Evoush',
            'meta_author' => 'Evoush::Official',
            'og_url' => 'https://app.evoush.com',
            'og_type' => 'website',
            'og_site_name' => 'Evoush::Official',
            'og_title' => 'Evoush::Official | Website::Official',
            'og_desc' => 'Your Eternal Future',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/stories/1.jpg',
            'og_image_width' => '600',
            'og_image_height' => '590'
        ];

        return view('homes.index', $context);
    }

}
