<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

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

    public function edit()
    {
        // $profile = Profile::firstOrCreate(['id' => 1]); // Assuming a single profile
        // return view('admin.profile', compact('profile'));
    }

    public function update(Request $request)
    {
        // $request->validate([
        //     'logo' => 'nullable|image',
        //     'favicon' => 'nullable|image',
        //     'name' => 'required|string|max:255',
        //     'slogan' => 'nullable|string|max:255',
        //     'email' => 'required|email|max:255',
        //     'about_content' => 'nullable|string',
        //     'about_image' => 'nullable|image',
        // ]);

        // $profile = Profile::firstOrCreate(['id' => 1]);

        // // Update profile fields
        // $profile->name = $request->name;
        // $profile->slogan = $request->slogan;
        // $profile->email = $request->email;
        // $profile->about_content = $request->about_content;
        // $profile->watermark_images = $request->has('watermark_images');
        // $profile->feature_x = $request->has('feature_x');

        // // Handle file uploads
        // if ($request->hasFile('logo')) {
        //     $profile->logo = $request->file('logo')->store('logos', 'public');
        // }
        // if ($request->hasFile('favicon')) {
        //     $profile->favicon = $request->file('favicon')->store('favicons', 'public');
        // }
        // if ($request->hasFile('about_image')) {
        //     $profile->about_image = $request->file('about_image')->store('about_images', 'public');
        // }

        // $profile->save();

        // return redirect()->back()->with('success', 'Profile updated successfully!');
    }

    public function changePassword(Request $request)
    {
        // $request->validate([
        //     'current_password' => 'required',
        //     'new_password' => 'required|min:8|confirmed',
        // ]);

        // if (!Hash::check($request->current_password, Auth::user()->password)) {
        //     return back()->withErrors(['current_password' => 'Current password does not match.']);
        // }

        // Auth::user()->update(['password' => Hash::make($request->new_password)]);
        // return redirect()->back()->with('success', 'Password updated successfully!');
    }


    public function dashboard()
    {
        return view('admin.dashboard');
    }
    public function profile()
    {
        $data['profile'] = [
            'logo' => 'logo.jpg',
            'favicon' => 'logo.jpg',
            'name' => 'Name',
            'slogan' => 'slogan',
            'email' => 'email',
            'about_content' => 'about_content',
            'about_image' => 'about_image',
            'watermark_images' => 'watermark_images',
            'feature_x' => '',
        ];        

        return view('admin.profile',$data);
    }
    public function category()
    {
        return view('admin.category');
    }

    public function tableData()
    {
        $canEdit = true; 
        $canDelete = true; 

        $data = [
            ['title' => 'Sample Title 1', 'description' => 'Sample Description 1', 'actions' => ($canEdit ? ' <a href="'.url('/admin/category/edit/1').'"><i class="fa fa-pen  btn-primary p-2 mx-1"></i></a>' : '') . ($canDelete ? '<i class="fa fa-trash  btn-danger p-2 mx-1"></i>' : '')],
            ['title' => 'Sample Title 2', 'description' => 'Sample Description 2', 'actions' => ($canEdit ? '<i class="fa fa-pen  btn-primary p-2 mx-1"></i>' : '') . ($canDelete ? '<i class="fa fa-trash  btn-danger p-2 mx-1"></i>' : '')],
            ['title' => 'Sample Title 3', 'description' => 'Sample Description 3', 'actions' => ($canEdit ? '<i class="fa fa-pen  btn-primary p-2 mx-1"></i>' : '') . ($canDelete ? '<i class="fa fa-trash  btn-danger p-2 mx-1"></i>' : '')],
            ['title' => 'Sample Title 3', 'description' => 'Sample Description 3', 'actions' => ($canEdit ? '<i class="fa fa-pen  btn-primary p-2 mx-1"></i>' : '') . ($canDelete ? '<i class="fa fa-trash  btn-danger p-2 mx-1"></i>' : '')],
            ['title' => 'Sample Title 3', 'description' => 'Sample Description 3', 'actions' => ($canEdit ? '<i class="fa fa-pen  btn-primary p-2 mx-1"></i>' : '') . ($canDelete ? '<i class="fa fa-trash  btn-danger p-2 mx-1"></i>' : '')],
            ['title' => 'Sample Title 3', 'description' => 'Sample Description 3', 'actions' => ($canEdit ? '<i class="fa fa-pen  btn-primary p-2 mx-1"></i>' : '') . ($canDelete ? '<i class="fa fa-trash  btn-danger p-2 mx-1"></i>' : '')],
            ['title' => 'Sample Title 3', 'description' => 'Sample Description 3', 'actions' => ($canEdit ? '<i class="fa fa-pen  btn-primary p-2 mx-1"></i>' : '') . ($canDelete ? '<i class="fa fa-trash  btn-danger p-2 mx-1"></i>' : '')],
            ];

        return response()->json([
            'data' => $data,
            'recordsTotal' => count($data),
            'recordsFiltered' => count($data),
        ]);
    }
    
}
