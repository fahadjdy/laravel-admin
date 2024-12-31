<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\NotificationService; // Fixed the namespace to match the correct location

class Notification extends Controller
{

    public static function sendNotification($data,$channels = '')
    {
            $channels = (array) $channels; 
            
            foreach ($channels as $channel) {
                $notification = NotificationService::make($channel);
                $notification->send($data);
            }
    }
}
