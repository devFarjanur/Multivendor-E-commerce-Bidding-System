<?php

namespace App\Services\VendorService;
use App\Models\Product;
use App\Services\HelperService;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Exception;
use App\Providers\HelperServiceProvider;


class VendorProductService
{
    protected $imageService;
    protected $helperService;

    public function __construct(ImageService $imageService, HelperService $helperService)
    {
        $this->imageService = $imageService;
        $this->helperService = $helperService;
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

    public function findProductById($id)
    {
        return Product::with(['vendor', 'category', 'subcategory'])->findOrFail($id);
    }

    public function productStore(Request $request)
    {
        try {
            $imageName = $this->imageService->uploadImage($request);
            Product::create([
                'vendor_id' => $request->vendor_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $imageName,
            ]);
            $this->helperService->setFlashMessage($request, 'Product added successfully.', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to add product: " . $e->getMessage());
            $this->helperService->setFlashMessage($request, 'Failed to add product.', 'error');
            return false;
        }
    }

    public function updateProduct(Request $request, $id)
    {
        try {
            $imageName = $this->imageService->uploadImage($request);
            $product = $this->findProductById($id);
            $product->update([
                'vendor_id' => $request->vendor_id,
                'category_id' => $request->category_id,
                'subcategory_id' => $request->subcategory_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'image' => $imageName,
            ]);
            $this->helperService->setFlashMessage($request, 'Product updated successfully.', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to update product: " . $e->getMessage());
            $this->helperService->setFlashMessage($request, 'Failed to update product.', 'error');
            return false;
        }
    }

    public function updateProductStatus(Request $request, $id)
    {
        try {
            $product = $this->findProductById($id);
            $product->update([
                'status' => $request->status,
            ]);
            $this->helperService->setFlashMessage($request, 'Prodcut status updated successfully.', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to update prodcut status: " . $e->getMessage());
            $this->helperService->setFlashMessage($request, 'Failed to update prodcut status.', 'error');
            return false;
        }
    }

    public function deteteProduct($request, $id)
    {
        try {
            $product = $this->findProductById($id);
            $product->delete();
            $this->helperService->setFlashMessage($request, 'Product deleted successfully.', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to delete prodcut: " . $e->getMessage());
            $this->helperService->setFlashMessage($request, 'Failed to delete prodcut.', 'error');
            return false;
        }
    }
}
