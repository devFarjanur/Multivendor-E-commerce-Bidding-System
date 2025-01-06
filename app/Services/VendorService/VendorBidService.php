<?php

namespace App\Services\VendorService;
use App\Models\BidRequest;
use App\Models\Product;
use App\Services\AdminService\AdminVendorService;
use App\Services\CustomerService\CustomerCategoryService;
use App\Services\CustomerService\CustomerProductService;
use App\Services\HelperService;
use App\Services\ImageService;
use Illuminate\Http\Request;
use Exception;
use App\Providers\HelperServiceProvider;


class VendorBidService
{
    protected $helperService;
    protected $imageService;
    protected $customerCategoryService;
    protected $customerProductService;
    protected $vendorCategoryService;
    protected $vendorProductService;
    protected $adminVendorService;

    public function __construct(
        HelperService $helperService,
        ImageService $imageService,
        CustomerCategoryService $customerCategoryService,
        CustomerProductService $customerProductService,
        VendorCategoryService $vendorCategoryService,
        VendorProductService $vendorProductService,
        AdminVendorService $adminVendorService,
    ) {
        $this->helperService = $helperService;
        $this->imageService = $imageService;
        $this->customerCategoryService = $customerCategoryService;
        $this->customerProductService = $customerProductService;
        $this->vendorCategoryService = $vendorCategoryService;
        $this->vendorProductService = $vendorProductService;
        $this->adminVendorService = $adminVendorService;
    }

    public function bidRequest()
    {
        return BidRequest::with(['customer', 'product', 'vendor'])
            ->where('bid_status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function bidList()
    {
        return BidRequest::with(['customer', 'product', 'vendor'])
        ->whereIn('bid_status', ['accepted', 'rejected'])
        ->orderBy('created_at', 'desc')
        ->paginate(10);
    }
}
