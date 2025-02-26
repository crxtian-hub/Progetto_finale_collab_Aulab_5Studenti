<?php

namespace App\Providers;

use App\Listeners\WelcomeNewUser;
use App\Models\Category;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
    * Register any application services.
    */
    public function register(): void
    {
        //
    }
    
    /**
    * Bootstrap any application services.
    */
    public function boot(): void
    {
        if (Schema::hasTable('categories')){
            View::share('categories', Category::orderBy('name')->get());
        }
        Paginator::useBootstrap();
        
        Event::listen(
            WelcomeNewUser::class,
        );
    }


    
}
