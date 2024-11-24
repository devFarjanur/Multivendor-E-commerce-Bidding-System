<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;

class ImageService
{
    /**
     * Handle the admin image upload and update.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $oldPhoto
     * @return string|null
     */
    public function uploadImage(Request $request)
    {
        if ($request->hasFile('image')) {
            $photo = $request->file('image');
            $photoName = now()->format('YmdHi') . $photo->getClientOriginalName();
            $path = public_path('upload/admin_images');
            if (!File::exists($path)) {
                File::makeDirectory($path, 0775, true);
            }
            $photo->move($path, $photoName);
            return $photoName;
        }
        return null;
    }
}
