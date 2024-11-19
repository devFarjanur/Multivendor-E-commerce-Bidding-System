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


    // try {
    //     $vendor = Vendor::find($vendorId);

    //     // Check if the vendor exists and is in 'pending' status
    //     if (!$vendor) {
    //         throw new Exception("Vendor not found.");
    //     }

    //     if ($vendor->status !== 'pending') {
    //         throw new Exception("Vendor status is not pending.");
    //     }

    //     // Approve the vendor by updating its status
    //     $vendor->status = 'approved';
    //     $vendor->save();

    //     return true;

    // } catch (Exception $e) {
    //     // Log the error or handle it accordingly
    //     // You can log the error or re-throw with a custom message
    //     \Log::error("Failed to approve vendor: " . $e->getMessage());
    //     return false;
    // }

}
