<?php

namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class FlashServiceProvider extends ServiceProvider {
    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('flash',function() {
            return $this->app->make(\App\Http\Flash::class);
        });
    }
}