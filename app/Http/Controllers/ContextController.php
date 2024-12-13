<?php

namespace App\Http\Controllers;

use App\Models\Context;
use Illuminate\Http\Request;

class ContextController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $contexts = Context::latest()->get();
        return view('admin.context.index', [
            'contexts' => $contexts,
            'page_title' => 'Documents'
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.context.create',[
            'page_title' => 'Create Document'
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
        //
        $request->validate([
            'title' => 'required',
        ]);

        $context = new Context();
        $context->title = $request->title;
        $context->save();

        return redirect('Admin/Context/Index')->with('success', 'Context is Created!');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Context  $context
     * @return \Illuminate\Http\Response
     */
    public function show(Context $context)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Context  $context
     * @return \Illuminate\Http\Response
     */
    public function edit(Context $context, $id)
    {
        //

        $context = Context::find($id);
        return view('admin.context.update', [
            'page_title' => 'Document Update',
            'context' => $context
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Context  $context
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Context $context)
    {
        //

        $this->validate($request, [
            'title' => 'required'
        ]);

        $context = Context::find($request->id);
        $context->title = $request->title;

        $context->save();

        return redirect(route('Admin.Context.Index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Context  $context
     * @return \Illuminate\Http\Response
     */
    public function destroy(Context $context, $id)
    {
        //
        $context = Context::findOrFail($id);
        $context->delete();

        return redirect(route('Admin.Context.Index'));
    }
}
