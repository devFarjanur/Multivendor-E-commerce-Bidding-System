<?php

namespace App\Services\VendorService;

use App\Models\Category;
use Illuminate\Http\Request;
use Exception;

class VendorCategoryService
{
    public function categoryList()
    {
        return Category::with('vendor')
            ->where('status', 'approved')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function categoryStore(Request $request)
    {
        try {
            Category::create([
                'name' => $request->name,
                'image' => $request->image
            ]);
            $request->session()->flash('message', 'Category added successfully.');
            $request->session()->flash('alert-type', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to add category: " . $e->getMessage());
            $request->session()->flash('message', 'Failed to add category.');
            $request->session()->flash('alert-type', 'error');
            return false;
        }
    }

    public function findCategory($id)
    {
        return Category::where('vendor_id', $id)->findOrFail($id);
    }

    public function categoryUpdateStatus(Request $request, $id)
    {
        try {
            $category = $this->findCategory($id);
            $category->update([
                'status' => $request->status,
            ]);
            $request->session()->flash('message', 'Category status updated successfully.');
            $request->session()->flash('alert-type', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to update category status: " . $e->getMessage());
            $request->session()->flash('message', 'Failed to update category status.');
            $request->session()->flash('alert-type', 'error');
            return false;
        }
    }

    public function categoryUpdate(Request $request, $id)
    {
        try {
            $category = $this->findCategory($id);
            $category->update([
                'name' => $request->name,
                'image' => $request->image,
                'status' => $request->status,
            ]);
            $request->session()->flash('message', 'Category updated successfully.');
            $request->session()->flash('alert-type', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to update category: " . $e->getMessage());
            $request->session()->flash('message', 'Failed to update category.');
            $request->session()->flash('alert-type', 'error');
            return false;
        }
    }

    public function categoryDelete(Request $request, $id)
    {
        try {
            $category = $this->findCategory($id);
            $category->delete();
            $request->session()->flash('message', 'Category deleted successfully.');
            $request->session()->flash('alert-type', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to delete category: " . $e->getMessage());
            $request->session()->flash('message', 'Failed to delete category.');
            $request->session()->flash('alert-type', 'error');
            return false;
        }
    }
}
