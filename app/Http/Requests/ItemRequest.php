<?php

namespace App\Http\Requests;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Http\FormRequest;

class ItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        $route = Route::currentRouteName();
        $imageValidation = $route == 'admin.items.store' ? 'required|image' : 'image';
    
        return [
            'name' => 'required|string|max:255',
            'category' => 'required',
            'price' => 'required|integer|gt:0',
            'quantity' => 'required|integer|gt:0',
            'image' => $imageValidation
        ];
        
    }
}
