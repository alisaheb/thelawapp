<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Announcement;
use Illuminate\Http\Request;
use Auth;

class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $announcements = Announcement::all();
        return view('admin.announcements_listing', ['announcements' => $announcements]);
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.add_announcement');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $announcement = new Announcement;

        $announcement->user_id = Auth::user()->id;
        $announcement->type = $request->type;
        $announcement->announcement = $request->announcement;
        $announcement->save();
            
        return redirect('admin/announcements');
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

        $announcement = Announcement::find($id);
        return view('admin.edit_announcement', ['announcement' => $announcement]);
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
        $announcement = announcement::find($id);
        $announcement->type = $request->type;
        $announcement->announcement = $request->announcement;

        $announcement->save();

        return redirect('admin/announcements');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Announcement::destroy($id);
        return redirect('admin/announcements');
    }

}
