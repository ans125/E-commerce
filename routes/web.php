<?php

use App\Http\Controllers\admin\AdminLoginController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\CategoryController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\TempImagesController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\FrontController;
use App\Http\Controllers\ShopController;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('/',[FrontController::class,'index'])->name('front.home');
Route::get('/shop',[ShopController::class,'index'])->name('front.shop');
Route::get('/product/{slug}',[ShopController::class,'product'])->name('front.product');
Route::get('/cart',[CartController::class,'cart'])->name('front.cart');
Route::post('/add-to-cart',[CartController::class,'addToCart'])->name('front.addToCart');
Route::post('/update-cart',[CartController::class,'updateCart'])->name('front.updateCart');
Route::post('/delete-item', [CartController::class,'deleteItem'])->name('front.deleteItem.cart');


Route::get('/checkout', [CartController::class,'checkout'])->name('front.checkout');

// userlogin

// Route::get('/', function () {
    // return view('welcome');
    // });
    Route::group(['prefix'=> 'account'], function () {  
        Route::group(['middleware'=>'guest'],function(){
       
            Route::get('/login', [AuthController::class, 'login'])->name('account.login');
            Route::post('/login', [AuthController::class, 'authenticate'])->name('account.authenticate');
            Route::get('/register', [AuthController::class, 'register'])->name('account.register');
            Route::post('/process-register', [AuthController::class, 'processRegister'])->name('account.processRegister');
        });
        
        
        Route::group(['middleware'=>'auth'],function(){
            Route::get('/profile', [AuthController::class, 'profile'])->name('account.profile');
            Route::get('/logout', [AuthController::class, 'logout'])->name('account.logout');
    
    });
});

        Route::get('/admin/login', [AdminLoginController::class,'index'])->name('admin.login');

Route::group(['prefix'=> 'admin'], function () {   
    Route::group(['middleware'=>'admin.guest'],function(){
        Route::get('/login', [AdminLoginController::class,'index'])->name('admin.login');
        Route::post('/authenticate', [AdminLoginController::class,'authenticate'])->name('admin.authenticate');
    });

    Route::group(['middleware'=>'admin.auth'],function(){
        Route::get('/dashboard', [HomeController::class,'index'])->name('admin.dashboard');
        Route::get('/logout', [HomeController::class,'logout'])->name('admin.logout');
        // category routes
        Route::get('/categories', [CategoryController::class,'index'])->name('categories.index');
        Route::get('/categories/create', [CategoryController::class,'create'])->name('categories.create');
        Route::post('/categories', [CategoryController::class,'store'])->name('categories.store');
        Route::post('/upload-temp-image', [TempImagesController::class,'create'])->name('temp-images.create');
        Route::get('/categories/{category}/edit', [CategoryController::class,'edit'])->name('categories.edit');
        Route::put('/categories/{category}/edit',[CategoryController::class,'update'])->name('categories.update');
        Route::delete('/categories/{category}', [CategoryController::class,'destroy'])->name('categories.delete');
        // brands routes
        Route::get('/brands', [BrandController::class,'index'])->name('brands.index');
        Route::get('/brands/create',[BrandController::class,'create'])->name('brands.create');
        Route::post('/brands',[BrandController::class,'store'])->name('brands.store');
        Route::get('/brands/{brand}/edit', [BrandController::class,'edit'])->name('brands.edit');
        Route::put('/brands/{brand}', [BrandController::class,'update'])->name('brands.update');
        // products routes
        Route::get('/products/create',[ProductController::class,'create'])->name('products.create');
        Route::post('/products',[ProductController::class,'store'])->name('products.store');
        
        
        // Get slug route
        Route::get('/admin/getSlug', [CategoryController::class, 'getSlug'])->name('getSlug');
    });
});