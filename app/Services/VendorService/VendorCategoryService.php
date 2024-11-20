<?php

namespace App\Services\VendorService;

use App\Models\Category;
use App\Models\Vendor;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VendorCategoryService
{
    public function CategoryList()
    {
        return Category::with('vendor')
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    // $vendorUser = User::create([
    //     'name' => $request->name,
    //     'email' => $request->email,
    //     'phone' => $request->phone,
    //     'password' => Hash::make($request->password),
    //     'role' => 'vendor',
    // ]);

    public function CategoryStore(Request $request)
    {
        try {
            Category::create([
                'name' => $request->name,
                'image' => $request->image
            ]);
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to store category: " . $e->getMessage());
            $request->session()->flash('message', 'Failed to store category.');
            $request->session()->flash('alert-type', 'error');
            return false;
        }
    }

    public function CategoryStatus(Request $request, $id)
    {
        try {
            $category = Category::where('vendor_id', $id)->find($id);
            $category->update([
                'status' => $request->status,
            ]);
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to update category status: " . $e->getMessage());
            $request->session()->flash('message', 'Failed to update category status.');
            $request->session()->flash('alert-type', 'error');
            return false;
        }
    }

    public function CategoryUpdate(Request $request, $id)
    {
        try {
            $category = Category::where('vendor_id', $id)->find($id);
            $category->update([
                'name' => $request->name,
                'image' => $request->image,
                'status' => $request->status,
            ]);
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to update category: " . $e->getMessage());
            $request->session()->flash('message', 'Failed to update category.');
            $request->session()->flash('alert-type', 'error');
            return redirect()->back();
        }
    }

    public function categoryDelete(Request $request, $id)
    {
        try {
            $category = Category::where('vendor_id', $id)->findOrFail($id);
            $category->delete();
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to delete category: " . $e->getMessage());
            $request->session()->flash('message', 'Failed to delete category.');
            $request->session()->flash('alert-type', 'error');
            return redirect()->back();
        }
    }
}
