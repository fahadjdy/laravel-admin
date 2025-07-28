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
            'name'       => 'Fahad Jdy',
            'username'       => 'fahadjdy12@gmail.com',
            'slogan'     => 'Administrator',
            'email_1'    => 'fahadjdy12@gmail.com', 
            'email_2'    => null, 
            'contact_1'  => '7203070468', 
            'contact_2'  => null, 
            'about'  => '', 
            'address_1'  => 'Admin Address', 
            'address_2'  => null, 
            'password'   => bcrypt('Fahad123@'),
        ]);
    }
}
