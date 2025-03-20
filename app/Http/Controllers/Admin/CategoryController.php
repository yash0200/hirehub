<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Models\JobCategory;

class CategoryController extends Controller
{

    public function index(Request $request)
    {
        // $categories = JobCategory::all();
        $query = JobCategory::query();

        // Check if search term is provided
        if ($request->filled('s')) {
            $query->where('name', 'LIKE', '%' . $request->s . '%')
                ->orWhere('slug', 'LIKE', '%' . $request->s . '%');
        }

        $categories = $query->get(); // Fetch filtered or all categories
        return view('admin.categories', compact('categories'));
    }

    public function create()
    {
        return view('admin.add_categories');
    }
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255|regex:/^[a-zA-Z\s,\'-]+$/|unique:job_categories,name',
            'slug' => 'required|string|max:255|regex:/^[a-zA-Z\s,\'-]+$/|unique:job_categories,slug',
        ]);

        // If validation fails, return with errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Optionally, you can perform further custom validation here (for example, you might want to check if the 'name' field is unique or format the slug)

        // Create a new JobCategory record in the database
        JobCategory::create([
            'name' => $request->name,
            'slug' => $request->slug,
        ]);


        return redirect()->route('admin.categories')->with('success', 'Category added successfully!');
    }
    public function edit($id)
    {
        $category = JobCategory::findOrFail($id);
        return view('admin.add_categories', compact('category'));
    }

    // Update Category
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:job_categories,slug,' . $id,
        ]);

        $category = JobCategory::findOrFail($id);
        $category->update($request->only(['name', 'slug']));

        return redirect()->route('admin.categories')->with('success', 'Category updated successfully.');
    }

    // Delete Category
    public function destroy($id)
    {
        $category = JobCategory::findOrFail($id);
        $category->delete();

        return redirect()->route('admin.categories')->with('success', 'Category deleted successfully.');
    }
    public function changeStatus(Request $request, JobCategory $category)
    {
        $request->validate([
            'status' => 'required|in:active,inactive'
        ]);

        $category->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Category status updated successfully.');
    }
}
