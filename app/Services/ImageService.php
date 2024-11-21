<?php

namespace App\Services;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            $photo->storeAs('public/admin_images', $photoName);

            return $photoName;
        }
        return null;
    }

}
