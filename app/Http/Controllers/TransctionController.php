<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductSellRequest;
use App\Models\Product;
use App\Models\Transction;
use App\Models\User;
use App\Services\ProductServices;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class TransctionController extends Controller
{
    public function index(): View
    {
        $products = Product::all();
        $users = User::where('is_admin', False)->get();
        return view('transction.sell', compact(['products', 'users']));
    }
    public function store(ProductSellRequest $productSellRequest,Transction $transction):RedirectResponse
    {
        $transction->create($productSellRequest->validated());
        (new ProductServices())->updateNoOfProduct($productSellRequest);
        return redirect()->route('transction.index')->with('msg','Sold Successfully');
    }

    public function show(Transction $transction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transction  $transction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transction $transction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Transction  $transction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transction $transction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transction  $transction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transction $transction)
    {
        //
    }
}
