<?php

namespace App\Providers;

use App\Models\DestinationType;
use Illuminate\Support\ServiceProvider;

class TypeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->view->composer('layouts.app', function ($view) {
            $types = DestinationType::all();
            $view->with('types', $types); // replace $types with your actual data
        });
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
