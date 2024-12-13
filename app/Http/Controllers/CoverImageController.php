<?php

namespace App\Http\Controllers;

use App\Models\CoverImage;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CoverImageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coverimages = CoverImage::paginate(10);

        return view('admin.coverimage.index', ['coverimages' => $coverimages, 'page_title'=>'Cover Image']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coverimage.create',['page_title'=>'Add Cover Image']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);


        $newImageName = time() . '-' . $request->image->extension();
        $request->image->move(public_path('uploads/coverimage'), $newImageName );

        try{
        $coverimage = new CoverImage;

        $coverimage->title = $request->title;

        $coverimage->image = $newImageName;

        $coverimage->save();

        return redirect('Admin/Coverimage/Index')->with(['successMessage' => 'Success !! Cover Image Created']);
        } catch(\Exception){
            return redirect()->back()->with('error', 'Failed to create coverimage. Please try again.');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CoverImage  $coverImage
     * @return \Illuminate\Http\Response
     */
    public function show(CoverImage $coverImage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CoverImage  $coverImage
     * @return \Illuminate\Http\Response
     */
    public function edit(CoverImage $coverImage, $id)
    {
        $coverimage = CoverImage::find($id);

        return view('admin.coverimage.update', ['coverimage' => $coverimage, 'page_title' =>'Update Cover Image']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CoverImage  $coverImage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CoverImage $coverImage)
    {
        $this->validate($request,[
            'title' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        ]);

        try{
        $coverimage = CoverImage::find($request->id);

        if ($request->hasFile('image')) {
            $newImageName = time() . '-' . $request->image->extension();
            $request->image->move(public_path('uploads/coverimage'), $newImageName );
            Storage::delete('uploads/coverimage' . $coverimage->image);
            $coverimage->image = $newImageName;
        }else{
            unset($request['image']);
        }


        $coverimage->title = $request->title ?? '';

        if ($coverimage->save()) {
            return redirect('Admin/Coverimage/Index')->with(['successMessage' => 'Success !! CoverImage Updated']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error Cover Image not updated']);
        }

    }catch(\Exception){
        return redirect()->back()->with('error', 'Failed to update coverimage. Please try again.');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CoverImage  $coverImage
     * @return \Illuminate\Http\Response
     */
    public function destroy(CoverImage $coverImage, $id)
    {
        try{
        $coverimage = CoverImage::find($id);
        $coverimage->delete();
        return redirect('Admin/Coverimage/Index')->with(['successMessage' => 'Success !!Cover Image Deleted']);
        }catch(\Exception){
            return redirect()->back()->with('error', 'Failed to create coverimage. Please try again.');
        }
    }

}
