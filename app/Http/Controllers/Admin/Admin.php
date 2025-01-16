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
        $canEdit = true; 
        $canDelete = true; 

        $data = [
            ['title' => 'Sample Title 1', 'description' => 'Sample Description 1', 'actions' => ($canEdit ? '<i class="fa fa-pen  btn-primary p-2 mr-2"></i>' : '') . ($canDelete ? '<i class="fa fa-trash  btn-danger p-2 mr-2"></i>' : '')],
            ['title' => 'Sample Title 2', 'description' => 'Sample Description 2', 'actions' => ($canEdit ? '<i class="fa fa-pen  btn-primary p-2 mr-2"></i>' : '') . ($canDelete ? '<i class="fa fa-trash  btn-danger p-2 mr-2"></i>' : '')],
            ['title' => 'Sample Title 3', 'description' => 'Sample Description 3', 'actions' => ($canEdit ? '<i class="fa fa-pen  btn-primary p-2 mr-2"></i>' : '') . ($canDelete ? '<i class="fa fa-trash  btn-danger p-2 mr-2"></i>' : '')],
        ];

        return response()->json([
            'data' => $data,
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
        ]);
    }
    
}
