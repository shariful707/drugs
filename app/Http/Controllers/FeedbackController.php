<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
Use App\Models\Feedback;
use Carbon\Carbon;

class FeedbackController extends Controller
{
    function index(){
        $feedbacks = Feedback::all();
        return view('feedback.index', compact('feedbacks'));
    }
    function insert(Request $request){
        Feedback::insert([
            'review' => $request->review,
            'added_by' => Auth::user()->id,
            'status' => 0,
            'created_at' => Carbon::now()
        ]);
        return back();
    }
    function update($feed_id){
        $feeds = Feedback::find($feed_id);
        $feeds->status = 1;
        $feeds->save();
        return back();
    }
    function delete($feed_id){
        Feedback::find($feed_id)->delete();
        return back();
    }
}
