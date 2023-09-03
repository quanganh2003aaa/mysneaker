<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Shop\ShopController;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Blog;

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

//---------------------------ADMIN-----------------------------

Route::group(['middleware' => 'auth'], function () {
    Route::post('dang-xuat', 'Admin\AuthController@logout')
    ->name('logout');

    Route::get('Admin', function () {
        return view('Admin.home');
    })->name('admin.home');

    Route::group(array(
        'namespace' => 'Admin',
        'prefix' => 'Product/',
        'as' => 'admin.product.'
    ), function () {
        Route::get('Create', 'ProductController@create')->name('create');

        Route::get('index', 'ProductController@index')->name('index');

        Route::post('store', 'ProductController@store')->name('store');

        Route::delete('{product}', 'ProductController@destroy')->name('destroy');

        Route::get('{product}/edit', 'ProductController@edit')->name('edit');

        Route::put('{product}', 'ProductController@update')->name('update');
    });

    Route::get('Admin/Profile', 'Admin\AuthController@profile')->name('admin.profile');

    Route::post('Admin/Profile/Update', 'Admin\AuthController@updateProfile')->name('admin.profile.update');

    Route::post('Admin/Profile/UpdatePassword', 'Admin\AuthController@updatePassword')->name('admin.profile.updatePassword');

    Route::resource('blogs', BlogController::class);

    Route::resource('brands', BrandController::class);

    Route::get('Admin/List-Order', 'Shop\OrderController@orderListAdmin')->name('orderListAdmin');

    Route::get('Admin/List-Order/{order}', 'Shop\OrderController@orderSingleAdmin')->name('orderSingleAdmin');

    Route::put('Admin/list-Order/comfirm/{order}', 'Shop\OrderController@comfirmOrder')->name('comfirmOrder');

    Route::put('Admin/list-Order/complete/{order}', 'Shop\OrderController@completeOrder')->name('completeOrder');

    Route::put('Admin/list-Order/delete/{order}', 'Shop\OrderController@deleteOrder')->name('deleteOrder');

    Route::get('Product/index/1', 'Admin\ProductController@sol')->name('sol');

});

Route::get('dang-nhap', 'Admin\AuthController@getLogin')
->name('get.login');

Route::post('dang-nhap', 'Admin\AuthController@postLogin')
->name('post.login');

Route::get('dang-ki', 'Admin\AuthController@getRegister')
->name('get.register');

Route::post('dang-ki', 'Admin\AuthController@postRegister')
->name('post.register');

//---------------------------CLIENT--------------------------

Route::get('', function () {
    $blogs = Blog::orderBy('created_at','DESC')->limit(2)->get();
    $brands = Brand::orderBy('brand')->get();
    $bss = Product::orderBy('quantityProduct')->limit(10)->get();
    $products = Product::orderBy('priceProduct')->limit(8)->get();
    $products2 = Product::orderBy('priceProduct', 'DESC')->limit(8)->get();
    return view('Auth.shop.index', compact( 'brands', 'products', 'bss', 'products2', 'blogs'));
})->name('shop.index');

Route::get('Shop/Search', 'Shop\ShopController@search')->name('shop.search');

Route::get('Shop/Single-Product/{idProduct}', 'Shop\ShopController@singleProduct')->name('shop.singleProduct');

Route::get('Shop/{brand}', 'Shop\ShopController@listShopAll')->name('shop.listShopAll');

Route::get('Shop/MySneaker/Map', 'Shop\ShopController@map')->name('shop.map');

Route::get('Shop/MySneaker/Blog', 'Shop\ShopController@blog')->name('shop.blog');

Route::get('Shop/MySneaker/Blog/{blog}', 'Shop\ShopController@detailBlog')->name('shop.detailBlog');

Route::middleware(['middleware' => 'checklogin'])->group(function () {
    Route::get('Client/Infor', 'Client\ClientController@inforClient')->name('client.infor');

    Route::post('Client/Infor/Update', 'Client\ClientController@updateInforClient')->name('client.infor.update');

    Route::get('Client/Add-Cart', 'Client\ClientController@addCart')->name('client.addCart');

    Route::get('Client/Cart', 'Client\ClientController@cart')->name('client.cart');

    Route::get('Client/Cart/destroy/{i}', 'Client\ClientController@deleteCart')->name('client.cart.delete');

    Route::get('Client/CheckOut', 'Client\ClientController@checkOut')->name('client.checkOut');

    Route::get('Client/ThankYou', 'Client\ClientController@thank')->name('client.thank');

    Route::get('Client/List-Order', 'Shop\OrderController@orderListClient')->name('orderListClient');
});

Route::get('Client/Dang-Nhap', 'Client\ClientController@getClientLogin')
->name('get.clientLogin');

Route::post('Client/Dang-Nhap', 'Client\ClientController@postLogin')
->name('post.clientLogin');

Route::get('Client/Dang-Ki', 'Client\ClientController@getClientRegister')
->name('get.clientRegister');

Route::post('Client/Dang-Ki', 'Client\ClientController@postClientRegister')
->name('post.clientRegister');

Route::post('Client/Dang-xuat', 'Client\ClientController@logout')
    ->name('clientLogout');





