<?php
namespace App\Helpers;

class Helper
{
    public static function ImageExtension($ext)
    {
        $image_allowed = ['jpg', 'jpeg', 'png', 'webp'];
        if (!in_array($ext, $image_allowed)) {
            return 'Allowed Only ' . implode(',', $image_allowed);
        }
        return true;
    }

    public static function IcoExtension($ext)
    {
        $image_allowed = ['png'];
        if (!in_array($ext, $image_allowed)) {
            return 'Allowed Only ' . implode(',', $image_allowed);
        }
        return true;
    }
}