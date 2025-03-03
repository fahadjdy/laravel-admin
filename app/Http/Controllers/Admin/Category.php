<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Brochure;
use Illuminate\Http\Request;
use App\Models\Admin\CategoryModel;
use App\Models\Admin\AdminModel;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin\CategoryImageModel;
use Cache;

class Category extends Controller
{

    public function index()
    {
        return view('admin.Category.category');
    }

    public function brochure($id = null)
    {
        if ($id) {
            $category[] = CategoryModel::with('parent:id,name')->find($id)->toArray();
        }else{
            $category = CategoryModel::with('parent:id,name')->get()->toArray();
        }
        
        if (empty($category)) {
            return redirect()->route('404');
        }
          
        $brochure = new Brochure();
        $brochure->downloadBrochure($category);

    }
    
    public function addOrEditCategory($id = null)
    {
        // Get parent categories for dropdown
        $categories = CategoryModel::all();
        
        $category = null; // Default to null for add
        
        // If ID is provided, fetch category details for editing
        if ($id) {
            $category = CategoryModel::findOrFail($id);
        }
        
        return view('admin.Category.addOrEditCategory', compact('categories', 'category'));
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
            $draw = $request->input('draw');
            $start = $request->input('start');  // Offset
            $length = $request->input('length'); // Number of records to fetch
            $searchValue = trim($request->input('search')['value']) ?? '';

            // Get order column index and order direction
            $orderColumnIndex = $request->input('order')[0]['column'] ?? 0;
            $orderDir = $request->input('order')[0]['dir'] ?? 'desc';

            // Define sortable columns mapping
            $columns = ['id', 'name', 'parent_id']; // Matches table columns
            $sortColumn = $columns[$orderColumnIndex] ?? 'id'; // Default to 'id'



            // Base query with search filter
            $query = CategoryModel::with('parent'); // Only top-level categories

            if (!empty($searchValue)) {
                $query->where('name', 'LIKE', "%{$searchValue}%");
            }

            // Get total records (before filtering)
            $totalRecords = CategoryModel::count();

            // Get filtered records count
            $filteredRecords = $query->count();

            // Apply sorting and pagination at the query level
            $topCategories = $query->orderBy($sortColumn, $orderDir)
                ->offset($start)
                ->limit($length)
                ->get();

            // Ensure unique and properly formatted data
            $flatCategories = collect($this->flattenCategories($topCategories))->unique('id')->values();

           
            // Format data for DataTable
            $formattedCategories = $flatCategories->map(function ($category) {

                $edit = '<a href="/admin/category/edit/' . $category->id . '" class="btn btn-sm btn-primary">Edit</a>';
                $brochure = '<a href="/admin/category/brochure/' . $category->id . '" > <i class="fa fa-file-pdf btn btn-sm btn-secondary mx-2"></i></a>';
                $delete = '<button class="btn btn-sm btn-danger delete-category" data-id="' . $category->id . '">Delete</button>';

                $action = $edit . $brochure . $delete;
                return [
                    'id' => $category->id,
                    'name' => $category->name,
                    'parent_name' => optional($category->parent)->name ?? 'None',
                    'status' => $category->status
                        ? '<span class="badge bg-success">Active</span>'
                        : '<span class="badge bg-danger">Inactive</span>',
                    'image' => $category->thumbnail
                        ? $category->thumbnail
                        : '',
                    'actions' => $action
                ];
            });

            $responseData = [
                "draw" => intval($draw),
                "recordsTotal" => $totalRecords,
                "recordsFiltered" => $filteredRecords,
                "data" => $formattedCategories
            ];
    
            return response()->json($responseData);    
        }
    }

    /**
     * Flatten category tree properly without duplicates.
     */
    private function flattenCategories($categories, $level = 0, &$flat = [])
    {
        foreach ($categories as $category) {
            if (!isset($flat[$category->id])) {
                $category->level = $level;
                $flat[$category->id] = $category;
            }

            if ($category->children && $category->children->count() > 0) {
                $this->flattenCategories($category->children, $level + 1, $flat);
            }
        }

        return array_values($flat);
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
    
        $category->delete();
    
        
        return response()->json(['success' => 'Category and its subcategories deleted successfully.']);
    }
           
    private function saveCategory(Request $request, CategoryModel $category)
    {
        // Validation rules
        $validator = CategoryModel::validate($request->all());    
        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], status: 422);
        }
    
        // Save category details
        $category->name = $request->name;
        $category->slug =  createSlug($request->name);
        $category->status = $request->status;
        $category->parent_id = $request->parent_category ?? null;
        $category->content = $request->content;
        $category->save();
    
        $firstImagePath = null;
    
        // Save watermark settings
        $is_watermark = AdminModel::value('is_watermark');
        $watermark = (AdminModel::value('name')) ? AdminModel::value('name') : 'Fahad Jdy';

        // Handle multiple image uploads
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $index => $image) {
                $imageName = createSlug($request->name) . '_' . time() . rand(1000, 9999) . '.' . $image->getClientOriginalExtension();
                $imagePath = public_path('admin/img/category/' . $imageName);
                $image->move(public_path('admin/img/category'), $imageName);

                // Apply watermark if enabled
                if ($is_watermark) {
                    applyTextWatermark($imagePath, $imagePath,$watermark, 15);
                }

                // Save image path in category_images table
                $savedImage = CategoryImageModel::create([
                    'category_id' => $category->id,
                    'image_path' => 'admin/img/category/' . $imageName
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

        // clear cache
        
        return response()->json(['message' => 'Category saved successfully!']);
    }
    
    
}
