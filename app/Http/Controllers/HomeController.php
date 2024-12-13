<?php

namespace App\Http\Controllers;

use App\Models\Link;
use App\Models\Post;
use App\Models\Team;
use App\Models\About;
use App\Models\Image;
use App\Models\Insta;
use App\Models\Other;
use App\Models\Video;
use App\Models\Context;

use App\Models\Favicon;
use App\Models\MyImage;
use App\Models\Document;
use App\Models\OtherPost;
use App\Models\CoverImage;
use App\Models\Information;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Models\Visitor; 
use App\Models\Faq; 
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    // Method to fetch visitor count
    private function getVisitorCount(Request $req)
    {
        $ipAddress = $req->ip();
        $today = Carbon::today();

        // Check if the IP address has already been recorded today
        $visit = Visitor::where('ip_address', $ipAddress)
                        ->whereDate('created_at', $today)
                        ->first();

        if (!$visit) {
            // Record the visit
            Visitor::create(['ip_address' => $ipAddress]);
        }

        // Get the total visitor count
        $visitorCount = Visitor::count();

        return $visitorCount;
    }

    // Method to fetch common data for views
    private function fetchCommonData(Request $req)
    {
        $visitorCount = $this->getVisitorCount($req);

        $context = Context::all();
        $contextnav = Context::all();
        $favicon = Favicon::first();
        $post = Post::all();
        $coverimages = CoverImage::latest()->get()->take(5);
        $links = Link::latest()->get()->take(7);
        $images = MyImage::latest()->get()->take(4);
        $teams = Team::whereIn('role', ['Chairperson', 'Vice Chairperson', 'Administrative Chief', 'Information Officer'])
                        ->take(4)
                        ->get();
        $about = About::first();
        $videos = Video::latest()->get()->take(3);
        $posts = Post::latest()->get()->take(6);
        $sitesetting = SiteSetting::first(); // Fetching SiteSetting here

        // Fetching all notices
        $allNotices = Information::whereType('notice')->latest()->get();
        // Fetching the latest notice separately
        $latestNotice = $allNotices->first();
        // Reorganizing notices to have the latest one first if it is not already the first
        if ($latestNotice) {
            $allNotices = $allNotices->reject(function ($notice) use ($latestNotice) {
                return $notice->id === $latestNotice->id;
            })->prepend($latestNotice);
        }

        $press = Information::whereType('pressrelease')->latest()->get()->take(5);
        $news = Information::whereType('news')->latest()->get()->take(5);
        $noticepop = Information::whereType('notice')->latest()->first();
        $instas = Insta::latest()->get()->take(3);
        
        // Fetch breaking news notices
        $breakingNews = Information::where('type', 1)->latest()->get();
        $contexts = Context::with('getInformationsByType')->get();

        return [
            'coverimages' => $coverimages,
            'links' => $links,
            'images' => $images,
            'teams' => $teams,
            'about' => $about,
            'videos' => $videos,
            'posts' => $posts,
            'sitesetting' => $sitesetting,
            'notices' => $allNotices, // Return reorganized notices
            'press' => $press,
            'news' => $news,
            'noticepop' => $noticepop,
            'instas' => $instas,
            'post' => $post,
            'favicon' => $favicon,
            'context' => $context,
            'contextnav' => $contextnav,
            'noticestitle' => $latestNotice ? $latestNotice->title : null, // Update title with the latest notice
            'visitorCount' => $visitorCount,
            'breakingNews' => $breakingNews, // Add breaking news to the data
            'contexts' => $contexts,
        ];
    }

    // Index method
    public function index(Request $req)
    {
          $data = $this->fetchCommonData($req);
        return view('portal.index', $data);
    }

    // Other page method example
    public function otherPage(Request $req)
    {
        $data = $this->fetchCommonData($req);

        return view('portal.otherpage', $data);
    }

    // FAQ method in HomeController
    
    public function faq()
    {
        $faqs = Faq::all();
        $data = $this->fetchCommonData(request()); // Assuming you use request() helper to pass Request object

        return view('portal.faq', compact('faqs') + $data);
    }
}
