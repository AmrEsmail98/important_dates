<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Feedback;
use Illuminate\Http\Request;
use  Illuminate\Support\Facades\Mail;
use  App\Mail\OrderShipped;

class FeedbackController extends Controller
{
    public function index()
    {

        $feedbacks = Feedback::all();
        return view('admin.feedback.index', compact('feedbacks'));
    }

    public function show_reply_form(Feedback $feedback) {
        return view('admin.feedback.replay', compact('feedback'));
    }

     public function replay(Request $request) {
        $request->validate([
            'email'=>'required',
            'subject'=>'required',
            'message'=>'required',
           ]);

       
        Mail::send(new OrderShipped($request->only(['email', 'subject', 'message'])));

     }
    public function destroy($id)
    {
        Feedback::where('id',$id)->delete();
        session()->flash('message','User has been deleted');
        return back();
    }
}
