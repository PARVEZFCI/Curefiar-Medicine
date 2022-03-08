<?php

namespace App\Traits;

use App\Helpers\Helper;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

trait ImageUpload
{
    public function imageStore($image)
    {
        if ($image) {
            $extension = $request->image->getClientOriginalExtension();
            $name = "medi".'_'.time(). '.' .$extension;
            $result = Helper::ImageExtension($extension);
            if ($result == true) {
               $image->storeAs('public/uploads/medicines', $name);
               return $name;
            }
        }
    }

    // public function imageStore($uploadPath, $imageName)
    // {
    //     if ($imageName) {
    //         $position = strpos($imageName, ";");
    //         $sub_str = substr($imageName, 0, $position);
    //         $extension = explode("/", $sub_str);

    //         $result = Helper::ImageExtension($extension[1]);
    //         if ($result == 'Allowed') {
    //             $imageFile = Image::make($imageName)->save($uploadPath);
    //             return $uploadPath;
    //         }
    //     }
    // }

    // public function imageUpdate($uploadPath, $imageName, $oldImage)
    // {
    //     if ($imageName) {
    //         if (File::exists($oldImage)) {
    //             File::delete($oldImage);
    //         }
    //         $position = strpos($imageName, ";");
    //         $sub_str = substr($imageName, 0, $position);
    //         $extension = explode("/", $sub_str);

    //         $result = Helper::ImageExtension($extension[1]);
    //         if ($result == 'Allowed') {
    //             $upload_path = $uploadPath . time() . ".webp";
    //             $imageFile = Image::make($imageName)->save($upload_path);
    //             return $upload_path;
    //         }
    //     }
    }
}