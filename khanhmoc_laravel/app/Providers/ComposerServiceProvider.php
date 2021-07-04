<?php

namespace App\Providers;

use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
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

        // view()->composer('admin.system.home', function ($view) {
        //     // $view->with('list_departments', Department::select('fs_department.id', 'fs_department.name')->where('active', '1')->where('status', 1)->get());

        // });
    }
}
