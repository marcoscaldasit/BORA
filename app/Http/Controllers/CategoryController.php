<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        return view('categories.index', [
            'categories' => $categories
        ]);
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
        ]);

        Category::create([
            'name' => $request->name
        ]);

        return redirect('/categories');
    }

    public function edit(Category $category)
    {
        return view('categories.edit', [
            'category' => $category
        ]);
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|min:3|max:100',
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect('/categories');
    }

    public function destroy (Category $category)
    {
        $category->delete();
        return redirect('/categories');
    }
}
