<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin\AdminModel;

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
        $profile = AdminModel::find(1);
        return view('admin.profile',compact('profile'));
    }

    public function saveBioData(Request $request)
    {
        // Validate Data
        $request->validate([
            'bio-name' => 'required|string|max:255',
            'bio-email-1' => 'required|email',
            'bio-contact-1' => 'required|numeric',
            'bio-address-1' => 'required|string',
        ]);
        
        // Save or update profile
        $profile = AdminModel::updateOrCreate(
            ['id'    => $request->input('bio-id')  ],
            [
                
                'name' => $request->input('bio-name'),
                'slogan' => $request->input('bio-slogan'),
                'email_1' => $request->input('bio-email-1'),
                'email_2' => $request->input('bio-email-2'),
                'contact_1' => $request->input('bio-contact-1'),
                'contact_2' => $request->input('bio-contact-2'),
                'address_1' => $request->input('bio-address-1'),
                'address_2' => $request->input('bio-address-2'),
            ]
        );

        return response()->json(['success' => true, 'message' => 'Profile updated successfully!']);
    }

    public function category()
    {
        return view('admin.category');
    }
    
}
