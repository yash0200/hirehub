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
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:job_categories,slug',
            'status' => 'required|in:active,inactive',
        ]);

        JobCategory::create([
            'name' => $validated['name'],
            'slug' => $validated['slug'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('admin.categories')->with('success', 'Category added successfully!');
    }
}
