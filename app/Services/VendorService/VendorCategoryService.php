<?php

namespace App\Services\VendorService;

use App\Models\Category;
use App\Models\Subcategory;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Exception;

class VendorCategoryService
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
        $this->imageService = $imageService;
    }
    public function categoryList()
    {
        return Category::orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function categoryListWithActiveStatus()
    {
        return Category::where('status', 'active')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }

    public function findCategory($id)
    {
        return Category::where('status', 'active')->findOrFail($id);
    }

    public function subcategoryList()
    {
        return Subcategory::with('vendor', 'category')
            ->orderBy('create_at', 'desc')
            ->paginate(10);
    }

    public function subcategoryListWithActiveStatus()
    {
        return Subcategory::with('vendor', 'category')
        ->where('status', 'active')
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }

    public function subcategoryFind($id)
    {
        return Subcategory::findOrFail($id);
    }

    public function subcategoryStore(Request $request)
    {
        try {
            $imageName = $this->imageService->uploadImage($request);
            Subcategory::create([
                'vendor_id' => auth()->user()->id,
                'category_id' => $request->category->id,
                'name' => $request->name,
                'image' => $imageName,
            ]);
            $request->session()->flash('message', 'Subcategory added successfully.');
            $request->session()->flash('alert-type', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to add subcategory: " . $e->getMessage());
            $request->session()->flash('message', 'Failed to add subcategory.');
            $request->session()->flash('alert-type', 'error');
            return false;
        }
    }

    public function subcategoryUpdate(Request $request, $id)
    {
        try {
            $subcategory = $this->subcategoryFind($id);
            $imageName = $this->imageService->uploadImage($request);
            $subcategory->update([
                'category_id' => $request->category->id,
                'name' => $request->name,
                'image' => $imageName,
            ]);
            $request->session()->flash('message', 'Subcategory updated successfully.');
            $request->session()->flash('alert-type', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to updated subcategory: " . $e->getMessage());
            $request->session()->flash('message', 'Failed to updated subcategory.');
            $request->session()->flash('alert-type', 'error');
            return false;
        }

    }

    public function subcategoryUpdateStatus(Request $request, $id)
    {
        try {
            $subcategory = $this->subcategoryFind($id);
            $subcategory->update([
                'status' => $request->status,
            ]);
            $request->session()->flash('message', 'Subcategory status updated successfully.');
            $request->session()->flash('alert-type', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to update subcategory status.: " . $e->getMessage());
            $request->session()->flash('message', 'Failed to update subcategory status.');
            $request->session()->flash('alert-type', 'error');
            return false;
        }
    }

    public function subcategoryDelete(Request $request, $id)
    {
        try {
            $subcategory = $this->subcategoryFind($id);
            $subcategory->delete();
            $request->session()->flash('message', 'Subcategory deleted successfully.');
            $request->session()->flash('alert-type', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to delete subcategory: " . $e->getMessage());
            $request->session()->flash('message', 'Failed to delete subcategory.');
            $request->session()->flash('alert-type', 'error');
            return false;
        }
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
