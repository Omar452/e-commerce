<?php

namespace App\Http\Controllers;

use App\Http\Requests\ItemRequest;
use App\Models\Item;
use Illuminate\Support\Str;
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

    public function create()
    {
        return view('items.create');
    }

    public function store(ItemRequest $request)
    {
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

    public function edit(Item $item)
    {
        $item = Item::findOrFail($item->id);
        return view('items.edit', compact('item'));
    }

    public function update(ItemRequest $request, Item $item)
    {
        $itemToUpdate = Item::findOrFail($item->id);

        $data = $request->except(['image']);

        if($request->image){
            //store image and assign path to variable
            $imagePath = $request->image->store('images','public');
            //resize image
            $image = Image::make(public_path("storage/$imagePath"))->fit(300, 300);
            $image->save();
            $itemToUpdate->image = $imagePath;
        }

        $itemToUpdate->update($data);

        return redirect()->route('items.show', $item)->with('success','Item updated with success');
    }

    public function list()
    {
        $items = Item::paginate(20);
        return view('items.list', compact('items'));
    }
}
