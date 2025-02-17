<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin\AdminModel;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AdminModel::create([
            'name'       => 'admin',
            'slogan'     => 'Administrator', // Optional slogan
            'email_1'    => 'admin@example.com', // Provide a unique email
            'email_2'    => null, // Optional
            'contact_1'  => '1234567890', // Dummy contact number
            'contact_2'  => null, // Optional
            'address_1'  => 'Admin Address', // Dummy address
            'address_2'  => null, // Optional
            'password'   => bcrypt('admin123@'),
        ]);
    }
}
