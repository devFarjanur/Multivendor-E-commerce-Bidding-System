<?php

namespace App\Services\VendorService;
use App\Models\Product;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Pagination\Paginator;

class VendorProductService
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
   
    public function productList()
    {
        return Product::with('vendor', 'category', 'subcategory')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }

    public function productListWithAcitveStatus()
    {
        return Product::with('vendor', 'category', 'subcategory')
        ->where('status', 'active')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }

    public function productListWithInactiveStatus()
    {
        return Product::with('vednor', 'category', 'subcategory')
        ->where('status', 'inactive')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }

    // public function categoryStore(Request $request)
    // {
    //     try {
    //         $imageName = $this->imageService->uploadImage($request);
    //         Category::create([
    //             'vendor_id' => auth()->user()->id, 
    //             'name' => $request->name,
    //             'image' => $imageName,
    //             'status' => 'active',
    //         ]);
    //         $request->session()->flash('message', 'Category added successfully.');
    //         $request->session()->flash('alert-type', 'success');
    //         return true;
    //     } catch (Exception $e) {
    //         \Log::error("Failed to add category: " . $e->getMessage());
    //         $request->session()->flash('message', 'Failed to add category.');
    //         $request->session()->flash('alert-type', 'error');
    //         return false;
    //     }
    // }

    // public function categoryUpdateStatus(Request $request, $id)
    // {
    //     try {
    //         $category = $this->findCategory($id);
    //         $category->update([
    //             'status' => $request->status,
    //         ]);
    //         $request->session()->flash('message', 'Category status updated successfully.');
    //         $request->session()->flash('alert-type', 'success');
    //         return true;
    //     } catch (Exception $e) {
    //         \Log::error("Failed to update category status: " . $e->getMessage());
    //         $request->session()->flash('message', 'Failed to update category status.');
    //         $request->session()->flash('alert-type', 'error');
    //         return false;
    //     }
    // }

    // public function categoryUpdate(Request $request, $id)
    // {
    //     try {
    //         $category = $this->findCategory($id);
    //         $photoName = $this->imageService->uploadImage($request);
    //         $category->update([
    //             'name' => $request->name,
    //             'image' => $photoName
    //         ]);
    //         $request->session()->flash('message', 'Category updated successfully.');
    //         $request->session()->flash('alert-type', 'success');
    //         return true;
    //     } catch (Exception $e) {
    //         \Log::error("Failed to update category: " . $e->getMessage());
    //         $request->session()->flash('message', 'Failed to update category.');
    //         $request->session()->flash('alert-type', 'error');
    //         return false;
    //     }
    // }

    // public function categoryDelete($request, $id)
    // {
    //     try {
    //         $category = $this->findCategory($id);
    //         $category->delete();
    //         $request->session()->flash('message', 'Category deleted successfully.');
    //         $request->session()->flash('alert-type', 'success');
    //         return true;
    //     } catch (Exception $e) {
    //         \Log::error("Failed to delete category: " . $e->getMessage());
    //         $request->session()->flash('message', 'Failed to delete category.');
    //         $request->session()->flash('alert-type', 'error');
    //         return false;
    //     }
    // }
}