<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\Admin\Product\Productcontroller;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ColorController;
use App\Http\Controllers\OTPContoller;
use App\Http\Controllers\CartController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\payController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProvinceCitiesController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\VariantController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Berand\BerandController;

//Route::get('/storage-link', function(){
//    $targetFolder = storage_path('app/public');
//    $linkFolder = $_SERVER['DOCUMENT_ROOT']. '/storage';
//    symlink($targetFolder,$linkFolder);
//});



Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('product-details/{id}/{slug}', [HomeController::class, 'productSingle'])->name('product.details');
Route::post('/reviews', [ReviewController::class, 'store'])->middleware('throttle:2,10')->name('reviews.store');
Route::post('/cart/add/{id}', [CartController::class, 'addToCart'])->name('cart.add');
Route::post('/delete-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.delete');
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');

Route::post('/orders/{order}/finalize', [OrderController::class, 'finalize'])->name('orders.finalize');


Route::get('verify-otp', function(){ return view('auth.verify'); })->name('verify.otp.form');
Route::post('verify-otp', [OTPContoller::class, 'verify'])->name('verify.otp');


Route::post('/login', [LoginController::class, 'sendOtp'])->name('login.sendOtp');
Route::get('/login/verify', [LoginController::class, 'showVerifyForm'])->name('login.verify.form');
Route::post('/login/verify', [LoginController::class, 'verifyOtp'])->name('login.verifyOtp');

Route::get('/search-results', [SearchController::class, 'index'])->name('search.results');

Route::get('/shop',[HomeController::class, 'shop'])->name('shop');

Route::get('/category/{id}/{slug}', [HomeController::class, 'categorySingle'])->name('category.single');

Route::get('/discountProducts', [HomeController::class, 'discountProducts'])->name('discount.products');

Route::get('/contact', [ContactController::class, 'index'])->name('contact');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

Route::get('/about-us', [HomeController::class, 'aboutUs'])->name('about.us');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/cities/{provinceId}', [ProvinceCitiesController::class, 'getCities']);

    Route::get('/panel/user-address', [UserDashboardController::class, 'DashboardAddressCreate'])->name('user.address.create');
    Route::post('/panel/user-address', [AddressController::class, 'store'])->name('user.address.store');
    Route::delete('panel/delete-user-address/{id}', [AddressController::class, 'destroy'])->name('user.address.destroy');
    Route::post('/panel/address-update/{id}', [AddressController::class, 'update'])->name('user.address.update');

    Route::post('/orders/item', [OrderController::class, 'storeItem'])->name('orders.storeItem');
    Route::get('/checkout/{order_id}', [CheckoutController::class, 'index'])->name('checkout.store');
    Route::get('/dashboard-orders-details/{order}', [OrderController::class, 'index'])->name('dashboard.orders.details');

    Route::post('/pay', [payController::class, 'pay'])->name('pay.start');
    Route::get('/callback', [PayController::class, 'callback'])->name('payment.callback');
    Route::get('/pay-result', [PayController::class, 'payCancelled'])->name('pay.result');

});


//->middleware('admin')
Route::prefix('admin')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
//    products routes
    Route::get('/create-product', [ProductController::class, 'create'])->name('admin.product.create');
    Route::post('/store-product', [ProductController::class, 'store'])->name('admin.product.store');
    // در فایل routes/web.php
    Route::post('/products/upload-images', [ProductController::class, 'uploadImages'])->name('admin.product.uploadImages')->middleware('web');
    Route::get('/manage-product', [ProductController::class, 'index'])->name('admin.product.index');
    Route::post('/update-product-quantity/{id}', [ProductController::class, 'updateQuantity'])->name('admin.updateQuantity.update');
    Route::post('/update-discount-price/{id}', [ProductController::class, 'updateDiscountPrice'])->name('admin.updateDiscountPrice.update');
    Route::delete('/delete-product/{id}', [ProductController::class, 'delete'])->name('admin.product.destroy');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('admin.product.edit');
    Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('admin.product.update');

//    variants routes
    Route::post('/create-variant', [VariantController::class, 'store'])->name('admin.product.create.variant');
    Route::post('/update-variant/{variant}', [VariantController::class, 'update'])->name('admin.product.update.variant');
    Route::delete('/delete-variant/{variant}', [VariantController::class, 'destroy'])->name('admin.product.delete.variant');

//      categories routes
    Route::get('/create-category', [CategoryController::class, 'create'])->name('admin.category.create');
    Route::post('/store-category', [CategoryController::class, 'store'])->name('admin.category.store');
    Route::get('/all-categories', [CategoryController::class, 'index'])->name('admin.categories.index');
    Route::get('/edit-category/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
    Route::post('/update-category/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
    Route::post('/delete-category/{id}', [CategoryController::class, 'destroy'])->name('admin.category.destroy');


    Route::get('/create-berand', [BerandController::class, 'create'])->name('admin.dashboard.create');
    Route::post('/store-brand', [BerandController::class, 'store'])->name('admin.brand.store');


    Route::get('/orders', [App\Http\Controllers\Admin\Orders\OrderController::class, 'index'])->name('admin.order.index');
    Route::get('/order-details/{order}', [App\Http\Controllers\Admin\Orders\OrderController::class, 'details'])->name('admin.order.details');

    Route::get('/manage-reviews/', [ReviewController::class, 'index'])->name('admin.review.index');
    Route::post('/approve-review/{id}', [ReviewController::class, 'approve'])->name('admin.review.approve');
    Route::post('/delete-review/{id}', [ReviewController::class, 'destroy'])->name('admin.review.destroy');



    Route::get('/brands', [BerandController::class, 'index'])->name('admin.brand.index');
    Route::get('/edit-brand/{id}', [BerandController::class, 'edit'])->name('admin.brand.edit');
    Route::put('/update/brand/{id}', [BerandController::class, 'update'])->name('admin.brand.update');
    Route::post('/destroy-brand/{id}', [BerandController::class, 'destroy'])->name('admin.brand.destroy');


//    color
    Route::get('/color-create', [ColorController::class, 'create'])->name('admin.color.create');
    Route::post('/save-color', [ColorController::class, 'store'])->name('admin.color.store');
//    Route::post('/delete-color', [])
//    Route::get('/posts', [PostController::class, 'index'])->name('admin.posts');
//
//    Route::get('/services', [ServiceController::class, 'index'])->name('admin.services');
//    Route::get('/work-samples', [WorkSampleController::class, 'index'])->name('admin.work-samples');
//
//    Route::get('/post-create', [PostController::class, 'create'])->name('admin.posts.create');
//    Route::post('/post-store', [PostController::class, 'store'])->name('admin.posts.store');
//    Route::get('/post-edit/{id}', [PostController::class, 'show'])->name('admin.posts.edit');
//    Route::post('/post-update/{id}', [PostController::class, 'update'])->name('admin.posts.update');
//    Route::post('/post-destroy/{id}', [PostController::class, 'destroy'])->name('admin.posts.destroy');
//
//    Route::get('/comments', [CommentController::class, 'showComments'])->name('admin.comments');
//    Route::post('/comment-destroy/{id}', [CommentController::class, 'deleteComment'])->name('admin.comments.destroy');
//    Route::post('/comment-reply', [CommentController::class, 'updateCommentsAnswer'])->name('comments.reply');
//    Route::get('/approved-comments/{id}', [CommentController::class, 'approveComment'])->name('admin.comments.approved');
//
//    Route::get('/contacts', [ContactUsController::class, 'index'])->name('admin.contacts');
//    Route::post('/contact-destroy/{id}', [ContactUsController::class, 'destroy'])->name('contactus.destroy');

});

//use App\Models\Color;
//
//Route::get('/testsms', function (){
//    $colors = [
//        ['name' => 'آبی', 'code' => '#0000FF'],
//        ['name' => 'سورمه ای', 'code' => '#00008B'],
//        ['name' => 'سفید', 'code' => '#FFFFFF'],
//        ['name' => 'مشکی', 'code' => '#000000'],
//        ['name' => 'صورتی', 'code' => '#FFC0CB'],
//        ['name' => 'بنفش', 'code' => '#800080'],
//        ['name' => 'قرمز', 'code' => '#FF0000'],
//        ['name' => 'زرشکی', 'code' => '#8B0000'],
//        ['name' => 'طوسی', 'code' => '#808080'],
//        ['name' => 'تمام سفید', 'code' => '#FFFFFF'], // تکراری است ولی طبق درخواست اضافه شد
//        ['name' => 'تمام مشکی', 'code' => '#000000'], // تکراری است ولی طبق درخواست اضافه شد
//        ['name' => 'سفید سورمه ای', 'code' => '#E0E0FF'], // یا هر کد دیگری که مد نظرتان است
//        ['name' => 'سفید نقره ای', 'code' => '#E5E4E2'],
//        ['name' => 'سفید طوسی', 'code' => '#F0F0F0'],
//        ['name' => 'سفید نسکافه ای', 'code' => '#F5EEDC'],
//        ['name' => 'سفید صورتی', 'code' => '#FFFAF0'],
//        ['name' => 'سفید سبز', 'code' => '#F0FFF0'],
//        ['name' => 'سفید مشکی', 'code' => '#F8F8F8'], // یا #FAFAFA
//        ['name' => 'قهوه ای', 'code' => '#A52A2A'],
//        ['name' => 'کرم', 'code' => '#FFFDD0'],
//        ['name' => 'خردلی', 'code' => '#FFDB58'],
//        ['name' => 'نسکافه ای', 'code' => '#8B4513'],
//        ['name' => 'سبز', 'code' => '#008000'],
//        ['name' => 'سبز ارتشی', 'code' => '#4B5320'],
//        ['name' => 'طوسی تیره', 'code' => '#A9A9A9'],
//        ['name' => 'طوسی روشن', 'code' => '#D3D3D3'],
//        ['name' => 'طوسی بنفش', 'code' => '#B080B0'], // این کد یک نمونه است، ممکن است معنی دقیق آن متفاوت باشد
//        ['name' => 'طوسی صورتی', 'code' => '#C0A0C0'], // این کد یک نمونه است
//        ['name' => 'طوسی آبی', 'code' => '#A0B0C0'], // این کد یک نمونه است
//        ['name' => 'سرمه ای آبی', 'code' => '#4682B4'],
//        ['name' => 'کرم مشکی', 'code' => '#2F2A20'], // این کد یک نمونه است (برای متن کرم روی پس زمینه مشکی)
//        ['name' => 'بژ', 'code' => '#F5F5DC'],
//    ];
//
//    // حلقه برای ذخیره هر رنگ در دیتابیس
//    foreach ($colors as $colorData) {
//        Color::create([
//            'name' => $colorData['name'],
//            'code' => $colorData['code'],
//        ]);
//    }
//});

require __DIR__.'/auth.php';
