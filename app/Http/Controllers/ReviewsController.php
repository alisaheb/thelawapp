<?php

namespace App\Http\Controllers;

use App\Review;
use App\Task;
use App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewsController extends Controller
{
    public function index(){
        
       $reviews = Task::with('review.users')->where('user_id',Auth::user()->id)->get();
        
        return view('front.reviews',compact('reviews'));
    } 
    public function getReviews(){
        $reviews = Review::where('user_id','!=',Auth::user()->id)->get();
        
        return view('front.reviews',compact('reviews'));
    }
}
