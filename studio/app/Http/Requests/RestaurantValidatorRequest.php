<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantValidatorRequest extends FormRequest
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
        return [
            'name_restaurant' =>'required|min:3|max:30',
            'image' => 'required|image',
            'category' => 'required|min:3|max:15',
            'name_dish' => 'required|min:3|max:30',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'picture' => 'required|image',

        ];
    }
}
