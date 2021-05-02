<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->where('quantity', '>', 0)->paginate(10);
        return view('items.index', compact('items'));
    }

    public function show($item)
    {
        $item = Item::where('slug', $item)->first();
        return view('items.show', compact('item'));
    }

    public function create(){
        return view('items.create');
    }

    public function store(Request $request){
    
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required',
            'price' => 'required|integer',
            'quantity' => 'required|integer',
            'image' => 'required|image'
        ]);
        
        //store image and assign path to variable
        $imagePath = $request->image->store('images','public');
        
        //resize image
        $image = Image::make(public_path("storage/$imagePath"))->fit(300, 300);
        $image->save();

        $item = Item::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name, '-'),
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category,
             'image' => $imagePath
        ]);
        return redirect()->route('items.show', $item)->with('success','Item created with success');
    }

    public function edit(Item $item) {
        return view('items.edit', compact('item'));
    }

    public function update(Request $request) {

    }

    public function list() {
        $items = Item::paginate(20);
        return view('items.list', compact('items'));
    }
}
