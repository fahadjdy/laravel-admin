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

/**
 * Applies a watermark to an image using the GD Library with adjustable opacity.
 *
 * @param string $sourcePath   Path to the source image.
 * @param string $watermarkPath  Path to the watermark image.
 * @param string $savePath     Path to save the watermarked image.
 * @param string $position     Position of the watermark (default 'bottom-right').
 * @param int $xOffset         Horizontal offset (in pixels) from the position (default 10).
 * @param int $yOffset         Vertical offset (in pixels) from the position (default 10).
 * @param int $opacity         Opacity for the watermark (0-100, default 50).
 *
 * @return bool Returns true on success or false on failure.
 */
function applyWatermark($sourcePath, $watermarkPath, $savePath, $position = 'bottom-right', $xOffset = 10, $yOffset = 10, $opacity = 75)
{
    // Get source image info and create image instance
    $sourceInfo = getimagesize($sourcePath);
    if (!$sourceInfo) return false;

    $sourceMime = $sourceInfo['mime'];
    switch ($sourceMime) {
        case 'image/jpeg': 
            $sourceImage = imagecreatefromjpeg($sourcePath); 
            break;
        case 'image/png': 
            $sourceImage = imagecreatefrompng($sourcePath); 
            break;
        case 'image/gif': 
            $sourceImage = imagecreatefromgif($sourcePath); 
            break;
        default: 
            return false;
    }

    // Get watermark image info and create watermark instance
    $watermarkInfo = getimagesize($watermarkPath);
    if (!$watermarkInfo) return false;

    switch ($watermarkInfo['mime']) {
        case 'image/jpeg': 
            $watermarkImage = imagecreatefromjpeg($watermarkPath); 
            break;
        case 'image/png': 
            $watermarkImage = imagecreatefrompng($watermarkPath); 
            break;
        case 'image/gif': 
            $watermarkImage = imagecreatefromgif($watermarkPath); 
            break;
        default: 
            return false;
    }

    // Get dimensions for positioning
    $sourceWidth = imagesx($sourceImage);
    $sourceHeight = imagesy($sourceImage);
    $watermarkWidth = imagesx($watermarkImage);
    $watermarkHeight = imagesy($watermarkImage);

    // Calculate destination coordinates based on desired position
    switch ($position) {
        case 'top-left': 
            $destX = $xOffset; 
            $destY = $yOffset; 
            break;
        case 'top-right': 
            $destX = $sourceWidth - $watermarkWidth - $xOffset; 
            $destY = $yOffset; 
            break;
        case 'bottom-left': 
            $destX = $xOffset; 
            $destY = $sourceHeight - $watermarkHeight - $yOffset; 
            break;
        case 'center': 
            $destX = ($sourceWidth - $watermarkWidth) / 2; 
            $destY = ($sourceHeight - $watermarkHeight) / 2; 
            break;
        case 'bottom-right':
        default: 
            $destX = $sourceWidth - $watermarkWidth - $xOffset; 
            $destY = $sourceHeight - $watermarkHeight - $yOffset; 
            break;
    }

    // Merge the watermark with the source image using imagecopymerge.
    // Note: imagecopymerge() works best with truecolor images.
    imagecopymerge(
        $sourceImage,    // Destination image
        $watermarkImage, // Source watermark image
        $destX,          // Destination X
        $destY,          // Destination Y
        0,               // Source X
        0,               // Source Y
        $watermarkWidth, // Source width
        $watermarkHeight,// Source height
        $opacity         // Opacity percentage (0 = transparent, 100 = opaque)
    );

    // Save the image in the original format
    $saved = false;
    switch ($sourceMime) {
        case 'image/jpeg': 
            $saved = imagejpeg($sourceImage, $savePath, 90); 
            break;
        case 'image/png': 
            $saved = imagepng($sourceImage, $savePath, 6); 
            break;
        case 'image/gif': 
            $saved = imagegif($sourceImage, $savePath); 
            break;
    }

    // Clean up
    imagedestroy($sourceImage);
    imagedestroy($watermarkImage);

    return $saved;
}
