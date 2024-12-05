<?php



use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\MenuItemController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\WebsiteController;
use App\Http\Controllers\CustomerController as CustomerControllerFrontEnd;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the 'web' middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});



Route::get('/', [WebsiteController::class,'index'])->name('website.home');
Route::get('/menu/{slug?}', [WebsiteController::class,'menu'])->name('website.menu');
Route::get('/about-us', [WebsiteController::class,'about'])->name('website.about');
Route::get('/contact', [WebsiteController::class,'contact'])->name('website.contact');
Route::get('/shop-details/{id}', [WebsiteController::class,'shopDeals'])->name('website.shopDetails');
Route::get('/cart-shop-details', [WebsiteController::class,'cartShopDetail'])->name('website.cartShopDetails');


//CartController
Route::get('add-to-cart/{id}', [CartController::class,'addToCart'])->name('website.addToCart');
Route::post('cart/single-add/{id}',[CartController::class,'singleAddToCart'])->name('singleAddToCart');
Route::put('update-cart/{id?}', [CartController::class,'updateCart'])->name('updateCart');
Route::get('remove-from-cart/{index}', [CartController::class,'removeFromCart'])->name('website.removeFromCart');
Route::get('/checkout', [CartController::class, 'checkoutIndex'])->name('checkout.index');

Route::post('/order', [CartController::class, 'order'])->name('order')->middleware('auth.customer');





//CustomerControllerFrontEnd
Route::get('customer/login', [CustomerControllerFrontEnd::class,'login'])->name('website.customer.login');
Route::post('customer/login', [CustomerControllerFrontEnd::class,'loginCheck'])->name('website.customer.storeLogin');
Route::get('customer/forgot-password', [CustomerControllerFrontEnd::class, 'forgotPassword'])->name('website.customer.forgot_password');
Route::post('customer/forgot-password', [CustomerControllerFrontEnd::class, 'sendResetLinkEmail'])->name('website.customer.forgot_password');
Route::get('customer/new-password/{token}', [CustomerControllerFrontEnd::class, 'newPassword'])->name('website.customer.new_password');
Route::put('customer/new-password/{token}', [CustomerControllerFrontEnd::class, 'newPasswordSave'])->name('website.customer.new_password');


Route::get('customer/dashboard', [CustomerControllerFrontEnd::class, 'dashboard'])->name('website.customer.dashboard')
    ->middleware('auth.customer');

Route::get('customer/order', [CustomerControllerFrontEnd::class, 'order'])->name('website.customer.order')
    ->middleware('auth.customer');

Route::get('customer/order/show/{order}', [CustomerControllerFrontEnd::class, 'orderShow'])
    ->name('website.customer.order.show')->middleware('auth.customer');


Route::get('/profile', [CustomerControllerFrontEnd::class, 'profile'])->name('website.customer.profile')
    ->middleware('auth.customer');


Route::put('/profile', [CustomerControllerFrontEnd::class, 'profileUpdate'])->name('website.customer.profile')
    ->middleware('auth.customer');



Route::get('password-change', [CustomerControllerFrontEnd::class, 'passwordChange'])->name('website.customer.password_change')
    ->middleware('auth.customer');


Route::put('password-change', [CustomerControllerFrontEnd::class, 'passwordUpdate'])->name('website.customer.password_update')
    ->middleware('auth.customer');


Route::get('/customer/logout', [CustomerControllerFrontEnd::class, 'logout'])->name('website.customer.logout')
    ->middleware('auth.customer');
// RegistrationController
Route::get('/registration', [RegistrationController::class, 'index'])->name('website.registration');
Route::post('/registration', [RegistrationController::class, 'create'])->name('website.registration');


Auth::routes();

Route::get('/dashboard', [HomeController::class, 'index'])->name('home');




//CategoryController

Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/categories/create', [CategoryController::class, 'create'])->name('admin.categories.create');
Route::post('/admin/categories', [CategoryController::class, 'store'])->name('admin.categories.store');
Route::get('/admin/categories/{id}', [CategoryController::class, 'show'])->name('admin.categories.show');
Route::get('/admin/categories/{id}/edit', [CategoryController::class, 'edit'])->name('admin.categories.edit');
Route::put('/admin/categories/{id}', [CategoryController::class, 'update'])->name('admin.categories.update');
Route::delete('/admin/categories/{id}', [CategoryController::class, 'destroy'])->name('admin.categories.destroy');

//MenuItemController
Route::get('/admin/menuItems', [MenuItemController::class, 'index'])->name('admin.menuItems.index');
Route::get('/admin/menuItems/create', [MenuItemController::class, 'create'])->name('admin.menuItems.create');
Route::post('/admin/menuItems', [MenuItemController::class, 'store'])->name('admin.menuItems.store');
Route::get('/admin/menuItems/{id}', [MenuItemController::class, 'show'])->name('admin.menuItems.show');
Route::get('/admin/menuItems/{id}/edit', [MenuItemController::class, 'edit'])->name('admin.menuItems.edit');
Route::put('/admin/menuItems/{id}', [MenuItemController::class, 'update'])->name('admin.menuItems.update');
Route::delete('/admin/menuItems/{id}', [MenuItemController::class, 'destroy'])->name('admin.menuItems.destroy');


//CustomerController

Route::get('/admin/customers', [CustomerController::class, 'index'])->name('admin.customers.index');
Route::get('/admin/customers/create', [CustomerController::class, 'create'])->name('admin.customers.create');
Route::post('/admin/customers', [CustomerController::class, 'store'])->name('admin.customers.store');
Route::get('/admin/customers/{customer}/show', [CustomerController::class, 'show'])->name('admin.customers.show');
Route::get('/admin/customers/{customer}/edit', [CustomerController::class, 'edit'])->name('admin.customers.edit');
Route::put('/admin/customers/{customer}', [CustomerController::class, 'update'])->name('admin.customers.update');
Route::delete('/admin/customers/{customer}', [CustomerController::class, 'destroy'])->name('admin.customers.destroy');

//OrderController
Route::get('/admin/orders',[OrderController::class,"index"])->name('admin.orders.index');
Route::get('/admin/orders/{order}',[OrderController::class,"show"])->name('admin.orders.show');
Route::delete('/admin/orders/{order}',[OrderController::class,"destroy"])->name('admin.orders.destroy');

// SettingsController
Route::get("settings", [SettingController::class, "index"])->name("admin.settings.index");
Route::put("settings", [SettingController::class, "update"])->name("admin.settings.update");

