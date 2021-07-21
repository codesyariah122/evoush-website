<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MetaDataController extends Controller
{
    //
    public function home_page_data()
    {
        $meta = [
            'title' => 'Evoush::Official | Home::Page',
            'canonical' => 'https://evoush.com/',
            'meta_desc' => 'Evoush::Official | Home::Page',
            'meta_key' => 'Bisnis Network Marketing Zaman Now Ya Evoush Indonesia',
            'meta_author' => 'Evoush::Official | Home::Page',
            'og_title' => 'Evoush::Official | Home::Page',
            'og_site_name' => 'Evoush::Official | Home::Page',
            'og_desc' => 'Your Eternal Future',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/about/2%20kn.jpg',
            'og_url' => 'https://evoush.com/',
                // 'user' => User::where('name', Auth::user()->name)
        ];

        return json_encode($meta);
    }

    public function about_page_data()
    {
        $meta = [
            'title' => 'Evoush::Official | About::Page',
            'canonical' => 'https://evoush.com/about',
            'meta_desc' => 'Evoush::Official | About-Page',
            'meta_key' => 'Evoush By PT. Pineleng Indah Cemerlang',
            'meta_author' => 'Evoush::Official | About-Page',
            'og_title' => 'Evoush::Official | About-Page',
            'og_site_name' => 'Evoush::Official | About-Page',
            'og_desc' => 'Your Eternal Future',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/about/2%20kn.jpg',
            'og_url' => 'https://evoush.com/about',
                // 'user' => User::where('name', Auth::user()->name)
        ];
        return json_encode($meta);
    }

    public function product_page_data()
    {
        $meta = [
            'title' => 'Evoush::Official | Product::Page',
            'canonical' => 'https://evoush.com/product',
            'meta_desc' => 'Evoush::Official | Product::Page',
            'meta_key' => 'Bisnis Network Marketing Dengan Standart Product Terbaik dan berkualitas yang kaya manfaat bagi diri dan bisnis anda',
            'meta_author' => 'Evoush::Official | Product::Page',
            'og_title' => 'Evoush::Official | Product::Page',
            'og_site_name' => 'Evoush::Official | Product::Page',
            'og_desc' => 'Evoush::Product dengan kualitas terbaik yang siap meroketkan bisnis anda, tidak hanya kualitas dan keuntungan dari produk kami, namun lebih dari itu Evoush::Product sangat kaya manfaat bagi pribadi kita',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/NEW%20PRODUCT/1.jpg',
            'og_url' => 'https://evoush.com/product',
                // 'kosmetiks' => $kosmetik,
                // 'nutrisi' => $nutrisi
                // 'user' => User::where('name', Auth::user()->name)
        ];
        return json_encode($meta);
    }

    public function article_page_data()
    {
        $meta = [
            'title' => 'Evoush::Official | Articles::Page',
            'canonical' => 'https://evoush.com/articles',
            'meta_desc' => 'Evoush::Official',
            'meta_key' => 'Bisnis Network Marketing Dengan Standart Product Terbaik dan berkualitas yang kaya manfaat bagi diri dan bisnis anda',
            'meta_author' => 'Evoush::Official | Articles::Page',
            'og_title' => 'Evoush::Official',
            'og_site_name' => 'Evoush::Official | Article::Page',
            'og_desc' => 'Your Eternal Future',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/about/2%20kn.jpg',
            'og_url' => 'https://evoush.com/articles',
                // 'user' => User::where('name', Auth::user()->name)
        ];
        return json_encode($meta);
    }

    public function contact_page_data()
    {
    	$meta = [
            'title' => 'Evoush::Official | Contact::Page',
            'canonical' => 'https://evoush.com/contact',
            'meta_desc' => 'Evoush::Official | Contact::Page',
            'meta_key' => 'Bisnis Network Marketing Dengan Standart Product Terbaik dan berkualitas yang kaya manfaat bagi diri dan bisnis anda',
            'meta_author' => 'Evoush::Official | Contact::Page',
            'og_title' => 'Evoush::Official | Contact::Page',
            'og_site_name' => 'Evoush::Official | Contact::Page',
            'og_desc' => 'Your Eternal Future',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/jumbotron5.jpg',
            'og_url' => 'https://evoush.com/contact',
        ];
        return jeson_encode($meta);
    }

    public function member_list_page_data()
    {
    	$members = User::join('profile', 'profile.user_id', '=', 'users.id')
                    ->where('roles', '=', json_encode(['MEMBER']))
                    ->paginate(6);
    	$meta = [
            'title' => 'Evoush::Member | Lists::Member',
            'canonical' => 'https://evoush.com/member-lists',
            'meta_desc' => 'Evoush::Official | Lists::Member',
            'meta_key' => 'Evoush::Official | Lists::Member',
            'meta_author' => 'Evoush::Official | Your::Eternal::Future',
            'og_title' => 'Evoush::Official | Lists::Member',
            'og_site_name' => 'Evoush::Official | Lists::Member',
            'og_desc' => 'Your Eternal Future | Evoush::Official',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/about/3.jpg',
            'og_url' => 'https://evoush.com/member-lists',
            'members' => $members
        ];

        return json_encode($meta);
    }
}
