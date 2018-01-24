<?php

namespace App\Http\Controllers;

use App\Bid;
use App\User;
use App\Http\Requests;
use App\Notification;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pusher;

use Validator;

class BidController extends Controller
{
    public function makeOffer($slug){
        $case = Task::where('slug',$slug)->first();
        return view('front.makeoffer',compact('case'));
    }
    
    public function storeOffer(Request $request)
    {
        Validator::make($request->all(), [
            'offer_price' => 'required|numeric',
            'description' => 'required'
        ])->validate();

        $userid = Auth::user()->id;
        $bid = new Bid;
        $bid->task_id = $request->task_id;
        $bid->user_id = $userid;
        $bid->offer_price = $request->offer_price;
        $bid->description = $request->description;
        $res = $bid->save();

        if ($res) {
            $client = Task::find($request->task_id);
            $notification = new Notification;
            $notification->sender_id = $userid;
            $notification->type_of_notification = 'bid';
            $notification->title = 'make an offer.';
            $notification->href = $bid->id;
            $notification->description = 'this is new bid';
            $notification->is_read              = '0';
            $notification->recipient_id = $client['user_id'];
            $notification->save();
        }
       return redirect('cases')->with('status','Offer successfully made by you');
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

    public function hire(Request $request){
        $task_id = $request->task_id;
        $offer = $request->offer;
        $user_id = $request->user_id;
        $assigning_date = date('Y-m-d');

        $bid = Bid::where([['user_id','=',$user_id],['offer_price','=',$offer],['task_id','=',$task_id],['status','=','0']])->count();
        $task = Task::where([['id','=',$task_id],['status','=','open']])->get();
        if($bid && count($task)){
            $updated = Bid::where([['user_id','=',$user_id],['offer_price','=',$offer],['task_id','=',$task_id],['status','=','0']])->update(['status' => '1']);
            $decline = Bid::where([['task_id','=',$task_id],['status','=','0']])->update(['status' => '-1']);

            $assigned = Task::where(['id' => $task_id])->update(['assigned_to' => $user_id, 'status' => 'accept', 'assigning_date' => $assigning_date, 'price_fixed' => $offer]);
        }  

        if($assigned)
        {
            //SEND MAIL TO EVERY ONE

            /*$chatroom = new Chatroom;
            $chatroom->name = $task->name;
            $chatroom->name = $task->alias;
            $chatroom->name = $user_id;
            $chatroom->save();

            $chatroom = new Chatroom;
            $chatroom->name = $task->name;
            $chatroom->name = $task->alias;
            $chatroom->name = Auth::user()->id;
            $chatroom->save();
*/
            $biders = Bid::where([['task_id','=',$task_id],['status','=','-1']])->get();

            foreach($biders as $bidder){

                $notification = new Notification;
                $notification->sender_id =  $user_id;
                $notification->type_of_notification = 'bid';
                
                $notification->title = 'Your bid has been declined';
                $notification->href = $task_id;
                $notification->description = 'Your bid has been declined';
                $notification->is_read              = '0';
                $notification->recipient_id = $bidder->user_id;
                $notification->save();
            }

            $biders = Bid::where([['task_id','=',$task_id],['status','=','1']])->get();

            foreach($biders as $bidder){

                $notification = new Notification;
                $notification->sender_id =  $user_id;
                $notification->type_of_notification = 'bid';
                
                $notification->title = 'Your bid has been Accepted';
                $notification->href = $task_id;
                $notification->description = 'Your bid has been accepted';
                $notification->is_read              = '0';
                $notification->recipient_id = $bidder->user_id;
                $notification->save();

                $user = User::find($bidder->user_id);

                /*$to = $user->email;
                $headers = "MIME-Version: 1.0" . "\r\n";
                $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
                $headers .= 'From: The law app <no-replay@laww.com.au>' . "\r\n";

                $subject = "Your bid has been accepted ";

                $message ="Hi ".$user->fname.",<br>
                Your job bid has been accepetd.Thanks for using law app!  ";*/

                //mail($to,$subject,$message,$headers); 
            }

            flash('success','Case assigned to lawyer successfully');
        } 

        return json_encode($assigned);
    }
}
