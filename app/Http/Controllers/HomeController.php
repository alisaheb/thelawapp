<?php

namespace App\Http\Controllers;

use App\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }

    public function mail()

    {

        $user = User::find(1)->toArray();

        Mail::send('emails.reminder', $user, function($message) use ($user) {

            $message->to('jakareaparvez@gmail.com');

            $message->subject('Mailgun Testing');

        });

        dd('Mail Send Successfully');

    }
}
