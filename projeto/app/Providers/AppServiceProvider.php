<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    protected $url = 'biomedsearch.me';
    public function register()
    {
        //
        if(env('REDIRECT_HTTPS')) {
            $this->app['request']->server->set('HTTPS', true);
        }
    }

    /**
     * Bootstra'p any application services.
     *
     * @return void
     */
    public function boot()
    {
        
        
       if(env('REDIRECT_HTTPS')) {
            $this->url='https://'.$this->url;
        }
    }
}
