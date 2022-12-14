<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCourse extends FormRequest
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
            'title' => 'required|max:100',
            'location' => 'required|max:100',
            'distance' => 'bail|required|numeric|min:0.1|max:300',
            'description' => 'required|max:1000',
            'images' => 'array|between:0,3',
            'images.*' => 'image|mimes:jpg,jpeg,png,gif,svg|max:1024|dimensions:min_height=100,min_width=100',

        ];
    }
}
