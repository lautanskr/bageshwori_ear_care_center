<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use Exception;

class CarouselController extends Controller
{
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
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function show(Carousel $carousel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function edit(Carousel $carousel,$id)
    {
        $carousel = Carousel::find($id);
        return view("backend.carousel.edit",compact("carousel"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Carousel $carousel,$id)
    {
        $crud = Carousel::find($id);
        if ($request->hasFile('home_carousel')) {
            $image = $request->file('home_carousel');
            $newfilename = time() . "." . $image->getClientOriginalExtension();
            $resizedImage = Image::make($image)->resize(1920, 800)->encode('jpg', 80);
            $resizedImage->save(public_path("documents/carousels/{$newfilename}"));
            $crud->home = $newfilename;
        }
        if ($request->hasFile('about_carousel')) {
            $image = $request->file('about_carousel');
            $newfilename = time() . "." . $image->getClientOriginalExtension();
            $resizedImage = Image::make($image)->resize(1920, 450)->encode('jpg', 80);
            $resizedImage->save(public_path("documents/carousels/{$newfilename}"));
            $crud->about = $newfilename;
        }
        if ($request->hasFile('gallery_carousel')) {
            $image = $request->file('gallery_carousel');
            $newfilename = time() . "." . $image->getClientOriginalExtension();
            $resizedImage = Image::make($image)->resize(1920, 450)->encode('jpg', 80);
            $resizedImage->save(public_path("documents/carousels/{$newfilename}"));
            $crud->gallery = $newfilename;
        }
        if ($request->hasFile('service_carousel')) {
            $image = $request->file('service_carousel');
            $newfilename = time() . "." . $image->getClientOriginalExtension();
            $resizedImage = Image::make($image)->resize(1920, 450)->encode('jpg', 80);
            $resizedImage->save(public_path("documents/carousels/{$newfilename}"));
            $crud->service = $newfilename;
        }
        if ($request->hasFile('notice_carousel')) {
            $image = $request->file('notice_carousel');
            $newfilename = time() . "." . $image->getClientOriginalExtension();
            $resizedImage = Image::make($image)->resize(1920, 450)->encode('jpg', 80);
            $resizedImage->save(public_path("documents/carousels/{$newfilename}"));
            $crud->notice = $newfilename;
        }
        if ($request->hasFile('contact_carousel')) {
            $image = $request->file('contact_carousel');
            $newfilename = time() . "." . $image->getClientOriginalExtension();
            $resizedImage = Image::make($image)->resize(1920, 450)->encode('jpg', 80);
            $resizedImage->save(public_path("documents/carousels/{$newfilename}"));
            $crud->contact = $newfilename;
        }
        if ($request->hasFile('program_carousel')) {
            $image = $request->file('program_carousel');
            $newfilename = time() . "." . $image->getClientOriginalExtension();
            $resizedImage = Image::make($image)->resize(1920, 450)->encode('jpg', 80);
            $resizedImage->save(public_path("documents/carousels/{$newfilename}"));
            $crud->program = $newfilename;
        }
        $crud->save();
        return redirect()->back()->with('success','Updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carousel  $carousel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        //
    }
}
