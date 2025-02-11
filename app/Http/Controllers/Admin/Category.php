<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CategoryModel;
use Illuminate\Support\Facades\Validator;
use Storage;

class Category extends Controller
{
    
    public function addOrEditCategory($id = null)
    {
        // Get parent categories for dropdown
        $categories = CategoryModel::whereNull('parent_id')->get();
        
        $category = null; // Default to null for add
        
        // If ID is provided, fetch category details for editing
        if ($id) {
            $category = CategoryModel::findOrFail($id);
        }
// p($category);
        return view('admin.addOrEditCategory', compact('categories', 'category'));
    }


    public function store(Request $request)
    {

        return $this->saveCategory($request, new CategoryModel());
    }

    public function update(Request $request, $id)
    {
        $category = CategoryModel::find($id);
        if (!$category) {
            return response()->json(['message' => 'Category not found'], 404);
        }

        return $this->saveCategory($request, $category);
    }

    public function getAjaxCategory(Request $request)
    {
        if ($request->ajax()) {
            // Get parameters from DataTables request
            $draw = $request->input('draw');
            $start = $request->input('start');  // Offset
            $length = $request->input('length'); // Number of records to fetch
            $searchValue = $request->input('search')['value']; // Search value

            // Query categories with pagination and optional search
            $query = CategoryModel::with('parent');

            // Apply search filter
            if (!empty($searchValue)) {
                $query->where('name', 'LIKE', "%{$searchValue}%");
            }

            // Get total records count before filtering
            $totalRecords = CategoryModel::count();
            $filteredRecords = $query->count();

            // Apply pagination
            $categories = $query->skip($start)->take($length)->get();

            // Format data
            $formattedCategories = $categories->map(function ($category) {
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'parent_name' => optional($category->parent)->name ?? 'None',
                    'status' => $category->status,
                    'image' => $category->image,
                    'actions' => '<a href="/admin/category/edit/' . $category->id . '" class="btn btn-sm btn-primary">Edit</a> 
                                <button class="btn btn-sm btn-danger delete-category" data-id="' . $category->id . '">Delete</button>'
                ];
            });

            // Return JSON response
            return response()->json([
                "draw" => intval($draw),
                "recordsTotal" => $totalRecords,
                "recordsFiltered" => $filteredRecords,
                'data' => $formattedCategories
            ]);
        }
    }   


    public function destroy($id)
    {
        $category = CategoryModel::findOrFail($id);

        // Delete associated image (if stored in the filesystem)
        if ($category->image) {
            if (file_exists(    public_path( $category->image))) {
                unlink(public_path( $category->image));
            }
        }

        $category->delete();

        return response()->json(['success' => 'Category deleted successfully.']);
    }

       
    private function saveCategory(Request $request, CategoryModel $category)
    {
        // print_r($category);exit;
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'parent_category' => 'nullable|exists:category,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'content' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], status: 422);
        }

        $category->name = $request->name;
        $category->status = $request->status;
        $category->parent_id = $request->parent_category ?? null;
        $category->content = $request->content;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = createSlug($request->name).'_'.time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'admin/img/category/' . $imageName;
    
            // Remove old image if exists
            if ($category->image && file_exists(public_path($category->image))) {
                unlink(public_path($category->image));
            }
    
            $image->move(public_path('admin/img/category'), $imageName);
            $category->image = $imagePath;
        }

        $category->save();

        return response()->json(['message' => 'Category saved successfully!']);
    }
}
