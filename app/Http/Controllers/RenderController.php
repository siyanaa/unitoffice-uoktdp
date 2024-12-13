<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\About;
use App\Models\Team;
use App\Models\OtherPost;
use App\Models\Category;
use App\Models\CommitteeDetail;
use App\Models\Context;
use App\Models\Document;
use App\Models\ExecutiveDetail;
use App\Models\Information;
use App\Models\Link;
use App\Models\Message;
use App\Models\Post;
use App\Models\Video;
use App\Models\MyImage;
use App\Models\Other;
use App\Models\Mvc;
use App\Models\SiteSetting;
use App\Models\Orgchart;
use App\Models\Youth;

class RenderController extends Controller
{
    protected function getBreakingNews()
    {
        return Information::where('type', 'breaking')->latest()->take(10)->get();
    }

    public function render_about()
    {
        $sitesetting = SiteSetting::first();
        $links = Link::latest()->take(7)->get();
        $noticestitle = Context::where('title', 'Notice')->latest()->first();

        $notices = [];
        if ($noticestitle) {
            $notices = $noticestitle->getInformationsByType()->latest()->take(10)->get();
        }

        $contextnav = Context::all();
        $about = About::first();
        $breakingNews = $this->getBreakingNews();

        return view('portal.about', compact('sitesetting', 'links', 'notices', 'about', 'contextnav', 'noticestitle', 'breakingNews'));
    }

    public function render_team()
    {
        $sitesetting = SiteSetting::first();
        $links = Link::latest()->take(7)->get();
        $noticestitle = Context::where('title', 'Notice')->latest()->first();

        $notices = [];
        if ($noticestitle) {
            $notices = $noticestitle->getInformationsByType()->latest()->take(10)->get();
        }

        $contextnav = Context::all();
        $teams = Team::all();
        $breakingNews = $this->getBreakingNews();

        return view('portal.team', compact('sitesetting', 'links', 'notices', 'teams', 'contextnav', 'noticestitle', 'breakingNews'));
    }

    public function render_chart()
    {
        $sitesetting = SiteSetting::first();
        $links = Link::latest()->take(7)->get();
        $noticestitle = Context::where('title', 'Notice')->latest()->first();

        $notices = [];
        if ($noticestitle) {
            $notices = $noticestitle->getInformationsByType()->latest()->take(10)->get();
        }

        $orgchart = Orgchart::first();
        $contextnav = Context::all();
        $breakingNews = $this->getBreakingNews();

        return view('portal.organizationalchart', compact('sitesetting', 'links', 'notices', 'orgchart', 'contextnav', 'noticestitle', 'breakingNews'));
    }

    public function render_images()
    {
        $sitesetting = SiteSetting::first();
        $links = Link::latest()->take(7)->get();
        $noticestitle = Context::where('title', 'Notice')->latest()->first();

        $notices = [];
        if ($noticestitle) {
            $notices = $noticestitle->getInformationsByType()->latest()->take(10)->get();
        }

        $contextnav = Context::all();
        $images = MyImage::latest()->get();
        $breakingNews = $this->getBreakingNews();

        return view('portal.images', compact('sitesetting', 'links', 'notices', 'images', 'contextnav', 'noticestitle', 'breakingNews'));
    }

    public function render_image($id)
    {
        $sitesetting = SiteSetting::first();
        $links = Link::latest()->take(7)->get();
        $noticestitle = Context::where('title', 'Notice')->latest()->first();

        $notices = [];
        if ($noticestitle) {
            $notices = $noticestitle->getInformationsByType()->latest()->take(10)->get();
        }

        $contextnav = Context::all();
        $image = MyImage::find($id);
        $breakingNews = $this->getBreakingNews();

        return view('portal.image', compact('sitesetting', 'links', 'notices', 'image', 'contextnav', 'noticestitle', 'breakingNews'));
    }

    public function render_videos()
    {
        $sitesetting = SiteSetting::first();
        $links = Link::latest()->take(7)->get();
        $noticestitle = Context::where('title', 'Notice')->latest()->first();

        $notices = [];
        if ($noticestitle) {
            $notices = $noticestitle->getInformationsByType()->latest()->take(10)->get();
        }

        $contextnav = Context::all();
        $videos = Video::latest()->get();
        $breakingNews = $this->getBreakingNews();

        return view('portal.video', compact('sitesetting', 'links', 'notices', 'videos', 'contextnav', 'noticestitle', 'breakingNews'));
    }

    public function contact_page()
    {
        $sitesetting = SiteSetting::first();
        $links = Link::latest()->take(7)->get();
        $noticestitle = Context::where('title', 'Notice')->latest()->first();

        $notices = [];
        if ($noticestitle) {
            $notices = $noticestitle->getInformationsByType()->latest()->take(10)->get();
        }

        $contextnav = Context::all();
        $breakingNews = $this->getBreakingNews();

        return view('portal.contact_page', compact('sitesetting', 'links', 'notices', 'contextnav', 'noticestitle', 'breakingNews'));
    }

    public function singleinformation_page($contextId)
    {
        $context = Context::findOrFail($contextId);
        $informations = $context->getInformationsByType()->latest()->get();

        $contextnav = Context::all();
        $sitesetting = SiteSetting::first();
        $links = Link::latest()->take(5)->get();
        $noticestitle = Context::where('title', 'Notice')->latest()->first();

        $notices = [];
        if ($noticestitle) {
            $notices = $noticestitle->getInformationsByType()->latest()->take(10)->get();
        }

        $breakingNews = $this->getBreakingNews();

        return view('portal.information_page', compact('sitesetting', 'links', 'notices', 'context', 'informations', 'contextnav', 'noticestitle', 'breakingNews'));
    }
}
