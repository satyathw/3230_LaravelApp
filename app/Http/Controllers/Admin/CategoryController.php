<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index(Request $request)
{
    $search = $request->search;

    $categories = Category::when($search, function ($query) use ($search) {

        $query->where('name', 'LIKE', '%' . $search . '%');

    })->latest()->get();

    return view('admin.categories.index', compact('categories'));
}

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required'
    ]);

    Category::create([
        'name' => $request->name,
        'slug' => \Str::slug($request->name)
    ]);

    return redirect()
        ->route('admin.categories.index')
        ->with('success', 'Kategori berhasil ditambahkan');
}

    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|max:255'
        ]);

        $category->update([
            'name' => $request->name
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil diupdate');
    }

    public function destroy(Category $category)
    {
        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus');
    }

    public function create()
{
    return view('admin.categories.create');
}

public function edit(Category $category)
{
    return view('admin.categories.edit', compact('category'));
}
}