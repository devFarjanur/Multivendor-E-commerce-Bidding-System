<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Subcategory;
use App\Services\VendorService\VendorCategoryService;
use App\Services\VendorService\VendorProductService;
use Illuminate\Http\Request;
use Hash;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class VendorController extends Controller
{
    protected $vendorCategoryService;
    protected $vendorProductService;

    public function __construct(VendorCategoryService $vendorCategoryService, VendorProductService $vendorProductService)
    {
        $this->vendorCategoryService = $vendorCategoryService;
        $this->vendorProductService = $vendorProductService;
    }

    public function VendorLogin()
    {
        return view('vendor.vendor_login');
    }  // end method

    public function VendorRegister()
    {
        return view('vendor.vendor_register');
    }  // end method

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

    public function vendorCustomerList()
    {
        return view('vendor.customer.customer-list');
    }

    public function vendorCustomerProfile()
    {
        return view('vendor.customer.customer-profile');
    }

    public function vendorCategoryList()
    {
        $categories = $this->vendorCategoryService->CategoryList();
        $subcategories = $this->vendorCategoryService->subcategoryList();
        return view('vendor.category.category-subcategory-list', compact('categories', 'subcategories'));
    }

    public function vendorAddSubcategory()
    {
        $categories = $this->vendorCategoryService->categoryList();
        return view('vendor.category.add-category-subcategory', compact('categories'));
    }

    public function vendorSubcategoryStore(Request $request)
    {
        $this->vendorCategoryService->subcategoryStore($request);
        return redirect()->route('vendor.category.list');
    }

    public function vendorEditSubcategory($id)
    {
        $categories = $this->vendorCategoryService->categoryList();
        $subcategory = $this->vendorCategoryService->subcategoryFind($id);
        return view('vendor.category.edit-subcategory', compact('subcategory', 'categories'));
    }

    public function vendorUpdateSubcategory(Request $request, $id)
    {
        $this->vendorCategoryService->subcategoryUpdate($request, $id);
        return redirect()->route('vendor.category.list');
    }

    public function vendorSubcategoryUpdateStatus($request, $id)
    {
        $this->vendorCategoryService->subcategoryUpdateStatus($request, $id);
        return redirect()->back();
    }

    public function vendorSubcategoryDelete(Request $request, $id)
    {
        $this->vendorCategoryService->subcategoryDelete($request, $id);
        return redirect()->back();
    }

    //products page
    public function vendorProductList()
    {
        $categories = $this->vendorCategoryService->categoryList();
        $products = $this->vendorProductService->productList();
        return view('vendor.product.product-list', compact('categories', 'products'));
    }

    public function vendorProductUpload()
    {
        $categories = $this->vendorCategoryService->getCategoryWithSubcategory();
        return view('vendor.product.product-upload', compact('categories'));
    }

    public function getVensorSubcategories($categoryId)
    {
        $subcategories = Subcategory::where('category_id', $categoryId)->get();
        return response()->json([
            'subcategories' => $subcategories
        ]);
    }

    public function vendorProductStore(Request $request)
    {
        // dd($request->all());
        $this->vendorProductService->productStore($request);
        return redirect()->route('vendor.product.list');
    }

    public function VendorDetailsProduct()
    {
        return view('vendor.product.product-details');
    }

    public function vendorInvoice()
    {
        return view('vendor.invoice.invoice');
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
