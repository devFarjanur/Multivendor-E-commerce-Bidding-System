<?php

namespace App\Http\Controllers;
use App\Services\AdminService\AdminVendorService;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class AdminController extends Controller
{
    protected $adminVendorService;

    public function __construct(AdminVendorService $adminVendorService)
    {
        $this->adminVendorService = $adminVendorService;
    }
    
    public function AdminDashboard()
    {
        return view('admin.admin_dashboard');
    }

    public function AdminLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }  // end method

    public function AdminLogin()
    {
        return view(view: 'admin.admin_login');
    }  // end method

    public function AdminProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_profile_view', compact('profileData'));
    }  // end method

    public function AdminProfileStore(Request $request)
    {
        $id = Auth::user()->id;
        $data = User::find($id);
        $data->name = $request->name;
        $data->email = $request->email;
        $data->phone = $request->phone;

        if ($request->file('photo')) {
            $file = $request->file('photo');
            @unlink(public_path('upload/admin_images/' . $data->photo));
            $filename = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $filename);
            $data->photo = $filename;
        }

        $data->save();

        $notification = array(
            'message' => 'Admin Profile Updated Successfully',
            'alter-type' => 'success'
        );

        return redirect()->back()->with($notification);
    } // end method

    public function AdminChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('admin.admin_change_password', compact('profileData'));
    } //  end method

    public function AdminUpdatePassword(Request $request)
    {
        $request->validate([
            'old_password' => 'required',
            'new_password' => 'required|confirmed',
        ]);

        // Match old password
        if (!Hash::check($request->old_password, auth::user()->password)) {
            $notification = array(
                'message' => 'Old Password does not match',
                'alert-type' => 'error',
            );
            return back()->with($notification);
        }

        // Update the new password
        User::whereId(auth()->user()->id)->update([
            'password' => Hash::make($request->new_password),
        ]);

        $notification = array(
            'message' => 'Password Changed Successfully',
            'alert-type' => 'success',
        );

        return back()->with($notification);
    }  // end method

    public function Vendorlist()
    {
        $vendors = $this->adminVendorService->vendorlist();
        return view('admin.vendor.vendor-list', compact('vendors'));
    }
    public function VendorRequestList()
    {
        $vendorsRequest = $this->adminVendorService->vendorRequest();
        return view('admin.vendor.vendor-request-list', compact('vendorsRequest'));
    }

    public function VendorRejectList()
    {
        $vendorsReject = $this->adminVendorService->vendorReject();
        return view('admin.vendor.vendor-reject-list', compact('vendorsReject'));
    }

    public function approveVendorRequest(Request $request, $id)
    {
        $this->adminVendorService->vendeorApprove($id);
        $request->session()->flash('message', 'Vendor request approve successfully.');
        $request->session()->flash('alert-type', 'success');
        return redirect()->back();
    }

    public function rejectVendorRequest(Request $request, $id)
    {
        $this->adminVendorService->rejectVendor($id);
        $request->session()->flash('message', 'Vendor request reject successfully.');
        $request->session()->flash('alert-type', 'success');
        return redirect()->back();
    }

    public function VendorProfile()
    {
        return view('admin.vendor.vendor-profile');
    }

    public function AdminCustomerProfile()
    {
        return view('admin.customer.customer-profile');
    }
    public function AdminCustomerList()
    {
        return view('admin.customer.customer-list');
    }

    //products page
    public function AdminProducts()
    {
        return view('admin.product.products');
    }

    public function AdminProductUpload()
    {
        return view('admin.product.product-upload');
    }
    public function AdminDetailsProduct()
    {
        return view('admin.product.product-details');
    }

    public function AdminOrderDetails()
    {
        return view('admin.order.order-details');
    }
    public function AdminOrderList()
    {
        return view('admin.order.order-list');
    }
    public function AdminChatMessage()
    {
        return view('admin.chat.chat-message');
    }
    public function AdminPagesFaqs()
    {
        return view('admin.pages.faqs');
    }
    public function AdminHistory()
    {
        return view('admin.history.history');
    }
    public function AdminInvoice()
    {
        return view('admin.invoice.invoice');
    }
    public function AdminInvoicePrint()
    {
        return view('admin.invoice.invoice-print');
    }
    public function AdminLanguage()
    {
        return view('admin.language.language');
    }
    public function AdminNotification()
    {
        return view('admin.pages.notifications');
    }
    public function AdminTermsCondition()
    {
        return view('admin.pages.terms-conditions');
    }
}
