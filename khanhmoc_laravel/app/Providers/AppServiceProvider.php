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
<<<<<<< HEAD
         * Bootstrap any application services.
=======
         * load department and category the first.
>>>>>>> 1fdbc1b0192375189f11fe01bc159d3073df6c4d
         *
         * 
         */
        $list_departments = Department::select('fs_department.id', 'fs_department.name')->where('fs_department.active', '1')->get();
        view()->share('list_departments', $list_departments);
    }
}
