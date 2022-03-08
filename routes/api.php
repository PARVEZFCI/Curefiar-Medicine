<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
//Product related category/subcategory/subsubcategory
use App\Http\Controllers\Frontend\Api\ProductApiController;
use App\Http\Controllers\Frontend\Api\HomeApiController;
use App\Http\Controllers\Frontend\Api\OfferProductApiController;
use App\Http\Controllers\Frontend\Api\Auth\RegistrationApiController;
use App\Http\Controllers\Frontend\Api\Auth\LoginApiController;
use App\Http\Controllers\Frontend\Api\AuthController;
use App\Http\Controllers\Frontend\Api\CustomerApiController;
use App\Http\Controllers\Frontend\Api\CommonApiController;
use App\Http\Controllers\Frontend\Api\OrderApiController;
use App\Http\Controllers\Frontend\Api\CustomerAccountApiController;
use App\Http\Controllers\Frontend\Api\TestimonialApiController;

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

Route::group(['middleware' => 'api', 'prefix' => 'api/auth'], function ($router) {

    Route::post('/login', [AuthController::class, 'login']);
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/refresh', [AuthController::class, 'refresh']);
    Route::post('/me', [AuthController::class, 'me']);

});


// customer authentication route
// Route::post('api/v1/login',  [LoginApiController::class, 'doLogin']);
// Route::post('/user-register',  [RegistrationApiController::class, 'doRegister']);

Route::prefix('api/v1')->group(function () {
    //This route for get category->subcategory->subsubcategory
    Route::get('/categories',  [ProductApiController::class, 'productCategory']);
    //For category wise subcategory or product
    Route::get('/category/{slug}',  [ProductApiController::class, 'categoryWiseSubCateOrProduct']);
    //For sub-category wise sub-subcategory or product
    Route::get('/sub-category/{slug}',  [ProductApiController::class, 'subCategoryWiseSubSubCateOrProduct']);
    //For sub-sub-category wise product
    Route::get('/sub-sub-category/{slug}',  [ProductApiController::class, 'subSubCategoryWiseProduct']);

    //Search wise product
    Route::get('/search/{query}',  [ProductApiController::class, 'searchProduct']);
    
    //For get all medicine
    Route::get('/medicine',  [ProductApiController::class, 'getMedicine']);
    Route::get('/site-media',  [HomeApiController::class, 'getSiteMedia']);
    Route::get('/offer-products',  [OfferProductApiController::class, 'offerProduct']);

    //For city and area get
    Route::get('/city',[CommonApiController::class, 'getCity']);
    Route::get('/area/{cityId}',[CommonApiController::class, 'getArea']);

    //Order Store related 
    Route::post('/order', [OrderApiController::class, 'storeOrder']);

    //Customer account related
    Route::get('/customer-order/{id}', [CustomerAccountApiController::class, 'getCustomerOrder']);
    Route::get('/customer/order/{id}', [CustomerAccountApiController::class, 'getInvoiceProduct']);

    //client review
    Route::get('/client/review', [TestimonialApiController::class, '__invoke']);
});