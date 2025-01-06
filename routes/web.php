<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\BidController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\VendorController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/welcome', function () {
    return view('welcome');
});

require __DIR__ . '/auth.php';

Route::get('/admin-login', [AdminController::class, 'AdminLogin'])->name('admin.login');
Route::post('/admin/login', [AuthenticatedSessionController::class, 'store'])->name('admin.login.post');


// Admin Routes (only accessible by users with 'admin' role)
Route::prefix('admin')->middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
    Route::get('/Profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/Profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');

    Route::get('/vendors', [AdminController::class, 'VendorList'])->name('admin.vendor.list');
    Route::get('/vendor-profile', [AdminController::class, 'VendorProfile'])->name('admin.vendor.profile');
    Route::get('/vendor-request-list', [AdminController::class, 'VendorRequestList'])->name('admin.vendor.request.list');
    Route::get('/vendor-reject-list', [AdminController::class, 'VendorRejectList'])->name('admin.vendor.reject.list');
    Route::post('/approve/{id}', [AdminController::class, 'approveVendorRequest'])->name('vendor.approve.request');
    Route::post('/reject/{id}', [AdminController::class, 'rejectVendorRequest'])->name('vendor.reject.request');
    Route::get('/products', [AdminController::class, 'AdminProducts'])->name('admin.products');
    Route::get('/upload/products', [AdminController::class, 'AdminProductUpload'])->name('admin.upload.products');
    Route::get('/product/details', [AdminController::class, 'AdminDetailsProduct'])->name('admin.product.details');
    Route::get('/customer-list', [AdminController::class, 'AdminCustomerList'])->name('admin.customer.list');
    Route::get('/customer-profile', [AdminController::class, 'AdminCustomerProfile'])->name('admin.customer.profile');
    Route::get('/order/details', [AdminController::class, 'AdminOrderDetails'])->name('admin.order.details');
    Route::get('/order/list', [AdminController::class, 'AdminOrderList'])->name('admin.order.list');
    Route::get('/chat/message', [AdminController::class, 'AdminChatMessage'])->name('admin.chat.message');
    Route::get('/pages/faqs', [AdminController::class, 'AdminPagesFaqs'])->name('admin.pages.faqs');
    Route::get('/history', [AdminController::class, 'AdminHistory'])->name('admin.history');
    Route::get('/invoice', [AdminController::class, 'AdminInvoice'])->name('admin.invoice');
    Route::get('/invoice/print', [AdminController::class, 'AdminInvoicePrint'])->name('admin.invoice.print');
    Route::get('/language', [AdminController::class, 'AdminLanguage'])->name('admin.language');
    Route::get('/pages/notifications', [AdminController::class, 'AdminNotification'])->name('admin.pages.notifications');
    Route::get('/pages/terms-conditions', [AdminController::class, 'AdminTermsCondition'])->name('admin.pages.terms-conditions');
});




Route::get('/vendor-login', [VendorController::class, 'VendorLogin'])->name('vendor.login');
Route::post('/vendor/login', [AuthenticatedSessionController::class, 'store'])->name('vendor.login.post');
Route::get('/vendor-register', [VendorController::class, 'VendorRegister'])->name('vendor.register');
Route::post('/vendor-register', [RegisteredUserController::class, 'VendorRegister'])->name('vendor.register.store');

// Vendor Routes (only accessible by users with 'vendor' role)
Route::prefix('vendor')->middleware(['auth', 'role:vendor'])->group(function () {

    Route::get('/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');
    Route::get('/logout', [VendorController::class, 'VendorLogout'])->name('vendor.logout');
    Route::get('/Profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');
    Route::post('/Profile/store', [VendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');
    Route::get('/change/password', [VendorController::class, 'VendorChangePassword'])->name('vendor.change.password');
    Route::post('/update/password', [VendorController::class, 'VendorUpdatePassword'])->name('vendor.update.password');

    Route::get('/category-subcategory-list', [VendorController::class, 'vendorCategoryList'])->name('vendor.category.list');
    Route::get('/add-subcategory', [VendorController::class, 'vendorAddSubcategory'])->name('vendor.add.subcategory');
    Route::post('/subcategory-store', [VendorController::class, 'vendorSubcategoryStore'])->name('vendor.subcategory.store');
    Route::get('/edit-subcategory/{id}', [VendorController::class, 'vendorEditSubcategory'])->name('vendor.edit.subcategory');
    Route::post('/update-subcategory/{id}', [VendorController::class, 'vendorUpdateSubcategory'])->name('vendor.update.subcategory');
    Route::delete('/subcategory-delete/{id}', [VendorController::class, 'vendorSubcategoryDelete'])->name('vendor.subcategory.delete');

    Route::get('/customer-list', [VendorController::class, 'vendorCustomerList'])->name('vendor.customer.list');
    Route::get('/customer-profile', [VendorController::class, 'vendorCustomerProfile'])->name('vendor.customer.profile');

    Route::get('/product-list', [VendorController::class, 'vendorProductList'])->name('vendor.product.list');
    Route::get('/upload-product', [VendorController::class, 'vendorProductUpload'])->name('vendor.upload.product');
    Route::post('/product-store', [VendorController::class, 'vendorProductStore'])->name('vendor.product.store');
    Route::get('/product/details', [VendorController::class, 'VendorDetailsProduct'])->name('vendor.product.details');
    Route::get('/get-subcategories/{categoryId}', [VendorController::class, 'getVensorSubcategories']);

    Route::get('/bid-request', [BidController::class, 'vendorBidRequest'])->name('vendor.bid.request');
    Route::get('/bid-list', [BidController::class, 'vendorBidList'])->name('vendor.bid.list');
    Route::get('/invoice', [VendorController::class, 'vendorInvoice'])->name('vendor.invoice');

    Route::get('/chat/message', [VendorController::class, 'VendorChatMessage'])->name('vendor.chat.message');
    Route::get('/pages/faqs', [VendorController::class, 'VendorPagesFaqs'])->name('vendor.pages.faqs');
    Route::get('/history', [VendorController::class, 'VendorHistory'])->name('vendor.history');
    Route::get('/invoice/print', [VendorController::class, 'VendorInvoicePrint'])->name('vendor.invoice.print');
    Route::get('/language', [VendorController::class, 'VendorLanguage'])->name('vendor.language');
    Route::get('/pages/notifications', [VendorController::class, 'VendorNotification'])->name('vendor.pages.notifications');
    Route::get('/pages/terms-conditions', [VendorController::class, 'VendorTermsCondition'])->name('vendor.pages.terms-conditions');
});

Route::get('/login', [CustomerController::class, 'customerLogin'])->name('customer.login');
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->name('customer.login.post');
Route::get('/register', [CustomerController::class, 'customerRegister'])->name('customer.register');
Route::post('/register', [RegisteredUserController::class, 'customerRegister'])->name('customer.register.store');

// Route::get('/', [CustomerController::class, 'customerDashboard'])->name('customer.dashboard');
Route::get('/', [CustomerController::class, 'customerProductList'])->name('customer.product.list');
Route::get('/product-details', [CustomerController::class, 'customerDetailsProduct'])->name('customer.product.details');


// Customer Routes (only accessible by users with 'customer' role)
Route::prefix('customer')->middleware(['auth', 'role:customer'])->group(function () {
    Route::get('/logout', [CustomerController::class, 'customerLogout'])->name('customer.logout');
    Route::get('/Profile', [CustomerController::class, 'customerProfile'])->name('customer.profile');
    Route::post('/Profile/store', [CustomerController::class, 'customerProfileStore'])->name('customer.profile.store');
    Route::get('/change/password', [CustomerController::class, 'customerChangePassword'])->name('customer.change.password');
    Route::post('/update/password', [CustomerController::class, 'customerUpdatePassword'])->name('customer.update.password');

    Route::post('/bid-store/{id}', [BidController::class, 'customerBidStore'])->name('customer.bid.store');
    Route::get('/bid-request/{id?}', [BidController::class, 'customerBidRequest'])->name('customer.bid.request');
    Route::get('/bid-list/{id?}', [BidController::class, 'customerBidList'])->name('customer.bid.list');
    Route::get('/invoice', [CustomerController::class, 'customerInvoice'])->name('customer.invoice');
    Route::get('/chat/message', [CustomerController::class, 'customerChatMessage'])->name('customer.chat.message');
    Route::get('/faqs', [CustomerController::class, 'customerPagesFaqs'])->name('customer.pages.faqs');
    Route::get('/history', [CustomerController::class, 'customerHistory'])->name('customer.history');
    Route::get('/invoice/print', [CustomerController::class, 'customerInvoicePrint'])->name('customer.invoice.print');
    Route::get('/terms-conditions', [CustomerController::class, 'customerTermsCondition'])->name('customer.pages.terms-conditions');
});
