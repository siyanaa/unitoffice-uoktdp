<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\OtherPost;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\UtilityFunctions;

class OtherPostController extends Controller{

    public function index()
    {
        $otherposts = OtherPost::latest()->paginate(50);
        return view('admin.otherpost.index', ['otherposts' => $otherposts, 'page_title' =>'Other Post']);
    }

    /** 
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.otherpost.create', ['page_title' =>'Create Other Post']);
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
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|file|max:10000',
            'type' => 'required',
        ]);
    
        try {
            $otherpostPath = time() . '-' . $request->title . '.' . $request->file->extension();
            $request->file->move(public_path('uploads/otherpost/'), $otherpostPath);
    
            $otherpost = new OtherPost;
            $otherpost->title = $request->title;
            $otherpost->description = $request->description;
            $otherpost->type = $request->type;
            $otherpost->file = $otherpostPath;
    
            $otherpost->save();
    
            return redirect('admin/otherpost/index')->with(['successMessage' => 'Success !! Other Post created']);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->validator->errors());
        } catch (\Exception $e) {
            Log::error('File upload failed: ' . $e->getMessage());
            return redirect()->back()->withErrors(['file' => 'File is unable to upload. Please try again.']);
        }
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $otherpost = OtherPost::find($id);
        return view('admin.otherpost.update', ['otherpost' => $otherpost, 'page_title' =>'Update Other Posts']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'file' => 'required|file|max:10000',
            'type' => 'required',
        ]);

        try {
            $otherpost = OtherPost::find($id);

            if ($request->hasFile('file')) {
                $otherpostPath = time() . '-' . $request->title . '.' . $request->file->extension();
                $request->file->move(public_path('uploads/otherpost/'), $otherpostPath);
                Storage::delete('public/uploads/otherpost/' . $otherpost->file);
                $otherpost->file = $otherpostPath;
            }

            $otherpost->title = $request->title;
            $otherpost->description = $request->description;
            $otherpost->type = $request->type;

            $otherpost->save();

            return redirect('admin/otherpost/index')->with(['successMessage' => 'Success !! Post Updated']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['errorMessage' => 'Error !! Failed to update the post. Please try again.']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $otherpost = OtherPost::find($id);
            Storage::delete('public/uploads/otherpost/' . $otherpost->file);
            $otherpost->delete();

            return redirect('admin/otherpost/index')->with(['successMessage' => 'Success !! Otherpost Deleted']);
        } catch (\Exception $e) {
            return redirect()->back()->with(['errorMessage' => 'Error !! Failed to delete the post. Please try again.']);
        }
    }
}
