<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

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
        'about',
        'address_1',
        'address_2',
        'logo',
        'favicon',
        'watermark',
        'about_image',
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

    public static function attempt($credentials)
    {
        $admin = self::where('username', $credentials['username'])->first();

        if ($admin && Hash::check($credentials['password'], $admin->password)) {
            session(['admin_id' => $admin->id, 'admin_username' => $admin->username , "is_admin" => true]);
            return true;
        }

        return false;
    }

}
