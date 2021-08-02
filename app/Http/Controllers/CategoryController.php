<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function create(): View
    {
        return view('category.add');
    }

    public function store(CategoryRequest $categoryRequest,Category $category): RedirectResponse
    {
        $category->create($categoryRequest->validated());
        return redirect('/');
    }

    public function edit(Category $category): View
    {
        return view('category.edit',compact('category'));
    }

    public function update(CategoryRequest $categoryRequest, Category $category): RedirectResponse
    {
        $category->update($categoryRequest->validated());
        return redirect()->route('category.edit',$category)->with('msg_category','category updated successfully');
    }

    public function destroy(Category $category): RedirectResponse
    {
        $category->delete();
        return redirect()->route('/');
    }
}
