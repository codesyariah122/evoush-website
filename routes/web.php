<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\CategoryMessageController;
use App\Http\Controllers\EvoushApplicationController;
use App\Http\Controllers\EvoushManagementController;
use App\Http\Controllers\EventCreatedController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserProfilePage;
use App\Http\Controllers\EventPageController;
use App\Http\Controllers\SuccessPageController;
use App\Http\Controllers\JoinMemberController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\CategoryArticleController;
use App\Http\Controllers\ApiDataController;
use App\Http\Controllers\TestSpaController;

// Testing Api Data
Route::get('/api/test', [ApiDataController::class, 'index'])->name('testing.data');
// testing spa web application
Route::get('/api/spa', [TestSpaController::class, 'index']);

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// Web Page Route HOMEPAGE EVOUSH
Route::get('/', [HomeController::class, 'index'])->name('evoush.home');
Route::get('/about', [HomeController::class, 'about'])->name('evoush.about');
Route::get('/product', [HomeController::class, 'product'])->name('evoush.product');
Route::get('/product/{category}/{slug}', [HomeController::class, 'detail']);
Route::get('/articles', [HomeController::class, 'article'])->name('evoush.articles');
Route::get('/contact', [HomeController::class, 'contact'])->name('evoush.contact');
Route::post('/contact/store', [HomeController::class, 'store_contact'])->name('contactpage.store');
Route::get('/member-search', [HomeController::class, 'search_profile'])->name('member.search');
Route::get('/member-lists', [HomeController::class, 'member_lists'])->name('member.lists');
Route::get('/marketing-plan', [HomeController::class, 'marketing_plan'])->name('marketing.plan');
// Application Route
Route::get('/evoush/application/product/healthy', [EvoushApplicationController::class, 'healthy'])->name('evoush.healthy');
Route::get('/evoush/application/product/beauty', [EvoushApplicationController::class, 'beauty'])->name('evoush.beauty');
Route::get('/evoush/application/salaam', [EvoushApplicationController::class, 'salaam'])->name('evoush.salaam');
Route::get('/evoush/application/cargo', [EvoushApplicationController::class, 'cargo'])->name('evoush.cargo');


// Route Profile Page
Route::get('/member/{username}', [HomeController::class, 'profile_page'])->name('member.username');
Route::get('/signup/member/{id}', [HomeController::class, 'create_new_member'])->name('signup.member');
// Route::post('/store/member', [HomeController::class, 'store_new_member'])->name('store.member');


// Route In Sites Footer
Route::get('/management', [HomeController::class, 'management_evoush'])->name('management');
Route::get('/event', [HomeController::class, 'event'])->name('event');
Route::get('/success-stories', [HomeController::class, 'stories'])->name('stories');
Route::get('/top-leaders', [HomeController::class, 'top_leaders'])->name('leaders');
// Auth::routes();
Auth::routes(['register' => false, 'login' => true, 'reset' => false]);

Route::match(["GET", "POST"], "/register", function(){
 return redirect("/login");
})->name("register");


// dashboard/evoush Management Route
// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::middleware(['auth'])->group(function(){

// 	Route::middleware(['admin'])->group(function () {
//         Route::get('/dashboard/evoush', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.evoush');
//     });
 
//     Route::middleware(['user'])->group(function () {
//         Route::get('user', [MemberController::class, 'index']);
//     });
// });

Route::get('/dashboard/evoush', [App\Http\Controllers\DashboardController::class, 'index'])->name('dashboard.evoush');
// User Data Route
Route::resource('/dashboard/evoush/users', UserController::class);
// Route Profile dashboard/evoush
// Route::get('/dashboard/evoush/profile/{username}', ProfileController::class, 'show_profile')->name('profile.username');
Route::resource('/dashboard/evoush/profile', ProfileController::class);
// Route Member Join
Route::put('/dashboard/evoush/member/activated/{id}', [JoinMemberController::class, 'activated'])->name('member.active');
Route::delete('/dashboard/evoush/member/deleted/{user_id}', [JoinMemberController::class, 'deletedAll'])->name('member.deleted');
Route::resource('/dashboard/evoush/member', JoinMemberController::class);
// Route::get('/dashboard/evoush/member/activate', [JoinMemberController::class, 'activate'])->name('member.activate');
// Route artcile management
Route::get('/dashboard/evoush/articles/trash', [ArticleController::class, 'trash'])->name('articles.trash');
Route::get('/dashboard/evoush/articles/{id}/restore', [ArticleController::class, 'restore'])->name('articles.restore');
Route::delete('/dashboard/evoush/articles/{id}/deletepermanent', [ArticleController::class, 'deletePermanent'])->name('articles.deletepermanent');
Route::resource('/dashboard/evoush/articles', ArticleController::class);

// Route category article
Route::get('/dashboard/evoush/category-article/trash', [CategoryArticleController::class, 'trash'])->name('category-article.trash');
Route::get('/dashboard/evoush/category-article/{id}/restore', [CategoryArticleController::class, 'restore'])->name('category-article.restore');
Route::delete('/dashboard/evoush/category-article/{id}/deletepermanent', [CategoryArticleController::class, 'deletePermanent'])->name('category-article.deletepermanent');
Route::get('/ajax/categories-article/search', [CategoryArticleController::class, 'ajaxSearch']);
Route::resource('/dashboard/evoush/category-article', CategoryArticleController::class);

// Category Route
Route::get('/dashboard/evoush/categories/trash', [CategoryController::class, 'trash'])
->name('categories.trash');
Route::get('/dashboard/evoush/categories/{id}/restore', [CategoryController::class, 'restore'])
->name('categories.restore');
Route::delete('/dashboard/evoush/categories/{category}/deletepermanent', [CategoryController::class, 'deletePermanent'])->name('categories.deletePermanent');
Route::get('/ajax/categories/search', [CategoryController::class, 'ajaxSearch']);

Route::resource('/dashboard/evoush/categories', CategoryController::class);


// Product Route
Route::get('/dashboard/evoush/products/trash', [ProductController::class, 'trash'])->name('products.trash');
Route::get('/dashboard/evoush/products/{id}/restore', [ProductController::class, 'restore'])->name('products.restore');
Route::delete('/dashboard/evoush/products/{id}/deletepermanent', [ProductController::class, 'deletePermanent'])->name('products.deletepermanent');
Route::resource('/dashboard/evoush/products', ProductController::class);


// Route Order
Route::resource('/dashboard/evoush/orders', OrderController::class);


// Contact Message Route
Route::get('/dashboard/evoush/contact/trash', [ContactController::class, 'trash'])->name('contact.trash');
Route::get('/dashboard/evoush/contact/{id}/restore', [ContactController::class, 'restore'])->name('contact.restore');
Route::delete('/dashboard/evoush/contact/{id}/deletepermanent', [ContactController::class, 'deletePermanent'])->name('contact.deletepermanent');
Route::resource('/dashboard/evoush/contact', ContactController::class);

// Category Message
Route::get('/dashboard/evoush/categorymessage/trash', [CategoryMessageController::class, 'trash'])->name('categorymessage.trash');
Route::get('/dashboard/evoush/categorymessage/{id}/restore', [CategoryMessageController::class, 'restore'])->name('categorymessage.restore');
Route::get('/dashboard/evoush/categorymessage/{id}/deletepermanent', [CategoryMessageController::class, 'deletePermanent'])->name('categorymessage.deletepermanent');
// Route::get('/categorymessage/search', [CategoryMessageController::class, 'ajaxSearch']);
Route::resource('/dashboard/evoush/categorymessage', CategoryMessageController::class);

// Route Event Created
Route::resource('/dashboard/evoush/event', EventCreatedController::class);



