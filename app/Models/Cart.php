<?php

namespace App\Models;

use App\Models\Item;

class Cart
{  

    //protected $fillable = ['items','total_items','total_amount','user_id'];

    public $items = null;
    public $total_quantity = 0;
    public $total_price = 0;

    public function __construct($oldCart)
    {
        if($oldCart) {
            $this->items = $oldCart->items;
            $this->total_quantity = $oldCart->total_quantity ;
            $this->total_price = $oldCart->total_price;
        }
    }

    public function add(Item $item)
    {
        $storedItem = ['item' => $item->name, 'quantity' => 0, 'price' => $item->price];

        if($this->items) {
            if(array_key_exists($item->id, $this->items)) {
                $storedItem = $this->items[$item->id];
            }
        }
        $storedItem['quantity']++;
        $storedItem['price'] = $item->price * $storedItem['quantity'];
        $this->items[$item->id] = $storedItem;
        $this->total_quantity++;
        $this->total_price += $item->price;
    }
}
