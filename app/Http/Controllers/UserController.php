<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\Auth\Authenticatable;
use App\Account;
use App\Carddetail;
use App\Category;
use App\Comment;
use App\Announcement;
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
use Validator;
use App\Certificate;
use Illuminate\Support\Facades\DB;

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


    public function sendEmailReminder(Request $request)
    {

        $id = Auth::user()->id;
        $user = User::findOrFail($id);

        Mail::send('emails.reminder', ['user' => $user], function ($m) use ($user) {
            // $m->from('ims.msnegi@gmail.com', 'Your Application');

            if ($m->to('www.msnegi@gmail.com', $user->fname)->subject('Your Reminder!')) {
                echo $user->email;
            } else {
                echo 'no';
            }
        });
    }


    public function index()
    {
        $user = User::all();
        return view('admin.user_listing', ['users' => $user]);
    }

    public function profileview()
    {
        $userid = Auth::user()->id;
        $user = User::find($userid);
        //print_r($user);exit;
        return view('front.profile', ['user' => $user]);
    }

    public function saveprofile(Request $request)
    {

        if ($request->has('fname')) {
            $fname = $request->fname;
        }
        if ($request->has('lname')) {
            $lname = $request->lname;
        }
        if ($request->has('abn')) {
            $abn = $request->abn;
        }
        if ($request->has('dob')) {
            $abn = $request->dob;
        }

        $userid = Auth::user()->id;
        $user = User::find($userid);
        $user->fname = $request->fname;
        $user->lname = $request->lname;
        $user->address = $request->address;
        $user->email = $request->email;
        $user->abn = $request->abn;
        $user->dob = $request->dob;
        $user->description = $request->description;
        $user->address = $request->address;
        $user->save();
        return redirect('profile')->with('updatemessag', 'Information Successfully updated ');
    }
    /*------------all pop up code--*/

    public function accountdetails(Request $request)
    {
        $acntholder = $request->acntholder;
        $bsb = $request->bsb;
        $acntnumber = $request->acntnumber;
        $userid = Auth::user()->id;
        $num_of_records = Account::where('user_id', $userid)->count();

        $response['acntholder'] = $acntholder;
        $response['bsb'] = $acntholder;
        $response['account_number'] = $acntnumber;

        if ($num_of_records == 0) {
            $account = new Account;
            $account->account_holder_name = $acntholder;
            $account->bsb = $bsb;
            $account->account_number = $acntnumber;
            $account->user_id = $userid;
            $account->save();

            $profile_completion = User::find($userid)->profile_completion;
            $profile_completion = $profile_completion + 30;
            User::where('id', $userid)->update(['profile_completion' => $profile_completion]);
            echo 1;
        } else {
            $account = Account::where('user_id', $userid)->update(['account_holder_name' => $acntholder, 'bsb' => $bsb, 'account_number' => $acntnumber]);
            echo 1;
        }
    }

    /*-----all pop up code---*/
    public function uploadimage(Request $request)
    {
        $id = Auth::user()->id;
        $img = User::find($id)->profile_image;
        $milliseconds = round(microtime(true) * 1000);
        $filename = $milliseconds . '_' . basename($_FILES['pofile_pic']['name']);
        $target_path = 'public/profile_images/' . $filename;
        if (move_uploaded_file($_FILES['pofile_pic']['tmp_name'], $target_path)) {
            User::where('id', $id)->update(['profile_image' => $filename]);
            if ($img == null) {
                $profile_completion = User::find($id)->profile_completion;
                $profile_completion = $profile_completion + 10;
                User::where('id', $id)->update(['profile_completion' => $profile_completion]);
            }
        } else {
            echo 'no';
            return redirect('/dashboard');
        }
        return redirect('/dashboard');
    }



    public function numberverification(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        $country_code = '61';
        $url = 'https://api.nexmo.com/verify/json?' . http_build_query([
                'api_key' => 'ccc091ae',
                'api_secret' => 'd343cc6a86558f60',
                'number' => $country_code . $request->verifiemobile,
                'brand' => 'TheLawApp'
            ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        // error_log($response);


        /* $user->contact=$request->verifiemobile;
         $user->save();*/

        echo $response;
    }

    public function sendverificationcode(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::find($id);

        $url = 'https://api.nexmo.com/verify/check/json?' . http_build_query([
                'api_key' => 'ccc091ae',
                'api_secret' => 'd343cc6a86558f60',
                'request_id' => $request->requestid,
                'code' => $request->verifycode
            ]);

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        //error_log($response);
        $code = json_decode($response);
        // print_r($code);
        if ($code->status == 0) {
            if ($user->contact == null) {
                $profile_completion = User::find($id)->profile_completion;
                $user->profile_completion = $profile_completion + 20;
            }
            $user->contact = $request->mob;
            $user->save();
        }
        echo $response;
    }


    public function savedescription(Request $request)
    {
        $description = $request->description;

        $userid = Auth::user()->id;
        $user = User::find($userid);
        $profile_percentage = $user->profile_completion;

        if ($user->description == '') {
            $profile_percentage = $profile_percentage + 10;
            $user->profile_completion = $profile_percentage;
        }
        $user->description = $description;
        $user->save();
        echo json_encode($profile_percentage);
    }


    public function messages()
    {
        return [
            'skills.required' => 'Ati working is required',
        ];
    }

    public function addskills(Request $request)
    {
      
        $messages = [
            'required' => 'The :attribute field is required.',
            'totalskills.max' => 'You package support only 3 skills'
        ];

        $rules = [
            'skills' => 'required',
            'totalskills' => 'integer|max:3'
        ];

        $request->totalskills =  count($request->skills); 
        
        $validator = Validator::make($request->all(),$rules, $messages)->validate();
        $id = Auth::user()->id;
        $user = User::find($id);
        $profile_percentage = $user->profile_completion;

        if ($user->skills == '') {
            $profile_percentage = $profile_percentage + 10;
            $user->profile_completion = $profile_percentage;
        }
        $skills = implode(",",$request->skills);
        $res = User::where('id', $id)->update(['profile_completion' => $profile_percentage,'skills' => $skills]);
        $skill = new Skill;
        $skill->specialities = $skills;
        $skill->user_id = Auth::user()->id;
        $skill->save();

        echo json_encode($res);
    }


    public function userLogin(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'fname' => 'required',
            'lname' => 'required',
            'address' => 'required',
            'user_type' => 'required',
        ]);
        
        $email = $request->email;
        $fname = $request->fname;
        $lname = $request->lname;
        $address = $request->address;
        $contact = $request->contact;
        $usrType = $request->user_type;
        $profile_completion = '10';
        $status = ($usrType == 'lawyer') ? 'unverified' : 'verified';

        User::where('email', $email)->update(['fname' => $fname, 'lname' => $lname, 'address' => $address, 'contact' => $contact, 'type' => $usrType, 'status' => 'verified', 'profile_completion' => $profile_completion]);

        $this->emailVerifyCode();
        
        return redirect('dashboard');
    }

    public function emailVerifyCode(){
        $link = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 60);
        $email = Auth::user()->email;

        User::where('email', $email)->update(['email_verify' => $link]);
        $to = $email;
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
        $headers .= 'From: The law app <no-replay@laww.com.au>' . "\r\n";

        $subject = "Please verify your laww account";

        $url = url('/emailverification?code=');
        $message ="Hi ".Auth::user()->fname.",<br>
        Thanks for using law app! Please confirm your email address by clicking on the link below. We'll communicate with you from time to time via       email so it's important that we have an up-to-date email address on file.
        Link:    $url$link
        <br>If you did not sign up for a law app account don't click on the link.";

        mail($to,$subject,$message,$headers);
        return redirect('dashboard');
    }


    public function activate($id)
    {
        $user = User::find($id);
        $user->status = 'verified';
        $user->save();
        return redirect('admin/users');
    }

   
    public function dashboard()
    {
        
        if(Auth::user()->type === 'admin'){
            return redirect('admin/dashboard');
        }
        
        $id = Auth::user()->id;
        $comments = Comment::where('comment_by', '!=', $id)->get();
        $tasks = Task::where(['status' => 'open'])->where('id', '!=', $id)->get();
        $user = User::find($id);
        $pper = 0; //profile
        $veri = 0;
        $card = 0;
        $aper = Account::where('user_id', $id)->count(); //account
        $imgcount = $user->profile_image;
        $fname = $user->fname;
        if ($imgcount != null && $fname != null) {
            $pper = 1;
        }
        $status = $user->status;    //User verification
        $contact = $user->contact; //User verification
        if ($status == 'verified' && $contact != null) {
            $veri = 1;
        }

        $carddetail =  Carddetail::where('user_id', $id)->count();
        if ($carddetail > 0) {
            $card = 1;
        }
        $categories = Category::all();
        $profile_percentage = User::find($id)->profile_completion;
        if(Auth::user()->type =='lawyer'){
            $type = '1';
        }
        if(Auth::user()->type =='client'){
            $type = '2';
        }
        $certificate = Certificate::where('user_id', $id)->first();
        $account = Account::where('user_id', $id)->first();
        $announcements = Announcement::where('type',$type)->take(5)->get();
        return view('front.dashboard', [
                'percentage' => $profile_percentage,
                'aper' => $aper, 
                'imgcount' => $imgcount, 
                'pper' => $pper, 
                'veri' => $veri, 
                'comments' => $comments, 
                'tasks' => $tasks, 
                'card' => $card, 
                'categories' => $categories,
                'announcements' => $announcements,
                'account'=>$account,
                'certificate'=> $certificate,
                'user' => $user
                ]);
    }

    function generateRandStr($length)
    {
        $randstr = "";
        for ($i = 0; $i < $length; $i++) {
            $randnum = mt_rand(0, 61);
            if ($randnum < 10) {
                $randstr .= chr($randnum + 48);
            } else if ($randnum < 36) {
                $randstr .= chr($randnum + 55);
            } else {
                $randstr .= chr($randnum + 61);
            }
        }
        return $randstr;
    }


    public function resume_save(Request $request)
    {
        $id = Auth::user()->id;
        $name = Auth::user()->fname;
        $milliseconds = round(microtime(true) * 1000);
        $randstring = $this->generateRandStr(20);
        
        $ext = pathinfo($_FILES['resume']['name'], PATHINFO_EXTENSION);
        $filename = $name . '_' . $milliseconds . $randstring . '.' . $ext;

        $target_path = 'public/portfolio_resumes/' . $filename;
        $data = 0;
        if (move_uploaded_file($_FILES['resume']['tmp_name'], $target_path)) {
            $data = User::where('id', $id)->update(['resume' => $filename]);
        }
        echo json_encode($data);
    }

    public function portfolio_save(Request $request)
    {

        $id = Auth::user()->id;
        $name = Auth::user()->fname;
        $data = [];
        $response = [];
        //print_r($_FILES); die;
        foreach ($_FILES as $key => $value) {

            $milliseconds = round(microtime(true) * 1000);
            $randstring = $this->generateRandStr(15);
            $filename = $name . '_' . $milliseconds . $randstring . '_' . basename($value['name']);

            $target_path = 'public/portfolio_docs/' . $filename;

            if (move_uploaded_file($value['tmp_name'], $target_path)) {
                $porfolio = new Portfolio;
                $porfolio->items = $filename;
                $porfolio->user_id = $id;
                $porfolio->save();
                $pid = $porfolio->id;


                array_push($response, ['name' => $filename, 'pid' => $pid]);
            }


        }
        echo json_encode($response);
        // die;
    }

    public function portfolio(Request $req)
    {
        $id = Auth::user()->id;
        $resume = Auth::user()->resume;
        $arr = explode('.', $resume);
        $ext = end($arr);
        $portfolio = Portfolio::where('user_id', $id)->get();
        return view('userpanel.portfolio', ['portfolio' => $portfolio, 'ext' => $ext]);
    }

    public function delete_portfolio(Request $request)
    {
        $id = $request->id;
        $portfolio = Portfolio::find($id);
        $filename = $portfolio->items;
        $file = base_path('public/portfolio_docs/') . $filename;

        if (!unlink($file)) {
            //echo ("Error deleting $file");
        } else {
            //echo ("Deleted $file");
        }

        $portfolio->delete();

        echo json_encode('deleted');
    }


    public function billing_address(Request $req)
    {
        $userid = Auth::user()->id;
        $num_of_records = Account::where('user_id', $userid)->count();

        if ($req->has('country') && $req->has('state') && $req->has('city') && $req->has('postal') && $req->has('street')) {

        }
        $country = $req->country;
        $state = $req->state;
        $city = $req->city;
        $postal = $req->postal;
        $street = $req->street;

        $response['country'] = $country;
        $response['state'] = $state;
        $response['city'] = $city;
        $response['postal'] = $postal;
        $response['street'] = $street;

        if ($num_of_records == 0) {
            $account = new Account;
            $account->country = $country;
            $account->state = $state;
            $account->city = $city;
            $account->postal = $postal;
            $account->street = $street;
            $account->save();
            echo json_encode($response);
        } else {
            $account = Account::where('user_id', $userid)->update(['country' => $country, 'state' => $state, 'city' => $city, 'postal_code' => $postal, 'street_address' => $street]);
            echo json_encode($response);
        }

    }


    public function paypalmail(Request $req)
    {
        $userid = Auth::user()->id;
        $num_of_records = Account::where('user_id', $userid)->count();

        if ($req->has('paypalmail')) {
            $paypalmail = $req->paypalmail;
        } else {
            Session::flash('message', 'Fill all the fields!');
        }


        if ($num_of_records == 0) {
            $account = new Account;
            $account->paypal_email = $paypalmail;
            $account->save();

            echo json_encode('insert');
        } else {
            $account = Account::where('user_id', $userid)->update(['paypal_email' => $paypalmail]);
            echo json_encode($paypalmail);
        }
    }

    public function remove_account(Request $req)
    {
        $userid = Auth::user()->id;
        if ($req->action == 'address') {
            $account = Account::where('user_id', $userid)->update(['country' => null, 'state' => null, 'city' => null, 'postal_code' => null, 'street_address' => null]);
            echo $account;
        } else if ($req->action == 'account') {
            $account = Account::where('user_id', $userid)->update(['account_holder_name' => null, 'bsb' => null, 'account_number' => null]);
            echo $account;
        } else {
            $account = Account::where('user_id', $userid)->update(['paypal_email' => null]);
            echo $account;
        }
    }

    public function admin_verification(Request $req)
    {
        $userid = Auth::user()->id;
        $user = User::find($userid);
        echo $user->status;

    }

    public function skills(Request $request)
    {
        $userid = Auth::user()->id;
        $skills = Skill::where('user_id', $userid)->first();
        $categories = Category::all();
        return view('front.skills', compact('skills','categories'));
    }

    public function saveskills(Request $request)
    {
        $userid = Auth::user()->id;
        $skill_count = Skill::where('user_id', $userid)->count();
        $transportation= implode(';',$request->checkbox).';';
        $specialities = $request->specialities;
        $languages = $request->languages;
        $education = $request->education;
        $works = $request->works;

        if ($skill_count > 0) {
            $skillupdate = Skill::where('user_id', $userid)->update(['specialities' => $specialities, 'languages' => $languages,'education' => $education, 'works' => $works,'transportation' => $transportation]);
        } else {
            $skills = new Skill;
            $skills->user_id = $userid;
            $skills->specialities = $request->specialities;
            $skills->languages = $request->languages;
            $skills->work = $request->work;
            $skills->education = $request->education;
            $skills->transportation= implode(';',$request->checkbox).';';

            $skills->save();
        }

        return redirect('skills');
    }

    public function notifications(Request $req)
    {
        $userid = Auth::user()->id;
        $usertype = Auth::user()->type;

        //$notifications  =   Notification::where('recipient_id', $userid)->orderBy('created_at','desc')->get();

        $notifications = 
        DB::table('notifications')
        ->join('bids','notifications.href','=','bids.id')
        ->join('tasks','bids.task_id', '=' ,'tasks.id')
        ->join('users','notifications.sender_id', '=', 'users.id')
        ->where('notifications.recipient_id', $userid)
        ->orderBy('notifications.created_at', 'desc')
        ->select('notifications.*','bids.task_id','tasks.slug','tasks.title as task_title','users.profile_image','users.fname','users.lname')
        ->take(15)->get()->groupBy(function ($date) {
            return Carbon::parse($date->created_at)->format('M Y');
        });

        //return $notifications;

        if ($usertype == 'lawyer') {
            $tasks = Task::where('status', 'open')->get();

            return view('front.notifications', ['tasks' => $tasks, 'notifications' => $notifications]);
        } else {
            $tasks = Task::where(['user_id' => $userid, 'status' => 'open'])->get();

            return view('front.notifications', ['tasks' => $tasks, 'notifications' => $notifications]);
        }

    }

    public function userprofile(Request $req, $userid)
    {

        $userprofile = User::find($userid);

        $userdetails = UserDetail::where('user_id', $userid)->first();

        $skills = explode(',', $userprofile->skills);

        return view('userpanel.bidder-profile', ['userprofile' => $userprofile, 'skills' => $skills, 'userdetails' => $userdetails]);
    }

    public function headerimage(Request $request)
    {

        $id = Auth::user()->id;

        $milliseconds = round(microtime(true) * 1000);
        $filename = $milliseconds . '_' . basename($_FILES['image']['name']);
        $target_path = 'public/header_images/' . $filename;
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_path)) {

            $user = User::find($id);
            $user->header_image = $filename;
            $user->save();
        } else {
            echo 'no';
        }
    }

    public function userdetails(Request $request, $id)
    {
        $user = User::find($id);
        $skills = [];
        if ($user->skills != null) {
            $skills = explode(',', $user->skills);
        }
        $count = Portfolio::where('user_id', $id)->count();
        $portfolio = Portfolio::where('user_id', $id)->get();
        $skillcount = count($skills);

        return view('admin.userdetails', ['user' => $user, 'portfolio' => $portfolio, 'skills' => $skills, 'count' => $count, 'scount' => $skillcount]);

    }

    public function resetpassword(Request $request)
    {

        $userid = Auth::user()->id;
        $user = User::find($userid);

        $rpassword = Hash::make($request->newpwd);

        $oldpassword = Hash::make($request->oldpwd);

        $hashedPassword = $user->password;

        if (Hash::check($request->oldpwd, $hashedPassword)) {
            echo User::where('id', $userid)->update(['password' => $rpassword]);
            return redirect('logout');
        } else {
            Session::flash('oldpassword', 'Wrong current password!');
            return redirect('password');
        }
        //echo User::where(['id',$userid])->update(['password'=>$rpassword]);


        die();
        /* $id = Auth::user()->id;
            $oldpwd = $request->oldpwd;
            $newpwd = $request->newpwd;

            User::where(['id'=>$id,'password'=>$oldpwd])->update('password');*/
    }

    public function emailverification()
    {
        $increase = 0;
        $code = $_GET['code'];
        
        $user = User::where('email_verify', $code)->first();
        if (($user->email_verify !== 1) && ($user->email_verify === $code)) {
            if ($user->type == 'client') {
                $increase = 20;
            }
            if ($user->type == 'lawyer') {
                $increase = 10;
            }
            $profile_completion = $user->profile_completion + $increase;
            User::where('id', $user->id)->update(['email_verify' => 1, 'profile_completion' => $profile_completion]);
            Auth::login($user);
        }
        return redirect('dashboard');
    }

    public function smsTest()
    {
        $url = 'https://rest.nexmo.com/sms/json?' . http_build_query(
                [
                    'api_key' => 'ccc091ae',
                    'api_secret' => 'd343cc6a86558f60',
                    'to' => '610730515848',
                    'from' => '441632960061',
                    'text' => 'Hello from Nexmo'
                ]
            );

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);

        return $response;
    }
}