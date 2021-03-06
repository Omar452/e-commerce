<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    public function list()
    {
        $categories = Category::with('items')->get();
        return view('categories.list', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(CategoryRequest $request)
    {
        //create slug
        $slug = Str::slug($request->name, '-');
        //check if category already exists
        $checkRecord = Category::where('slug', $slug)->first();
        if($checkRecord){
            return back()->with('error', 'Category already exists');
        }
        Category::create([
            'name' => $request->name,
            'slug' => $slug
        ]);

        return redirect()->route('admin.categories.list')->with('success', 'Category created with success');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-')
        ]);

        return redirect()->route('admin.categories.list')->with('success', 'Category updated with success');
    }

    public function delete(Category $category)
    {
        if($category->items->count() > 0){
            return redirect()->back()->with('error', 'You cannot delete a category containing items');
        }
        $category->delete();
        return redirect()->back()->with('success', 'Category deleted with success');
    }
}
