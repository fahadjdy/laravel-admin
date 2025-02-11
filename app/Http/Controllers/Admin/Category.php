<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\CategoryModel;
use Illuminate\Support\Facades\Validator;

class Category extends Controller
{
    public function create()
    {
        $category = CategoryModel::whereNull('parent_id')->get();
        return view('admin/addOrEditCategory', compact('category'));
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
            $categories = CategoryModel::with('parent')->get();

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

            return response()->json(['data' => $formattedCategories]);
        }
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
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $imagePath = 'admin/img/category/' . $imageName;
    
            $image->move(public_path('admin/img/category'), $imageName);
            $category->image = $imagePath;
        }

        $category->save();

        return response()->json(['message' => 'Category saved successfully!']);
    }
}
