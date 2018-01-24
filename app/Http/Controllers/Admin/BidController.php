<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Bid;
use App\Http\Requests;
use App\Notification;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher;

class BidController extends Controller
{
    public function make_offer(Request $request)
    {
        $userid = Auth::user()->id;
        $bid = new Bid;
        $bid->task_id = $request->taskid;
        $bid->user_id = $userid;
        $bid->offer_price = $request->offerprice;
        $bid->description = $request->description;
        $res = $bid->save();

        if ($res) {

            $client = Task::find($request->taskid);

            $notification = new Notification;
            $notification->sender_id = $userid;
            $notification->type_of_notification = 'bid';
            $notification->title = 'make an offer.';
            $notification->href = $bid->id;
            $notification->description = 'this is new bid';
            //$notification->is_read              = '1';
            $notification->recipient_id = $client['user_id'];

            $notification->save();

            $clientlist = array();

            $clientlist[$client->user->id] = $client->user->fname . ' ' . $client->user->lname;

            #    ---php code----
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

            $data = array();
            //$data['message'] = $request->comments;
            $data['fromid'] = $userid;
            $data['fromname'] = Auth::user()->fname . ' ' . Auth::user()->lname;
            $data['toid'] = $clientlist;
            $data['noti_type'] = 'task';
            $data['noti_title'] = 'added a new task';
            $data['noti_id'] = $bid->id;
            //echo "hello";
            $data_ram = json_encode($data);
            $pusher->trigger('private-notification', 'notification_event', $data_ram);

        }


        #############################################


        /*if( $res ){

            $client  = User::where('type','lawyer')->get();

            foreach( $client as $lawyer){

              $notification                       = new Notification;
              $notification->sender_id            = $userid;
              $notification->type_of_notification = 'task';
              $notification->title                = 'added a new task';
              $notification->href                 = $task->id;
              $notification->description          = 'this is new task';
              //$notification->is_read              = '1';
              $notification->recipient_id         = $lawyer['id'];

              $clientlist[$lawyer['id']] = $lawyer['fname'].' '.$lawyer['lname'];

              $notification->save();

            } */


        #############################################


        echo json_encode('ok');
    }

    public function bidlisting()
    {
        $bids = Bid::all();
        //  var_dump($bids); die;
        // echo Bid::find(10)->users->id;
        //echo Bid::find(10)->tasks->id;

        return view('admin.bidlisting', ['bids' => $bids]);
    }

    public function offers_review(Request $req)
    {
        $taskid = $req->taskid;
        // $taskid=21;
        $bid = Bid::where('task_id', $taskid)->get();
        // echo '<pre>';
        foreach ($bid as $b) {
            $b->setAttribute('fname', $b->users->fname);
            $b->setAttribute('lname', $b->users->lname);
            $b->setAttribute('image', $b->users->profile_image);

        }
        // $b->setAttribute('name',$b->users->fname);
        echo json_encode($bid);
    }

    public function acceptoffer(Request $request)
    {
        $taskid = $request->taskid;
        $assignedto = $request->userid;
        $assigning_date = date('Y-m-d');
        $price_fixed = $request->price;

        Task::where(['id' => $taskid])->update(['assigned_to' => $assignedto, 'status' => 'accept', 'assigning_date' => $assigning_date, 'price_fixed' => $price_fixed]);

        Bid::where(['user_id' => $assignedto, 'task_id' => $taskid])->update(['status' => '1']);
        echo json_encode('done');

    }

    public function bidsOf($id){
        $bids = Bid::where('task_id', $id)->get();

         return view('admin.bidlisting', ['bids' => $bids]);
    }
}
