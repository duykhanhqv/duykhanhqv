<?php

namespace App\Http\Middleware;

use App\Models\Admin;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckProductPremission
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Admin::where('id', Auth::guard('admin')->user()->id)->first()->inRole('product')) {
            return $next($request);
        } else {
            return redirect("/admin")->with(['msg' => 'You has not permissions product', 'status' => 'danger']);;
        }
    }
}
