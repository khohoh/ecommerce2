<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::paginate(10);
        return view('admin.categories.index', compact('categories'));
    }

    public function create()
    {
        return view('admin.categories.create');
    }

    public function store(Request $request)
    {
        $category = new Category();
        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $ext = $file->getClientOriginalExtension();
        //     $fileName = time().'.'.$ext;
        //     $file->store('uploads', 'public');
        //     $product->image = $fileName;
        // };
        
        if ($request->hasFile('image')) {
            $imagepath = $request->image->store('uploads', 'public');
        };

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == TRUE?'1':'0';
        $category->popular = $request->popular == TRUE?'1':'0';
        if ($request->hasFile('image')) {
            $category->image = $imagepath;
        }
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();
        return redirect('/categories')->with('success', 'The Category Has Been Uploaded Successfully!');
    }

    public function edit(Category $category)
    {
        $category = Category::find($category->id);
        return view('admin.categories.edit', compact('category'));
    }

    public function update(Category $category, Request $request)
    {
        $category = Category::find($category->id);

        if ($request->hasFile('image')) {
            $imagepath = $request->image->store('uploads', 'public');
        };

        $category->name = $request->name;
        $category->slug = $request->slug;
        $category->description = $request->description;
        $category->status = $request->status == TRUE?'1':'0';
        $category->popular = $request->popular == TRUE?'1':'0';
        if ($request->hasFile('image')) {
            $category->image = $imagepath;
        }
        $category->meta_title = $request->meta_title;
        $category->meta_description = $request->meta_description;
        $category->meta_keywords = $request->meta_keywords;
        $category->save();
        return redirect('/categories')->with('success', 'The Category Has Been Updated Successfully!');

    }

    public function destroy(Category $category)
    {
        $category = Category::find($category->id);
        $category->delete();

        return redirect('/categories')->with('success', 'The Category Has Been Deleted Successfully!');
    }
}
