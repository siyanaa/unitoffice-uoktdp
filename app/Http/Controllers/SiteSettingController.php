<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\SiteSetting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\UtilityFunctions;

class SiteSettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sitesettings = SiteSetting::paginate(1);
        return view('admin.sitesetting.index',  ['sitesettings' => $sitesettings, 'page_title' => 'SiteSettings']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.sitesetting.create', ['page_title' => 'Create Team']);
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
            'govn_name' => 'string',
            'ministry_name' => 'string',
            'department_name' => 'required|string',
            'office_name' => 'required|string',
            'office_address' => 'required|string',
            'office_contact' => 'required|string',
            'office_mail' => 'required|string',
            'main_logo' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'side_logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'flag_logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'face_link' => 'url',
            'insta_link' => 'url',
            'social_link' => 'url',
            'face_page' => 'url',
            'google_map' => 'url',
        ]);

        try {



            $newMainLogo = time() . '-mainlogo' . $request->office_name . '.' . $request->main_logo->extension();
            $request->main_logo->move(public_path('uploads/sitesetting/'), $newMainLogo);


            $newSideLogo = time() . '-sidelogo' . $request->office_name . '.' . $request->side_logo->extension();
            $request->side_logo->move(public_path('uploads/sitesetting/'), $newSideLogo);

            $newFlagLogo = time() . '-flaglogo' . $request->office_name . '.' . $request->flag_logo->extension();
            $request->flag_logo->move(public_path('uploads/sitesetting/'), $newFlagLogo);


            $sitesetting = new SiteSetting;

            $sitesetting->govn_name = $request->govn_name;
            $sitesetting->ministry_name = $request->ministry_name;
            $sitesetting->department_name = $request->department_name;
            $sitesetting->office_name = $request->office_name;
            $sitesetting->office_address = $request->office_address;
            $sitesetting->office_contact = $request->office_contact;
            $sitesetting->office_mail = $request->office_mail;
            $sitesetting->main_logo = $newMainLogo;
            $sitesetting->side_logo = $newSideLogo;
            $sitesetting->flag_logo = $newFlagLogo;
            $sitesetting->face_link = $request->face_link;
            $sitesetting->insta_link = $request->insta_link;
            $sitesetting->social_link = $request->social_link;
            $sitesetting->face_page = $request->face_page;
            $sitesetting->google_map = $request->google_map;
            $sitesetting->save();


            return redirect('Admin/Sitesettings/Index')->with(['successMessage' => 'Success !! SiteSetting Created']);
        } catch (\Exception) {
            return redirect()->back()->with('error', 'Failed to create sitesetting. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function show(SiteSetting $sitesetting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sitesetting = SiteSetting::find($id);
        return view('admin.sitesetting.update', ['sitesetting' => $sitesetting, 'page_title' => 'Update Sitesettings']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SiteSetting $sitesetting)
    {

        $this->validate($request, [
            'govn_name' => 'string',
            'ministry_name' => 'string',
            'department_name' => 'required|string',
            'office_name' => 'required|string',
            'office_address' => 'required|string',
            'office_contact' => 'required|string',
            'office_mail' => 'required|string',
            'main_logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'side_logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'flag_logo' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1536',
            'face_link' => 'url',
            'insta_link' => 'url',
            'social_link' => 'url',
            'face_page' => 'url',
            'google_map' => 'url',
        ]);

        try {


            $sitesetting = SiteSetting::find(1);

            if ($request->hasFile('main_logo')) {
                // $imagePath = $request->file('image')->storeAs('images/team', Carbon::now()  . '.' . $request->file('image')->getClientOriginalExtension(), 'public');


                $newMainLogo = time() . '-mainlogo' . $request->office_name . '.' . $request->main_logo->extension();

                $request->main_logo->move(public_path('uploads/sitesetting/'), $newMainLogo);


                Storage::delete('public/uploads/sitesetting/' . $sitesetting->main_logo);
                $sitesetting->main_logo =  $newMainLogo;
            }


            if ($request->hasFile('side_logo')) {
                // $imagePath = $request->file('image')->storeAs('images/team', Carbon::now()  . '.' . $request->file('image')->getClientOriginalExtension(), 'public');
                $newSideLogo = time() . '-sidelogo' . $request->office_name . '.' . $request->side_logo->extension();
                $request->side_logo->move(public_path('uploads/sitesetting/'), $newSideLogo);


                Storage::delete('public/uploads/sitesetting/' . $newSideLogo);
                $sitesetting->side_logo =  $newSideLogo;
            }


            if ($request->hasFile('flag_logo')) {
                // $imagePath = $request->file('image')->storeAs('images/team', Carbon::now()  . '.' . $request->file('image')->getClientOriginalExtension(), 'public');
                $newFlagLogo = time() . '-flaglogo' . $request->office_name . '.' . $request->flag_logo->extension();
                $request->flag_logo->move(public_path('uploads/sitesetting/'), $newFlagLogo);


                Storage::delete('public/uploads/sitesetting/' . $newFlagLogo);
                $sitesetting->flag_logo =  $newFlagLogo;
            }
            $sitesetting->govn_name = $request->govn_name;
            $sitesetting->ministry_name = $request->ministry_name;
            $sitesetting->department_name = $request->department_name;
            $sitesetting->office_name = $request->office_name;
            $sitesetting->office_address = $request->office_address;
            $sitesetting->office_contact = $request->office_contact;
            $sitesetting->office_mail = $request->office_mail;
            // $sitesetting->main_logo= $newMainLogo ;
            // $sitesetting->side_logo=$newSideLogo;
            $sitesetting->face_link = $request->face_link;
            $sitesetting->insta_link = $request->insta_link;
            $sitesetting->social_link = $request->social_link;
            $sitesetting->face_page = $request->face_page;
            $sitesetting->google_map = $request->google_map;


            $sitesetting->save();

            return redirect('Admin/Sitesettings/Index')->with(['successMessage' => 'Success !! Site Settings Updated']);
        } catch (\Exception) {
            return redirect()->back()->with('error', 'Failed to update sitesetting. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SiteSetting  $siteSetting
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            $sitesetting = SiteSetting::find($id);
            $sitesetting->delete();

            return redirect('Admin/Sitesettings/Index')->with(['successMessage' => 'Success !! Sitesettings Updated']);
        } catch (\Exception) {
            return redirect()->back()->with('error', 'Failed to delete sitesetting. Please try again.');
        }
    }
}
