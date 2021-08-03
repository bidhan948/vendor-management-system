<?php

namespace App\Http\Controllers;

use App\Http\Requests\multiCategoryProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Services\ProductServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class MultiCategoryProduct extends Controller
{
    public function create(): View
    {
        $categories = Category::all();
        $products = Product::all();
        return view('product.create', compact(['categories', 'products']));
    }

    public function store(multiCategoryProductRequest $request, Product $product): RedirectResponse
    {
        $product->create($request->validatedExcept('category_id'));
        (new ProductServices())->storeTransction($request->no_of_product);
        (new ProductServices())->addMultipleProduct($request);
        return redirect()->back()->with('msg','Added Successfully');
    }
}
