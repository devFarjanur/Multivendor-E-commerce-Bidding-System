<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\CustomerService\CustomerCategoryService;
use App\Services\CustomerService\CustomerProductService;
use App\Services\HelperService;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

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

    public function customerLogin()
    {
        return view('customer.customer_login');
    }  // end method

    public function customerRegister()
    {
        return view('customer.customer_register');
    }  // end method

    public function customerLogout(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('vendor.login');
    }  // end method

    public function customerProfile()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('vendor.vendor_profile_view', compact('profileData'));
    }  // end method

    public function customerProfileStore(Request $request)
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

    public function customerChangePassword()
    {
        $id = Auth::user()->id;
        $profileData = User::find($id);
        return view('vendor.vendor_change_password', compact('profileData'));
    } //  end method

    public function customerUpdatePassword(Request $request)
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

    public function customerDashboard()
    {
        return view('customer.customer_dashboard');
    }

    public function customerProductList()
    {
        $categories = $this->customerCategoryService->getActiveCategories();
        $subcategories = $this->customerCategoryService->getActiveSubcategoriesWithRelations();
        $subcategoriesGrouped = $subcategories->groupBy('category_id');

        $products = $this->customerProductService->getActiveProducts();

        $categoryProductCount = $products->groupBy('category_id')->map(function ($products) {
            return $products->count();
        });

        $subcategoryProductCount = $products->groupBy('subcategory_id')->map(function ($products) {
            return $products->count();
        });

        return view('customer.product.product-list', compact(
            'categories',
            'subcategories',
            'subcategoriesGrouped',
            'products',
            'categoryProductCount',
            'subcategoryProductCount'
        ));
    }
}
