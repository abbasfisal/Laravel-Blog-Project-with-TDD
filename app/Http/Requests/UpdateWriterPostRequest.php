<?php

namespace App\Http\Requests;

use App\Rules\CheckPostSlugUniqueRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateWriterPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        return Gate::allows('update', $this->route('post'));
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
            "slug"       => ['required', 'string', 'min:6', new CheckPostSlugUniqueRule($this->route('post'))],
            "cover"      => 'required|string|min:2',
            "body"       => 'required',
            "categories" => 'required',
            "tags"       => 'required',
        ];
    }
}
