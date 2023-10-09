<?php
use App\Http\Controllers\MainController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubCategoryController;
use App\Http\Controllers\BrandController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;


Route::get('/', [MainController::class,'index']);
Route::get('/cart', [MainController::class,'cart']);
Route::get('/shop', [MainController::class,'shop']);
Route::get('/single/{id}', [MainController::class,'singleProduct']);
Route::get('/checkout', [MainController::class,'checkout']);
Route::get('/register', [MainController::class,'register']);
Route::post('/registerUser', [MainController::class,'registerUser']);
Route::get('/login', [MainController::class,'login']);
Route::post('/loginUser', [MainController::class,'loginUser']);
Route::get('/logout', [MainController::class,'logout']);
Route::get('/myOrders', [MainController::class,'myOrders']);
Route::get('/profile', [MainController::class,'profile']);
Route::post('/updateUser', [MainController::class,'updateUser']);
Route::post('/addToCard', [MainController::class,'addToCard']);
Route::get('/deleteCartItem/{id}', [MainController::class,'deleteCartItem']);
Route::post('/updateCart', [MainController::class,'updateCart']);
Route::post('/checkout', [MainController::class,'checkout']);
Route::get('/product_by_cat/{id}',[MainController::class,'product_by_cat']);
Route::get('/product_by_brand/{id}',[MainController::class,'product_by_brand']);

// Admin routes
Route::middleware(['Admin'])->group(function () {
    Route::get('/admin', [AdminController::class,'index']);
    Route::get('/ad_profile', [AdminController::class,'ad_profile']);
    Route::post('/updateUser', [AdminController::class,'updateUser']);
    Route::get('/ourCustomers', [AdminController::class,'ourCustomers']);
    Route::get('/changeUserStatus/{status}/{id}',[AdminController::class,'changeUserStatus']);
    Route::get('/changeOrderStatus/{status}/{id}',[AdminController::class,'changeOrderStatus']);
    Route::get('/orders', [AdminController::class,'orders']);
    Route::get('/view_orderDetails/{id}', [AdminController::class,'view_orderDetails']);

      //Category Routes
    Route::resource('/categories', CategoryController::class);
    Route::get('/cat-status{category}', [CategoryController::class,'change_status']);
      //SubCategory Routes
    Route::resource('/sub-categories', SubCategoryController::class);
    Route::get('/subcat-status{subcategory}', [SubCategoryController::class,'change_status']);
    //Brand Routes
    Route::resource('/brands', BrandController::class);
    Route::get('/brand-status{brand}', [BrandController::class,'change_status']);
     //Product Routes
     Route::resource('/products', ProductController::class);
     Route::get('/product-status{product}', [ProductController::class,'change_status']);
     
}); 




