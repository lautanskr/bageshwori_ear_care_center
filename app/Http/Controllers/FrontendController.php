<?php

namespace App\Http\Controllers;

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
        return view('frontend.notice');
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    
}
