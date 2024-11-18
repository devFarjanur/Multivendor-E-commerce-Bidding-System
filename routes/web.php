<?php
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
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

Route::get('/', function () {
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

    Route::get('/vendors', [AdminController::class, 'VendorGrid'])->name('admin.vendor.grid');
    Route::get('/vendor-profile', [AdminController::class, 'VendorProfile'])->name('admin.vendor.profile');
    Route::get('/vendor-request-list', [AdminController::class, 'VendorRequestList'])->name('admin.vendor.request.list');
    Route::get('/products', [AdminController::class, 'AdminProducts'])->name('admin.products');
    Route::get('/upload/products', [AdminController::class, 'AdminProductUpload'])->name('admin.upload.products');
    Route::get('/product/details', [AdminController::class, 'AdminDetailsProduct'])->name('admin.product.details');
    Route::get('/customer/page', [AdminController::class, 'AdminCustomer'])->name('admin.customer.page');
    Route::get('/customer/list', [AdminController::class, 'AdminCustomerList'])->name('admin.customer.list');
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

    Route::get('/products', [VendorController::class, 'VendorProducts'])->name('vendor.products');
    Route::get('/upload/products', [VendorController::class, 'VendorProductUpload'])->name('vendor.upload.products');
    Route::get('/product/details', [VendorController::class, 'VendorDetailsProduct'])->name('vendor.product.details');
    Route::get('/customer/page', [VendorController::class, 'VendorCustomer'])->name('vendor.customer.page');
    Route::get('/customer/list', [VendorController::class, 'VendorCustomerList'])->name('vendor.customer.list');
    Route::get('/order/details', [VendorController::class, 'VendorOrderDetails'])->name('vendor.order.details');
    Route::get('/order/list', [VendorController::class, 'VendorOrderList'])->name('vendor.order.list');
    Route::get('/chat/message', [VendorController::class, 'VendorChatMessage'])->name('vendor.chat.message');
    Route::get('/pages/faqs', [VendorController::class, 'VendorPagesFaqs'])->name('vendor.pages.faqs');
    Route::get('/history', [VendorController::class, 'VendorHistory'])->name('vendor.history');
    Route::get('/invoice', [VendorController::class, 'VendorInvoice'])->name('vendor.invoice');
    Route::get('/invoice/print', [VendorController::class, 'VendorInvoicePrint'])->name('vendor.invoice.print');
    Route::get('/language', [VendorController::class, 'VendorLanguage'])->name('vendor.language');
    Route::get('/pages/notifications', [VendorController::class, 'VendorNotification'])->name('vendor.pages.notifications');
    Route::get('/pages/terms-conditions', [VendorController::class, 'VendorTermsCondition'])->name('vendor.pages.terms-conditions');
});
