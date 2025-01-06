<?php

namespace App\Services\CustomerService;
use App\Models\Bid;
use App\Models\BidRequest;
use App\Services\AdminService\AdminVendorService;
use App\Services\HelperService;
use App\Services\ImageService;
use App\Services\VendorService\VendorCategoryService;
use App\Services\VendorService\VendorProductService;
use Illuminate\Support\Facades\Auth;
use Exception;
use Illuminate\Http\Request;

class CustomerBidService
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

    public function bidRequest($id)
    {
        return BidRequest::with(['customer', 'product', 'vendor'])
            ->where('customer_id', $id)
            ->where('bid_status', 'pending')
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function bidlist($id)
    {
        return BidRequest::with(['customer', 'product', 'vendor'])
            ->where('customer_id', $id)
            ->whereIn('bid_status', ['accepted', 'rejected'])
            ->orderBy('created_at', 'desc')
            ->paginate(10);
    }

    public function bidRequestStore(Request $request, $id)
    {
        if (!auth()->check()) {
            auth()->logout();
            \Log::info('User is not authenticated. Redirecting to login.');
            $this->helperService->setFlashMessage($request, 'Please log in to place a bid request.', 'error');
            return redirect()->route('customer.login');
        }

        try {
            $product = $this->customerProductService->getActiveProductById($id);
            $customer = Auth::user();

            $existingBidRequest = $product->bidRequests()->where('customer_id', $customer->id)->where('bid_status', 'pending')->exists();

            if ($existingBidRequest) {
                $this->helperService->setFlashMessage($request, 'You already have a pending bid request for this product.', 'error');
                return redirect()->back();
            }

            BidRequest::create([
                'customer_id' => $customer->id,
                'product_id' => $product->id,
                'bid_amount' => $product->price,
                'bid_status' => 'pending',
            ]);

            $this->helperService->setFlashMessage($request, 'Your bid request has been placed successfully.', 'success');
            return redirect()->route('customer.bid.list', $customer->id);
        } catch (Exception $e) {
            \Log::error("Failed to place bid: " . $e->getMessage());
            $this->helperService->setFlashMessage($request, 'Failed to place your bid request.', 'error');
            return redirect()->back();
        }
    }





    // public function trycatch($request)
    // {
    //     try {
    //         $this->helperService->setFlashMessage($request, 'successfully.', 'success');
    //         return true;
    //     } catch (Exception $e) {
    //         \Log::error("Failed to: " . $e->getMessage());
    //         $this->helperService->setFlashMessage($request, 'Failed to.', 'error');
    //         return false;
    //     }
    // }

    //     public function bidRequest(Request $request, $id)
// {
//     // Check if the user is logged in
//     if (!auth()->check()) {
//         return redirect()->route('login')->with('error', 'Please log in to place a bid request.');
//     }

    //     $product = $this->customerProductService->getActiveProductById($id);
//     $customer = auth()->user();

    //     // Check if the user already has a pending bid request for the same product
//     $existingBidRequest = $product->bidRequests()->where('customer_id', $customer->id)->where('status', 'pending')->exists();

    //     if ($existingBidRequest) {
//         return redirect()->back()->with('error', 'You already have a pending bid request for this product.');
//     }

    //     // Create a new bid request for the product
//     BidRequest::create([
//         'customer_id' => $customer->id,
//         'product_id' => $product->id,
//         'status' => 'pending', // Default status is pending
//     ]);

    //     return redirect()->route('products.index')->with('success', 'Your bid request has been placed successfully.');
// }




}
