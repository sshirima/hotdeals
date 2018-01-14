<?php
/**
 * Created by PhpStorm.
 * User: samson
 * Date: 1/13/2018
 * Time: 12:22 AM
 */

namespace App\Http\Requests;


use App\Seller;
use Illuminate\Foundation\Http\FormRequest;

class UpdateProfileSellerRequest extends FormRequest
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
        return Seller::$rules;
    }

}