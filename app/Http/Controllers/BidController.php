<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Services\AdminService\AdminVendorService;
use App\Services\CustomerService\CustomerBidService;
use App\Services\CustomerService\CustomerCategoryService;
use App\Services\CustomerService\CustomerProductService;
use App\Services\HelperService;
use App\Services\ImageService;
use App\Services\VendorService\VendorBidService;
use App\Services\VendorService\VendorCategoryService;
use App\Services\VendorService\VendorProductService;
use Illuminate\Http\Request;

class BidController extends Controller
{
    protected $helperService;
    protected $imageService;
    protected $customerCategoryService;
    protected $customerProductService;
    protected $customerBidService;
    protected $vendorCategoryService;
    protected $vendorProductService;
    protected $vendorBidService;
    protected $adminVendorService;

    public function __construct(
        HelperService $helperService,
        ImageService $imageService,
        CustomerCategoryService $customerCategoryService,
        CustomerProductService $customerProductService,
        CustomerBidService $customerBidService,
        VendorCategoryService $vendorCategoryService,
        VendorProductService $vendorProductService,
        VendorBidService $vendorBidService,
        AdminVendorService $adminVendorService,
    ) {
        $this->helperService = $helperService;
        $this->imageService = $imageService;
        $this->customerCategoryService = $customerCategoryService;
        $this->customerProductService = $customerProductService;
        $this->$customerBidService = $customerBidService;
        $this->vendorCategoryService = $vendorCategoryService;
        $this->vendorProductService = $vendorProductService;
        $this->vendorBidService = $vendorBidService;
        $this->adminVendorService = $adminVendorService;
    }

    public function customerBidRequest($id)
    {
        $bidrequests = $this->customerBidService->bidRequest($id);
        return view('customer.bid.bid-request', compact('bidrequests'));
    }

    public function customerBidRequestStore(Request $request, $id)
    {
        $this->customerBidService->bidRequestStore($request, $id);
        return redirect()->back();
    }

    public function customerBidResult($id)
    {
        $bidresults = $this->customerBidService->bidResult();
        return view('customer.bid.bid-history', compact('bidresults'));
    }

    // public fucntion vendorBidRequest()
    // {
        
    //     return view('vendor.bid.')
    // }


}
