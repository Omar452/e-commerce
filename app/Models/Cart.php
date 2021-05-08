<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = ['items','total_items','total_amount','user_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
