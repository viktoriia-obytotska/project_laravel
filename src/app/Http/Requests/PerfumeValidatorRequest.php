<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerfumeValidatorRequest extends FormRequest
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
            'name' => 'required|min:3|max:10',
            'slug' => 'required|min:3|max:10|regex:/[a-zA-Z]/',
            'description' => 'required|min:10',
            'big_icon' => 'required|image',
            'small_icon' => 'required|image',
//            'category' => 'required|exists:category',
        ];
    }
}
