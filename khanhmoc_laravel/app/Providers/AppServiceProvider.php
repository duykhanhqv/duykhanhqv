<?php

namespace App\Providers;

use App\Models\Admin;
use App\Models\Department;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\ServiceProvider;

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
        /**
         * load department and category the first.,
         * add load role
         *
         * 
         */

        view()->composer('*', function ($view) {
            $view->with('list_departments', Department::select('fs_department.id')->where('active', '1')->where('status', 1)->get());
            if (Auth::guard('admin')->user()) {
                $view->with('role_admin', Admin::where('id', Auth::guard('admin')->user()->id)->first());
                $view->with('role_order', Admin::where('id', Auth::guard('admin')->user()->id)->first());
                $view->with('role_product', Admin::where('id', Auth::guard('admin')->user()->id)->first());
            }
        });
    }
}
