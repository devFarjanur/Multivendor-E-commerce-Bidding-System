<?php

namespace App\Services\CustomerService;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Pagination\Paginator;

class CustomerProductService
{
    protected $imageService;

    public function __construct(ImageService $imageService)
    {
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

            $request->session()->flash('message', 'successfully.');
            $request->session()->flash('alert-type', 'success');
            return true;
        } catch (Exception $e) {
            \Log::error("Failed to: " . $e->getMessage());
            $request->session()->flash('message', 'Failed to.');
            $request->session()->flash('alert-type', 'error');
            return false;
        }
    }
}
