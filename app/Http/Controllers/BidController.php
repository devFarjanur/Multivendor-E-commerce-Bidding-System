<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Bid;
use App\Models\BidRequest;
use App\Models\Subcategory;
use App\Services\AdminService\AdminVendorService;
use App\Services\CustomerService\CustomerBidService;
use App\Services\CustomerService\CustomerCategoryService;
use App\Services\CustomerService\CustomerProductService;
use App\Services\HelperService;
use App\Services\ImageService;
use App\Services\VendorService\VendorBidService;
use App\Services\VendorService\VendorCategoryService;
use App\Services\VendorService\VendorProductService;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Exception;
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
        $this->customerBidService = $customerBidService;
        $this->vendorCategoryService = $vendorCategoryService;
        $this->vendorProductService = $vendorProductService;
        $this->vendorBidService = $vendorBidService;
        $this->adminVendorService = $adminVendorService;
    }

    public function customerBidRequest($id)
    {
        $customerbidrequests = $this->customerBidService->bidRequest($id);
        return view('customer.bid.bid-request', compact('customerbidrequests'));
    }

    public function customerCustomBidRequest()
    {
        $categories = $this->vendorCategoryService->getCategoryWithSubcategory();
        // dd($categories);
        return view('customer.bid.customer-custom-bid-request', compact('categories'));
    }

    public function getCustomerSubcategories($categoryId)
    {
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }

    public function customerBidList($id)
    {
        $customerbidresults = $this->customerBidService->bidlist($id);
        return view('customer.bid.bid-list', compact('customerbidresults'));
    }

    public function customerBidStore(Request $request, $id)
    {
        $this->customerBidService->bidRequestStore($request, $id);
        return redirect()->back();
    }

    public function customerCustomBidStore(Request $request)
    {
        // dd($request->all());
        $this->customerBidService->bidCustomRequestStore($request);
        return redirect()->back();
    }

    public function vendorBidRequest()
    {
        $vendorbidrequests = $this->vendorBidService->bidRequest();
        return view('vendor.bid.bid-request', compact('vendorbidrequests'));
    }

    public function vendorBidlist()
    {
        $vendorbidresults = $this->vendorBidService->bidList();
        return view('vendor.bid.bid-list', compact('vendorbidresults'));
    }
    // vendor.bid.request.details
    public function vendorBidRequestDetails($id)
    {

        $bidRequest = BidRequest::with(['customer', 'product', 'category', 'subcategory'])->findOrFail($id);
        $bids = Bid::where('bid_request_id', $id)->with('vendor')->get();
        return view('vendor.bid.vendor-bid-place', compact('bidRequest', 'bids'));
    }

    /**
     * Handle vendor bid submission.
     */
    public function submitBid(Request $request, $id)
    {
        try {
            // Check if the bid request exists
            $bidRequest = BidRequest::findOrFail($id);

            // Save the vendor's bid (no check for existing bid)
            Bid::create([
                'vendor_id' => Auth::id(),
                'bid_request_id' => $id,
                'bid_price' => $request->bid_price,
            ]);

            $this->helperService->setFlashMessage($request, 'Your bid has been submitted successfully!', 'success');
            return redirect()->back();
        } catch (Exception $e) {
            \Log::error("Failed to submit bid: " . $e->getMessage());
            $this->helperService->setFlashMessage($request, 'Failed to submit your bid. Please try again later.', 'error');
            return redirect()->back();
        }
    }

    // public function showBidRequestDetails($request, $id)
    // {
    //     $bidRequest = BidRequest::with(['bids.vendor', 'product', 'category', 'subcategory'])->findOrFail($id);
    //     if ($bidRequest->customer_id !== auth()->id()) {
    //         $this->helperService->setFlashMessage($request, 'You are not authorized to view this bid request.', 'error');
    //         return redirect()->route('customer.product.list');
    //     }
    //     $bids = $bidRequest->bids;
    //     return view('customer.bid.customer-accept-bid', compact('bidRequest', 'bids'));
    // }

    public function showBidRequestDetails($id)
    {
        $bidRequest = BidRequest::with(['bids.vendor', 'product', 'category', 'subcategory'])->findOrFail($id);

        // Check if the authenticated customer is the one who created the bid request
        if ($bidRequest->customer_id !== auth()->id()) {
            $this->helperService->setFlashMessage(request(), 'You are not authorized to view this bid request.', 'error');
            return redirect()->route('customer.product.list');
        }

        $bids = $bidRequest->bids;

        return view('customer.bid.customer-accept-bid', compact('bidRequest', 'bids'));
    }


    public function acceptBid(Request $request, $bidRequestId, $bidId)
    {
        $bidRequest = BidRequest::findOrFail($bidRequestId);

        if ($bidRequest->customer_id !== auth()->id()) {
            $this->helperService->setFlashMessage($request, 'You are not authorized to view this bid request.', 'error');
            return redirect()->route('customer.product.list');
        }

        $selectedBid = Bid::findOrFail($bidId);
        $selectedBid->update(['bid_status' => 'accepted']);

        $bidRequest->update(['bid_status' => 'accepted']);
        $bidRequest->bids()->where('id', '!=', $bidId)->update(['bid_status' => 'rejected']);

        $this->helperService->setFlashMessage($request, 'Bid accepted successfully.', 'success');
        return redirect()->route('customer.bid.request.details', ['id' => $bidRequestId]);
    }
}
