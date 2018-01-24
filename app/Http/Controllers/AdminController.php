<?php

namespace App\Http\Controllers;

use App\Admin;
use App\Http\Requests;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function postLogin(Request $request)
    {
        $username = $request->username;
        $password = $request->password;
        $admin = Admin::where(['username' => $username, 'password' => $password])->count();

        if ($admin) {
            $request->session()->put('adminname', $username);
            return redirect('admin/dashboard');
        } else {
            $request->session()->flash('adminlogin', 'Please Check your username or password!');
            return view('admin.login');
        }


    }

    public function adminLogout()
    {
        Session::flush();
        return redirect('admin/login');
    }
}
