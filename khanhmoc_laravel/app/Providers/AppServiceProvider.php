<?php

namespace App\Providers;

use App\Models\Department;
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
         * Bootstrap any application services.
         *
         * 
         */
        $list_departments = Department::select('fs_department.id', 'fs_department.name')->where('fs_department.active', '1')->get();
        view()->share('list_departments', $list_departments);
    }
}
