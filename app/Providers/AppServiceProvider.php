<?php

namespace App\Providers;

use App\Models\Grade;
use Illuminate\Support\Facades\View;
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
      Schema::defaultStringLength(191);
      $grades = Grade::all();
      // $style_img = app()->getLocale() === 'en' ?  'transform -scale-x-100':'';
      //
      //
       View::share('grades',$grades);

    }
}
