<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Utils\AcademyPaginator;

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
        AcademyPaginator::injectIntoBuilder();
    }
}
