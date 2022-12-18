<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

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
        //
        Schema::defaultStringLength(191);
        Paginator::useBootstrap();
//        front section data retrive
        View::composer('front.include.header.menu', function ($view) {
            $view->with('teachers', User::where('role', 'teacher')->orderBy('name', 'ASC')->get());
        });
        View::composer('front.include.header.menu', function ($view) {
            $view->with('friends', User::where('role', 'user')->orderBy('name', 'ASC')->get());
        });
    }
}
