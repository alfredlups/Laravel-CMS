<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider; 
use App\Shortcodes\WebAppShortcode;
use Shortcode;

class ShortcodesServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        Shortcode::register('snippet', 'App\Shortcodes\WebAppShortcode@custom');
    }
}
