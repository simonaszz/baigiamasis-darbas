<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\ProfileController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Backend\BrandController;
use App\Http\Controllers\User\WishlistController;
use App\Http\Controllers\Backend\ProductController;
use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Backend\SubCategoryController;


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
    return view('frontend.index');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [UserController::class, 'UserDashboard'])->name('dashboard');
    Route::post('/user/profile/store', [UserController::class, 'UserProfileStore'])->name('user.profile.store');
    Route::get('/user/logout', [UserController::class, 'UserLogout'])->name('user.logout');
    Route::post('/user/update/password', [UserController::class, 'UserUpdatePassword'])->name('user.update.password');




});

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';



//Admin Dashboard

Route::middleware(['auth', 'role:0'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('/admin/logout', [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'AdminProfile'])->name('admin.profile');
    Route::post('/admin/profile/store', [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/admin/change/password', [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/admin/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');


});



//Vendor Dashboard
Route::middleware(['auth', 'role:1'])->group(function () {
    Route::get('/vendor/dashboard', [VendorController::class, 'VendorDashboard'])->name('vendor.dashboard');
    Route::get('/vendor/logout', [VendorController::class, 'VendorDestroy'])->name('vendor.logout');
    Route::get('/vendor/profile', [VendorController::class, 'VendorProfile'])->name('vendor.profile');
    Route::post('/vendor/profile/store', [VendorController::class, 'VendorProfileStore'])->name('vendor.profile.store');
    Route::get('/vendor/change/password', [VendorController::class, 'VendorChangePassword'])->name('vendor.change.password');
    Route::post('/vendor/update/password', [VendorController::class, 'VendorUpdatePassword'])->name('vendor.update.password');

});

Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->middleware(RedirectIfAuthenticated::class);

Route::get('/vendor/login', [VendorController::class, 'VendorLogin'])->name('vendor.login')->middleware(RedirectIfAuthenticated::class);

Route::get('/become/vendor', [VendorController::class, 'BecomeVendor'])->name('become.vendor');
Route::post('/vendor/register', [VendorController::class, 'VendorRegister'])->name('vendor.register');


//Brand all route
Route::middleware(['auth', 'role:0'])->group(function () {

    Route::controller(BrandController::class)->group(function () {
        Route::get('/all/brand', 'AllBrand')->name('all.brand');
        Route::get('/add/brand', 'AddBrand')->name('add.brand');
        Route::get('/edit/brand/{id}', 'EditBrand')->name('edit.brand');
        Route::get('/delete/brand/{id}', 'DeleteBrand')->name('delete.brand');
        Route::post('/store/brand', 'StoreBrand')->name('store.brand');
        Route::post('/update/brand', 'UpdateBrand')->name('update.brand');
    });

    //cat route
    Route::controller(CategoryController::class)->group(function () {
        Route::get('/all/category', 'AllCategory')->name('all.category');
        Route::get('/add/category', 'AddCategory')->name('add.category');
        Route::get('/edit/category/{id}', 'EditCategory')->name('edit.category');
        Route::get('/delete/category/{id}', 'DeleteCategory')->name('delete.category');
        Route::post('/store/category', 'StoreCategory')->name('store.category');
        Route::post('/update/category', 'UpdateCategory')->name('update.category');
    });

    //subcat route
    Route::controller(SubCategoryController::class)->group(function () {
        Route::get('/all/subcategory', 'AllSubCategory')->name('all.subcategory');
        Route::get('/add/subcategory', 'AddSubCategory')->name('add.subcategory');
        Route::get('/edit/subcategory/{id}', 'EditSubCategory')->name('edit.subcategory');
        Route::get('/delete/subcategory/{id}', 'DeleteSubCategory')->name('delete.subcategory');
        Route::get('/subcategory/ajax/{category_id}', 'GetSubCategory');

        Route::post('/store/subcategory', 'StoreSubCategory')->name('store.subcategory');
        Route::post('/update/subcategory', 'UpdateSubCategory')->name('update.subcategory');

    });

    //Vendor active and inactive all route


    Route::controller(AdminController::class)->group(function () {
        Route::get('/inactive/vendor', 'InactiveVendor')->name('inactive.vendor');
        Route::get('/active/vendor', 'ActiveVendor')->name('active.vendor');
        Route::get('/inactive/vendor/details/{id}', 'InactiveVendorDetails')->name('inactive.vendor.details');
        Route::post('/active/vendor/approve', 'ActiveVendorApprove')->name('active.vendor.approve');
        Route::post('/inactive/vendor/approve', 'InactiveVendorApprove')->name('inactive.vendor.approve');
        Route::get('/active/vendor/details/{id}', 'ActiveVendorDetails')->name('active.vendor.details');



    });
    //product all route
    Route::controller(ProductController::class)->group(function () {
        Route::get('/all/product', 'AllProduct')->name('all.product');
        Route::get('/add/product', 'AddProduct')->name('add.product');
        Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::post('/store/product', 'StoreProduct')->name('store.product');
        Route::post('/update/product', 'UpdateProduct')->name('update.product');
        Route::post('/update/product/thumbnail', 'UpdateProductThumbnail')->name('update.product.thumbnail');
        Route::post('/update/product/multiimage', 'UpdateProductMultiimage')->name('update.product.multiimage');
        Route::get('/product/multiimag/delete/{id}', 'ProductMultiimagDelete')->name('product.multiimg.delete');

        Route::get('/product/inactive/{id}', 'ProductInactive')->name('product.inactive');
        Route::get('/product/active/{id}', 'ProductActive')->name('product.active');
        Route::get('/delete/product/{id}', 'ProductDelete')->name('delete.product');

    });


});

//add wishlist
Route::post('/product/details/{id}/{slug}', [IndexController::class, 'ProductDetails']);
Route::post('/product/product{id}', [IndexController::class, 'ProductId']);

Route::post('/add-to-wishlist/{product_id}', [WishlistController::class, 'AddToWishList']);