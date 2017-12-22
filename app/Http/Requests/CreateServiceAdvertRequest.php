<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateServiceAdvertRequest extends FormRequest
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
            'title' => 'required|max:255',
            'description' => 'required',
            'expiredate' => 'required|date',
            'srv_name' => 'required|max:50',
            'srv_brand' => 'required|max:50',
            'p_cost' => 'required|numeric',
            'c_cost' => 'required|numeric',
            'img_name' => 'required'
        ];
    }
}