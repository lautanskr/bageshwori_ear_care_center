<?php

namespace App\Http\Controllers;

use App\Models\Notice;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('frontend.home');
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function service()
    {
        return view('frontend.service');
    }
    public function program()
    {
        return view('frontend.program');
    }

    public function notice()
    {
        $notices = Notice::orderBy('created_at','desc')->get();
        return view('frontend.notice',compact('notices'));
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    
}
