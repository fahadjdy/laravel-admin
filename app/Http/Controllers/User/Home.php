<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Controllers\Notification;

class Home extends Controller
{
    public function index()
    {   
        return view('user.index');
    }
    

    // public function test_send_notification(){

    //     $channels = ['sms', 'email']; 
    //     $data = [
    //         'phone' => '1234567890',
    //         'message' => 'Hello! This is a test SMS.',
    //         'email' => 'example@example.com',
    //         'subject' => 'Test Email',
    //     ];
    //     Notification::sendNotification($data); // here default chennel EmailNotifications
    //     Notification::sendNotification($data,$channels);

    // }
}
