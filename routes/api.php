<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApiDataController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\MetaDataController;
use App\Http\Controllers\RajaOngkirController;
use App\Http\Controllers\SendMailController;
use App\Http\Controllers\EmailNotificationNewMember;
// use App\Http\Controllers\CategoryMessageController;


// Testing percobaan crud api
Route::get('/test/data/show-all', [ApiDataController::class, 'show_all']);
Route::post('/test/data/store', [ApiDataController::class, 'store']);
Route::middleware(['cors'])->group(function(){
	Route::resource('/test/data', ApiDataController::class);
});

// sending email
Route::post('/evoush/kirim-email', [SendMailController::class, 'send']);


// new member join
Route::post('/member/new-join', [ApiDataController::class, 'store_new_member']);
Route::post('/member/activation', [EmailNotificationNewMember::class, 'send']);
// profile update
// Route::resource('/profile', ProfileController::class);
Route::post('/member/update/avatar/{id}', [ApiDataController::class, 'update_avatar']);
Route::post('/member/update/cover/{id}', [ApiDataController::class, 'update_cover']);
Route::put('/member/update/{id}', [ApiDataController::class, 'profile_member_update']);


// Aktivation member
Route::put('/member/activated/{id}', [ApiDataController::class, 'new_member_activation']);


// Kirim sms
Route::get('/kirim-sms', [ApiDataController::class, 'sendMessage']);


// Youtube channel
Route::get('/evoush/youtube/{channel_id}', [ApiDataController::class, 'getYoutubeChannel']);
Route::get('/evoush/youtube/latest-video/{channel_id}/{maxResult}/{order}', [ApiDataController::class, 'getLatestYoutubeVideo']);
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/product/all', [ApiDataController::class, 'allProduct']);
Route::get('/product/kosmetik', [ApiDataController::class, 'kosmetik']);
Route::get('/product/nutrisi', [ApiDataController::class, 'nutrisi']);
Route::get('/detail/{categories}/{slug}', [ApiDataController::class, 'show_product_categories']);
Route::get('/paging/{categories}/{id}', [ApiDataController::class, 'paging']);
Route::get('/categorymessage/search', [ApiDataController::class, 'categorymessage']);
Route::get('/member/search/{username}', [ApiDataController::class, 'search_member']);
Route::get('/member/{username}', [ApiDataController::class, 'data_member']);
Route::get('/member/join/active/{username}', [ApiDataController::class, 'member_join_active']);
Route::get('/member/join/inactive/{username}', [ApiDataController::class, 'member_join_inactive']);
Route::get('/evoush/top-leaders', [ApiDataController::class, 'top_leaders']);
Route::get('/evoush/event', [ApiDataController::class, 'data_event']);
Route::get('/evoush/member-list', [ApiDataController::class, 'member_list']);
Route::get('/evoush/founder-list', [ApiDataController::class, 'founder_list']);
Route::get('/evoush/top-income', [ApiDataController::class, 'top_income']);
Route::get('/evoush/contact-message', [ApiDataController::class, 'contact_message']);
// Route data untuk profile page public
Route::get('/evoush/profile-data/{username}', [ApiDataController::class, 'profile_data_public']);
// Route data untuk profile page login
Route::get('/evoush/profile-data/login/{username}', [ApiDataController::class, 'profile_data_login']);


// route data web page
Route::prefix('web-data')->group(function(){
	Route::get('/home', [MetaDataController::class, 'home_page_data']);
	Route::get('/about', [MetaDataController::class, 'about_page_data']);
	Route::get('/product', [MetaDataController::class, 'product_page_data']);
	Route::get('/articles', [MetaDataController::class, 'articles_page_data']);
});

// Route::post('/create/member', [HomeController::class, 'store_new_member']);

// Login via passport
// Route::post('login', [UserController::class, 'login']);

// Route::group(['middleware' => 'auth:api'], function(){
//     Route::get('user/detail', [UserController::class, 'details']);
//     Route::post('logout', [UserController::class, 'logout']);
// });

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/login', [UserController::class, 'login']);
Route::post('/logout', [UserController::class, 'logout'])->middleware('auth:api');

Route::get('/evoush/provinces', [App\Http\Controllers\RajaOngkirController::class, 'getProvinces']);
Route::get('/evoush/cities/{id}', [App\Http\Controllers\RajaOngkirController::class, 'getCities']);
Route::post('/evoush/checkOngkir', [App\Http\Controllers\RajaOngkirController::class, 'checkOngkir']);