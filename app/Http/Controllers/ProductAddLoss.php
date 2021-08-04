<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductAddLossRequest;
use App\Http\Requests\ProductAddRequest;
use App\Models\Product;
use App\Models\Transction;
use App\Services\ProductServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductAddLoss extends Controller
{
    public function edit(Product $Product): View
    {
        return view('product.lost_stock', compact('Product'));
    }

    public function update(ProductAddLossRequest $productAddLossRequest, Product $Product): RedirectResponse
    {
        $data = (new ProductServices())->addLoss($productAddLossRequest, $Product);
        Transction::create($data);
        return redirect()->back()->with('msg_product', 'Lost Added successfully');
    }
    
    public function show(Product $Product): View
    {
        return view('product.add_stock', compact('Product'));
    }

    public function destroy(ProductAddRequest $productAddRequest, Product $Product)
    {
        $data = (new ProductServices())->addStock($productAddRequest, $Product);
        $Product->update($data);
    }
}
