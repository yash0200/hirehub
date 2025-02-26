<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use App\Models\JobCategory;

class JobCategoryController extends Controller
{
    public function index()
    {
        $categories = JobCategory::withCount('jobs')->get();
        // dd($categories);
        return view('categories.index', compact('categories'));
    }

    public function show($slug)
    {
        // Fetch category by slug with associated jobs
        $category = JobCategory::where('slug', $slug)->firstOrFail();

        // Fetch jobs under this category
        $jobs = $category->jobs()->latest()->paginate(10);  // You can change pagination as needed

        return view('categories.show', compact('category', 'jobs'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:job_categories|max:255',
        ]);

        JobCategory::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('categories.list')->with('success', 'Category added successfully.');
    }
}
