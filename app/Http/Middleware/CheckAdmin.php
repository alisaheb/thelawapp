<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\DB;
use Session;
use Auth;

class CheckAdmin
{
    /**
     * Run the request filter.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {

        if(Auth::user()->type == 'admin'){
            return $next($request);
        }
        else{
            return redirect()->back();
        } 
    }
}