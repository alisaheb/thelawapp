<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use App\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NotificationController extends Controller
{

    public function notify(Request $request)
    {
        if ($request->ajax) {
            $userid = Auth::user()->id;
            $notifications = Notification::where('is_read', '0')->where('recipient_id', $userid)->get();

            $notification = array();
            foreach ($notifications as $key => $value) {
                $data = array(
                    'fromName' => $value->userby->fname . ' ' . $value->userby->lname,
                    'NotiTitle' => $value->title,
                    'title' => $value->task->title,
                    'toName' => $value->userto->fname . ' ' . $value->userto->lname,
                    'fromId' => $value->userby->id,
                    'taskId' => $value->userto->id,
                    'nType' => $value->type_of_notification,
                    'slug' => $value->task->slug,
                );
                array_push($notification, $data);
            }

            echo json_encode($notification);
            die;
        }

        //print_r($notification);
        //die();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function readall(Request $req)
    {
        Notification::where('is_read', '0')->update(['is_read' => '1']);

    }

    public function messagenotify()
    {

    }
}
