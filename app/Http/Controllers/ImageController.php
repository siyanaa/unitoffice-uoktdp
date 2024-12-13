<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\MyImage;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\UtilityFunctions;

class ImageController extends Controller
{
    //
    public function index(){
        $images = MyImage::paginate(50);
        return view('admin.image.index', ['images' => $images, 'page_title' => 'Image']);

    }

    public function create()
    {

        return view('admin.image.create', [ 'page_title' =>'Create Images']);
    }

    public function store(Request $request)
    {

    //    dd($request);

        $data = $request->validate([
            'img_desc' => 'required|string|max:255',
            'img' => 'required|array',
            'img.*' => 'required|image|mimes:jpeg,png,jpg,gif,max:2048' 
        ]);
        try{



        $images = [];

        foreach ($data['img'] as $image) {
            $fileName = uniqid() . '.webp';
            $image_path = 'uploads/image/' . $fileName;

            $directory = public_path('uploads/image');

            // Create the directory if it doesn't exist
            if (!File::isDirectory($directory)) {
                File::makeDirectory($directory, 0755, true, true);
            }
            // Open the uploaded image file
            $img = Image::make($image->getRealPath());

            // Convert the image to webp format and set quality to 70%
            $img->encode('webp', 70)->save(public_path($image_path));

            array_push($images, $image_path);
        }

        $data['img'] = $images;

        MyImage::create($data);

        return redirect('Admin/Images/Index')->with(['successMessage' => 'Success !! Image created']);
    }catch(\Exception) {return redirect()->back()->with('error', 'Failed to create gallery. Please try again.');
    }
            }

    public function destroy($id){

        try{


        $image = MyImage::find($id);

        $image->delete();

        return redirect('Admin/Images/Index')->with(['successMessage' => 'Success !!Image Deleted']);
        }catch(\Exception){
            return redirect()->back()->with('error', 'Failed to destroy image. Please try again.');
        }
    }
}
