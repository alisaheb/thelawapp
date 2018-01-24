<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Bid;
use App\Http\Requests;
use App\Notification;
use App\Setting;
use App\Task;
use App\Taskdoc;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher;

use App\Category;
class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function __construct()
    {
        //     $this->middleware('adminauth')->except('mytasks,regsitercomplain');

    }

    public function mytaskslist()
    {
        $userid = Auth::user()->id;
        //$cases=Task::where('user_id',$userid)->where('status','!=','unverify')->get();
        $count = Task::where('user_id', $userid)->count();
        $cases = Task::where('user_id', $userid)->orderBy('id','desc')->get();
        return view('userpanel.mycases', ['cases' => $cases, 'count' => $count]);
    }

    public function mytaskajax(Request $request)
    {
        $userid = Auth::user()->id;
        $id = $request->id;
        $bid = Bid::where('task_id', $id)->get();
        $task = Task::find($id);
        $status = $task->status;
        $comments = Task::find($id)->comments;
        $comment_count = Task::find($id)->comments->count();
        $comment_string = '';
        $bidcount = Bid::where('task_id', $id)->count();
        $task_assign = 0;

        $taskdochtml = '';
        $taskdocs = Taskdoc::where('task_id', $id)->get();
        foreach ($taskdocs as $taskdoc) {
            $taskdochtml .= '<span><img class="my_task_attach_pic"   src="../taskdocs/' . $taskdoc->filename . '  "   style="width:75px" /><i class="fa cut fa-times-circle delete-tf" aria-hidden="true" data-id="' . $taskdoc->id . '"></i> </span>';
        }

        $response['taskdoc'] = $taskdochtml;
        if ($status == 'open') {

            if ($bidcount > 0) {
                $response['status'] = 'offers';
            } else {
                $response['status'] = 'nooffer';
            }

        }

        if ($status == 'accept') {
            $task_assign = $task->asignee->fname;
            $response['status'] = 'accept';
        }

        if ($status == 'complete') {
            $task_assign = $task->asignee->fname;
            $response['status'] = 'complete';
        }

        if (strtotime($task->last_date) < strtotime(date('d-m-Y'))) {
            $response['status'] = 'expired';
        }


        $price = $task->estimate_budget;
        $img = $task->user->profile_image;

        if (Auth::guest() || empty($task->user->profile_image)) {
            $response['img'] = asset('userpanel/images/user-icon.png');

        } else {
            $response['img'] = url('../profile_images') . "/" . $task->user->profile_image;
        }

        foreach ($comments as $comment) {
            if (empty($comment->userby->profile_image)) {
                $img = asset('userpanel/images/user-icon.png');
            } else {
                $img = url('../profile_images') . "/" . $comment->userby->profile_image;
            }

            $comment_by = $comment->comment_by;
            if ($userid == $comment_by) {

                $comment_string .= "<div class='outer-new'><span class='new-comment'><h3>" . $comment->userby->fname . " " . $comment->userby->lname . "</h3><p>" . $comment->comments . "</p></span><div class='comment-pic'><img src='" . $img . "'/></div></div>";


            } else {
                $comment_string .= "<div class='outer-ajaxbrowsecase'>
                                              <div class='posted-pic'>
                                                  <img src='" . $img . "'/>
                                                  <p>" . $comment->userby->fname . " " . $comment->userby->lname . "</p></div>
                                                  <span class='old-comments'><h4>" . $comment->userby->fname . " " . $comment->userby->lname . "</h4>
                                              <p>" . $comment->comments . "</p></span>
                                          </div>";

            }


        }


        $response['title'] = $task->title;
        //   $response['status']   = $task->status;
        $response['asignee'] = $task_assign;
        $response['price'] = $task->estimate_budget;
        $response['fname'] = $task->user['fname'];
        $response['lname'] = $task->user['lname'];
        $response['task_id'] = $task->id;
        $response['task_user_id'] = $task->user->id;
        $response['description'] = $task->description;
        $response['comment_count'] = $comment_count;
        $response['comment_sec'] = $comment_string;
        $response['comment_by'] = Auth::user()->fname;


        echo json_encode($response);
        die;

        echo json_encode('ok');
    }

    public function browsecase(Request $request)
    {

        /*  if(Auth::guest())
          {
            $cases=Task::all();
            $count=Task::where('status','open')->count();
          } */
        //$cases=Task::all();
        // $count=Task::where('status','open')->count();
        $userid = Auth::user()->id;
        $cases = Task::where('user_id', '!=', $userid)->where('status', '!=', 'unverify')->where('status', '!=', 'expired')->get();
        $count = Task::where('user_id', '!=', $userid)->where('status', 'open')->count();


        return view('userpanel.tasks', ['cases' => $cases, 'count' => $count]);
    }


    public function realtimechat(Request $request)
    { //die;

        require_once base_path('vendor/pusher/pusher-php-server/lib/Pusher.php');
        $options = array(
            'encrypted' => true
        );
        $pusher = new Pusher(
            '47a9b0a92de543b0efe6',
            '259fdc0bba0003e81d16',
            '263966',
            $options
        );

        $data['message'] = $request->comments;
        $data['from'] = $request->comment_by;
        $data['taskid'] = $request->taskid;
        //echo "hello";
        $pusher->trigger('presence-messages', 'my_event', $data);

    }


    public function pushauth(Request $request)
    {
        require_once base_path('vendor/pusher/pusher-php-server/lib/Pusher.php');
        if (!Auth::guest()) {
            $user_id = Auth::user()->id;
            $user_info = Auth::user()->fname;
            $pusher = new Pusher('47a9b0a92de543b0efe6', '259fdc0bba0003e81d16', '263966');
            $auth = $pusher->presence_auth($request->channel_name, $request->socket_id, $user_id, array('user_info' => $user_info));
            echo $auth;
            //  echo $pusher->socket_auth($request->channel_name, $request->socket_id);
        } else {
            header('', true, 403);
            echo "Forbidden";
        }

    }

    public function ajaxbrowsecase(Request $request)
    {

        $id = $request->id;
        $task = Task::find($id);
        $task_status = $task->status;
        $task_assign_to = $task->assigned_to;
        $userid = Auth::user()->id;
        $task_assign = 0;


        $taskdochtml = '';
        $taskdocs = Taskdoc::where('task_id', $id)->get();
        foreach ($taskdocs as $taskdoc) {
            $taskdochtml .= '<span><img class="my_task_attach_pic"   src="../taskdocs/' . $taskdoc->filename . '  "   style="width:75px" /><i class="fa cut fa-times-circle delete-tf" aria-hidden="true" data-id="' . $taskdoc->id . '"></i> </span>';
        }

        $response['taskdoc'] = $taskdochtml;


        if ($task_status == 'accept') {
            $task_assign = $task->asignee->fname;
            if ($userid == $task_assign_to) {
                $response['status'] = 'accepted';
            } else {
                $response['status'] = 'assigned';
            }
        }
        $comments = Task::find($id)->comments;
        $comment_count = Task::find($id)->comments->count();
        $comment_string = '';
        $bid = Bid::where(['user_id' => $userid, 'task_id' => $id])->count();

        // echo json_encode($bidstatus); die;
        if ($task_status == 'open') {
            if ($bid > 0) {
                $response['status'] = 'offered';
                //$response['offered']   = 1;
            } else {
                $response['status'] = 'notoffered';
                //$response['offered']   = 0;
            }

        }

        if ($task_status == 'complete') {
            $task_assign = $task->asignee->fname;
            $response['status'] = 'complete';

        }


        $price = $task->estimate_budget;
        $img = $task->user->profile_image;


        if (Auth::guest() || empty($task->user->profile_image)) {
            $response['img'] = asset('userpanel/images/user-icon.png');

        } else {
            $response['img'] = url('../profile_images') . "/" . $task->user->profile_image;
        }

        foreach ($comments as $comment) {
            if (empty($comment->userby->profile_image)) {
                $img = asset('userpanel/images/user-icon.png');
            } else {
                $img = url('../profile_images') . "/" . $comment->userby->profile_image;
            }

            $userid = Auth::user()->id;
            $comment_by = $comment->comment_by;

            if ($userid == $comment_by) {

                $comment_string .= "<div class='outer-new'><span class='new-comment'><h3>" . $comment->userby->fname . " " . $comment->userby->lname . "</h3><p>" . $comment->comments . "</p></span><div class='comment-pic'><img src='" . $img . "'/></div></div>";

            } else {
                $comment_string .= "<div class='outer-ajaxbrowsecase'>
                                            <div class='posted-pic'>
                                                <img src='" . $img . "'/>
                                                </div>
                                                    <span class='old-comments'><h4>" . $comment->userby->fname . " " . $comment->userby->lname . "</h4>
                                            <p>" . $comment->comments . "</p></span>
                                        </div>";

            }

        }

        $response['asignee'] = $task_assign;
        $response['title'] = $task->title;
        //$response['status']   = $task->status;
        $response['price'] = $task->estimate_budget;
        $response['fname'] = $task->user['fname'];
        $response['lname'] = $task->user['lname'];
        $response['task_id'] = $task->id;
        $response['task_user_id'] = $task->user->id;
        $response['description'] = $task->description;
        $response['comment_count'] = $comment_count;
        $response['comment_sec'] = $comment_string;
        $response['comment_by'] = Auth::user()->fname;

        echo json_encode($response);
        die;

        $img2 = asset('userpanel/images/image-icon.png');
        $map = asset('userpanel/images/single-project-map-image.jpg');


    }

    function mytasks()
    {
        $userid = Auth::user()->id;
        $tasks = Task::where('user_id', $userid)->get();
        return view('userpanel.single_project_view', ['tasks' => $tasks]);
    }

    public function regsitercomplain(Request $request)
    {

        $userid = Auth::user()->id;
        $task = new Task;
        $task->title = $request->title;
        $task->description = $request->description;
        $task->date_of_incident = $request->dateofincident;
        $task->place_of_incident = $request->incedentlocation;
        $task->last_date = $request->estimatedeadline;
        $task->estimate_budget = $request->budget;
        $task->user_id = $userid;
        $task->slug = str_replace(' ', '-', strtolower($request->title)) . '-' . rand(1000, 100000);
        $res = $task->save();
  
        echo json_encode('task_save');
    }


    public function get_taskby_slug(Request $req, $slug)
    {
        $userid = Auth::user()->id;
        $cases = Task::where('user_id', '!=', $userid)->where('status', '!=', 'unverify')->get();
        $count = Task::where('user_id', '!=', $userid)->where('status', 'open')->count();
        $slugcase = Task::where('slug', $slug)->first();

        $taskid = $slugcase->id;
        $taskdocs = Taskdoc::where('task_id', $taskid)->get();

        $comments = Task::find($slugcase->id)->comments;
        $comment_count = Task::find($slugcase->id)->comments->count();

        $bid = Bid::where(['user_id' => $userid, 'task_id' => $taskid])->count();
        $bidaccept = Bid::where(['user_id' => $userid, 'status' => '1', 'task_id' => $taskid])->count();
        $assignee = Bid::where(['status' => '1', 'task_id' => $taskid])->first();

        $bidders = Bid::where(['task_id' => $taskid, 'status' => '0'])->get();
        $bidder_count = Bid::where(['task_id' => $taskid, 'status' => '0'])->count();

        return view('userpanel.case_by_slug', ['comment_count' => $comment_count, 'comments' => $comments, 'cases' => $cases, 'count' => $count, 'slugcase' => $slugcase, 'bid' => $bid, 'accept' => $bidaccept, 'bidders' => $bidders, 'assignee' => $assignee, 'bidder_count' => $bidder_count, 'taskdocs' => $taskdocs]);
    }

    public function my_case_slug(Request $req, $slug)
    {
        $userid = Auth::user()->id;
        $cases = Task::where('user_id', '=', $userid)->get();
        $count = Task::where('user_id', '=', $userid)->where('status', 'open')->count();
        $slugcase = Task::where('slug', $slug)->first();

        $taskid = $slugcase->id;

        $taskdocs = Taskdoc::where('task_id', $taskid)->get();


        $comments = Task::find($slugcase->id)->comments;
        $comment_count = Task::find($slugcase->id)->comments->count();

        $bid = Bid::where(['user_id' => $userid, 'task_id' => $taskid])->count();
        $bidaccept = Bid::where(['user_id' => $userid, 'status' => '1', 'task_id' => $taskid])->count();
        $assignee = Bid::where(['status' => '1', 'task_id' => $taskid])->first();

        $bidders = Bid::where(['task_id' => $taskid, 'status' => '0'])->get();
        $bidder_count = Bid::where(['task_id' => $taskid, 'status' => '0'])->count();

        return view('userpanel.my_case_slug', ['comment_count' => $comment_count, 'comments' => $comments, 'cases' => $cases, 'count' => $count, 'slugcase' => $slugcase, 'bid' => $bid, 'accept' => $bidaccept, 'bidders' => $bidders, 'assignee' => $assignee, 'bidder_count' => $bidder_count, 'taskdocs' => $taskdocs]);

    }

    public function find()
    {
        $comments = Task::find(1)->comments;

        foreach ($comments as $comment) {
            echo $comment->id . "<br>";
        }
        die;
        $tasks = Task::all();
        echo "<pre>";
        foreach ($tasks as $task) {

            var_dump($task);

            var_dump($task->user['email']);

            echo "<br><br><br>";

        }
        //echo '<pre>'; var_dump($tasks);
        die();

        // $user=Task::findAll()->user;
        //return view('admin.demo');
    }

    public function index()
    {
        $tasks = Task::orderBy('id','desc')->get();
        return view('admin.task_listing',['tasks' => $tasks]);
    }

    public function pendingTasks()
    {
        $tasks = Task::where('status','unverify')->get();
        return view('admin.task_listing', ['tasks' => $tasks]);
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
    public function store(Request $request)
    {
        $task = Task::find($id);
        return view('admin.show_task', ['tasks' => $task]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $task = Task::find($id);
        $catName =Category::select('name')->where('id',$task->category_id)->get();
        $bids = Bid::where('task_id', $id)->get();
        $task['catName'] = $catName[0]->name;
        $notification = Notification::where('href',$id)->update(['is_read'=>1]);
        
        return view('admin.show_task', ['tasks' => $task,'bids' => $bids]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {   $categories = Category::all();
        $notification = Notification::where('href', $id)->update(['is_read' => 1]);
        $task = Task::find($id);
        return view('admin.edit_task', ['tasks' => $task,'categories' => $categories]);
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

        $task = Task::find($id);
        $task->title = $request->title;
        $task->status = $request->status;
        $task->date_of_incident = $request->date_of_incident;
        $task->last_date = $request->last_date;
        $task->date_of_completion = $request->date_of_completion;
        $task->place_of_incident = $request->place_of_incident;
        $task->estimate_budget = $request->estimate_budget;
        $task->price_fixed = $request->price_fixed;
        $task->category_id = $request->category_id;
        $task->paid = $request->paid;
        $task->reviewed = $request->reviewed;
        $task->assigned_to = $request->assigned_to;
        $task->assigning_date = $request->assigning_date;
        $task->description = htmlspecialchars($request->description);
        $task->slug = str_replace(' ', '-', strtolower($request->title)) . '-' . rand(1000, 100000);
      

       
        $res = $task->save();
        $userid = $task->user_id;
        if ($res) {
            $user = User::find($userid);

            $notification = new Notification;
            $notification->sender_id = $userid;
            $notification->type_of_notification = 'task';
            if($task->status == 'unverify'){
                $notification->title = 'Your task is waiting for admin approval';
            }
            $notification->title = 'Your task has been '.$task->status;
            $notification->href = $task->id;
            $notification->description = substr($task->description,0,50);
            //$notification->is_read              = '1';
            $notification->recipient_id = $userid;;

            $notification->save();

            $to = $user->email;
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            $headers .= 'From: The law app <no-replay@laww.com.au>' . "\r\n";

            $subject = "Your job post has been".$task->status;

            $message ="Hi ".$user->fname.",<br>
            Your job post has been ".$task->status.".Thanks for using law app!  ";

            //mail($to,$subject,$message,$headers);
            flash('success',"Job post has been ".$task->status);
        }
        return redirect('admin/tasks');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $task = Task::find($id);
        if($task->delete()){
            flash('success','task Deleted');
        }

        return redirect('admin/tasks');
    }


    //home page function
    public function home()
    {
        if(Auth::user()){
            return redirect('dashboard');
        }

        $tasks = Task::with('user')
            ->where('status', 'complete')
            ->orderBy('date_of_completion', 'desc')
            ->take(8)
            ->get();

        $settings = Setting::where('title', 'Who We Are')
            ->get();
        $setting = '';
        foreach ($settings as $s) {
            $setting = $s;
        }

        return view('userpanel.index', ['tasks' => $tasks, 'setting' => $setting]);
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

    public function uploadtaskimages(Request $request)
    {

        $id = Auth::user()->id;
        $name = Auth::user()->fname;

        $response = [];
        //print_r($_FILES); die;
        foreach ($_FILES as $key => $value) {
            $milliseconds = round(microtime(true) * 1000);
            $randstring = $this->generateRandStr(15);
            $filename = $name . '_' . $milliseconds . $randstring . '_' . basename($value['name']);

            $target_path = $_SERVER['DOCUMENT_ROOT'] . '/taskdocs/' . $filename;

            if (move_uploaded_file($value['tmp_name'], $target_path)) {
                $taskdoc = new Taskdoc;
                $taskdoc->filename = $filename;
                $taskdoc->task_id = $request->taskid;
                $taskdoc->save();
                $tid = $taskdoc->id;

                array_push($response, ['name' => $filename, 'tid' => $tid]);
            }
        }
        echo json_encode($response);
    }

    public function delete_mytask_doc(Request $request)
    {
        $id = $request->id;
        $taskdoc = Taskdoc::find($id);
        $filename = $taskdoc->filename;
        $file = base_path('taskdocs/') . $filename;

        if (file_exists($file)) {
            if (!unlink($file)) {
                //echo ("Error deleting $file");
            } else {
                //echo ("Deleted $file");
            }
        }
        $taskdoc->delete();

        echo json_encode('deleted');
    }

}
