<?php

namespace App\Http\Controllers;

use App\Exports\UsersExport;
use App\Imports\UsersImport;
use Illuminate\Http\Request;
use App\Models\CommitteeDetail;
use Maatwebsite\Excel\Facades\Excel;

class CommitteeDetailController extends Controller
{

    public function fileImportExport()
    {
       return view('admin.committeedetail.upload', [
        "page_title" => "Import Committee Members"
       ]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileImport(Request $request)
    {

        $file = $request->file('file');
        // Excel::import(new ExecutiveDetailImport, $request->file('file')->store('temp'));

        try {
            Excel::import(new UsersImport, $file);
            return redirect()->route('Admin.Committeedetails.Index')->with('success', 'Data imported successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Error importing data: ' . $e->getMessage());
        }




    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function fileExport()
    {
        return Excel::download(new UsersExport, 'users-collection.xlsx');
    }



    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $committeedetails = CommitteeDetail::paginate(20);
        return view('admin.committeedetail.index',[
            'page_title' => 'Committee Details',
            'committeedetails' => $committeedetails
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.committeedetail.create',[
            'page_title' => 'Create Committee Detail'
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
        $request->validate([
            'name' => 'required|string',
            'district'=> 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string'
        ]);

        try{

        $committeedetail = new CommitteeDetail;
        $committeedetail->district = $request->district;
        $committeedetail->name = $request->name;
        $committeedetail->address = $request->address;
        $committeedetail->phone = $request->phone;
        $committeedetail->save();
        return redirect('Admin/Committeedetails/Index')->with("message", "Committee Member Updated!");
        }catch(\Exception){
            return redirect()->back()->with('error', 'Failed to create committee details. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CommitteeDetail  $committeeDetail
     * @return \Illuminate\Http\Response
     */
    public function show(CommitteeDetail $committeeDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CommitteeDetail  $committeeDetail
     * @return \Illuminate\Http\Response
     */
    public function edit(CommitteeDetail $committeeDetail, $id)
    {
        $committeedetail = CommitteeDetail::find($id);

        return view('admin.committeedetail.update', [
            'committeedetail' => $committeedetail,
            'page_title' => "Committee Update"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CommitteeDetail  $committeeDetail
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CommitteeDetail $committeeDetail)
    {
        $request->validate([
            'district' => 'required|string',
            'name' => 'required|string',
            'address' => 'required|string',
            'phone' => 'required|string'
        ]);

        try{
        $committeedetail = CommitteeDetail::find($request->id);
        $committeedetail->district = $request->district;
        $committeedetail->name = $request->name;
        $committeedetail->address = $request->address;
        $committeedetail->phone = $request->phone;

        $committeedetail->save();

        return redirect('Admin/Committeedetail/Index');
        }catch(\Exception){
            return redirect()->back()->with('error', 'Failed to update committee details. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CommitteeDetail  $committeeDetail
     * @return \Illuminate\Http\Response
     */
    public function destroy(CommitteeDetail $committeeDetail, $id)
    {
        try{
        $committeeDetail = CommitteeDetail::find($id);
        $committeeDetail->delete();

        return redirect('Admin/Committeedetails/Index');
    }catch(\Exception){
        return redirect()->back()->with('error', 'Failed to delete committee details. Please try again.');

    }
    }

    // public function error()
    // {
    //     # code...
    //     return view('admin.committeedetail.error');
    // }

}
