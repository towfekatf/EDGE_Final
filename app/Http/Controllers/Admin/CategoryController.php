<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    // Display a listing of the resource.
    public function index()
    {
        $categories = Category::all();
        return view('Admin.categories.index', compact('categories'));
    }

    // Show the form for creating a new resource.
    public function create()
    {
        return view('Admin.categories.create');
    }

    // Store a newly created resource in storage.
    public function store(Request $request)
    {
        $request->merge([
           'slug' => !empty($request->input('slug')) ? Str::slug($request->input('slug')) : Str::slug($request->input('name')),
        ]);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['name', 'slug']);

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads', $imageName);
            $data['image'] = $imageName;
        }

        Category::create($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category created successfully.');
    }


    // Display the specified resource.
    public function show($id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.categories.show', compact('category'));
    }


    // Show the form for editing the specified resource.
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('Admin.categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug,' . $category->id,
        ]);

        $data = $request->only(['name', 'slug']);

        if ($request->hasFile('image')) {
            // Delete old image
            if ($category->image) {
                Storage::delete('public/' . $category->image);
            }
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads', $imageName);
            $data['image'] = 'uploads/' . $imageName;
        }

        $category->update($data);

        return redirect()->route('admin.categories.index')->with('success', 'Category updated successfully.');
    }

    // Remove the specified resource from storage.
    public function destroy($id)
    {
        $category = Category::findOrFail($id);

        // Delete image
        if ($category->image) {
            Storage::delete('public/' . $category->image);
        }

        $category->delete();
        return redirect()->route('admin.categories.index')->with('success', 'Category deleted successfully.');
    }
}
