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
        return Vendor::with('user')
            ->where('status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function vendorlist()
    {
        return Vendor::with('user')
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }


    public function vendorReject()
    {
        return Vendor::with('user')
            ->where('status', 'rejected')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function vendeorApprove($id)
    {
        try {
            $vendor = Vendor::where('user_id', $id)->find($id);
            $vendor->update([
                $vendor->status = 'approved',
            ]);
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to approve vendor: " . $e->getMessage());
            return false;
        }
    }

    public function rejectVendor($id)
    {
        try {
            $vendor = Vendor::where('user_id', $id)->firstOrFail();
            $vendor->update([
                'status' => 'rejected',
            ]);
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to reject vendor: " . $e->getMessage());
            return redirect()->back()->with('error', 'Failed to reject vendor.');
        }
    }
}
