<?php

namespace App\Http\Controllers;

use App\Models\Youth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

use Cviebrock\EloquentSluggable\Services\SlugService;


class YouthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $youths = Youth::latest()->get();
        return view('admin.youth.index', [
            'page_title' => 'Youth Statistics and Activity',
            // "publications" => $publications,
            // "policies" => $policies,
            // "directives" => $directives,
            'youths' => $youths
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.youth.create', [
            'page_title' => 'Create Youth Stats and Activity'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            "type" => "string",
            "title" => "required|string",


            "file" => "required|file|max:4000"
        ]);
        try{




        if ($request->hasFile('file')){
            $postPath = time() . '-file' . $request->title . '.' .$request->file->extension();
            $request->file->move(public_path('uploads/youth/'), $postPath );
        }else{
                $postPath = "NoFile";
        }

        $youth = new Youth;

        $youth->type = $request->type;
        $youth->title = $request->title;
        $youth->slug = SlugService::createSlug(Youth::class, 'slug', $request->title);


        $youth->file = $postPath;

        if($youth->save()){

        return redirect('Admin/Youth/Index')->with("success", "Youth Activity/Stats Stored!");
    }
}catch(\Exception){
    return redirect()->back()->with('error', 'Failed to create youth. Please try again.');
}
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Youth  $youth
     * @return \Illuminate\Http\Response
     */
    public function show(Youth $youth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Youth  $youth
     * @return \Illuminate\Http\Response
     */
    public function edit(Youth $youth, $id)
    {
        $youth = Youth::find($id);

        return view('admin.youth.update', [
            'youth' => $youth,
            'page_title' => "Youth Stat Update"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Youth  $youth
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Youth $youth)
    {
        $request->validate([
            "type" => "string",
            "title" => "required|string",

            "file" => "file|max:4000"
        ]);

        try{



        $youth = Youth::find($request->id);

        if ($request->hasFile('file')){
            $postPath = time(). '-file' . $request->title . '.' .$request->file->extension();
            $request->file->move(public_path('uploads/youth/'), $postPath );
            Storage::delete('uploads/youth/' . $youth->file);
            $youth->file = $postPath;
        }else {

                $postPath = "NoFile";

        }



        $youth->type = $request->type;
        $youth->title = $request->title;
        $youth->slug = SlugService::createSlug(Youth::class, 'slug', $request->title);


        $youth->save();

        return redirect('Admin/Youth/Index')->with('success', 'Youth Activity/Statistics Stored!');
    }catch(\Exception){
        return redirect()->back()->with('error', 'Failed to update youth. Please try again.');
    }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Youth  $youth
     * @return \Illuminate\Http\Response
     */
    public function destroy(Youth $youth, $id)
    {
        try{


        $youth = Youth::find($id);
        $youth->delete();

        return redirect('Admin/Youth/Index')->with('success', 'Youth Stats Activity Deleted!');
        }catch(\Exception){
            return redirect()->back()->with('error', 'Failed to delete youth. Please try again.');
        }
    }
}
