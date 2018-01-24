<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Certificate;
use Auth;
use File;


class CertificateController extends Controller
{
    public function index(){
    	
    }
    public function certificates(){
        $certificates = Certificate::where('user_id',Auth::user()->id)->orderBy('id','desc')->get();
        return view('front.verification',compact('certificates')); 
    }
    public function create(){
    	return "Next-time";
    }
    public function store(Request $request){

    	$this->validate($request, [
        'name' => 'required',
        'certificate' => 'required|image',
    ]);

    	$certificate = new Certificate;
        $certificate->name = $request->name;
        $certificate->extension = $request->certificate->extension();
        $certificate->user_id = Auth::user()->id;
        $certificate->save();
        $id = $certificate->id;
        flash('danger','opps! something went wrong', 'Please Try again');
        if ($request->hasFile('certificate') && $id) {
        	$path = $request->certificate->path();
        	$savePath = 'public/certificates/' .Auth::user()->id;
		    $target_path = 'public/certificates/' .Auth::user()->id."/$id.". $certificate->certificate.$certificate->extension; 

		    if(!file_exists($savePath)) {
                File::makeDirectory($savePath, 0775, true,true);
            }

            if (move_uploaded_file($path, $target_path)) {
            	flash('success','Certificate added successfully');
            }else{
            	Certificate::where('id', $id)->delete();
				flash('danger','opps! something went wrong', 'Please Try again');
            }
		}
		return redirect()->back();
    }

    public function pendingUser(){
        
    }
}
