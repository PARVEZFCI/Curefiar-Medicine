<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Api\HomeApiController;    
use App\Http\Controllers\Frontend\Api\FrontendCategoryController;   
use App\Http\Controllers\Frontend\Api\CartController;   
use App\Http\Controllers\Frontend\AuthController;

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
});


Route::get('/', [HomeApiController::class, 'index']);
Route::get('/en/pr/{catslug}',[FrontendCategoryController::class,'categorywiseproduct'])->name('category.product');
Route::get('/en/md/all',[FrontendCategoryController::class,'allmedicine'])->name('medicine.all'); 
Route::get('/products/{slug}',[FrontendCategoryController::class,'singleproduct'])->name('product.single');
Route::get('/medicine/{slug}',[FrontendCategoryController::class,'singleproduct'])->name('medicine.single');

Route::get('/cart/product',[CartController::class,'addtocart'])->name('product.cart');  
Route::get('/cart/product/delete',[CartController::class,'removeCart'])->name('product.cart.delete');



// require __DIR__.'/api.php';
require __DIR__.'/admin.php';

// Route::get('/{any}', function(){
//     return view('frontend.app');
// })->where('any', '.*');


//Auth Route
Route::get('/customer-login',[AuthController::class,'login']); 
Route::get('/customer-registration',[AuthController::class,'registration']);
Route::get('/customer-profile',[AuthController::class,'profile']);
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
Route::get('/customer-order', function () {
    return view('frontend.auth.order');
});