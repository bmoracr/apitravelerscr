<?php

namespace App\Providers;

use App\Models\Api\Tours\Tour;
use App\Observers\TourObserver;
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
        Tour::observe(TourObserver::class);
    }
}
