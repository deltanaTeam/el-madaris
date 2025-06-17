<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
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
      Schema::defaultStringLength(191);
      // $style_img = app()->getLocale() === 'en' ?  'transform -scale-x-100':'';
      //
      //
      //  View::share('style_img',$style_img);

    }
}
