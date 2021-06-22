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
         * load department and category the first.
         *
         * 
         */
        $list_departments = Department::select('fs_department.id', 'fs_department.name')->where('fs_department.active', '1')->get();
        // $cart = session('cart');
        // dd($cart);
        $data = [
            'list_departments' => $list_departments,
            // 'cart' => $cart
        ];
        view()->share($data);
    }
}
