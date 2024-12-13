<?php

namespace App\Http\Controllers;

use App\Models\Mvc;
use Illuminate\Http\Request;
use Cviebrock\EloquentSluggable\Services\SlugService;

class MvcController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mvcs = MVC::latest()->get()->take(4);

        return view('admin.mvc.index',[
            'mvcs'=> $mvcs,
            'page_title'=> 'Mission Vision & Values',

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.mvc.create', [ 'page_title' =>'Create Mission, Vision & Values']);

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
            'title'=> 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3000',
            'description'=> 'required',


        ]);
        try{



        $mvc = new Mvc;


        $newImageName = time() . "-" . $request->title . "-" . $request->image->extension();
        $request->image->move(public_path('uploads/mvc/'), $newImageName);

        $mvc->title = $request->title;
        $mvc->slug = SlugService::createSlug(Mvc::class,'slug', $request->title);
        $mvc->image = $newImageName;


        $mvc->description = $request->description;

        $mvc->save();

        return redirect('Admin/Mvc/Index')->with(['successMessage' => 'Success !! Mission, Vision and Values created']);
        }catch(\Exception){
            return redirect()->back()->with('error', 'Failed to create mvc. Please try again.');
        }




    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mvc  $mvc
     * @return \Illuminate\Http\Response
     */
    public function show(Mvc $mvc)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Mvc  $mvc
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mvc = Mvc::find($id);
        return view('admin.mvc.update',[
            'mvc' => $mvc,
            'page_title' => 'Edit Mission, Vision and Values',
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mvc  $mvc
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mvc $mvc)
    {
     $this->validate($request, [
        'title'=> 'required|string',
        'description'=> 'required',
        'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:3000',

     ]);
     try{

     $mvc = Mvc::find($request->id);

     $newImageName = time() . "-" . $request->title . "-" . $request->image->extension();
     $request->image->move(public_path('uploads/mvc/'), $newImageName);


     $mvc->title = $request->title;
     $mvc->slug = SlugService::createSlug(Mvc::class,'slug', $request->title);
     $mvc->image = $newImageName;

     $mvc->description = $request->description;

     if ($mvc->save()) {
         return redirect('Admin/Mvc/Index')->with(['successMessage' => 'Success !! Mission, Vision and Values Updated']);
     } else {
         return redirect()->back()->with(['errorMessage' => 'Error Mission, Vision and Values not updated']);
     }
    }catch(\Exception){
        return redirect()->back()->with('error', 'Failed to update mvc. Please try again.');
    }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mvc  $mvc
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{


        $mvc = Mvc::find($id);

        $mvc->delete();

        return redirect('Admin/Mvc/Index')->with(['successMessage' => 'Success !!Message Deleted']);
        }catch(\Exception){
            return redirect()->back()->with('error', 'Failed to delete mvc. Please try again.');
        }
    }
}
