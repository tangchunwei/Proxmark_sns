<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FaceRequest extends FormRequest
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
            'face' => 'required|image',
            'x' => 'required|numeric|min:0',
            'y' => 'required|numeric|min:0',
            'w' => 'required|numeric|min:100',
            'h' => 'required|numeric|min:100',
        ];
    }
}
