<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
