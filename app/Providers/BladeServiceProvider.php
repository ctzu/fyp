<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Blade;

class BladeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        /**
         * @role Directive
         */
        Blade::directive('role', function ($expression) {
            return "<?php if (auth()->user()->role === $expression) : ?>";
        });

        /**
         * @endrole Directive
         */
        Blade::directive('endrole', function ($expression) {
            return "<?php endif; ?>";
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
