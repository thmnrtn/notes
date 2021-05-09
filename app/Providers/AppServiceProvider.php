<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Inertia\Inertia;

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
        Schema::defaultStringLength(191);

        // Globally share data so it's always accessible in Vue components
        // This global data is available in Vue components under `this.$page`
        Inertia::share([
            'rootUrl' => url('/'),
            'csrfToken' => csrf_token(),
        ]);
    }
}
