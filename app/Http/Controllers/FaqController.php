<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $faqs = Faq::paginate(50); // Assuming Faq is your model for FAQs
        return view('admin.FAQ.index', ['faqs' => $faqs, 'page_title' => 'FAQs']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.FAQ.create', ['page_title' => 'Create FAQ']);
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
            'question' => 'required',
            'answer' => 'required',
        ]);

        try {
            $faq = new Faq;
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->save();

            return redirect()->route('admin.faqs.index')->with('successMessage', 'FAQ created successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create FAQ. Please try again.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $faq = Faq::findOrFail($id);
        return view('admin.FAQ.update', ['faq' => $faq, 'page_title' => 'Update FAQ']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'question' => 'required',
            'answer' => 'required',
        ]);

        try {
            $faq = Faq::findOrFail($id);
            $faq->question = $request->question;
            $faq->answer = $request->answer;
            $faq->save();

            return redirect()->route('admin.faqs.index')->with('successMessage', 'FAQ updated successfully');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to update FAQ. Please try again.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
{
    try {
        $faq = Faq::findOrFail($id);
        $faq->delete();

        return redirect()->route('admin.faqs.index')->with('successMessage', 'FAQ deleted successfully');
    } catch (\Exception $e) {
        return redirect()->back()->with('error', 'Failed to delete FAQ. Please try again.');
    }
}
}
