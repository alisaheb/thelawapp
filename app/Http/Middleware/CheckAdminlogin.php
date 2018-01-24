<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\DB;

class CheckAdminlogin
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
     
    if(Session::has('adminname'))
     {
        $username=Session::get('adminname'); 
       // $admin=DB::select('select id from admin_details where username=?',[$username])->first();
        $admin=DB::table('admin_details')->where('username', $username)->count();
                if($admin)
                {
                    return $next($request);
                }
      }
      else
      {
        return redirect()->to('admin/login')->with('login_warning', 'You are not logged in');
      }
        
        
    }

}