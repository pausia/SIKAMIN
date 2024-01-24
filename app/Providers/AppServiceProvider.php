<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\JadwalSidang;
use App\Observers\SidangObserver;

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
        JadwalSidang::observe(SidangObserver::class);
    }
}
