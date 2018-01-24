<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Message;
use App\Setting;
use App\Task;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher;
use App\Category;

class SettingController extends Controller
{
    //

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function whoweare()
    {
        $settings = Setting::where('title', 'Who We Are')->get();
        $setting = '';
        foreach ($settings as $s) {
            $setting = $s;
        }
        return view('admin.who_we_are', ['setting' => $setting]);
    }


    public function update(Request $request)
    {
        $setting = Setting::find($request->id);
        $setting->description = htmlspecialchars($request->description);
        $setting->save();
        return redirect('admin/dashboard');
    }

    public function messages(Request $req)
    {
        $flag = false;
        $userid = Auth::user()->id;
        $type = Auth::user()->type;
        $categories = Category::all();
        $sendto = '';
        if ($type == 'client') {
            $cases = Task::distinct('assigned_to')->select(['user_id', 'assigned_to'])->where([['user_id', '=', $userid], ['assigned_to', '!=', null]])->get();
        } else {
            $cases = Task::distinct('assigned_to')->select(['user_id', 'assigned_to'])->where([['assigned_to', '=', $userid]])->get();
        }

        return view('userpanel.message', ['cases' => $cases, 'flag' => $flag, 'requestid' => $sendto,'categories' => $categories]);
    }

    public function messagesbyid(Request $req, $id)
    {
        $flag = true;
        $userid = Auth::user()->id;
        $type = Auth::user()->type;
        $sendto = $id;
        $messages = Message::where(['message_by' => $userid, 'message_to' => $sendto])->orWhere(['message_by' => $sendto, 'message_to' => $userid])->get();

        Message::where(['message_by' => $sendto, 'message_to' => $userid])->update(['is_read' => '1']);

        if ($type == 'client') {
            $cases = Task::distinct('assigned_to')->select(['user_id', 'assigned_to'])->where([['user_id', '=', $userid], ['assigned_to', '!=', null]])->get();
        } else {
            $cases = Task::distinct('assigned_to')->select(['user_id', 'assigned_to'])->where([['assigned_to', '=', $userid]])->get();
        }

        return view('userpanel.message', ['messages' => $messages, 'cases' => $cases, 'requestid' => $sendto, 'flag' => $flag, 'sendto' => $sendto]);
    }


    public function save_messages(Request $req)
    {
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


        $userid = Auth::user()->id;
        $data['name'] = Auth::user()->fname . ' ' . Auth::user()->lname;
        $data['img'] = Auth::user()->profile_image;
        $data['message'] = $req->message;
        $data['reciever'] = $req->message_to;
        $data['sender'] = $userid;

        //echo "hello";
        //  $pusher->trigger('presence-messages', 'my_message_event', $data);

        $message = new Message;
        $message->message_by = $userid;
        $message->messages = $req->message;
        $message->message_to = $req->message_to;
        $message->save();
        $data['time'] = $message->created_at->diffForHumans();
        $pusher->trigger('presence-messages', 'my_message_event', $data);
        $pusher->trigger('private-messages', 'message_notification', $data);
    }

    public function messagenotify(Request $req)
    {
        if ($req->ajax()) {
            $userid = Auth::user()->id;
            $messages = Message::where(['message_to' => $userid, 'is_read' => '0'])->get();
            foreach ($messages as $message) {
                $message->setAttribute('fname', $message->messageby->fname);
            }
            echo json_encode($messages);
        }
    }

}