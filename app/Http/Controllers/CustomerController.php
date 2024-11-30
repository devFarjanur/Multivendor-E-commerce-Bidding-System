<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\CustomerService\CustomerCategoryService;
use App\Services\CustomerService\CustomerProductService;
use App\Services\HelperService;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    protected $helperService;
    protected $customerCategoryService;
    protected $customerProductService;
    public function __construct(HelperService $helperService, CustomerCategoryService $customerCategoryService, CustomerProductService $customerProductService)
    {
        $this->helperService = $helperService;
        $this->customerCategoryService = $customerCategoryService;
        $this->customerProductService = $customerProductService;
    }

    public function customerProductList()
    {
        $categories = $this->customerCategoryService->getActiveCategories();
        $subcategories = $this->customerCategoryService->getActiveSubcategoriesWithRelations();
        $products = $this->customerProductService->getActiveProducts();
        return view('customer.product.product-list', compact('categories', 'subcategories', 'products'));
    }

    public function customerOrderList()
    {
        return view('customer.product.order-list');
    }
}
