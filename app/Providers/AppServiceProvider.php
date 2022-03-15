<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Laravel\Sanctum\Sanctum;
use App\Models\ProductCategory;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Sanctum::usePersonalAccessTokenModel(PersonalAccessToken::class);
       
       // \View::share('categories', ProductCategory::limit(7)->get());

    }
}
