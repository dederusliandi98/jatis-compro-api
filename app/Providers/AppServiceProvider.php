<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Schema;

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

        $models = [
            'Client',
            'Contact',
            'Information',
            'Portfolio',
            'Product',
            'Team',
            'Testimonial',
        ];

        foreach ($models as $model) {
            $this->app->bind("App\Services\Contracts\\{$model}Interface", "App\Services\\{$model}Service");
        }       
    }
}
