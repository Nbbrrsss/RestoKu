<?php

use App\Http\Controllers\CartsController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\LoginAdminController;
use App\Http\Controllers\DashboardProductController;
use App\Http\Controllers\EditUserController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\CashierController;
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

//modul normal
Route::get('/', function () {
    return view('index');
});
Route::get('/about', function () {
    return view('about');
});
Route::get('/service', function () {
    return view('service');
});
Route::get('/menu', function () {
    return view('menu');
});
Route::get('/menu', [MenuController::class, 'index'])->name('menu.index');

Route::get('/contact', function () {
    return view('contact');
});
//Route::get('/profil', function () {
//    return view('profil');
//});


//login logout register
Route::get('/loginadmin', [LoginAdminController::class, 'index']);
Route::post('/loginadmin', [LoginAdminController::class, 'authenticateadmin']);
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'authenticate']);
Route::post('/logout',[LoginController::class, 'logout']);
Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');
Route::post('/register', [RegisterController::class, 'store']);



//////////////////kasir
Route::middleware(['checkKasir'])->group(function () {
    Route::get('/menukasir', [CashierController::class, 'indexmenu'])->name('menu.indexkasir');
    //cart
    Route::get('/cartkasir', [CashierController::class, 'indexcart']);
    Route::post('/cartkasir/add', [CashierController::class,'addToCart'])->name('cart.addkasir');
    Route::get('/hapus-itemkasir/{id}', [CashierController::class, 'deleteItem'])->name('hapus_itemkasir');
    //payment
    Route::get('/checkoutkasir', [CashierController::class, 'checkout'])->name('checkoutkasir');
    Route::post('/checkoutkasir', [CashierController::class, 'checkout'])->name('checkoutkasir');
    //order
    Route::get('/kasirorder', [CashierController::class, 'indexorder'])->name('kasirorders.index');
    Route::get('/kasirorder{orderId}', [CashierController::class, 'showOrderItems'])->name('kasirorders.showItems');
    Route::put('/orders/{order}/update-statuskasir', [CashierController::class, 'updateStatus'])->name('update.statuskasir');
    //riwayat
    Route::get('/kasirriwayatorder', [CashierController::class, 'indexriwayatorder'])->name('kasirriwayatorders.index');
    Route::get('/kasirriwayatorder{orderId}', [CashierController::class, 'showriwayatOrderItems'])->name('kasirriwayatorders.showItems');
});





/////////////////check login
Route::middleware(['checkLogin'])->group(function () {
//cart
Route::get('/cart', [CartsController::class, 'index']);
Route::post('/cart/add', [CartsController::class,'addToCart'])->name('cart.add');
Route::get('/hapus-item/{id}', [CartsController::class, 'deleteItem'])->name('hapus_item');
//payment
Route::get('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
Route::post('/checkout', [CheckoutController::class, 'checkout'])->name('checkout');
//order
Route::get('/myorder', [OrderController::class, 'indexuser'])->name('myorders.index');
Route::get('/myorder{orderId}', [OrderController::class, 'showOrderItemsuser'])->name('myorders.showItems');
//update user
Route::get('/profile', [UserController::class, 'showProfile'])->name('profile');
Route::post('/profile/update', [UserController::class, 'updateProfile'])->name('profile.update');
});





///////////////check admin
Route::middleware(['auth', 'checkAdmin'])->group(function () {
/* Admin Dashboard */
Route::get('/dashboard', function(){
    return view('dashboard.index',[
        "title" => "dashboard"
    ]);
});
// Product
//Route::resource('/product',DashboardProductController::class)->middleware('auth');
Route::get('/newproduct', function () {
    return view('dashboard.newproduct' , [
        "title" => "newproduct"
    ]);

});
//product
Route::get('/product', [FoodController::class, 'index'])->name('product');
Route::get('/category', [CategoryController::class, 'index'])->name('category');
Route::get('/foods/{food}/edit', [FoodController::class, 'edit'])->name('foods.edit');
Route::delete('/foods/{food}', [FoodController::class, 'destroy'])->name('foods.destroy');
Route::patch('/foods/{food}', [FoodController::class, 'update'])->name('foods.update');
Route::get('/foods', [FoodController::class, 'index'])->name('foods.index');
Route::post('/foods', [FoodController::class, 'store'])->name('foods.store');

// User
Route::resource('/userlist',UserController::class)->middleware('auth');
Route::get('/userlist/{id}/edituser', [UserController::class, 'edit'])->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('user.update');
Route::get('/postuser', [UserController::class, 'create'])->middleware('auth');
Route::post('/postuser', [UserController::class, 'store'])->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('user.destroy');

//order
Route::get('/order', [OrderController::class, 'index'])->name('orders.index');
Route::get('/orders/{orderId}/items', [OrderController::class, 'showOrderItems'])->name('orders.showItems');
Route::put('/orders/{order}/update-status', [OrderController::class, 'updateStatus'])->name('update.status');
});


