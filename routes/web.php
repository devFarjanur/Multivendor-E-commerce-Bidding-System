<?php
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

Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
Route::get('/admin/logout', [AdminController::class, 'AdminLogout'])->name('admin.logout');
Route::get('/admin/Profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
Route::post('/admin/Profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('admin.update.password');


Route::get('/admin/products', [AdminController::class, 'AdminProducts'])->name('admin.products');
Route::get('/admin/upload/products', [AdminController::class, 'AdminProductUpload'])->name('admin.upload.products');
Route::get('/admin/product/details', [AdminController::class, 'AdminDetailsProduct'])->name('admin.product.details');
Route::get('/admin/customer/page', [AdminController::class, 'AdminCustomer'])->name('admin.customer.page');
Route::get('/admin/customer/list', [AdminController::class, 'AdminCustomerList'])->name('admin.customer.list');
Route::get('/admin/order/details', [AdminController::class, 'AdminOrderDetails'])->name('admin.order.details');
Route::get('/admin/order/list', [AdminController::class, 'AdminOrderList'])->name('admin.order.list');
Route::get('/admin/chat/message', [AdminController::class, 'AdminChatMessage'])->name('admin.chat.message');
Route::get('/admin/pages/faqs', [AdminController::class, 'AdminPagesFaqs'])->name('admin.pages.faqs');
Route::get('/admin/history', [AdminController::class, 'AdminHistory'])->name('admin.history');
Route::get('/admin/invoice', [AdminController::class, 'AdminInvoice'])->name('admin.invoice');
Route::get('/admin/invoice/print', [AdminController::class, 'AdminInvoicePrint'])->name('admin.invoice.print');
Route::get('/admin/language', [AdminController::class, 'AdminLanguage'])->name('admin.language');
Route::get('/admin/pages/notifications', [AdminController::class, 'AdminNotification'])->name('admin.pages.notifications');
Route::get('/admin/pages/terms-conditions', [AdminController::class, 'AdminTermsCondition'])->name('admin.pages.terms-conditions');






Route::get('/vendor-login', [VendorController::class, 'VendorLogin'])->name('vendor.login');

Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');
Route::get('/vendor/logout', [VendorController::class, 'VendorLogout'])->name('vendor.logout');
Route::get('/vendor/Profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');
Route::post('/vendor/Profile/store', [VendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');
Route::get('/vendor/change/password', [VendorController::class, 'VendorChangePassword'])->name('vendor.change.password');
Route::post('/vendor/update/password', [VendorController::class, 'VendorUpdatePassword'])->name('vendor.update.password');


Route::get('/vendor/products', [VendorController::class, 'VendorProducts'])->name('vendor.products');
Route::get('/vendor/upload/products', [VendorController::class, 'VendorProductUpload'])->name('vendor.upload.products');
Route::get('/vendor/product/details', [VendorController::class, 'VendorDetailsProduct'])->name('vendor.product.details');
Route::get('/vendor/customer/page', [VendorController::class, 'VendorCustomer'])->name('vendor.customer.page');
Route::get('/vendor/customer/list', [VendorController::class, 'VendorCustomerList'])->name('vendor.customer.list');
Route::get('/vendor/order/details', [VendorController::class, 'VendorOrderDetails'])->name('vendor.order.details');
Route::get('/vendor/order/list', [VendorController::class, 'VendorOrderList'])->name('vendor.order.list');
Route::get('/vendor/chat/message', [VendorController::class, 'VendorChatMessage'])->name('vendor.chat.message');
Route::get('/vendor/pages/faqs', [VendorController::class, 'VendorPagesFaqs'])->name('vendor.pages.faqs');
Route::get('/vendor/history', [VendorController::class, 'VendorHistory'])->name('vendor.history');
Route::get('/vendor/invoice', [VendorController::class, 'VendorInvoice'])->name('vendor.invoice');
Route::get('/vendor/invoice/print', [VendorController::class, 'VendorInvoicePrint'])->name('vendor.invoice.print');
Route::get('/vendor/language', [VendorController::class, 'VendorLanguage'])->name('vendor.language');
Route::get('/vendor/pages/notifications', [VendorController::class, 'VendorNotification'])->name('vendor.pages.notifications');
Route::get('/vendor/pages/terms-conditions', [VendorController::class, 'VendorTermsCondition'])->name('vendor.pages.terms-conditions');


