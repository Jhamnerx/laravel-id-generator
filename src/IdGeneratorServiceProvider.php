<?php

namespace jhamnerx\LaravelIdGenerator;

use Illuminate\Support\ServiceProvider;

/**
 * Service Provider For IdGenerator
 * @since 1.0.0
 */
class IdGeneratorServiceProvider extends ServiceProvider
{

    public function boot()
    {
    }


    public function register()
    {
        $this->app->make('jhamnerx\LaravelIdGenerator\IdGenerator');
    }
}
