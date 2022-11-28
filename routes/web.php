<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

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


// Route::get('/', function () {
//     return view('welcome');
// });


Route::group(['Middleware' => 'guest'], function () {
    Route::get('/register', [\App\Http\Controllers\AuthController::class, 'create'])->name('register.create');
    Route::post('/register', [\App\Http\Controllers\AuthController::class, 'store'])->name('register.store');
    Route::get('/login', [\App\Http\Controllers\AuthController::class, 'loginForm'])->name('login.create');
    Route::post('/login', [\App\Http\Controllers\AuthController::class, 'login'])->name('login');
          Route::delete('/', [\App\Http\Controllers\PostController::class, 'post.delete'])->name('post.delete');
    });
    
    Route::group(['Middleware' => 'auth'],function (){
   
        Route::post('/post/delete/{id}', [\App\Http\Controllers\PostController::class, 'post.delete']);
        Route::get('/profile', [\App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
        Route::post('/profile', [\App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
        Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
        Route::get('/create', [\App\Http\Controllers\PostController::class, 'create'])->name('create');
        Route::post('/create', [\App\Http\Controllers\PostController::class, 'store'])->name('store');
        Route::get('/cart/game/',[CartController::class,'show'])->name('cart.game');
    });
    Route::group(['Middleware' => 'admin' , 'prefix' => 'admin'],function (){
        Route::get('/', [\App\Http\Controllers\AdminController::class, 'index'])->name('admin');
        Route::get('/post/{id}/cancel', [AdminController::class, 'cancelPost' ])->name('admin.post.cancel');
        Route::post('/post/{id}/cancel', [AdminController::class, 'cancelPost' ])->name('admin.post.cancel');
        Route::post('/post/accept', [AdminController::class, 'acceptPost' ])->name('admin.post.accept');
        Route::get('/post/accept', [AdminController::class, 'acceptPost' ])->name('admin.post.accept');
        Route::get('/post/{product}/hit', [AdminController::class, 'changeHit'])->name('admin.post.changeHit');
        Route::get('/post/{product}/sale', [AdminController::class, 'changeSale'])->name('admin.post.changeSale');
        Route::get('/post/{product}/dlc', [AdminController::class, 'changeHit'])->name('admin.post.changeDlc');
        Route::get('/category', [\App\Http\Controllers\CategoryController::class, 'category'])->name('category');
        Route::post('/category', [\App\Http\Controllers\CategoryController::class, 'storee'])->name('storee');
        Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');
        Route::get('/users',[AdminController::class,'users'])->name('admin.users-table');
        Route::get('/user/{user}/change-role',[AdminController::class,'changeRole'])->name('admin.user.change-role');

        Route::get('/orders',[AdminController::class,'orders'])->name('admin.orders-table');
        Route::get('/order/{order}',[AdminController::class,'showOrder'])->name('admin.show-order');
        Route::get('/order/delete/{order}',[AdminController::class,'deleteOrder'])->name('admin.delete-order');
    });

    Route::get('/politika', [\App\Http\Controllers\AuthController::class, 'info'])->name('politika');


Route::get('/',[ProductController::class,'index'])->name('home');

Route::get('/products/search', [ProductController::class, 'search'])->name('products.serach');
Route::get('/product/{slug}',[ProductController::class,'show'])->name('products.show');
Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('categories.show');
Route::match(['get', 'post'], '/cart/checkout', [CartController::class, 'checkout'])->name('cart.checkout');
Route::get('author/{user}', [\App\Http\Controllers\PostController::class, 'author'])
    ->name('author');


Route::post('/cart/add',[CartController::class,'add'])->name('cart.add');
Route::get('/cart/del-item/{product_id}',[CartController::class, 'delItem'])->name('cart.del.item');
Route::get('/cart/clear',[CartController::class,'clear'])->name('cart.clear');
Route::get('/cart/show',[CartController::class,'show'])->name('cart.show');
 Route::get('/logout', [\App\Http\Controllers\AuthController::class, 'logout'])->name('logout');









//  Route::get('/', [\App\Http\Controllers\PostController::class, 'home'])->name('home');















 

        
