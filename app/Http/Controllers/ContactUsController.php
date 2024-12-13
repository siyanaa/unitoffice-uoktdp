<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
// use Anhskohbo\NoCaptcha\Facades\NoCaptcha;

use Closure;

class ContactUsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = ContactUs::latest()->get();
        return view('admin.contactus.index', [
            'contacts' => $contacts,
            'page_title' => 'Contact Us'
        ]);
    }

    public function show($id)
    {
        $contact = ContactUs::find($id);
        return view('admin.contactus.show', [
            'contact' => $contact,
            'page_title' => 'Contact Details'
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
            'name' => 'required|string',
            'email' => 'required|string',
            'phone_no' => 'required|string',
            'message' => 'required|string',
            'g-recaptcha-response' => 'required',
            function ($attribute, $value, $fail) {

                $g_response = Http::asForm()->post("https://www.google.com/recaptcha/api/siteverify", [
                    'secret' => config('services.recaptcha.secret_key'),
                    'response' => $value,
                    'remoteip' => \request()->ip()
                ]);

                if (!$g_response->json('success')) {
                    $fail('The ' . $attribute . ' is invalid.');
                }
            },
        ]);

        $contact = new ContactUs;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->phone_no = $request->phone_no;
        $contact->message = $request->message;
        $contact->save();

        // return response()->json(['success' => true]);
        return redirect()->back()->with('success', 'Your message has been submitted successfully!');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ContactUs  $contactUs
     * @return \Illuminate\Http\Response
     */
    public function destroy(ContactUs $contactUs, $id)
    {
        $contacts = ContactUs::find($id);
        $contacts->delete();

        return redirect('Admin/Contactus/Index');
    }

}