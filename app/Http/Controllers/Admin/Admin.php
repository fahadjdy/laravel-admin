<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Admin extends Controller
{

    public function login()
    {
        return view('admin.login');
    }
    public function logout()
    {
     
        session()->flush();
        return redirect('admin/login');
    }
    public function checkLogin()
    {
        // return view('admin.login');
    }
    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function profile()
    {
        return view('admin.profile');
    }

    public function tableData()
    {
        $data = [
            ['title' => 'Sample Title 1', 'description' => 'Sample Description 1', 'actions' => '<button class="btn btn-secondary">Edit</button> <button class="btn btn-danger">Delete</button>'],
            ['title' => 'Sample Title 2', 'description' => 'Sample Description 2', 'actions' => '<button class="btn btn-secondary">Edit</button> <button class="btn btn-danger">Delete</button>'],
            ['title' => 'Sample Title 3', 'description' => 'Sample Description 3', 'actions' => '<button class="btn btn-secondary">Edit</button> <button class="btn btn-danger">Delete</button>'],
        ];

        return response()->json([
            'data' => $data,
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
        ]);
    }
    
}
