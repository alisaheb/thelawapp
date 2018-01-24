<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Account;
use App\Carddetail;
use App\Category;
use App\Comment;
use App\Certificate;
use App\Http\Requests;
use App\Notification;
use App\Portfolio;
use App\Skill;
use App\Task;
use App\User;
use App\UserDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Mail;
use Session;
use DB;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {

        $this->middleware('admin', ['only' => ['index', 'create', 'store', 'show', 'edit', 'update']]);
    }

      public function dashboard()
    {
       
       
        $comments = Comment::take(4)->orderBy('id','desc')->get();
        $tasks = Task::take(4)->orderBy('id','desc')->get();
        
        return view('admin.dashboard', ['comments' => $comments, 'tasks' => $tasks]);
    }

    public function index()
    {
        $user = User::all();
        return view('admin.user_listing', ['users' => $user]);
    }

    public function pendingCertificate()
    {
        $users = DB::table('users')
           ->select('user_id as id','fname','email','users.created_at','address','type','status')
            ->leftJoin('certificates', 'users.id', '=', 'certificates.user_id')
            ->where('approved',-1)
            ->groupBy('certificates.user_id')
            ->get();
        return view('admin.user_listing', ['users' => $users]);
    }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */

    public function edit($id)
    {
        $user = User::find($id);
        return view('admin.edit_user', ['user' => $user]);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->email = $request->email;
        $user->contact = $request->contact;
        $user->type = $request->user_type;
        $user->status = $request->status;
        $user->save();
        return redirect('admin/users');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    { 
        User::destroy($id);
        return redirect('admin/users');
    }

     public function deactivate($id)
    {
        $user = User::find($id);
        $user->status = 'unverified';
        $user->save();
        return redirect('admin/users');
    }

    public function activate($id)
    {
        $user = User::find($id);
        $user->status = 'verified';
        $user->save();
        return redirect('admin/users');
    }

    public function userdetails(Request $request, $id)
    {
        $user = User::with('getCertificate')->find($id);
        $skills = [];
        if ($user->skills != null) {
            $skills = explode(',', $user->skills);
        }
        $count = Portfolio::where('user_id', $id)->count();
        $portfolio = Portfolio::where('user_id', $id)->get();
        $skillcount = count($skills);
        Certificate::where([['approved','=',-1],['user_id','=',$id]])
            ->update(['approved'=>0]);
        return view('admin.userdetails', ['user' => $user, 'portfolio' => $portfolio, 'skills' => $skills, 'count' => $count, 'scount' => $skillcount]);
    }
}