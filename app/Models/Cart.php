<?php

namespace App\Models;

use App\Models\Item;

class Cart
{  

    //protected $fillable = ['items','total_items','total_amount','user_id'];

    public $items = null;
    public $total_items = 0;
    public $total_price = 0;

    public function __construct($oldCart)
    {
        $this->tax = 0.2;
        if($oldCart) {
            $this->items = $oldCart->items;
            $this->total_items = $oldCart->total_items;
            $this->total_tax = $oldCart->total_tax;
            $this->priceExcTax = $oldCart->priceExcTax;
            $this->total_price = $oldCart->total_price;
        }
    }

    public function add(Item $item)
    {
        $storedItem = ['item' => $item, 'quantity' => 0, 'price' => $item->price];

        if($this->items) {
            if(array_key_exists($item->id, $this->items)) {
                $storedItem = $this->items[$item->id];
            }
        }
        $storedItem['quantity']++;
        $storedItem['price'] = $item->price;
        $this->items[$item->id] = $storedItem;

        $this->calculateTotalItems();
        $this->calculateTotalAmount();
    }

    public function subtract(Item $item)
    {
        if($this->items[$item->id]['quantity'] > 1){
            $this->items[$item->id]['quantity']--;
            $this->items[$item->id]['price'] -= $item->price;
        } else{
            unset($this->items[$item->id]);
        }

        $this->calculateTotalItems();
        $this->calculateTotalAmount();
    }

    public function remove(Item $item)
    {  
        unset($this->items[$item->id]);
    
        $this->calculateTotalItems();
        $this->calculateTotalAmount();
    }

    public function calculateTotalItems()
    {
        $total = 0;
        if($this->items){
            foreach($this->items as $item){
                $total += $item['quantity'];
            }
        }
        $this->total_items = $total;
    }

    public function calculateTotalAmount()
    {
        $total = 0;
        if($this->items){
            foreach($this->items as $item){
                $total += $item['quantity'] * $item['price'];
            }
        }
        $this->total_price = $total;
        $this->total_tax = $total * $this->tax;
        $this->priceExcTax = $this->total_price - $this->total_tax;
    }
}
