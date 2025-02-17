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

    public function saveProfileLogo(Request $request)
    {
        // Validate that an image file is uploaded
        $request->validate([
            'logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    
        $admin = AdminModel::find(1); // Assuming admin ID is 1
    
        if ($request->hasFile('logo')) {
            $file = $request->file('logo');
            $filename = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('admin/img/profile');
    
            // Ensure the directory exists
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
    
            // Check if an old profile image exists and delete it
            if ($admin->logo && file_exists(public_path($admin->logo))) {
                unlink(public_path($admin->logo));  // Remove the old image
            }
    
            // Move the new file to the destination
            $file->move($destinationPath, $filename);
    
            // Save the new image path in the database
            $admin->logo = "admin/img/profile/" . $filename;
            $admin->save();
    
            return response()->json(['success' => true, 'image' => asset("admin/img/profile/$filename")]);
        }
    
        return response()->json(['success' => false, 'message' => 'Image upload failed!']);
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
