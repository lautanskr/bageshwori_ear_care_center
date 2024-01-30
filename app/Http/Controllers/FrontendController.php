<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use App\Models\Notice;
use Illuminate\Support\Facades\Response;
use App\Models\Program;
use App\Models\Service;
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
        $services = Service::latest()->get();
        $programs = Program::latest()->limit(4)->get();
        $carousel = Carousel::where('id',1)->first();
        return view('frontend.home',compact('carousel','services','programs'));
    }

    public function about()
    {
        return view('frontend.about');
    }
    public function service()
    {
        $services = Service::paginate(5);
        $carousel = Carousel::where('id',1)->first();
        return view('frontend.service',compact('services','carousel'));
    }
    public function program()
    {
        $programs = Program::paginate(5);
        return view("frontend.program", ['programs'=>$programs]);
    }

    public function notice()
    {
        $notices = Notice::orderBy('created_at','desc')->get();
        return view('frontend.notice',compact('notices'));
    }
    public function notice_show($id) {
        $filename = Notice::find($id)->document;
        $path = public_path("documents/{$filename}");   
        if (!isset($filename)) {
            abort(404);
        } else {
            $file = file_get_contents($path);
            $type = mime_content_type($path);
            return Response::make($file, 200, [
                'Content-Type' => $type,
                'Content-Disposition' => 'inline; filename="' . $filename . '"',
            ]);
        }
    }
    public function contact()
    {
        return view('frontend.contact');
    }
    
}
