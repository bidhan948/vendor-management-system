<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductControllerRequest;
use App\Http\Requests\ProductEditRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class ProductController extends Controller
{
    public function create(Category $category): View
    {
        return view('Product.add', compact('category'));
    }

    public function store(ProductControllerRequest $productControllerRequest, Category $category): RedirectResponse
    {
        $category->products()->create($productControllerRequest->validated());
        (new ProductServices())->storeTransction($productControllerRequest->no_of_product);
        return redirect()->route('category.edit', $category)->with('msg_product', 'Produts added successfully');
    }

    public function edit(Category $category, Product $product): View
    {
        return view('product.edit', compact(['product', 'category']));
    }

    public function update(ProductEditRequest $productEditRequest, Category $category, Product $product): RedirectResponse
    {
        (new ProductServices())->updateProduct($product,$productEditRequest);
        $product->update($productEditRequest->validated());
        return redirect()->route('category.edit', $category)->with('msg_product', 'Updated Successfully');
    }

    public function destroy(Category $category, Product $product): RedirectResponse
    {
        $product->delete();
        return redirect()->route('category.edit', $category)->with('msg_product', 'Deleted Successfully');
    }
}
