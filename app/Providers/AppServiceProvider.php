<?php

namespace App\Providers;

use App\Supports\CalculateDatabaseResults;
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
        $this->app->bind('CalculateDatabaseResults', fn() => new CalculateDatabaseResults());
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
