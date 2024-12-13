<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::latest()->get();
        return view('admin.categories.index', [
            'categories' => $categories,
            'page_title' => 'Categories'
        ]);
    }

    public function create()
    {
        return view('admin.categories.create', [
            'page_title' => 'Create Category'
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        try {


            $category = new Category();
            $category->title = $request->title;
            $category->save();

            return redirect('Admin/Categories/Index')->with('success', 'Category is Created!');
        } catch (\Exception) {
            return redirect()->back()->with('error', 'Failed to create category. Please try again.');
        }
    }

    public function edit(Category $category, $id)
    {
        $category = Category::find($id);
        return view('admin.categories.update', [
            'category' => $category,
            'page_title' => 'Update Category'
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $this->validate($request, [
            'title' => 'required'
        ]);
        try {


            $category = Category::find($request->id);
            $category->title = $request->title;

            $category->save();

            return redirect(route('Admin.Categories.Index'));
        } catch (\Exception) {
            return redirect()->back()->with('error', 'Failed to update category. Please try again.');
        }
    }

    public function destroy(Category $category, $id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();
            return redirect((route('Admin.Categories.Index')));
        } catch (\Exception) {
            return redirect()->back()->with('error', 'Failed to delete category. Please try again.');
        }
    }
}
