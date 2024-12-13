<?php

namespace App\Http\Controllers;

use App\Models\Context;
use App\Models\Information;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Cviebrock\EloquentSluggable\Services\SlugService;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
        // $pressreleases = Information::whereType("pressrelease")->latest()->get()->take(5);
        // $news = Information::whereType("news")->latest()->get()->take(5);
        // $otheropt = Information::whereType("other")->latest()->get()->take(5);
        // $notices = Information::whereType('notice')->latest()->get()->take(5);
        // $tenders = Information::whereType('tender')->latest()->get()->take(5);

        public function index()
        {
            $information = Information::with('contextType')->orderBy('created_at', 'desc')->get();
        
            return view('admin.information.index', [
                'page_title' => 'Information',
                'information' => $information,
            ]);
        }
        
    

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $context = Context::all();
        return view('admin.information.create', [
            "page_title" => "Create Information",
            "context" => $context,
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

    // Get the individual inputs
    $type = $request->input('type');
    $title = $request->input('title');
    $description = $request->input('description');
    $gdocs = $request->input('gdocs');
    $image = $request->file('image');
    $file = $request->file('file');
    $context = $request->input('title');

    // Validate the inputs
    $validator = Validator::make([
        // 'type' => $type,
        'title' => $title,
        'description' => $description,
        'gdocs' => $gdocs,
        'image' => $image,
        'file' => $file,
        'context' => $context,

    ], [
        // 'type' => 'string',
        'title' => 'required|string',
        'description' => 'required|string',
        'gdocs' => 'nullable|url',
        'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'file' => 'required|file|mimes:pdf|max:7000',
        'context'=>'required'
    ]);




    if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
    }

    // Store the image and get the image path
    $imagePath = null;
    if ($image) {
        $imagePath = 'uploads/information/image/' . Str::random(40) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/information/image/'), $imagePath);
    }

    // Store the file and get the file path
    $filePath = null;
    if ($file) {
        $filePath = 'uploads/information/file/' . Str::random(40) . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('uploads/information/file/'), $filePath);
    }

    // Create a new Information model and save it to the database
    $information = new Information;
    $information->type = $type;
    $information->title = $title;
    $information->slug = SlugService::createSlug(Information::class, 'slug', $title);
    $information->description = $description;
    $information->gdocs = $gdocs ?? '';
    $information->image = $imagePath;
    $information->file = $filePath;
    if ($information->save()){
        // dd($post);
        $information->get_contexts()->sync($request->context);
        return redirect('Admin/Informations/Index');

    }
}


    //     $this->validate($request, [
    //         'type' => 'string',
    //         'title' => 'required|string',
    //         'description' => 'required|string',
    //         'gdocs' => 'nullable|url',
    //         'image' => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
    //         'file' => 'required|file|max:7000'
    //     ]);


    //     if ($request->hasFile('image')){
    //     $newImage = time() . "-image" . $request->title . "-" . $request->image->extension();
    //     $request->image->move(public_path('uploads/information/image'), $newImage);
    // }
    // else{
    //     $newImage = null;
    // }
    //     if ($request->hasFile('file')){
    //         $postPath = time() . "-file" . $request->title . '.' .$request->file->extension();
    //         $request->file->move(public_path('uploads/information/file'), $postPath );
    //     }else{
    //             $postPath = "NoFile";
    //     }

    //     $information = new Information;
    //     $information->type = $request->type;
    //     $information->title = $request->title;
    //     $information->slug = SlugService::createSlug(Information::class, 'slug', $request->title);
    //     $information->description = $request->description;
    //     $information->gdocs = $request->gdocs ?? '' ;

    //     $information->image = $newImage;
    //     $information->file = $postPath;


    //     if ($information->save()){

    //         return redirect()->route('admin.information.index')->with('success', 'Information Created successfully');
    //     } else {
    //         return redirect()->back()->with('error', 'Error creating information');
    //     }



    //     return redirect('admin/information/index')->with("message", "Information Saved");

    // }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function show(Information $information)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function edit(Information $information, $id)
    {
        $context = Context::all();
        $information = Information::find($id);

        return view('admin.information.update', [
            'information' => $information,
            'page_title' => "Information Update",
            'context' => $context,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Information $information)
        // public function update(Request $request, $id)
        {
            // Get the individual inputs
            $type = $request->input('type');
            $title = $request->input('title');
            $description = $request->input('description');
            $gdocs = $request->input('gdocs');
            $image = $request->file('image');
            $file = $request->file('file');
            $context = $request->input('title');
        
            // Validate the inputs
            $validator = Validator::make([
                // 'type' => $type,
                'title' => $title,
                'description' => $description,
                'gdocs' => $gdocs,
                'image' => $image,
                'file' => $file,
                'context' => $context,
            ], [
                // 'type' => 'string',
                'title' => 'string',
                'description' => 'string',
                'gdocs' => 'nullable|url',
                'image' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
                'file' => 'nullable|file|mimes:pdf|max:7000',
                'context' => 'nullable',
            ]);
        
            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator)->withInput();
            }
        
            // Find the existing Information model by ID
            $information = Information::findOrFail($request->id);
        
            // Store the image and update the image path
            if ($image) {
                // Delete the existing image file
                if ($information->image) {
                    Storage::delete($information->image);
                }
        
                // Store the new image file and get the image path
                $imagePath = 'uploads/information/image/' . Str::random(40) . '.' . $image->getClientOriginalExtension();
                $image->move(public_path('uploads/information/image/'), $imagePath);
                $information->image = $imagePath;
            }
        
            // Store the file and update the file path
            if ($file) {
                // Delete the existing file
                if ($information->file) {
                    Storage::delete($information->file);
                }
        
                // Store the new file and get the file path
                $filePath = 'uploads/information/file/' . Str::random(40) . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('uploads/information/file/'), $filePath);
                $information->file = $filePath;
            }
        
            // Update the Information model with the new data
            $information->type = $type;
            $information->title = $title;
            $information->slug = SlugService::createSlug(Information::class, 'slug', $title);
            $information->description = $description;
            $information->gdocs = $gdocs ?? '';
        
            if ($information->save()) {
                // Update the related contexts
                $information->get_contexts()->sync($request->context);
        
                return redirect('Admin/Informations/Index');
            }
        }
        


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Information  $information
     * @return \Illuminate\Http\Response
     */
    public function destroy(Information $information, $id)
    {
        $information = Information::find($id);
        if($information->delete()){
            $information->get_contexts()->detach();

        return redirect('Admin/Informations/Index');
    }
}
}
