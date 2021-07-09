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

    
    public function index(Request $request)
    {
        $context = [
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
        return view('pages.home.index', $context);
    }

    public function about(Request $request)
    {
        $context = [
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
        return view('pages.about.index', $context);
    }

    public function article(Request $request)
    {
     $context = [
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
        return view('pages.articles.index', $context);
    }


    public function product(Request $request)
    {
        // $kosmetik = Product::with(['categories' => function($query){
        //     $query->where('name', 'Kosmetik');
        // }])
        // ->whereIn('id', [4, 5, 6, 7, 8, 9, 10, 11, 12])
        // ->paginate(6);

        // $nutrisi = Product::with(['categories' => function($query){
        //     $query->where('name', 'Nutrisi');
        // }])
        // ->whereIn('id', [1, 2, 3])
        // ->get();
        $context = [
            'title' => 'Evoush::Official | Product::Page',
            'canonical' => 'https://evoush.com/product',
            'meta_desc' => 'Evoush::Official | Product::Page',
            'meta_key' => 'Bisnis Network Marketing Dengan Standart Product Terbaik dan berkualitas yang kaya manfaat bagi diri dan bisnis anda',
            'meta_author' => 'Evoush::Official | Product::Page',
            'og_title' => 'Evoush::Official | Product::Page',
            'og_site_name' => 'Evoush::Official | Product::Page',
            'og_desc' => 'Evoush::Product dengan kualitas terbaik yang siap meroketkan bisnis anda, tidak hanya kualitas dan keuntungan dari produk kami, namun lebih dari itu Evoush::Product sangat kaya manfaat bagi pribadi kita',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/model/new_model.jpg',
            'og_url' => 'https://evoush.com/product',
                // 'kosmetiks' => $kosmetik,
                // 'nutrisi' => $nutrisi
                // 'user' => User::where('name', Auth::user()->name)
        ];
        return view('pages.products.index', $context);
    }

    // public function detail(Request $request, $category, $slug)
    // {
    //     $category = $request->segment(2);
    //     if($category == "Kosmetik"){
    //         $data = Product::with(['categories' => function($query){
    //             $query->where('name', 'Kosmetik');
    //         }])
    //         ->where('slug', $slug)
    //         ->get();
    //     }else{
    //         $data = Product::with(['categories' => function($query){
    //             $query->where('name', 'Nutrisi');
    //         }])
    //         ->where('slug', $slug)
    //         ->get();
    //     }

    //     // echo $data[0]->cover;
    //     $context = [
    //         'title' => 'Evoush::Product | '.$category.'::'.$slug,
    //         'canonical' => 'https://evoush.com/products/'.$category.'/'.$slug,
    //         'meta_desc' => 'Evoush::Product | '.$category.'::'.$slug,
    //         'meta_key' => $data[0]->title,
    //         'meta_author' => 'Evoush::Product | '.$slug,
    //         'og_title' => 'Evoush::Product | '.$category.'::'.$slug,
    //         'og_site_name' => 'Evoush::Product | '.$category,
    //         'og_desc' => $data[0]->description,
    //         'og_image' => asset('storage/'.$data[0]->cover),
    //         'og_url' => 'https://evoush.com/product/'.$category.'/'.$slug,
    //         'product' => $data
    //             // 'user' => User::where('name', Auth::user()->name)
    //     ];
    //     return view('pages.products.detail', $context);
    // }

    public function contact(Request $request)
    {
        $context = [
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
        return view('pages.contact.index', $context);
    }

    public function store_contact(Request $request)
    {
        $validation = Validator::make($request->all(),[
             "name" => "required|min:5|max:100",
             "email" => "required|email|unique:users",
             "phone" => "required|digits_between:10,12",
             "message" => "required"
        ])->validate();

        // if ($validation->fails()) {
        //     return redirect('/contact#form-contact')
        //             ->withErrors($validation)->withInput();
        // }

       $new_contact = new Contact;
       $new_contact->name = $request->get('name');
       $new_contact->email = $request->get('email');
       $new_contact->phone = $request->get('code').$request->get('phone');
       $new_contact->category_id = $request->get('category_id');
       $new_contact->message = $request->get('message');
       $new_contact->country = $request->get('country');
       $new_contact->city = $request->get('city');
       $new_contact->ip_address = $request->get('ip_address');

       if($new_contact->save()){
           return redirect('/contact#form-contact')
                    ->with('status', 'Terima kasih <b>'.$new_contact->name.'</b>, Pesan anda akan segera di proses management evoush');
       }else{
            return back()->with('error', 'Register failed！')->withInput();
       }

    }


    public function search_profile(Request $request)
    {
        $context = [
            'title' => 'Evoush::Member | Search::Member',
            'canonical' => 'https://evoush.com/member/search',
            'meta_desc' => 'Evoush::Official | Profile::Member',
            'meta_key' => 'Evoush::Official | Profile::Member',
            'meta_author' => 'Evoush::Official | Your::Eternal::Future',
            'og_title' => 'Evoush::Official | Search::Member',
            'og_site_name' => 'Evoush::Official | Search::Member',
            'og_desc' => 'Your Eternal Future | Evoush::Official',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/about/2%20kn.jpg',
            'og_url' => 'https://evoush.com/member/search'
        ];

        return view('pages.profile.search', $context);
    }

    public function profile_page(Request $request)
    {   
        // $users = User::with('profile')->where('username', $request->username)->get();
        $users = User::join('profile', 'users.id', '=', 'profile.user_id')
                ->where('status', '=', 'ACTIVE')
                ->where('username', $request->username)
                ->get(['profile.*', 'users.*']);
        // echo $users->count() ."<br/>";

        $members = Member::join('profile', 'member.user_id', '=', 'profile.id')
                ->join('users', 'member.user_id', '=', 'users.id')
                ->where('status', '=', 'ACTIVE')
                ->get(['profile.*', 'users.*']);


        if(Auth::check() && Auth::user()->id){

            if($users->count() > 0){

                $id = Auth::user()->id;

                $joins = User::join('member', 'member.user_id', '=', 'users.id')
                ->where('member.sponsor_id', '=', $id)
                ->where('status', '=', 'INACTIVE')
                ->get();

                $sponsors = Member::join('profile', 'profile.id', '=', 'member.sponsor_id')
                ->join('users', 'users.id', '=', 'profile.user_id')
                ->where('member.sponsor_id', '=', $id)
                ->get();

                $user = $users[0];

                $followers = Member::join('users', 'users.id', '=', 'member.sponsor_id')
                            ->get();

                // echo "<pre>";
                //     // var_dump($sponsors); die;
                // echo count($sponsors); die;
                // echo "</pre>";

                if(count($sponsors) > 0){
                    $sponsor = $sponsors[0];
                }else{
                    $sponsor = "Belum ada member join";
                }

                if($user->avatar){
                    $og_image = asset('storage/'.$user->avatar);
                }else{
                    $og_image = 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/assets/img/examples/studio-4.jpg';
                }

                $context = [
                    'title' => 'Evoush::Profile | Member::'.ucfirst($user->username),
                    'canonical' => 'https://evoush.com/member/'.$user->username,
                    'meta_desc' => 'Evoush::Profile | Profile::'.$user->name,
                    'meta_key' => $user->username .' | Evoush::Profile',
                    'meta_author' => 'Evoush::Profile-'.$user->username,
                    'og_title' => 'Evoush::Profile | '.$user->name,
                    'og_site_name' => 'Evoush::Profile | '.$user->username,
                    'og_desc' => $user->quotes,
                    'og_image' => $og_image,
                    'og_url' => 'https://evoush.com/member/'.$user->username,
                    'user' => $user,
                    'members' => $members,
                    'joins' => $joins,
                    'sponsor' => $sponsor,
                    'followers' => $followers,
                    'session' => $request->session()->all()
                ];

                return view('pages.profile.index', $context);

            }else{
                $context = [
                    'title' => 'Evoush::Official | Not::Found',
                    'canonical' => 'https://evoush.com/member/not-found',
                    'meta_desc' => 'Evoush::Official | Profile::NotFound',
                    'meta_key' => 'Not::Found | Evoush::Official',
                    'meta_author' => 'Evoush::Official | Not::Found',
                    'og_title' => 'Evoush::Official | Not::Found',
                    'og_site_name' => 'Evoush::Official | Not::Found',
                    'og_desc' => 'Your Eternal Future',
                    'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/funny_not_found.gif',
                    'og_url' => 'https://evoush.com/member/not-found',
                    // 'user' => $request->segment(2),
                    'user' => "User tidak ditemukan"
                ];
                return view('pages.profile.error', $context);
            }
        }else{
            if(count($users) > 0){
                $id = $users[0]->id;
                $joins = User::join('member', 'member.user_id', '=', 'users.id')
                ->where('member.sponsor_id', '=', $id)
                ->where('status', '=', 'INACTIVE')
                ->get();

                $sponsors = Member::join('profile', 'profile.id', '=', 'member.sponsor_id')
                ->join('users', 'users.id', '=', 'profile.user_id')
                ->where('member.sponsor_id', '=', $id)
                ->get();

                $user = $users[0];

                $followers = Member::join('users', 'users.id', '=', 'member.sponsor_id')
                            // ->where('users.username', '=', $request->segment(2))
                            ->get();
               

                if(count($sponsors) > 0){
                    $sponsor = $sponsors[0];
                }else{
                    $sponsor = "Belum ada member join";
                }
                $context = [
                    'title' => 'Evoush::Profile | Member::'.ucfirst($user->username),
                    'canonical' => 'https://evoush.com/member/'.$user->username,
                    'meta_desc' => 'Evoush::Profile | Profile::'.$user->name,
                    'meta_key' => $user->username .' | Evoush::Profile',
                    'meta_author' => 'Evoush::Profile-'.$user->username,
                    'og_title' => 'Evoush::Profile | '.$user->name,
                    'og_site_name' => 'Evoush::Profile | '.$user->username,
                    'og_desc' => $user->quotes,
                    'og_image' => asset('storage/'.$user->avatar),
                    'og_url' => 'https://evoush.com/member/'.$user->username,
                    'user' => $user,
                    'members' => $members,
                    'joins' => $joins,
                    'sponsor' => $sponsor,
                    'sponsor' => $followers,
                    'session' => $request->session()->all()
                ];

                return view('pages.profile.index', $context);
                // return redirect()->route('login')->with('status', 'Sesi anda telah habis, silahkan login ulang');
            }else{
                $context = [
                    'title' => 'Evoush::Official | Not::Found',
                    'canonical' => 'https://evoush.com/member/not-found',
                    'meta_desc' => 'Evoush::Official | Profile::NotFound',
                    'meta_key' => 'Not::Found | Evoush::Official',
                    'meta_author' => 'Evoush::Official | Not::Found',
                    'og_title' => 'Evoush::Official | Not::Found',
                    'og_site_name' => 'Evoush::Official | Not::Found',
                    'og_desc' => 'Your Eternal Future',
                    'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/animated/funny_not_found.gif',
                    'og_url' => 'https://evoush.com/member/not-found',
                    // 'user' => $request->segment(2),
                    'user' => "User tidak ditemukan"
                ];
                return view('pages.profile.error', $context);
            }
        }    
    }


    public function member_lists()
    {

        $members = User::join('profile', 'profile.user_id', '=', 'users.id')
                    ->where('roles', '=', json_encode(['MEMBER']))
                    ->paginate(6);

        $context = [
            'title' => 'Evoush::Member | Lists::Member',
            'canonical' => 'https://evoush.com/evoush/member-lists',
            'meta_desc' => 'Evoush::Official | Lists::Member',
            'meta_key' => 'Evoush::Official | Lists::Member',
            'meta_author' => 'Evoush::Official | Your::Eternal::Future',
            'og_title' => 'Evoush::Official | Lists::Member',
            'og_site_name' => 'Evoush::Official | Lists::Member',
            'og_desc' => 'Your Eternal Future | Evoush::Official',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/member-list/member_list.jpeg',
            'og_url' => 'https://evoush.com/evoush/member-lists',
            'members' => $members
        ];

        return view('pages.member.index', $context);

    }

    // new member join on profile page sponsor
    public function create_new_member($id)
    {
         $context = [
            'title' => 'Evoush::Member | Create::Member',
            'canonical' => 'https://evoush.com/member/new',
            'meta_desc' => 'Evoush::Official | New::Member',
            'meta_key' => 'Evoush::Official | New::Member',
            'meta_author' => 'Evoush::Official | Your::Eternal::Future',
            'og_title' => 'Evoush::Official | Create::Member',
            'og_site_name' => 'Evoush::Official | Create::Member',
            'og_desc' => 'Your Eternal Future | Evoush::Official',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/about/2%20kn.jpg',
            'og_url' => 'https://evoush.com/member/new',
            'id' => $id
        ];

        return view('pages.profile.create', $context);
    }

    

    public function management_evoush()
    {
        $context = [
            'title' => 'Evoush::Official | Management',
            'canonical' => 'https://evoush.com/management',
            'meta_desc' => 'Evoush::Official | Management::Page',
            'meta_key' => 'Bisnis Network Marketing Zaman Now Ya Evoush Indonesia',
            'meta_author' => 'Evoush::Official | Management::Page',
            'og_title' => 'Evoush::Official | Management::Page',
            'og_site_name' => 'Evoush::Official | Management::Page',
            'og_desc' => 'Your Eternal Future',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/about/2%20kn.jpg',
            'og_url' => 'https://evoush.com/management',
                // 'user' => User::where('name', Auth::user()->name)
        ];
        return view('pages.management.index', $context);
    }

    public function event()
    {
        $context = [
            'title' => 'Evoush::Official | Event::Page',
            'canonical' => 'https://evoush.com/event',
            'meta_desc' => 'Evoush::Official | Event::Page',
            'meta_key' => 'Bisnis Network Marketing Dengan Standart Product Terbaik dan berkualitas yang kaya manfaat bagi diri dan bisnis anda',
            'meta_author' => 'Evoush::Official | Event::Page',
            'og_title' => 'Evoush::Official | Event::Page',
            'og_site_name' => 'Evoush::Official | event::Page',
            'og_desc' => 'Your Eternal Future',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/event/1.jpg',
            'og_url' => 'https://evoush.com/event',
            // 'user' => User::where('name', Auth::user()->name)
        ];
        return view('pages.event.index', $context);
    }

   

    public function stories()
    {
        $context = [
            'title' => 'Evoush::Official | Stories::Page',
            'canonical' => 'https://evoush.com/success-stories',
            'meta_desc' => 'Evoush::Official | SuccessStories::Page',
            'meta_key' => 'Bisnis Network Marketing Dengan Standart Product Terbaik dan berkualitas yang kaya manfaat bagi diri dan bisnis anda',
            'meta_author' => 'Evoush::Official | SuccessStories::Page',
            'og_title' => 'Evoush::Official | SuccessStories::Page',
            'og_site_name' => 'Evoush::Official | SuccessStories::Page',
            'og_desc' => 'Your Eternal Future',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/event/1.jpg',
            'og_url' => 'https://evoush.com/success-stories',
        ];
        return view('pages.success.index', $context);
    }

    public function top_leaders()
    {
        $context = [
            'title' => 'Evoush::Official | TopLeaders::Page',
            'canonical' => 'https://evoush.com/top-leaders',
            'meta_desc' => 'Evoush::Official | TopLeaders::Page',
            'meta_key' => 'Bisnis Network Marketing Dengan Standart Product Terbaik dan berkualitas yang kaya manfaat bagi diri dan bisnis anda',
            'meta_author' => 'Evoush::Official | TopLeaders::Page',
            'og_title' => 'Evoush::Official | TopLeaders::Page',
            'og_site_name' => 'Evoush::Official | TopLeaders::Page',
            'og_desc' => 'Your Eternal Future',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/banner/1q.jpg',
            'og_url' => 'https://evoush.com/top-leaders',
        ];
        return view('pages.leaders.index', $context);
    }

    public function marketing_plan()
    {
        $context = [
            'title' => 'Evoush::Official | MarketingPlan::Page',
            'canonical' => 'https://evoush.com/marketing-plan',
            'meta_desc' => 'Evoush::Official | MarketingPlan::Page',
            'meta_key' => 'Bisnis Network Marketing Dengan Standart Product Terbaik dan berkualitas yang kaya manfaat bagi diri dan bisnis anda',
            'meta_author' => 'Evoush::Official | MarketingPlan::Page',
            'og_title' => 'Evoush::Official | MarketingPlan::Page',
            'og_site_name' => 'Evoush::Official | MarketingPlan::Page',
            'og_desc' => 'Your Eternal Future',
            'og_image' => 'https://raw.githubusercontent.com/codesyariah122/bahan-evoush/main/images/MARKETING%20PLAN/1.jpg',
            'og_url' => 'https://evoush.com/marketing-plan',
        ];
        return view('pages.marketingplan.index', $context);
    }

}
