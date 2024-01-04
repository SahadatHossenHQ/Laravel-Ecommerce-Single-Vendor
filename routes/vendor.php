<?php

use App\Http\Controllers\Vendor\DashboardController;
use App\Http\Controllers\Vendor\ProductController;
use App\Http\Controllers\Vendor\OrderController;
use App\Http\Controllers\Vendor\CustomOrderController;
use App\Http\Controllers\Vendor\ProfileController;
use App\Http\Controllers\Admin\attributeController;
use App\Http\Controllers\WithdrawController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth', 'vendor'])->group(function () {
    Route::get('dashboard', DashboardController::class)->name('dashboard');
    Route::Post('/get/attributes', [attributeController::class, 'getAttribute']);
    Route::get('get/product/image/{id}', [ProductController::class, 'getProductImage']);
    Route::post('update/product/image', [ProductController::class, 'updateImage'])->name('update.image');
    Route::delete('delete/product/image/{id}', [ProductController::class, 'deleteImage']);
    Route::get('product/status/{id}', [ProductController::class, 'status'])->name('product.status');
    Route::get('product/active', [ProductController::class, 'activeProduct'])->name('product.active');
    Route::get('product/disable', [ProductController::class, 'disableProduct'])->name('product.disable');
    Route::post('get/sub-categories', [ProductController::class, 'subCategory']);
    Route::post('get/mini-categories', [ProductController::class, 'miniCategory']);
    Route::post('get/extra-categories', [ProductController::class, 'extraCategory']);
    Route::get('delete/product/download/{id}', [ProductController::class, 'deleteDownloadFile']);
    Route::post('update/product/download', [ProductController::class, 'updateDownloadFile']);
    Route::resource('product', ProductController::class);
    Route::get('low/product', [ProductController::class, 'lowProduct'])->name('low.product');

    Route::post('product/order', [CustomOrderController::class, 'orderProductStore'])->name('product.order.store');
    Route::get('product/order/{id}', [CustomOrderController::class, 'orderProduct'])->name('product.order');
    Route::get('apply/coupon/{code}/{id}', [CustomOrderController::class, 'applyCoupon'])->name('apply.coupon');


    // Auth User Profile Define Here....
    Route::group(['as' => 'profile.', 'prefix' => 'profile'], function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::get('update', [ProfileController::class, 'showUpdateProfileForm'])->name('update');
        Route::put('info', [ProfileController::class, 'updateInfo'])->name('update.info');
        Route::get('change-password', [ProfileController::class, 'showChangePasswordForm'])->name('change.password');
        Route::put('password/update', [ProfileController::class, 'updatePassword'])->name('password.update');

    });
    Route::get('withdraw', [WithdrawController::class, 'withdraw'])->name('withdraw');
    Route::get('withdraw/list', [WithdrawController::class, 'userWithList'])->name('withdraw.list');
    Route::POST('withdraw/create', [WithdrawController::class, 'create'])->name('withdraw.create');

     Route::group(['as' => 'order.', 'prefix' => 'order'], function() {
        Route::get('/', [OrderController::class, 'index'])->name('index');
        Route::get('invoice/{id}', [OrderController::class, 'invoice'])->name('invoice');
        Route::get('pending', [OrderController::class, 'pending'])->name('pending');
        Route::get('pre', [OrderController::class, 'pre'])->name('pre');
        Route::get('processing', [OrderController::class, 'processing'])->name('processing');
        Route::get('cancel', [OrderController::class, 'cancel'])->name('cancel');
        Route::get('delivered', [OrderController::class, 'delivered'])->name('delivered');
        Route::get('partials', [OrderController::class, 'partials'])->name('partials');
        Route::GEt('partials/status/{id}/{st}', [OrderController::class, 'partialStatus'])->name('partials.status');
        Route::get('print/{id}', [OrderController::class, 'print'])->name('print');
        Route::get('{id}', [OrderController::class, 'show'])->name('show');
        
     Route::get('order/delete/{did}',[OrderController::class,'delete'])->name('delete');

        Route::get('status/processing/{id}', [OrderController::class, 'statusProcessing'])->name('status.processing');
        Route::get('status/cancel/{id}', [OrderController::class, 'statusCancel'])->name('status.cancel');
        Route::get('status/delivered/{id}', [OrderController::class, 'statusDelivered'])->name('status.delivered');
        Route::get('status/shipping/{id}', [OrderController::class, 'statusShipping'])->name('status.shipping');
    });
});

