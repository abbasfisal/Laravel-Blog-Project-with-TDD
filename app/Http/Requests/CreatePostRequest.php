<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreatePostRequest extends FormRequest
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

        //dd($this->request->all());
        return [
            "title"      => 'required|string|min:6',
            "slug"       => 'required|string|min:6|unique:posts,slug',
            "cover"      => 'required|string|min:2',
            "body"       => 'required',
            "categories" => 'required',
            "tags"       => 'required',
        ];
    }
}
