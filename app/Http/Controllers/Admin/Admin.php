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
    public function saveImage(Request $request, $type)
    {
        $validTypes = [
            'logo' => ['jpeg', 'png', 'jpg', 'gif'],
            'favicon' => ['ico', 'png', 'svg'],
            'about_image' => ['jpeg', 'png', 'webp']
        ];
    
        if (!isset($validTypes[$type])) {
            return response()->json(['success' => false, 'message' => 'Invalid image type!']);
        }
    
        $request->validate([
            $type => 'required|image|mimes:' . implode(',', $validTypes[$type]) . '|max:10048',
        ]);
    
        $admin = AdminModel::find(1);
    
        if ($request->hasFile($type)) {
            $file = $request->file($type);
            $filename = $type . '_' . time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
            $destinationPath = public_path('admin/img/profile');
    
            if (!file_exists($destinationPath)) {
                mkdir($destinationPath, 0777, true);
            }
    
            if ($admin->$type && file_exists(public_path($admin->$type))) {
                unlink(public_path($admin->$type));
            }
    
            $file->move($destinationPath, $filename);
    
            $admin->$type = "admin/img/profile/" . $filename;
            $admin->save();
    
            return response()->json(['success' => true, 'image' => asset("admin/img/profile/$filename")]);
        }
    
        return response()->json(['success' => false, 'message' => ucfirst(str_replace('_', ' ', $type)) . ' upload failed!']);
    }
    



    public function saveSiteDetails(Request $request)
    {
        try {
            $profile = AdminModel::findOrFail($request->id);
            $profile->is_watermark = $request->has('is_watermark');
            $profile->is_maintenance = $request->has('is_maintenance');
            $profile->save();
            return response()->json(['success' => true, 'message' => 'Profile updated successfully.']);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['success' => false, 'message' => 'Profile not found.'], 404);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'An error occurred while updating the profile.'], 500);
        }
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
                'about' => $request->input('bio-about'),
                'address_1' => $request->input('bio-address-1'),
                'address_2' => $request->input('bio-address-2'),
            ]
        );

        return response()->json(['success' => true, 'message' => 'Profile updated successfully!']);
    }

   
    
}
