<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductControllerRequest extends FormRequest
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
            'name'=>'required',
            'no_of_product'=>'required',
            'size'=>'required',
            'color'=>'required',
        ];
    }
}
