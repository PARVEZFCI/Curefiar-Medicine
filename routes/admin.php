<?php

use Illuminate\Support\Facades\Route;
//Administration
use App\Http\Controllers\Backend\AdminController;
//medicine
use App\Http\Controllers\Backend\Medicine\MedicineController;
use App\Http\Controllers\Backend\Medicine\CategoryController;
use App\Http\Controllers\Backend\Medicine\ManufactureController;
use App\Http\Controllers\Backend\Medicine\GenericController;
use App\Http\Controllers\Backend\Medicine\UnitController;
//Medicine Import
use App\Http\Controllers\Import\MedicineImportController;
//product
use App\Http\Controllers\Backend\Product\ProductController;
use App\Http\Controllers\Backend\Product\ProductCategoryController;
use App\Http\Controllers\Backend\Product\ProductSubCategoryController;
use App\Http\Controllers\Backend\Product\ProductSubSubCategoryController;   


//Offer
use App\Http\Controllers\Backend\Offer\ProductOfferController;
//Order Related
use App\Http\Controllers\Backend\OrderController;
//Customer Related
use App\Http\Controllers\Backend\CustomerController;
//Banner
use App\Http\Controllers\Backend\TestimonialController;
//Promo
use App\Http\Controllers\Backend\PromoController;
//Setting
use App\Http\Controllers\GeneralSettingController;
//City & Area
use App\Http\Controllers\Backend\CityController;
use App\Http\Controllers\Backend\AreaController;

//Api
use App\Http\Controllers\Backend\Api\SubSubCategoryApiController; 
use App\Http\Controllers\Backend\Api\ProductApiController; 

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
|
| Here is where you can register admin routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/admin', function () {
//     return view('dashboard');
// })->name('dashboard')->middleware('web');

//Administration related route
Route::resource('/administrators', AdminController::class);

Route::prefix('admin')->middleware('web')->group(function () {

    Route::get('/',function(){
        return view('dashboard');
    });

    Route::resources([
        // Medicine related route
        'categories'    => CategoryController::class,
        'generics'      => GenericController::class,
        'manufactures'  => ManufactureController::class,
        'units'         => UnitController::class,
        'medicines'     => MedicineController::class,
        //Product related route
        'product-categories'        => ProductCategoryController::class,
        'product-sub-categories'    => ProductSubCategoryController::class,
        'product-sub-subcategories' => ProductSubSubCategoryController::class,
        'products'                  => ProductController::class,
        //Offer related route
        'offers'                    => ProductOfferController::class,
        //Banner
        'testimonials' => TestimonialController::class,     
        'promos' => PromoController::class,
        //City & Area
        'cities' => CityController::class,
        'areas'  => AreaController::class,
    ]);
    // Status change related route
    Route::get('/categories/status/{id}', [CategoryController::class, 'changeStatus'])->name('categories.status');
    Route::get('/generics/status/{id}', [GenericController::class, 'changeStatus'])->name('generics.status');
    Route::get('/manufactures/status/{id}', [ManufactureController::class, 'changeStatus'])->name('manufactures.status');
    Route::get('/units/status/{id}', [UnitController::class, 'changeStatus'])->name('units.status');
    Route::get('/medicines/status/{id}', [MedicineController::class, 'changeStatus'])->name('medicine.status');
    Route::get('/product-sub-categories/status/{id}', [ProductSubCategoryController::class, 'changeStatus'])->name('product-sub-categories.status');
    Route::get('/product-sub-subcategories/status/{id}', [ProductSubSubCategoryController::class, 'changeStatus'])->name('product-sub-subcategories.status');
    Route::get('/products/status/{id}', [ProductController::class, 'changeStatus'])->name('products.status');
    Route::get('/products-categories/status/{id}', [ProductCategoryController::class, 'changeStatus'])->name('products-categories.status');
    Route::get('/offers/status/{id}', [ProductOfferController::class, 'changeStatus'])->name('offers.status');
    Route::get('/cities/status/{id}', [CityController::class, 'changeStatus'])->name('city.status');
    Route::get('/areas/status/{id}', [AreaController::class, 'changeStatus'])->name('area.status');
    Route::get('/testimonials/status/{id}', [TestimonialController::class, 'changeStatus'])->name('testimonials.status');
    
    // Import related route
    Route::post('/medicines/import', [MedicineImportController::class, '__invoke'])->name('medicine.import');

    // Order related route
    Route::prefix('orders')->group(function () {
        Route::get('/', [OrderController::class, 'getAllOrder'])->name('order.index');
        Route::get('/{order}/show', [OrderController::class, 'viewOrder'])->name('order.view');
        Route::get('/order/{id}/status/{status}', [OrderController::class, 'orderStatus'])->name('order.status');
        Route::delete('/order/{id}', [OrderController::class, 'delete'])->name('order.destroy');
    });

    //Customer related
    Route::get('/customers', [CustomerController::class, 'getAllCustomer'])->name('customer.index');
    Route::get('/customer', [CustomerController::class, 'showCustomer'])->name('customer.show');
    Route::get('/customer/order', [CustomerController::class, 'customerOrders'])->name('customer.orders');

    //General Setting
    Route::get('/setting/system', [GeneralSettingController::class, 'generalSetting'])->name('setting.system');
    Route::post('/setting/updatedescription', [GeneralSettingController::class, 'UpdateDescription'])->name('setting.updatedescription');
    Route::post('/setting/updatedesocial', [GeneralSettingController::class, 'UpdateSocial'])->name('setting.updatesocial');
    Route::post('/setting/updatemedia', [GeneralSettingController::class, 'UpdateMedia'])->name('setting.updatemedia');

    //Api Related Route
    Route::get('/product/sub-sub-categories', [SubSubCategoryApiController::class, 'forSubCat'])->name('product-sub-subcategories.forsubcat');
    Route::get('/product/pro-sub-sub-categories', [ProductApiController::class, 'forProSubSubCat'])->name('pro-sub-categories.forprosubsubcat');
    Route::get('/deleteimage/{id}', [ProductApiController::class, 'deleteImage'])->name('proimage.delete');
    Route::get('product/productsrc',[ProductApiController::class, 'productSrc'])->name('product.productsrc');

});


// for storage link
Route::get('/linkstorage', function () {
    $targetFolder = base_path().'/storage/app/public';
    $linkFolder = $_SERVER['DOCUMENT_ROOT'].'/storage';
    symlink($targetFolder, $linkFolder); 
});
    
//temporary url
Route::get('/product/view', [ProductController::class, 'viewProduct']);

require __DIR__.'/auth.php';