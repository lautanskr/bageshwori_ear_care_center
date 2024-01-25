<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Response;
use App\Models\Notice;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Http\Request;

class NoticeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notice = Notice::orderBy("created_at", "desc")->paginate(10);
        return view("backend.notice.index", compact("notice"));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("backend.notice.create");
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
            'published_date' => 'required',
            'document' => 'required',
        ]);
        $notice = new Notice();
        $notice->description = $request->description;
        $notice->published_date = $request->published_date;
        if ($request->hasFile('document')) {
            $doc = $request->document;
            $destinationPath = 'documents/';
            $document = time() . "." . $doc->getClientOriginalExtension();
            $doc->move($destinationPath, $document);
            $notice->document = $document;
        }
        $notice->save();
        return redirect('admin/admin_notice')->with('success', 'Submitted successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function show(Notice $notice, $id)
    {
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function edit(Notice $notice, $id)
    {
        $notices = Notice::find($id);
        return view('backend.notice.edit', compact('notices'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Notice $notice, $id)
    {

        $request->validate([
            'description' => 'required',
            'published_date' => 'required',

        ]);
        try {
            $notice = Notice::find($id);
            $notice->description = $request->description;
            $notice->published_date = $request->published_date;
            if ($request->hasFile('document')) {
                $doc = $request->document;
                $destinationPath = 'documents/';
                $document = time() . "." . $doc->getClientOriginalExtension();
                $doc->move($destinationPath, $document);
                $notice->document = $document;
            }
            $notice->save();
            return redirect('admin/admin_notice')->with('success', 'Updated successfully');
        } catch (Exception $e) {
            // Return a user-friendly error response
            return response()->json(['error' => 'An unexpected error occurred.'.$e->getMessage()], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Notice  $notice
     * @return \Illuminate\Http\Response
     */
    public function destroy(Notice $notice, $id)
    {
        $data = Notice::find($id);
        $data->delete();
        return redirect()->back()->with('deleted', 'Delete successfully');
    }
}
