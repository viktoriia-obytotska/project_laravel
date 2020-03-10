<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DishValidatorRequest extends FormRequest
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
            'name' => 'required|min:3|max:30',
            'description' => 'required|min:10',
            'price' => 'required|numeric',
            'picture' => 'required|image',
            'category' => 'required|exists:categories,id',
            'restaurant' => 'required|exists:restaurants,id',

        ];
    }
}
