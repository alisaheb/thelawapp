<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\DB;
use Auth;

class CheckLawyer
{
  /**
   * Run the request filter.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return mixed
   */
  public function handle($request, Closure $next)
  {
    if(Auth::user()->type == 'lawyer')
      {
          return $next($request);
      }
    else{
      return redirect()->back();
    } 
  }
}