<?php

namespace App\Services\CustomerService;
use App\Models\Bid;
use App\Services\AdminService\AdminVendorService;
use App\Services\HelperService;
use App\Services\ImageService;
use Auth;

class CustomerBidService
{
    protected $helperService;
    protected $imageService;
    protected $customerProductService;
    protected $adminVendorService;

    public function __construct(
        HelperService $helperService,
        ImageService $imageService,
        CustomerProductService $customerProductService,
        AdminVendorService $adminVendorService,
    ) {
        $this->helperService = $helperService;
        $this->imageService = $imageService;
        $this->customerProductService = $customerProductService;
        $this->adminVendorService = $adminVendorService;
    }

    public function bidRequest($id)
    {
        $product = $this->customerProductService->getActiveProductById($id);
        $customer = Auth::user();
        if ($product->bidRequests()->where('customer_id', $customer->id)->exists()) {
            return redirect()->back()->with('error', 'You have already placed a bid request for this product.');
        }

        foreach ($vendors as $vendor) {
            Bid::create([
                'product_id' => $product->id,
                'vendor_id' => $vendor->id,
                'bid_amount' => $product->price,
                'bid_status' => 'pending',
            ]);
        }
    }



}
