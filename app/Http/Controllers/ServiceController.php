<?php

namespace App\Http\Controllers;


use App\Models\Service;
use Intervention\Image\Facades\Image;
use Exception;
use Illuminate\Http\Request;

class ServiceController extends Controller
{
   
    public function index()
    {
        $services = Service::latest()->get();
        return view("backend.service.index", compact("services"));
    }


    public function create()
    {
        return view("backend.service.create");
    }

    
    public function store(Request $request)
    {
        $request->validate([
            'description' => 'required',
            'title' => 'required',
            'image' => 'required',

        ]);

        $crud = new Service();
        $crud->title = $request->title;
        $crud->description = $request->description;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $destinationPath = 'documents/services/';
            $newfilename = time() . "." . $image->getClientOriginalExtension();
            $resizedImage = Image::make($image)->resize(336, 308)->encode('jpg', 80);
            $resizedImage->save(public_path("documents/services/{$newfilename}"));
            $crud->image = $newfilename;
        }
        $crud->save();
        return redirect('admin/admin_service')->with('success', 'Updated successfully');
    }

    
    public function show(Service $service)
    {
        //
    }

   
    public function edit(Service $service, $id)
    {
        $service = Service::find($id);
        return view('backend.service.edit', compact('service'));
    }

  
    public function update(Request $request, Service $service, $id)
    {
        $request->validate([
            'description' => 'required',
            'title' => 'required',
        ]);
        try {
            $crud = Service::find($id);
            $crud->title = $request->title;
            $crud->description = $request->description;
            if ($request->hasFile('image')) {
                $image = $request->file('image');
                $destinationPath = 'documents/services/';
                $newfilename = time() . "." . $image->getClientOriginalExtension();
                $resizedImage = Image::make($image)->resize(336, 308)->encode('jpg', 80);
                $resizedImage->save(public_path("documents/services/{$newfilename}"));
                $crud->image = $newfilename;
            }
            $crud->save();
            return redirect('admin/admin_service')->with('success', 'Updated successfully');
        } catch (Exception $e) {
            // Return a user-friendly error response
            return response()->json(['error' => 'An unexpected error occurred.' . $e->getMessage()], 500);
        }
    }

 
    public function destroy(Service $service, $id)
    {
        $data = service::find($id);
        $data->delete();
        return redirect()->back()->with('deleted', 'Deleted successfully');
    }
}
