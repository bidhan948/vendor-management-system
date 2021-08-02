<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductEditRequest extends FormRequest
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
            'name' => 'required',
            'no_of_product' => 'required',
            'size' => 'required',
            'color' => 'required',
            'no_of_damage' => 'present',
            'no_of_lost' => 'present',
            'add_stock'=>'present'
        ];
    }
}
