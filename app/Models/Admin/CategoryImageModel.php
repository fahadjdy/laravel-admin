<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CategoryImageModel extends Model
{
    use HasFactory;

    protected $table = 'category_images';

    protected $fillable = [
        'category_id',
        'image_path'
    ];

    // Relationship with Category Model
    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    

}
