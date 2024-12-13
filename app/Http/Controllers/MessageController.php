<?php

namespace App\Http\Controllers;

use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
              $messages = Message::all();
        return view('admin.message.index', [
            'messages' => $messages,
            'page_title' =>'Message Index',

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.message.create', [
            'page_title' => 'Create Message'
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
            'type' => 'string',
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
        ]);

        if($request->hasFile('image')){
            $newImage = time() . "-image" . $request->title . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/message/'), $newImage);
        }else{
            $newImage= null;
        }
        $message = new Message();
        $message->type = $request->type;
        $message->name = $request->name;
        $message->description = $request->description;
        $message->image = $newImage;

        $message->save();

        return redirect('Admin/Message/Index')->with("message", "Document Stored!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message, $id)
    {
        $message = Message::find($id);
        return view('admin.message.show', [
            'message' => $message
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message, $id)
    {
        $message = Message::find($id);
        return view('admin.message.update', [
            'message' => $message,
            "page_title" => "Message Update"
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        $this->validate($request, [
            'type' => 'string',
            'name' => 'required|string',
            'description' => 'required|string',
            'image' => 'image|mimes:jpg,png,peg,gif,svg|max:2048',
        ]);

        $message = Message::find($request->id);


        if ($request->hasFile('image')) {
            $newImageName = time() . '-image' . $request->title . $request->image->extension();
            $request->image->move(public_path('uploads/message/'), $newImageName );
            Storage::delete('uploads/message/' . $message->image);
            $message->image = $newImageName;
        }else{
            unset($request['file']);

        }
        $message->type = $request->type;
        $message->name = $request->name;
        $message->description = $request->description;


        $message->save();

        return redirect('Admin/Message/Index')->with('message', 'Document Stored!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message, $id)
    {
        $message = Message::find($id);
        $message->delete();

        return redirect('Admin/Message/Index');
    }
}
