<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\Validator;

class SocialMediaModel extends Model
{
    use HasFactory;

    protected $table = 'social_media'; 

    protected $fillable = [
        'icon',   
        'name',   
        'link',  
        'is_active'
    ];

    public $timestamps = true; 

    public static function validate($data)
    {
        return Validator::make($data, [
            'icon' => 'required|string|max:50',
            'name' => 'required|string|max:50',
        ], [
            'icon.required' => 'The icon name field is required.',
            'icon.string' => 'The icon name must be a valid string.',
            'icon.max' => 'The icon name must not exceed 50 characters.',

            'name.required' => 'The name field is required.',
            'name.string' => 'The name must be a valid string.',
            'name.max' => 'The name must not exceed 50 characters.',
        ]);
    }
}
