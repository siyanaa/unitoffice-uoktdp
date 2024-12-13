<?php

namespace App\Http\Controllers;

use App\Models\Insta;
use Illuminate\Http\Request;

class InstaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $instas = Insta::paginate(50);
        return view('admin.insta.index',  ['instas' => $instas, 'page_title' =>'Insatgram']);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.insta.create', [ 'page_title' =>'Create Instagram Post']);
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

            'url' => 'required',
        ]);
try{






        $insta = new Insta;



            $insta->url = $request->url;

        $insta->save();

        return redirect('Admin/Insta/Index')->with(['successMessage' => 'Success !! Instagram link created']);
}catch(\Exception){
    return redirect()->back()->with('error', 'Failed to create insta link. Please try again.');

}

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Insta  $insta
     * @return \Illuminate\Http\Response
     */
    public function show(Insta $insta)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Insta  $insta
     * @return \Illuminate\Http\Response
     */
    public function edit(Insta $insta, $id)
    {
        $insta = Insta::find($id);
        return view('Admin.Insta.Update',['insta' => $insta, 'page_title' => 'Update Instagram link']);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Insta  $insta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Insta $insta)
    {
        $this ->validate($request,[

            'url' => 'required',
        ]);

        try{


        $insta = Insta::find($request->id);

        $insta->url = $request->url;

        if ($insta->save()) {
            return redirect('Admin/Insta/Index')->with(['successMessage' => 'Success !! Instagram Link Updated']);
        } else {
            return redirect()->back()->with(['errorMessage' => 'Error Instagram Link not updated']);
        }
    }catch(\Exception){
        return redirect()->back()->with('error', 'Failed to update insta link. Please try again.');
    }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Insta  $insta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Insta $insta, $id)
    {
        try{


        $insta = Insta::find($id);

        $insta->delete();
        return redirect('Admin/Insta/Index')->with(['successmessage' => 'Success !! Instagram Link Deleted']);

        }catch(\Exception){
            return redirect()->back()->with('error', 'Failed to delete insta link. Please try again.');
        }

    }
}
