<?php

if (!function_exists('timeAgo')) {
    function timeAgo($timestamp) {
        $diff = \Carbon\Carbon::parse($timestamp)->diff(\Carbon\Carbon::now());
        
        $months = $diff->m;
        $days = $diff->d;
        $hours = $diff->h;
        $minutes = $diff->i;

        $result = [];

        if ($months > 0) {
            $result[] = "{$months} month" . ($months > 1 ? 's' : '');
        }
        if ($days > 0) {
            $result[] = "{$days} day" . ($days > 1 ? 's' : '');
        }
        if ($hours > 0) {
            $result[] = "{$hours} hour" . ($hours > 1 ? 's' : '');
        }
        if ($minutes > 0) {
            $result[] = "{$minutes} minute" . ($minutes > 1 ? 's' : '');
        }

        return implode(', ', $result);
        // return implode(', ', array_slice($result, 0, 2));
    }
}

if (!function_exists('convertMesure')) {
    function convertMesure($value, $unit) {
        if (strtolower($unit) === 'feet') {
            return $value * 12; // Convert feet to inches
        } elseif (strtolower($unit) === 'inches') {
            return $value / 12; // Convert inches to feet
        }
        return null; // Return null if the unit is not recognized
    }
}


use Illuminate\Support\Facades\Storage;
if (!function_exists('downloadFile')) {
    function downloadFile($filePath, $fileName = null) {
        if (Storage::disk('public')->exists($filePath)) {
            return response()->download(Storage::disk('public')->path($filePath), $fileName);
        }
        return null;
    }
}



if (!function_exists('calculateAge')) {
    function calculateAge($dob) {
        return \Carbon\Carbon::parse($dob)->age;
    }
}


if (!function_exists('formatPhoneNumber')) {
    function formatPhoneNumber($phone, $countryCode = '+91') {
        return $countryCode . preg_replace('/[^0-9]/', '', $phone);
    }
}



use Illuminate\Support\Str;
if (!function_exists('generatePassword')) {
    function generatePassword($length = 8) {
        return Str::random($length);
    }
}


if (!function_exists('formatDate')) {
    function formatDate($date, $format = 'Y-m-d H:i:s') {
        return \Carbon\Carbon::parse($date)->format($format);
    }
}

if (!function_exists('getClientIp')) {
    function getClientIp() {
        return request()->ip();
    }
}

if (!function_exists('calculatePercentage')) {
    function calculatePercentage($total, $value) {
        return $total > 0 ? round(($value / $total) * 100, 2) : 0;
    }
}


if (!function_exists('formatCurrency')) {
    function formatCurrency($amount) {
        return '$' . number_format($amount, 2);
    }
}

if (!function_exists('uploadFile')) {
    function uploadFile($files) {

        $storedFiles = [];
        $files = is_array($files) ? $files : [$files];

        foreach ($files as $file) {
            $extension = $file->getClientOriginalExtension();
            $randomName = uniqid() . '_' . date('YmdHis') . '.' . $extension;

            $isAdmin = true;
            $folder = ($isAdmin) ? 'admin': 'user'; // set here folder location 

            $path = $file->storeAs($folder.'/uploads', $randomName); 
            $storedFiles[] = $path;
        }
        
        return $storedFiles;
    }
}

if (!function_exists('createSlug')) {
    function createSlug($string) {
        // Convert to lowercase
        $slug = strtolower($string);
        
        // Replace spaces with dashes
        $slug = str_replace(' ', '-', $slug);
        
        // Remove non-alphanumeric characters except dashes
        $slug = preg_replace('/[^a-z0-9-]/', '', $slug);
        
        // Replace multiple consecutive dashes with a single dash
        $slug = preg_replace('/-+/', '-', $slug);
        
        // Trim dashes from the beginning and end
        $slug = trim($slug, '-');
        
        return $slug;
    }
}


if (!function_exists('p')) {
    function p($data) {
        echo '<pre>';
        print_r($data);
        exit;
    }
}

