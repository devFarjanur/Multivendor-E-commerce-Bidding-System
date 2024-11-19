<?php

namespace App\Services\Admin;

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
    public function uploadImage(Request $request, $oldPhoto = null)
    {
        if ($request->hasFile('photo')) {
            if ($oldPhoto && Storage::exists('public/upload/admin_images/' . $oldPhoto)) {
                Storage::delete('public/upload/admin_images/' . $oldPhoto);
            }
            $file = $request->file('photo');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->storeAs('public/upload/admin_images', $filename);
            return $filename;
        }
        return null;
    }
}
