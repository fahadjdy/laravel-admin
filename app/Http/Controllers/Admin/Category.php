<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CategoryModel;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\CategoryImageModel;

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
                    'image' => $category->thumbnail,
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

    public function deleteCategoryImage($id)
    {
        $image = CategoryImageModel::find($id);
        
        if (!$image) {
            return response()->json(['error' => 'Image not found!'], 404);
        }

        // Delete file from storage
        if (file_exists(public_path($image->image_path))) {
            unlink(public_path($image->image_path));
        }

        // Delete record from DB
        $image->delete();

        return response()->json(['message' => 'Image deleted successfully!']);
    }

    public function destroy($id)
    {
        $category = CategoryModel::findOrFail($id);
    
        // Delete all associated images from category_images table and filesystem
        $categoryImages = CategoryImageModel::where('category_id', $category->id)->get();
        foreach ($categoryImages as $image) {
            if (file_exists(public_path($image->image_path))) {
                unlink(public_path($image->image_path));
            }
            $image->delete();
        }
    
        // Delete the category's main thumbnail image if it exists
        if ($category->thumbnail && file_exists(public_path($category->thumbnail))) {
            unlink(public_path($category->thumbnail));
        }

        // Recursively delete all subcategories and their images
        $subcategories = CategoryModel::where('parent_id', $category->id)->get();
        foreach ($subcategories as $subcategory) {
            $this->destroy($subcategory->id); // Recursively call destroy
        }
    
    
        // Finally, delete the category itself
        $category->delete();
    
        return response()->json(['success' => 'Category and its subcategories deleted successfully.']);
    }
    

       
    private function saveCategory(Request $request, CategoryModel $category)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'status' => 'required|boolean',
            'parent_category' => 'nullable|exists:category,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'thumbnail' => 'nullable|string', // Thumbnail will be selected from uploaded images
            'content' => 'nullable|string',
        ]);
    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], status: 422);
        }
    
        // Save category details
        $category->name = $request->name;
        $category->status = $request->status;
        $category->parent_id = $request->parent_category ?? null;
        $category->content = $request->content;
        $category->save();
    
        $firstImagePath = null;
    
        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imageName = createSlug($request->name) . '_' . time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                $imagePath = 'admin/img/category/' . $imageName;
                $image->move(public_path('admin/img/category'), $imageName);
    
                // Save image path in category_images table
                $savedImage = CategoryImageModel::create([
                    'category_id' => $category->id,
                    'image_path' => $imagePath
                ]);
    
                // Store the first uploaded image path for thumbnail (if not set)
                if ($index === 0) {
                    $firstImagePath = $savedImage->image_path;
                }
            }
        }
    
        // If no thumbnail was selected, set the first uploaded image as default
        if (!$request->thumbnail && $firstImagePath) {
            $category->thumbnail = $firstImagePath;
            $category->save();
        } elseif ($request->thumbnail) {
            $category->thumbnail = $request->thumbnail;
            $category->save();
        }
    
        return response()->json(['message' => 'Category saved successfully!']);
    }
    
    
}
