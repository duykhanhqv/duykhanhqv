<?php

namespace App\Providers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\ServiceProvider;
use App\Models\Admin;


class BladeServiceProvider extends ServiceProvider
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
        //
        // Blade::directive('inrole', function ($expression) {
        //     if (Auth::guard('admin')()) {
        //         if (Auth::guard('admin')->inRole($expression)) {
        //             return true;
        //         }
        //     }
        //     return false;
        // });
        // Blade::directive('end', function ($expression) {
        //     return '&lt;?php endif; ?&gt;';
        // });
    }
}
