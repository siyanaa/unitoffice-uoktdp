<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Link;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LinkController extends Controller
{
    public function index(){
        $links = Link::paginate(50);
        return view('admin.link.index',  ['links' => $links, 'page_title' =>'Link']);
    }

    public function create()
    {
        return view('admin.link.create', [ 'page_title' =>'Create Link']);
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'link_title' => 'required|string',
            'link_url' => 'required|url',
        ]);

        try {
            $link = new Link;
            $link->link_title = $request->link_title;
            $link->link_url = $request->link_url;
            $link->save();

            return redirect('Admin/Links/Index')->with(['successMessage' => 'Success !! Link created']);
        } catch(Exception $e) {
            return redirect()->back()->with('error', 'Failed to create link. Please try again.');
        }
    }

    public function edit($id){
        $link = Link::find($id);
        return view('admin.link.update', ['link' => $link, 'page_title' => 'Update Link']);
    }

    public function update(Request $request, Link $link){
        $this->validate($request, [
            'link_title' => 'required|string',
            'link_url' => 'required|url',
        ]);

        try {
            $link = Link::find($request->id);
            $link->link_title = $request->link_title;
            $link->link_url = $request->link_url;

            if ($link->save()) {
                return redirect('Admin/Links/Index')->with(['successMessage' => 'Success !! Links Updated']);
            } else {
                return redirect()->back()->with(['errorMessage' => 'Error Links not updated']);
            }
        } catch(Exception $e) {
            return redirect()->back()->with('error', 'Failed to update link. Please try again.');
        }
    }

    public function destroy($id)
    {
        try {
            $link = Link::find($id);
            $link->delete();
            return redirect('Admin/Links/Index')->with(['successMessage' => 'Success !! Link Deleted']);
        } catch(Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete link. Please try again.');
        }
    }

    
}
