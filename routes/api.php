<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ApiDataController;
use App\Http\Controllers\Api\UserController;
// use App\Http\Controllers\CategoryMessageController;


// Testing percobaan crud api
Route::get('/test/data/show-all', [ApiDataController::class, 'show_all']);
Route::post('/test/data/store', [ApiDataController::class, 'store']);
// new member join
Route::post('/member/new-join', [ApiDataController::class, 'store_new_member']);
Route::middleware(['cors'])->group(function(){
	Route::resource('/test/data', ApiDataController::class);
});

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

// Route data untuk profile page public
Route::get('/evoush/profile-data/{username}', [ApiDataController::class, 'profile_data_public']);
// Route data untuk profile page login
Route::get('/evoush/profile-data/login/{username}', [ApiDataController::class, 'profile_data_login']);


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
