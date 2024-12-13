<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function index()
    {
        $videos = Video::paginate(50);
        return view('admin.video.index', [
            'videos' => $videos, 
            'page_title' => 'Video',
        ]);
    }

    public function create()
    {
        return view('admin.video.create', [
            'page_title' => 'Create Video',
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'vid_desc' => 'required|string|max:255',
            'vid_url' => 'required|url',
        ]);

        $video = new Video;
        $video->vid_desc = $request->vid_desc;
        // Use the helper to convert the URL to embedded format
        $video->vid_url = $this->getEmbeddedUrl($request->vid_url);

        if ($video->save()) {
            return redirect('Admin/Videos/Index')->with('successMessage', 'Success !! Video created');
        }

        return redirect()->back()->with('error', 'Failed to create video. Please try again.');
    }

    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('admin.video.update', [
            'video' => $video, 
            'page_title' => 'Update Video',
        ]);
    }

    public function update(Request $request)
    {
        $request->validate([
            'vid_desc' => 'required|string|max:255',
            'vid_url' => 'required|url',
        ]);

        // Retrieve the video from the database
        $video = Video::findOrFail($request->id);
        $video->vid_desc = $request->vid_desc;
        // Use the helper to convert the URL to embedded format
        $video->vid_url = $this->getEmbeddedUrl($request->vid_url); // Convert URL

        if ($video->save()) {
            return redirect('Admin/Videos/Index')->with('successMessage', 'Success !! Video updated');
        }

        return redirect()->back()->with('error', 'Error !! Video not updated');
    }

    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        if ($video->delete()) {
            return redirect('Admin/Videos/Index')->with('successMessage', 'Success !! Video deleted');
        }

        return redirect()->back()->with('error', 'Failed to delete video. Please try again.');
    }

    // Helper function to get embedded URL for YouTube and Vimeo
    private function getEmbeddedUrl($url)
    {
        // Check for YouTube ID and return embedded URL
        if ($youtubeId = $this->getYoutubeVideoId($url)) {
            return 'https://www.youtube.com/embed/' . $youtubeId;
        }

        // Check for Vimeo ID and return embedded URL
        if ($vimeoId = $this->getVimeoVideoId($url)) {
            return 'https://player.vimeo.com/video/' . $vimeoId;
        }

        // Return original URL if no match is found
        return $url; // Keep the direct URL if not a YouTube/Vimeo link
    }

    // Extract YouTube video ID
    private function getYoutubeVideoId($url)
    {
        $pattern = '/(?:youtube\.com\/(?:[^\/]+\/.+\/|(?:v|e(?:mbed)?)\/|.*[?&]v=)|youtu\.be\/)([^"&?\/\s]{11})/'; 
        if (preg_match($pattern, $url, $match)) {
            return $match[1];
        }
        return false;
    }

    // Extract Vimeo video ID
    private function getVimeoVideoId($url)
    {
        $pattern = '/(?:vimeo\.com\/)(\d+)/';
        if (preg_match($pattern, $url, $match)) {
            return $match[1];
        }
        return false;
    }
}

