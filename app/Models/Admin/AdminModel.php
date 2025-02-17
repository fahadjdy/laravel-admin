<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class AdminModel extends Model
{
    // Specify the table name if it differs from the default "admin_models"
    protected $table = 'admin';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'slogan',
        'email_1',
        'email_2',
        'contact_1',
        'contact_2',
        'address_1',
        'address_2',
        'logo',
        'favicon',
        'watermark',
        'is_maintenance',
        'is_watermark',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'password',
    ];

}
