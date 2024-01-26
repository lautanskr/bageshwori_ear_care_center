<?php

namespace App\Http\Controllers;

use App\Models\Program;
use Intervention\Image\Facades\Image;
use Exception;
use Illuminate\Http\Request;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $programs = Program::latest()->get();
        return view("backend.program.index", compact("programs"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.program.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'title' => 'required',
            'image' => 'required',

        ]);

        $crud = new Program();
        $crud->title = $request->title;
        $crud->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'documents/programs/';
            $newfilename = time() . "." . $image->getClientOriginalExtension();
            $resizedImage = Image::make($image)->resize(1218, 726)->encode('jpg', 80);
            $resizedImage->save(public_path("documents/programs/{$newfilename}"));
            $crud->image = $newfilename;
        }
        $crud->save();
        return redirect('admin/admin_program')->with('success', 'Updated successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function show(Program $program)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program, $id)
    {
        $program = Program::find($id);
        return view('backend.program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program, $id)
    {
        $request->validate([
            'description' => 'required',
            'title' => 'required',
        ]);
        try {
            $crud = Program::find($id);
            $crud->title = $request->title;
            $crud->description = $request->description;
            if ($request->hasFile('image')) {
                $image = $request->image;

                $destinationPath = 'documents/programs/';
                $newfilename = time() . "." . $image->getClientOriginalExtension();
                $image->move($destinationPath, $newfilename);
                $crud->image = $newfilename;
            }
            $crud->save();
            return redirect('admin/admin_program')->with('success', 'Updated successfully');
        } catch (Exception $e) {
            // Return a user-friendly error response
            return response()->json(['error' => 'An unexpected error occurred.' . $e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Program  $program
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program, $id)
    {
        $program = Program::find($id);
        $program->delete();
        return redirect()->back()->with('deleted', 'Deleted successfully');
    }
}
