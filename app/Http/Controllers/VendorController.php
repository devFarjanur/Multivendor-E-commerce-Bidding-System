<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VendorController extends Controller
{
    public function VendorDashboard()
    {
        return view('vendor.vendor_dashboard');
    }

    public function VendorLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('vendor.login');
    }  // end method

    public function VendorLogin()
    {
        return view('vendor.vendor_login');
    }  // end method

    public function VendorProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('vendor.vendor_profile_view', compact('profileData'));
    }  // end method

    public function VendorProfileStore(Request $request)
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

    public function VendorChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('vendor.vendor_change_password', compact('profileData'));
    } //  end method

    public function VendorUpdatePassword(Request $request)
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


    //products page

    public function VendorProducts()
    {
        return view('vendor.product.products');
    }

    public function VendorProductUpload()
    {
        return view('vendor.product.product-upload');
    }
    public function VendorDetailsProduct()
    {
        return view('vendor.product.product-details');
    }
    public function VendorCustomer()
    {
        return view('vendor.customer.customer');
    }
    public function VendorCustomerList()
    {
        return view('vendor.customer.customer-list');
    }
    public function VendorOrderDetails()
    {
        return view('vendor.order.order-details');
    }
    public function VendorOrderList()
    {
        return view('vendor.order.order-list');
    }
    public function VendorChatMessage()
    {
        return view('vendor.chat.chat-message');
    }
    public function VendorPagesFaqs()
    {
        return view('vendor.pages.faqs');
    }
    public function VendorHistory()
    {
        return view('vendor.history.history');
    }
    public function VendorInvoice()
    {
        return view('vendor.invoice.invoice');
    }
    public function VendorInvoicePrint()
    {
        return view('vendor.invoice.invoice-print');
    }
    public function VendorLanguage()
    {
        return view('vendor.language.language');
    }
    public function VendorNotification()
    {
        return view('vendor.pages.notifications');
    }
    public function VendorTermsCondition()
    {
        return view('vendor.pages.terms-conditions');
    }
}
