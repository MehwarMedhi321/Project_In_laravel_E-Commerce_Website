<?php
// use Illuminate\Support\Facades\Route;
// use App\Http\Controllers\Pagecontrol;
// use App\Http\Controllers\TestingController;
// use App\Http\Controllers\UserController;
    

// Route::controller(UserController::class)->group(function(){
//     Route::get('/','showUsers')->name('home'); 
//     Route::get('/user/{id}','singleUser')->name('view.user');
//     Route::get('/exit/{id}','deletedata')->name('delete.user');
//     Route::post('/add','adduser')->name('adduser');       
//     Route::post('/update/{id}', "updateData")->name('update.data');                  
//     Route::get('/updatepage/{id}','updatepage')->name('update.page');
// });
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserControllers;

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

Route::get('/login', function () {
    return view('login');
});

// Route::get('/logout', function () {
//     Session::forget('user');
//     return redirect('login');
// });

Route::post("/login",[UserController::class,'login']);
Route::get("/",[ProductController::class,'index']);
Route::get("detail/{id}",[ProductController::class,'detail']);
Route::get("search",[ProductController::class,'search']);
Route::post("add_to_cart",[ProductController::class,'addToCart']);
Route::get("cartlist",[ProductController::class,'cartList']); 
Route::get("removecart/{id}",[ProductController::class,'removeCart']); 
Route::get("ordernow",[ProductController::class,'orderNow']); 
Route::post("orderplace",[ProductController::class,'orderPlace']);
Route::get("myorders",[ProductController::class,'myOrders']);
 