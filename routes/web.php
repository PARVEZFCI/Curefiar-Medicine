<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Frontend\Api\HomeApiController;   
use App\Http\Controllers\Frontend\Api\FrontendCategoryController;   


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



require __DIR__.'/api.php';
require __DIR__.'/admin.php';

Route::get('/{any}', function(){
    return view('frontend.app');
})->where('any', '.*');