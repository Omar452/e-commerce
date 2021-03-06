<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Support\Str;
use App\Http\Requests\ItemRequest;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class ItemController extends Controller
{
    public function index()
    {
        $items = Item::with('category')->where('quantity', '>', 0)->paginate(20);
        return view('items.index', compact('items'));
    }

    public function show($item)
    {
        $item = Item::where('slug', $item)->first();
        return view('items.show', compact('item'));
    }

    public function create()
    {
        return view('items.create');
    }

    public function store(ItemRequest $request)
    {
        $slug = Str::slug($request->name, '-');
        //check if item already exists in DB
        $checkRecord = Item::where('slug' , $slug)->first();
        if($checkRecord) {
            return back()->with('error', 'Item already exists');
        }

        //store image and assign path to variable
        $imagePath = $request->image->store('images','public');

        //resize image
        $image = Image::make(public_path("storage/$imagePath"))->fit(300, 300);
        $image->save();

        $item = Item::create([
            'name' => $request->name,
            'slug' => $slug,
            'description' => $request->description,
            'price' => $request->price,
            'quantity' => $request->quantity,
            'category_id' => $request->category,
            'image' => $imagePath
        ]);
        return redirect()->route('admin.items.list')->with('success','Item created with success');
    }

    public function edit(Item $item)
    {
        $item = Item::findOrFail($item->id);
        return view('items.edit', compact('item'));
    }

    public function update(ItemRequest $request, Item $item)
    {
        $data = $request->except(['image']);

        if($request->image){
            //delete old item image
            File::delete(public_path('storage/' . $item->image));
            //store new image and assign path to variable
            $imagePath = $request->image->store('images','public');
            //resize image
            $image = Image::make(public_path("storage/$imagePath"))->fit(300, 300);
            $image->save();
            $item->image = $imagePath;
        }

        $item->update($data);

        return redirect()->route('admin.items.list')->with('success','Item updated with success');
    }

    public function list()
    {
        $items = Item::with('category')->where('quantity', '>', 0)->paginate(20);

        return view('items.list', compact('items'));
    }

    public function delete(Item $item)
    {
        $item->delete();
        return redirect()->back()->with('success', 'Item deleted with success.');
    }

    public function search(){
        request()->validate([
            'search' => 'string|max:50'
        ]);

        if(request()->search){
            $items = Item::where('slug', 'LIKE', '%' . Str::slug(request()->search) . '%')->paginate(20);
        }else{
            $items = Item::with('category')->paginate(20);
        }
        
        if(request()->user()){
            if(request()->user()->role === 'admin'){
                return view('items.list', compact('items'));
            }
        }
        
        return view('items.index', compact('items'));
    }
}
