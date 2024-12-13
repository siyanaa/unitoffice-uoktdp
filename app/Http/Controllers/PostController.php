<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Category;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    //
    public function index(Request $req){

        $posts = Post::with('get_categories')->latest()->get()->take(5);
        return view('admin.post.index', [
            'posts' => $posts,
            'page_title' => 'Posts'
        ]);
    }

    public function create(Request $req)
    {
        $categories = Category::all();
        return view('admin.post.create', [
            'categories' => $categories,
            'page_title' => 'Create Post'
        ]);
    }

    public function store(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:3000',
            'content' => 'required|string',
            'categories' => 'required'
        ]);
        try{



        $newImageName = time() . "-" . $request->title . "-" . $request->image->extension();
        $request->image->move(public_path('uploads/posts/'), $newImageName);

        $post = new Post;
        $post->title = $request->title;
        $post->slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        $post->image = $newImageName;
        $post->content = $request->content;

        if ($post->save()){
            // dd($post);
            $post->get_categories()->sync($request->categories);
            return redirect('Admin/Posts/Index');
        }
    }catch(\Exception){
        return redirect()->back()->with('error', 'Failed to create posts. Please try again.');
    }
    }

    public function edit(Post $post, $id)
    {
        $post = Post::find($id);
        $categories = Category::all();

        return view('admin.post.update', [
            'post' => $post,
            'categories' => $categories,
            'page_title' => 'Post Update'
        ]);
    }

    public function update(Request $request, Post $post)
    {
        $request->validate([
            'title' => 'required|string',
            'image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:3000',
            'content' => 'required|string',
            'categories' => 'required'
        ]);
        try{



        $post = Post::find($request->id);

        $newImageName = time() . "-" . $request->title . "-" . $request->image->extension();
        $request->image->move(public_path('uploads/posts/'), $newImageName);

        $post->title = $request->title;
        $post->image = $newImageName;
        $post->content = $request->content;


        if ($post->save()){
            $post->get_categories()->sync($request->categories);
            return redirect('Admin/Posts/Index');
        }
    }catch(\Exception){
        return redirect()->back()->with('error', 'Failed to update posts. Please try again.');
    }
    }

    public function destroy($id)
    {
        try{

        $post = Post::find($id);
        if($post->delete()){
            $post->get_categories()->detach();
            Storage::delete('uploads/posts/image/' . $post->image);
            return redirect('Admin/Posts/Index');
        }
    }catch(\Exception){
        return redirect()->back()->with('error', 'Failed to delete posts. Please try again.');
    }
    }

    public function uploadImage(Request $request)
    {
        // $file = $request->file('image');
        // $storagePath = 'public/uploads/tinymce/'; // Update the storage path as per your requirements
        // $file->move(public_path($storagePath), $file->getClientOriginalName());

        // return $storagePath . '/' . $file->getClientOriginalName();


        $fileName = $request->file('file')->getClientOriginalName();
        $path = $request->file('file')->storeAs('uploads/tiny', $fileName, 'public');
        $location = "/storage/$path";

        return response()->json(['location' => $location]);

    }

}
