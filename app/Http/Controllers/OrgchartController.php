<?php

namespace App\Http\Controllers;

use App\Models\Orgchart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class OrgchartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orgchart = Orgchart::all();
        return view('admin.orgchart.index', ['orgchart' => $orgchart, 'page_title' => 'Organizational Chart']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.orgchart.create', [
            'page_title' => 'Create Organizational Chart'
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
        $this->validate($request,[
            'image' => 'required|image|mimes:png,jpg,jpeg,gif,svg|max:1536'
        ]);

        try{


        $newImageName = time() . 'chart' . '.' .$request->image->extension();
        $request->image->move(public_path('uploads/orgchart/'), $newImageName );

        $orgchart = new Orgchart;

        $orgchart->image = $newImageName;

        $orgchart->save();
        return redirect('Admin/Orgchart/Index')->with(['successMessage' => 'Success !! Organization Chart created']);
        }catch(\Exception){
            return redirect()->back()->with('error', 'Failed to create organizational chart. Please try again.');
        }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Orgchart  $orgchart
     * @return \Illuminate\Http\Response
     */
    public function show(Orgchart $orgchart)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Orgchart  $orgchart
     * @return \Illuminate\Http\Response
     */
    public function edit(Orgchart $orgchart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Orgchart  $orgchart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Orgchart $orgchart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Orgchart  $orgchart
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try{


        $orgchart = Orgchart::find($id);
        $orgchart->delete();
        return redirect('Admin/Orgchart/Index')->with(['successMessage' => 'Success !!Organization Chart Deleted']);
        }catch(\Exception){
            return redirect()->back()->with('error', 'Failed to delete organizational chart. Please try again.');
        }

    }
}
