<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CommentUpdateRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'img' => 'required|mimes:png,jpg|max:2048',
            'description' => 'required',
            'name' => 'required',
            'img' => 'required|mimes:png,jpg|max:2048',
            'name' => 'required',
            'field' => 'required'
        ];
    }
}
