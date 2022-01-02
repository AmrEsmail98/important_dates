<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function index()
    {

        return view('admin.about.index');
    }
    public function store(Request $request )
    {
       $request->validate([
        'title'=>'required',
        'content'=>'required',
       ]);

        About::create($request->all());
        session()->flash('message','About created successfully.');

        return redirect()->route('about.index');



    }
}
