<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Api\HomeApiController;    
use App\Http\Controllers\Frontend\Api\FrontendCategoryController;   
use App\Http\Controllers\Frontend\Api\CartController;   
use App\Http\Controllers\Frontend\AuthController;  
use App\Http\Controllers\Frontend\Auth\LoginController;
use App\Http\Controllers\Frontend\ProfileController;
use App\Http\Controllers\Frontend\OrderController;

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
Route::get('/', function () {
    return view('frontend/index');
})->name('index');


Route::get('/', [HomeApiController::class, 'index']);
Route::get('/en/pr/{catslug}',[FrontendCategoryController::class,'categorywiseproduct'])->name('category.product');
Route::get('/en/md/all',[FrontendCategoryController::class,'allmedicine'])->name('medicine.all'); 
Route::get('/products/{slug}',[FrontendCategoryController::class,'singleproduct'])->name('product.single');
Route::get('/medicine/{slug}',[FrontendCategoryController::class,'singleproduct'])->name('medicine.single');    
Route::get('/medicinecat/{slug}',[FrontendCategoryController::class,'medicinecat'])->name('medicine.medicinecat');
Route::post('/srcmedicine',[FrontendCategoryController::class,'srcmedicine'])->name('medicine.srcmedicine');

Route::get('/cart/product',[CartController::class,'addtocart'])->name('product.cart');  
Route::get('/cart/product/delete',[CartController::class,'removeCart'])->name('product.cart.delete');
Route::get('/cart/product/update',[CartController::class,'updatecart'])->name('product.cart.update');


//registration
Route::post('/store/customer',[LoginController::class,'CustomerRegistration'])->name('store.customer');
Route::post('/login/customer',[LoginController::class,'CustomerLogin'])->name('login.customer');

// require __DIR__.'/api.php';
require __DIR__.'/admin.php';

// Route::get('/{any}', function(){
//     return view('frontend.app');
// })->where('any', '.*');

Route::group(['middleware'=>'customer' ],function(){

    Route::get('/customer-profile',[AuthController::class,'profile'])->name('customer.profile');
    Route::post('/updateprofile',[ProfileController::class,'UpdateProfile'])->name('update.profile');
    Route::post('/checkout',[OrderController::class,'checkout'])->name('order.checkout');
    Route::post('/orderConfirm',[OrderController::class,'orderConfirm'])->name('order.confirm');
    Route::get('/customer-order',[ProfileController::class,'GetCustomerOrder'])->name('order.customer');
    Route::get('/customer-logout',[ProfileController::class,'logout'])->name('customer.logout');

});


//Auth Route
Route::get('/customer-login',[AuthController::class,'login'])->name('customer.login'); 
Route::get('/customer-registration',[AuthController::class,'registration']);
Route::get('/upload-prescription', function () {
    return view('frontend.prescription');
});
Route::get('/track-order', function () {
    return view('frontend.track-order');
});
Route::get('/contact', function () {
    return view('frontend.contact');
});
Route::get('/checkout', function () {
    return view('frontend.checkout');
});
// Route::get('/customer-order', function () {
//     return view('frontend.auth.order');
// });