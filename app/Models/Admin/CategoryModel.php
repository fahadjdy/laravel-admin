<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Validator;

class CategoryModel extends Model
{
    use HasFactory;
    protected $table = 'category';

    protected $fillable = [
        'name',
        'slug',
        'status',
        'parent_id',
        'image',
        'content',
    ];

    /**
     * Get the parent category.
     */
    public function parent()
    {
        return $this->belongsTo(CategoryModel::class, 'parent_id');
    }

    /**
     * Get the child categories.
     */
    public function children()
    {
        return $this->hasMany(CategoryModel::class, 'parent_id');
    }

    public function images()
    {
        return $this->hasMany(CategoryImageModel::class, 'category_id');
    }

    public static function validate($data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:60',
            'status' => 'required|boolean',
            'parent_category' => 'nullable|exists:category,id',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:10048',
            'thumbnail' => 'nullable|string',
            'content' => 'nullable|string',
        ], [
            'name.required' => 'The category name is required.',
            'name.string' => 'The category name must be a valid string.',
            'name.max' => 'The category name must not exceed 60 characters.',

            'status.required' => 'The status field is required.',
            'status.boolean' => 'The status must be either true or false.',

            'parent_category.exists' => 'The selected parent category does not exist.',

            'images.*.image' => 'Each uploaded file must be an image.',
            'images.*.mimes' => 'Allowed image formats: jpeg, png, jpg, gif.',
            'images.*.max' => 'Each image must not exceed 10MB.',

            'thumbnail.string' => 'The thumbnail field must be a valid string.',

            'content.string' => 'The content must be a valid string.',
        ]);
    }

}
