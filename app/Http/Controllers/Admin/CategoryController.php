<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JobCategory;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = JobCategory::all();  // Retrieve all categories from the database
        return view('admin.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.add_categories');
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:categories,slug',
            'status' => 'required|in:active,inactive',
        ]);

        JobCategory::create([
            'title' => $validated['title'],
            'slug' => $validated['slug'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category added successfully!');
    }
}
