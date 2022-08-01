<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\Backend\OfferController;
use App\Http\Controllers\Backend\StockController;
use App\Http\Controllers\frontend\HomeController;
use App\Http\Controllers\Backend\ReportController;
use App\Http\Controllers\frontend\LoginController;
use App\Http\Controllers\frontend\FooterController;
use App\Http\Controllers\frontend\StripeController;

use App\Http\Controllers\Backend\CategoryController;
use App\Http\Controllers\Backend\CustomerController;
use App\Http\Controllers\frontend\ContactController;
use App\Http\Controllers\frontend\ProductController;
use App\Http\Controllers\frontend\ServiceController;
use App\Http\Controllers\Backend\DashBoardController;
use App\Http\Controllers\Backend\AdminLoginController;
use App\Http\Controllers\Backend\BlogController;
use App\Http\Controllers\Backend\ManageOrderController;
use App\Http\Controllers\Backend\PartnerController;
use App\Http\Controllers\Backend\SubCategoryController;
use App\Http\Controllers\Backend\ProductController as BproductController;
use App\Http\Controllers\Backend\ServiceController as BserviceController;
use App\Http\Controllers\Backend\TeamController;
use App\Http\Controllers\frontend\PackageController;
use App\Http\Controllers\frontend\UserProfileController;

// Website part
// Add to cart part
Route::group(['middleware' => 'check_customer'], function () {
    Route::get('/add/to/cart/{id}', [CartController::class, 'cart'])->name('add.to.cart');
    Route::get('/clear/cart', [CartController::class, 'clearCart'])->name('clear.cart');
    Route::get('/user/remove/cart/{id}', [CartController::class, 'remove'])->name('user.remove.cart');
    Route::get('/user/checkout', [CartController::class, 'checkout'])->name('user.checkout');
});

// User Profile
Route::get('/delete/orders/{id}', [UserProfileController::class, 'delete'])->name('delete.oders');
Route::get('/user/profile/{id}', [UserProfileController::class, 'profile'])->name('user.profile');
Route::get('/user/order/{id}', [UserProfileController::class, 'userOrder'])->name('user.orders');
Route::get('/user/cart/{id}', [UserProfileController::class, 'userCart'])->name('user.cart');
Route::get('/user/change/profile/image/{id}', [UserProfileController::class, 'changeImage'])->name('user.change.profile.image');
Route::get('/user/edit/profile/{id}', [UserProfileController::class, 'edit'])->name('user.edit.profile');
Route::post('/user/update/profile/{id}', [UserProfileController::class, 'updateProfile'])->name('user.update.profile');
Route::post('/user/update/profile/image/{id}', [UserProfileController::class, 'updateProfileImage'])->name('user.update.profile.image');

Route::group([], function () {
    Route::get('/', [HomeController::class, 'home'])->name('home');
    Route::get('/blog', [HomeController::class, 'blog'])->name('blog');
    Route::get('/team', [HomeController::class, 'teamMember'])->name('team');
    Route::get('/contact-us', [ContactController::class, 'contact'])->name('contact.us');
    Route::post('/contact-us', [ContactController::class, 'save'])->name('contact.store');
    // User Login
    Route::get('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/signup', [LoginController::class, 'signup'])->name('signup');
    Route::post('/userlogin', [LoginController::class, 'userlogin'])->name('user.login');
    Route::post('/usersignup', [LoginController::class, 'usersignup'])->name('user.signup');
    Route::get('/logout', [LoginController::class, 'userlogout'])->name('logout');
    Route::get('/check/banned', [LoginController::class, 'checkBanned'])->name('website.check.banned');
    // aboutus
    Route::get('/ataglance', [HomeController::class, 'glance'])->name('glance');
    Route::get('/missionandvision', [HomeController::class, 'mandv'])->name('mission.vision');
    Route::get('/messagefromceo', [HomeController::class, 'mfc'])->name('message.ceo');
    // footer
    Route::get('/privacy-policy', [FooterController::class, 'privacy'])->name('privacy.policy');
    Route::get('/termsandconditions', [FooterController::class, 'terms'])->name('terms.conditions');
    Route::get('/refundpolicy', [FooterController::class, 'refund'])->name('refund.policy');
    // payment
    Route::get('/payment/{id}', [StripeController::class, 'payment'])->name('payment');
    Route::post('/payment', [StripeController::class, 'paymentStore'])->name('payment.store');
    Route::post('/stripe', [StripeController::class, 'stripePost'])->name('stripe.post');
    // service pages
    Route::get('service/{slug}', [ServiceController::class, 'singleService'])->name("single-service");
    // products
    Route::get('/product_details', [ProductController::class, 'product'])->name('product.details');
    // package pages
    Route::get('package/{slug}', [PackageController::class, 'singlePackage'])->name("single-package");
});


// Admin Part
Route::group(['prefix' => 'admin'], function () {

    // admin login
    Route::get('/login', [AdminLoginController::class, 'form'])->name('admin.login.form');
    Route::post('/do/login', [AdminLoginController::class, 'doLogin'])->name('admin.do.login');
    Route::get('/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');

    Route::group(['middleware' => ['auth', 'check_admin']], function () {

        // dashboard & Logo
        Route::get('/dashboard', [DashBoardController::class, 'dashboard'])->name('admin.dashboard');
        Route::get('/logosetting', [DashBoardController::class, 'logo'])->name('logo.setting');
        Route::get('/add/logo', [DashBoardController::class, 'addLogo'])->name('add.logo');
        Route::post('/store/logo', [DashBoardController::class, 'store'])->name('store.logo');
        Route::get('/edit/logo/{id}', [DashBoardController::class, 'edit'])->name('edit.logo');
        Route::post('/update/logo/{id}', [DashBoardController::class, 'update'])->name('update.logo');
        Route::get('/delete/logo/{id}', [DashBoardController::class, 'delete'])->name('delete.logo');
        Route::get('/view/logo/{id}', [DashBoardController::class, 'view'])->name('view.logo');
        Route::post('/change/logo/image/{id}', [DashBoardController::class, 'change'])->name('change.logo.image');


        //blog
        Route::get('/blogsetting', [BlogController::class, 'blog'])->name('blog.setting');
        Route::get('/add/blog', [BlogController::class, 'addblog'])->name('add.blog');
        Route::post('/store/blog', [BlogController::class, 'store'])->name('store.blog');
        Route::get('/edit/blog/{id}', [BlogController::class, 'edit'])->name('edit.blog');
        Route::post('/update/blog/{id}', [BlogController::class, 'update'])->name('update.blog');
        Route::get('/delete/blog/{id}', [BlogController::class, 'delete'])->name('delete.blog');
        Route::get('/view/blog/{id}', [BlogController::class, 'view'])->name('view.blog');
        Route::post('/change/blog/image/{id}', [BlogController::class, 'change'])->name('change.blog.image');


        // partner
        Route::get('/partnersetting', [PartnerController::class, 'partner'])->name('partner.setting');
        Route::get('/add/partner', [PartnerController::class, 'addPartner'])->name('add.partner');
        Route::post('/store/partner', [PartnerController::class, 'store'])->name('store.partner');
        Route::get('/edit/partner/{id}', [PartnerController::class, 'edit'])->name('edit.partner');
        Route::post('/update/partner/{id}', [PartnerController::class, 'update'])->name('update.partner');
        Route::get('/delete/partner/{id}', [PartnerController::class, 'delete'])->name('delete.partner');
        Route::get('/view/partner/{id}', [PartnerController::class, 'view'])->name('view.partner');
        Route::post('/change/partner/image/{id}', [PartnerController::class, 'change'])->name('change.partner.image');

        // team
        Route::get('/teamsetting', [TeamController::class, 'team'])->name('team.setting');
        Route::get('/add/team', [TeamController::class, 'addTeam'])->name('add.team');
        Route::post('/store/team', [TeamController::class, 'store'])->name('store.team');
        Route::get('/edit/team/{id}', [TeamController::class, 'edit'])->name('edit.team');
        Route::post('/update/team/{id}', [TeamController::class, 'update'])->name('update.team');
        Route::get('/delete/team/{id}', [TeamController::class, 'delete'])->name('delete.team');
        Route::get('/view/team/{id}', [TeamController::class, 'view'])->name('view.team');
        Route::post('/change/team/image/{id}', [TeamController::class, 'change'])->name('change.team.image');

        // Category
        Route::get('/manage/category', [CategoryController::class, 'manageCategory'])->name('admin.manage.category');
        Route::get('/add/category', [CategoryController::class, 'addCategory'])->name('admin.add.category');
        Route::post('/store/category', [CategoryController::class, 'store'])->name('admin.store.category');
        Route::get('/edit/category/{id}', [CategoryController::class, 'editCategory'])->name('admin.edit.category');
        Route::post('/update/category/{id}', [CategoryController::class, 'update'])->name('admin.update.category');
        Route::get('/delete/category/{id}', [CategoryController::class, 'delete'])->name('admin.delete.category');
        Route::get('/view/category/image/{id}', [CategoryController::class, 'view'])->name('admin.view.category');
        Route::post('/change/category/image/{id}', [CategoryController::class, 'change'])->name('admin.change.category.image');

        // Sub-Category
        Route::get('/manage/subCategory', [SubCategoryController::class, 'manageSubCategory'])->name('admin.manage.subCategory');
        Route::get('/add/subCategory', [SubCategoryController::class, 'addSubCategory'])->name('admin.add.subCategory');
        Route::post('/store/subCategory', [SubCategoryController::class, 'store'])->name('admin.store.subCategory');
        Route::get('/edit/subCategory/{id}', [SubCategoryController::class, 'edit'])->name('admin.edit.subCategory');
        Route::post('/update/subCategory/{id}', [SubCategoryController::class, 'update'])->name('admin.update.subCategory');
        Route::get('/delete/subCategory/{id}', [SubCategoryController::class, 'delete'])->name('admin.delete.subCategory');

        // Product
        Route::get('/manage/product', [BproductController::class, 'manageProduct'])->name('admin.manage.product');
        Route::get('/add/product', [BproductController::class, 'add'])->name('admin.add.product');
        Route::post('/store/product', [BproductController::class, 'store'])->name('admin.store.product');
        Route::get('/edit/product/{id}', [BproductController::class, 'edit'])->name('admin.edit.product');
        Route::post('/update/product/{id}', [BproductController::class, 'update'])->name('admin.update.product');
        Route::get('/delete/product/{id}', [BproductController::class, 'delete'])->name('admin.delete.product');
        Route::get('/view/product/image/{id}', [BproductController::class, 'view'])->name('admin.view.product');
        Route::post('/change/product/image/{id}', [BproductController::class, 'change'])->name('admin.change.product.image');

        //Services
        Route::get('/manage/service', [BserviceController::class, 'manageService'])->name('admin.manage.service');
        Route::get('/add/service', [BserviceController::class, 'add'])->name('admin.add.service');
        Route::post('/store/service', [BserviceController::class, 'store'])->name('admin.store.service');
        Route::get('/edit/service/{id}', [BserviceController::class, 'edit'])->name('admin.edit.service');
        Route::post('/update/service/{id}', [BserviceController::class, 'update'])->name('admin.update.service');
        Route::get('/delete/service/{id}', [BserviceController::class, 'delete'])->name('admin.delete.service');
        Route::get('/view/service/image/{id}', [BserviceController::class, 'view'])->name('admin.view.service');
        Route::post('/change/service/image/{id}', [BserviceController::class, 'change'])->name('admin.change.service.image');

        // Stock
        Route::get('/manage/stock', [StockController::class, 'manageStock'])->name('admin.manage.stock');
        Route::get('/add/stock', [StockController::class, 'add'])->name('admin.add.stock');
        Route::post('/store/stock', [StockController::class, 'store'])->name('admin.store.stock');
        Route::get('/edit/stock/{id}', [StockController::class, 'edit'])->name('admin.edit.stock');
        Route::post('/update/stock/{id}', [StockController::class, 'update'])->name('admin.update.stock');
        Route::get('/delete/stock/{id}', [StockController::class, 'delete'])->name('admin.delete.stock');

        // Offer
        Route::get('/manage/offer', [OfferController::class, 'manageOffer'])->name('admin.manage.offer');
        Route::get('/add/offer', [OfferController::class, 'add'])->name('admin.add.offer');
        Route::post('/store/offer', [OfferController::class, 'store'])->name('admin.store.offer');
        Route::get('/view/offer/{id}', [OfferController::class, 'viewOffer'])->name('admin.view.offer');
        Route::post('/change/offer/image/{id}', [OfferController::class, 'change'])->name('admin.change.offer.image');
        Route::get('/edit/offer/{id}', [OfferController::class, 'edit'])->name('admin.edit.offer');
        Route::post('/update/offer/{id}', [OfferController::class, 'update'])->name('admin.update.offer');
        Route::get('/delete/offer/{id}', [OfferController::class, 'delete'])->name('admin.delete.offer');

        // Order List
        Route::get('/manage/order', [ManageOrderController::class, 'manageOrder'])->name('admin.manage.order');
        Route::get('/accept/order/{id}', [ManageOrderController::class, 'acceptOrder'])->name('admin.accept.order');
        Route::get('/update/stock/after/order{id}', [ManageOrderController::class, 'updateStock'])->name('update.stock.after.order');
        Route::get('/reject/order/{id}', [ManageOrderController::class, 'rejectOrder'])->name('admin.reject.order');

        // Customer List
        Route::get('/manage/customer', [CustomerController::class, 'manageCustomer'])->name('admin.manage.customer');
        Route::get('/ban/customer/{id}', [CustomerController::class, 'banCustomer'])->name('admin.ban.customer');
        Route::get('/un-ban/customer/{id}', [CustomerController::class, 'unBanCustomer'])->name('admin.un.ban.customer');
        Route::get('/delete/customer/{id}', [CustomerController::class, 'deleteCustomer'])->name('admin.delete.customer');

        // Company Report
        Route::get('/view/report', [ReportController::class, 'viewReport'])->name('admin.view.report');
    });
});
