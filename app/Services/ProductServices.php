<?php

namespace App\Services;

use App\Http\Requests\multiCategoryProductRequest;
use App\Http\Requests\ProductEditRequest;
use App\Http\Requests\ProductSellRequest;
use App\Models\Product;
use App\Models\Transction;
use Illuminate\Support\Facades\DB;

class ProductServices
{

    public function storeTransction($no_of_product)
    {
        $product = Product::latest()->take(1)->get();
        Transction::create(['no_of_in_product' => $no_of_product, 'product_id' => $product[0]->id]);
    }
    public function updateProduct(Product $product, ProductEditRequest $productEditRequest)
    {
        $no_of_damage = $productEditRequest->no_of_damage ?? 0;
        $no_of_lost = $productEditRequest->no_of_lost ?? 0;
        $add_stock = $productEditRequest->add_stock ?? 0;
        if ($add_stock != 0) {
            Transction::create(['no_of_in_product' => $add_stock, 'product_id' => $product->id]);
        }
        $no_of_product = ($product->no_of_product + $add_stock) - ($no_of_damage + $no_of_lost);
        return ["no_of_product" => $no_of_product];
    }
    public function updateNoOfProduct(ProductSellRequest $productSellRequest)
    {
        $product = Product::firstWhere('id', $productSellRequest->product_id);
        $no_of_product = $product->no_of_product - $productSellRequest->no_of_out_product;
        $product->update(['no_of_product' => $no_of_product]);
    }

    public function userToday($transction)
    {
        $total_product = 0;
        $date_strings = $transction->where('user_id', auth()->user()->id)->values();
        foreach ($date_strings as $date_string) {
            $time = $date_string->created_at->toDateString();
            if ($time == now()->toDateString()) {
                $total_product += $date_string->no_of_out_product;
            } else {
                $total_product += 0;
            }
        }
        return $total_product;
    }

    public function addMultipleProduct(multiCategoryProductRequest $request)
    {
        $product = Product::latest()->take(1)->get();
        foreach ($request->category_id as $category_id) {
            DB::table('category_product')->insert(['product_id' => $product[0]->id, 'category_id' => $category_id]);
        }
    }
}
