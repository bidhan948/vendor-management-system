<?php

namespace App\Http\Requests;

use App\Models\Product;
use Illuminate\Foundation\Http\FormRequest;

class ProductSellRequest extends FormRequest
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
        $no_of_product = Product::max('no_of_product');
        return [
            'user_id' => 'required',
            'product_id' => 'required',
            'no_of_out_product' => 'integer|between:1,'.$no_of_product
        ];
    }
}
