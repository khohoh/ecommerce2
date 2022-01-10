<?php

use App\Http\Controllers\Admin\AdminOrderController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\FrontendController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\User\CartController;
use App\Http\Controllers\User\CheckoutController;
use App\Http\Controllers\User\OrderController;
use App\Http\Controllers\User\UserHomeController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;



Route::get('/', [UserHomeController::class, 'index'])->name('user.home');
Route::get('/category', [UserHomeController::class, 'category'])->name('user.category');
Route::get('/view_category/{category:slug}', [UserHomeController::class, 'viewCategory'])->name('user.view_category');
Route::get('/view_product/{category_slug}/{product_slug}', [UserHomeController::class, 'viewProduct']);

Route::middleware(['auth'])->group(function ()
{
    Route::get('/cart', [CartController::class, 'viewCart'])->name('user.view_cart');
    Route::post('/add_to_cart', [CartController::class, 'addProduct']);
    Route::post('/update_cart', [CartController::class, 'updateCart']);
    Route::post('/delete_cart_item', [CartController::class, 'deleteCart']);
    Route::get('/checkout', [CheckoutController::class, 'index'])->name('user.checkout');
    Route::post('/place_order', [CheckoutController::class, 'placeOrder'])->name('user.place_order');

    Route::get('/my_orders', [OrderController::class, 'index'])->name('user.my_orders');
    Route::get('/view_order/{order}', [OrderController::class, 'viewOrder'])->name('user.view_order');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['isAdmin'])->group(function () {
    Route::get('/dashboard', [FrontendController::class, 'index'])->name('admin.index');

    Route::get('/categories', [CategoryController::class, 'index'])->name('admin.categories_index');
    Route::get('/create_categories', [CategoryController::class, 'create'])->name('admin.create_categories');
    Route::post('/store_categories', [CategoryController::class, 'store'])->name('admin.store_categories');
    Route::get('/edit_categories/{category}', [CategoryController::class, 'edit'])->name('admin.edit_categories');
    Route::put('/update_categories/{category}', [CategoryController::class, 'update'])->name('admin.update_categories');
    Route::delete('/delete_categories/{category}', [CategoryController::class, 'destroy'])->name('admin.delete_categories');

    Route::get('/products', [ProductController::class, 'index'])->name('admin.products_index');
    Route::get('/create_products', [ProductController::class, 'create'])->name('admin.create_products');
    Route::post('/store_products', [ProductController::class, 'store'])->name('admin.store_products');
    Route::get('/edit_products/{product}', [ProductController::class, 'edit'])->name('admin.edit_products');
    Route::put('/update_products/{product}', [ProductController::class, 'update'])->name('admin.update_products');
    Route::delete('/delete_products/{product}', [ProductController::class, 'destroy'])->name('admin.delete_products');

    Route::get('/admin_orders', [AdminOrderController::class, 'index'])->name('admin.orders');
    Route::get('/admin_view_order/{id}', [AdminOrderController::class, 'viewOrder'])->name('admin.view_order');
    Route::put('/admin_complete_order/{id}', [AdminOrderController::class, 'completeOrder'])->name('admin.complete_order');
    Route::get('/admin_completed_orders', [AdminOrderController::class, 'completedOrders'])->name('admin.completed_orders');

    Route::get('/all_users', [AdminUserController::class, 'index'])->name('admin.all_users');
    Route::get('/view_users/{id}', [AdminUserController::class, 'viewUser'])->name('admin.view_user');
});
