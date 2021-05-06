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

        $categories = Category::with('items')->get();

        return view('categories.list', compact('categories'))->with('success', 'Category created with success');
    }
}
