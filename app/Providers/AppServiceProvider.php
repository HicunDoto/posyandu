<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Carbon\Carbon;

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
        setLocale(LC_TIME, $this->app->getLocale('id'));
        view()->composer([
            'layout.admin','index'], 
            function ($view) {
                $view->with('posyandu', \App\Models\Posyandu::all());
            }
        );
    }
}
