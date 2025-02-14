<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

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
}
