<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\chatController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\pageController;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\campaingController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\socialController;
use App\Http\Controllers\Frontend\adsController;
use App\Http\Controllers\subscriptionController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Frontend\CartController;
use App\Http\Controllers\Frontend\OrderController;
use App\Http\Controllers\Vendor\ProfileController;
use App\Http\Controllers\Frontend\VendorController;
use App\Http\Controllers\Frontend\AccountController;
use App\Http\Controllers\Frontend\ContactController;
use App\Http\Controllers\Frontend\ProductController;
use App\Http\Controllers\Frontend\CheckoutController;
use App\Http\Controllers\Frontend\wishlistController;
use App\Http\Controllers\blogControler as ablogController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/cancel', [OrderController::class, 'fail'])->name('uddoktapay.cancel');
Route::get('success2', [OrderController::class, 'success2'])->name('uddoktapay.success');
Auth::routes();
Route::get('login/vendor', [HomeController::class, 'vendorLogin'])->name('login.v2');
Route::get('/seller', [AccountController::class, 'vendorJoin'])->name('vendorJoin');
// Route::Post('register', [AccountController::class, 'register'])->name('register');
Route::Post('register2', [AccountController::class, 'register2'])->name('register2');
Route::get('/', HomeController::class)->name('home');
Route::get('admin/', [HomeController::class, 'adminLogin'])->name('adminLogin');
Route::post('admin/login', [LoginController::class, 'superLogin'])->name('super.login');
Route::GET('user/login', [LoginController::class, 'login'])->name('login.get');
Route::post('user/register', [RegisterController::class, 'register'])->name('register.new');
Route::get('user/otp', [RegisterController::class, 'sendotp'])->name('register.otp');
Route::get('/recover-ac/mobile', [AccountController::class, 'pasmRecover'])->name('password.recover.mobile');
Route::Post('password/reset', [AccountController::class, 'pasm'])->name('password.send');
Route::Post('zt_admin.zishan/login/confirm', [LoginController::class, 'superLoginconfirm'])->name('super.login.confirm');

Route::get('vendors', [VendorController::class, 'showAllVendors'])->name('vendors');
Route::get('vendor/{slug}', [VendorController::class, 'index'])->name('vendor');
Route::get('brand/{slug}', [ProductController::class, 'showProductByBrand'])->name('brand.product');
Route::get('author/product/{slug}', [ProductController::class, 'showProductByAuthor'])->name('author.product');
Route::get('brands/list', [ProductController::class, 'allBrand'])->name('brand.list');

Route::get('category/{slug}', [ProductController::class, 'showProductByCategory'])->name('category.product');
Route::get('collection/{slug}', [ProductController::class, 'showProductByCollection'])->name('collection.product');
Route::get('sub-category/{slug}', [ProductController::class, 'showProductBySubCategory'])->name('subCategory.product');
Route::get('mini-category/{slug}', [ProductController::class, 'showProductByMiniCategory'])->name('miniCategory.product');
Route::get('extra-category/{slug}', [ProductController::class, 'showProductByextraCategory'])->name('extraCategory.product');
Route::get('product', [ProductController::class, 'showAllProduct'])->name('product');
Route::get('product/info/{slug}', [ProductController::class, 'productInfo'])->name('product.info');
Route::get('campaing/product/info/{slug}', [ProductController::class, 'productInfo1'])->name('camp.product.info');
Route::get('product/filter', [ProductController::class, 'productFilter'])->name('product.filter');
Route::get('product/search', [ProductController::class, 'productSearch'])->name('product.search');
Route::POst('product/advance-search/', [ProductController::class, 'advanceSearch'])->name('product.advance-search');

Route::get('product/{slug}', [ProductController::class, 'productDetails'])->name('product.details');
Route::get('campaing/product/{slug}', [ProductController::class, 'productDetails1'])->name('product.cam.details');
Route::get('/blogs', [ablogController::class, 'getAllBlogs'])->name('blogs');
Route::get('/blog/ceo', [ablogController::class, 'getAllCeoBlogs'])->name('blog.ceo');
Route::get('/blog/show/{blog}', [ablogController::class, 'getBlogByID'])->name('blog.show');
Route::get('Campaign', [campaingController::class, 'allCampaing'])->name('campaing');
Route::Post('Campaign/comments', [campaingController::class, 'comment'])->name('campaing.comment');
Route::get('Campaign/product/{slug}', [campaingController::class, 'campaignProduct'])->name('campaing.product');

Route::middleware(['auth'])->group(function () {
    Route::post('blog/comment/{slug}', [ablogController::class, 'comment'])->name('blog.comment');
    Route::post('blog/comment/reply/{slug}/{id}', [ablogController::class, 'reply'])->name('reply');
});

Route::Post('/get/color/price', [ProductController::class, 'getAttrPrice']);
Route::Post('/get/attr/price', [ProductController::class, 'getAttrPrice']);


Route::get('vendor/search/product', [VendorController::class, 'productSearch'])->name('search.product.vendor');

Route::get('cart', [CartController::class, 'cart'])->name('cart');
Route::get('categories', [HomeController::class, 'allCat'])->name('category');
Route::get('get/cart', [CartController::class, 'getCart'])->name('get.cart');
Route::post('add/cart', [CartController::class, 'addToCart'])->name('add.cart');
Route::get('update/cart/{id}/{qty}', [CartController::class, 'updateCart'])->name('update.cart');
Route::get('destroy/cart/{id}', [CartController::class, 'destroyCart'])->name('destroy.cart');

Route::get('checkout', [CheckoutController::class, 'checkout'])->name('checkout');

Route::get('/render/superCat', [HomeController::class, 'superCat']);
Route::get('/render/subCat', [HomeController::class, 'subCat']);




Route::middleware(['account', 'auth'])->group(function () {
    Route::group(['as' => 'connection.', 'prefix' => 'connection'], function () {
        Route::get('/live-chat', [chatController::class, 'showLiveChatForm'])->name('live.chat');
        Route::get('/live-chat/new-sms/count', [chatController::class, 'countNewMessage'])->name('live.chat.new-sms.count');
        Route::get('/live-chat-list', [chatController::class, 'liveChatList'])->name('live.chat.list');
        Route::post('/live-chat', [chatController::class, 'storeLiveChatForm'])->name('store.chat');
    });


    Route::get('account/password', [AccountController::class, 'passChangeUser'])->name('pass-change');
    Route::put('password/update', [ProfileController::class, 'updatePassword'])->name('password.update');
    Route::get('account/verify', [AccountController::class, 'verify'])->name('email.verify');
    Route::Post('account/verify/otp', [AccountController::class, 'sendEotp'])->name('account.email.otp');
    Route::Post('account/verify/confirm', [AccountController::class, 'otpconfirm'])->name('account.email.confirm');
    Route::get('account/dashboard', [AccountController::class, 'index'])->name('dashboard');
    Route::get('account', [AccountController::class, 'showAccount'])->name('account');
    Route::get('order/track', [HomeController::class, 'track_form'])->name('track');
    Route::post('order/tracking', [HomeController::class, 'tracking'])->name('tracking');
    Route::get('order/tracking', [HomeController::class, 'track_form'])->name('tracking.re');


    Route::post('account/update', [AccountController::class, 'accountUpdate'])->name('account.update');
    Route::get('apply/coupon/{code}/{stotal}', [CartController::class, 'applyCoupon'])->name('apply.coupon');
    Route::get('apply/coupon/buy-now/{code}/{id}/{qty}/{dynamic}', [CartController::class, 'applyCouponBuyNow'])->name('apply.coupon.buy');
    Route::get('order', [OrderController::class, 'order'])->name('order');
    Route::get('returns', [OrderController::class, 'returns'])->name('returns');
    Route::post('order', [OrderController::class, 'orderStore'])->name('order.store');
    Route::post('order/buy-now', [OrderController::class, 'orderBuyNowStore'])->name('order.buy.store');
    Route::get('order/invoice/{id}', [OrderController::class, 'orderInvoice'])->name('order.invoice');
    Route::get('order/cacnel/{id}', [OrderController::class, 'cancel'])->name('order.cacnel');
    Route::get('order/return_req/{id}', [OrderController::class, 'return_req'])->name('order.return_req');
    // Route::get('buy/product', [OrderController::class, 'buyProduct'])->name('buy.product');


    Route::get('download', [OrderController::class, 'download'])->name('download');
    Route::get('download/product/{pro_id}/{id}', [OrderController::class, 'downloadProductFile'])->name('download.product');


    Route::get('review/{order_id}', [OrderController::class, 'review'])->name('review');
    Route::post('review/{id}', [OrderController::class, 'storeReview'])->name('review.store');
    Route::get('wishlist/', [wishlistController::class, 'index'])->name('wishlist');
    Route::post('wishlist/add', [wishlistController::class, 'store'])->name('wishlist.add');
    Route::get('wishlist/remove/{item}', [wishlistController::class, 'delete'])->name('wishlist.remove');
    Route::get('ticket/', [ContactController::class, 'ticket'])->name('ticket');
    Route::post('ticket/create', [ContactController::class, 'ticketCreate'])->name('ticket.create');


    Route::get('/user-blogs', [ablogController::class, 'index3'])->name('user_blog');
    Route::get('/redem', [AccountController::class, 'redem'])->name('redem.index');
    Route::get('/cashout', [AccountController::class, 'cashout'])->name('redem.cashout');
    Route::Post('/withdraw', [AccountController::class, 'withdraw'])->name('redem.withdraw');
    Route::post('/redem/covert', [AccountController::class, 'covert'])->name('redem.convert');
    
    
    Route::get("/myrefer", function () {
        return View::make("frontend.myrefer");
    })->name('myrefer');


    Route::post('/create-blog', [ablogController::class, 'store2'])->name('create_blog');
    Route::get('blog/status/{blog}', [ablogController::class, 'status'])->name('blog.status');
    Route::delete('/blog-delete/{blog}', [ablogController::class, 'destory'])->name('blog_delete');
    Route::get('/blog-edit/{blog}', [ablogController::class, 'blog_edit_form2'])->name('blog_edit');
    Route::post('/blog-update', [ablogController::class, 'update_exit_blog'])->name('update_exit_blog');
    Route::get('/ads', [adsController::class, 'index'])->name('ads.index');
    Route::get('/ads/list', [adsController::class, 'list'])->name('ads.list');
    Route::get('/ads/edit/{ads}', [adsController::class, 'edit'])->name('ads.edit');
    Route::delete('/ads/{ads}', [adsController::class, 'delete'])->name('ads.delete');
    Route::get('/classic/', [adsController::class, 'all'])->name('clasified.all');
    
    Route::Post('/ads/create', [adsController::class, 'store'])->name('product.clasified.create');
    Route::Post('/ads/update', [adsController::class, 'update'])->name('product.clasified.update');

    Route::get('order/payment/{slug}', [OrderController::class, 'payform'])->name('order.pay.form');
    Route::Post('order/payment/create/{slug}', [OrderController::class, 'payCreate'])->name('order.pay.create');
});


Route::get('/classic/product/{slug}', [adsController::class, 'show'])->name('clasified.show');
Route::get('/{slug}', [pageController::class, 'pageshow'])->name('page');
Route::middleware(['auth', 'customer'])->group(function () {
    Route::get('setup/vendor', [VendorController::class, 'showSetupVendorFrom'])->name('setup.vendor.form');
    Route::post('setup/vendor', [VendorController::class, 'setupVendor'])->name('setup.vendor');
});



Route::middleware(['auth'])->group(function () {
    Route::post('product/comment/{slug}', [ProductController::class, 'comment'])->name('comment');
    // Route::post('product/comment/reply/{slug}/{id}', [ProductController::class, 'reply'])->name('reply');
});


Route::get('service/form', [ContactController::class, 'service'])->name('service');
Route::get('sheba/list', [HomeController::class, 'sheba'])->name('sheba');
Route::get('contact/form', [ContactController::class, 'index'])->name('contact');
Route::post('contact/create', [ContactController::class, 'store'])->name('contact.store');

Route::post('subscription', [subscriptionController::class, 'store'])->name('subscription');

// Guest Order
Route::post('order_guest', [OrderController::class, 'orderStore_guest'])->name('order.store_guest');
Route::post('order_minimal', [OrderController::class, 'orderStore_minimal'])->name('order.store_minimal');


// direct buy
Route::get('buy/product', [OrderController::class, 'buyProduct'])->name('buy.product');
Route::post('order/buy-now_guest', [OrderController::class, 'orderBuyNowStore_guest'])->name('order.buy.store_guest');
Route::post('order/buy-now_minimal', [OrderController::class, 'orderBuyNowStore_minimal'])->name('order.buy.store_minimal');


/** Google OAuth routes */
Route::get('/auth/google/redirect', [socialController::class, 'handleGoogleRedirect']);
Route::get('/auth/google/callback', [socialController::class, 'handleGoogleCallback']);
/** facebook OAuth routes */
Route::get('/auth/facebook/redirect', [socialController::class, 'handleFacebookRedirect']);
Route::get('/auth/facebook/callback', [socialController::class, 'handleFacebookCallback']);


Route::post('/save-token', [App\Http\Controllers\HomeController::class, 'saveToken'])->name('save-token');
Route::post('/send-notification', [App\Http\Controllers\HomeController::class, 'sendNotification'])->name('send.notification');
Route::post('register/send-otp', [RegisterController::class, 'sendotp'])->name('sendotp');



Route::post('/success', [OrderController::class, 'success'])->name('success');
Route::post('/fail', [OrderController::class, 'fail'])->name('fail');




Route::get('/cache', function () {
    Artisan::call('cache:clear');
    Artisan::call('config:clear');
    Artisan::call('view:clear');
    Artisan::call('route:clear');
    Artisan::call('storage:link');
    return 1;
});
