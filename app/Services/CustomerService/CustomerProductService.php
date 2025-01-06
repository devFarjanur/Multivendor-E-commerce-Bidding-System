<?php

namespace App\Services\CustomerService;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Services\HelperService;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Pagination\Paginator;

class CustomerProductService
{
    protected $helperService;
    protected $imageService;

    public function __construct(HelperService $helperService, ImageService $imageService)
    {
        $this->helperService = $helperService;
        $this->imageService = $imageService;
    }

    public function getActiveProducts()
    {
        return Product::with(['vendor', 'category', 'subcategory'])
            ->where('status', 'active')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function getActiveProductById($id)
    {
        return Product::with(['vendor', 'category', 'subcategory'])
            ->where('id', $id)
            ->where('status', 'active')
            ->firstOrFail();
    }


    public function trycatch($request)
    {
        try {
            $this->helperService->setFlashMessage($request, 'successfully.', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to: " . $e->getMessage());
            $this->helperService->setFlashMessage($request, 'Failed to.', 'error');
            return false;
        }
    }
}
