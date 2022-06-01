<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
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
            $this->app->bind("App\Repositories\Contracts\\{$model}Interface", "App\Repositories\\{$model}Repository");
        }     
    }
}
