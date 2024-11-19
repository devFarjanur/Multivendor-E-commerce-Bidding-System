<?php

namespace App\Services\AdminService;

use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminVendorService
{
    public function vendorRequest()
    {
        return Vendor::with('user')->where('status', 'pending')->get();
    }

    public function vendeorApprove($id)
    {
        try{
            $vendor = Vendor::where('user_id', $id)->find($id);
            $vendor->update([
                $vendor->status = 'approved',
            ]);
        } catch (Exception $e) {
            \Log::error("Failed to approve vendor: " . $e->getMessage());
            return false;
        }
    }

    public function vendorlist()
    {
        return Vendor::with('user')->where('status', 'approved')->get();
    }
}
