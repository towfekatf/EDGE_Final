<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MenuItem;
use App\Models\Restaurant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuItemController extends Controller
{
    public function index()
    {
        $menuItems = MenuItem::all();
        return view('Admin.menuItems.index', compact('menuItems'));
    }

    public function create()
    {

        $categories = Category::all();
        return view('Admin.menuItems.create', compact( 'categories'));
    }

    // Store a new menu item
    public function store(Request $request)
    {
        // Validate the request
        $validatedData = $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'slug' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads/menuItems', $imageName);
            $validatedData['image'] = $imageName;
        }

        // Create the menu item
        MenuItem::create($validatedData);

        return redirect()->route('admin.menuItems.index')->with('success', 'Menu item created successfully.');
    }

    public function show($id)
    {

        $categories = Category::all();
        $menuItem = MenuItem::findOrFail($id);
        return view('Admin.menuItems.show', compact('menuItem',  'categories'));
    }

    public function edit($id)
    {
        $menuItem = MenuItem::findOrFail($id);;
        $categories = Category::all();
        return view('Admin.menuItems.edit', compact('menuItem', 'categories'));
    }

    public function update(Request $request, $id)
    {
        // Validate the request
        $validatedData = $request->validate([
            'category_id' => 'required|integer',
            'name' => 'required|string|max:255',
            'slug' => 'required',
            'description' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Find the menu item by ID
        $menuItem = MenuItem::findOrFail($id);

        // Handle the image upload if a new image is provided
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($menuItem->image) {
                Storage::delete('public/uploads/menuItems/' . $menuItem->image);
            }

            $image = $request->file('image');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->storeAs('public/uploads/menuItems', $imageName);
            $validatedData['image'] = $imageName;
        } else {
            // If no new image is uploaded, retain the old image
            $validatedData['image'] = $menuItem->image;
        }

        // Update the menu item
        $menuItem->update($validatedData);

        return redirect()->route('admin.menuItems.index')->with('success', 'Menu item updated successfully.');
    }


    public function destroy($id)
    {
        // Find the menu item by ID
        $menuItem = MenuItem::findOrFail($id);

        // Delete the image file if it exists
        if ($menuItem->image) {
            $imagePath = public_path('images') . '/' . $menuItem->image;
            if (file_exists($imagePath)) {
                unlink($imagePath);
            }
        }

        // Delete the menu item
        $menuItem->delete();

        return redirect()->route('admin.menuItems.index')->with('success', 'Menu item deleted successfully.');
    }
}
