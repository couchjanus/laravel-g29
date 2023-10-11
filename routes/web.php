<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });


Route::get('/hello', function ($name = "World") {

    return view('hello', ['name' => $name]);
});


Route::get('about-us', [App\Http\Controllers\AboutController::class, 'index'])->name('about');

use App\Http\Controllers\ContactController;
use Illuminate\Routing\Route as RoutingRoute;

// Route::get('contact', [ContactController::class, 'index']);
Route::get('contact', 'App\Http\Controllers\ContactController@index')->name('contact');



Route::resource('admin/categories', 'App\Http\Controllers\Admin\CategoriesController');

// Auth::routes(['verify' => true]);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::get('checkout', [App\Http\Controllers\CheckoutController::class, 'checkout'])->name('checkout.index');
    Route::post('checkout/order', [App\Http\Controllers\CheckoutController::class, 'placeOrder'])->name('checkout.place.order');

    Route::get('admin', 'App\Http\Controllers\Admin\DashboardController');

    Route::get('admin/brands/trashed', 'App\Http\Controllers\Admin\BrandController@trashed')->name('brands.trashed');

    Route::post('admin/brands/restore/{id}', 'App\Http\Controllers\Admin\BrandController@restore')->name('brands.restore');

    Route::delete('admin/brands/force/{id}', 'App\Http\Controllers\Admin\BrandController@force')->name('brands.force');

    Route::resource('admin/brands', 'App\Http\Controllers\Admin\BrandController');

    Route::resource('admin/roles', 'App\Http\Controllers\Admin\RoleController');

    Route::get('admin/tags', 'App\Http\Controllers\Admin\TagController@index')->name('tags.index');
    Route::post('admin/tags', 'App\Http\Controllers\Admin\TagController@store')->name('tags.store');
    Route::get('admin/tags/create', 'App\Http\Controllers\Admin\TagController@create')->name('tags.create');
    Route::get('admin/tags/{tag:slug}', 'App\Http\Controllers\Admin\TagController@show')->name('tags.show');
    Route::put('admin/tags/{tag:slug}', 'App\Http\Controllers\Admin\TagController@update')->name('tags.update');
    Route::delete('admin/tags/{tag:slug}', 'App\Http\Controllers\Admin\TagController@destroy')->name('tags.destroy');
    Route::get('admin/tags/{tag:slug}/edit', 'App\Http\Controllers\Admin\TagController@edit')->name('tags.edit');



});

use App\Livewire\Users\{CreateUser, EditUser, ShowUser};
Route::get('/users/create', CreateUser::class)->name('users.create');
Route::get('/users/{user}', ShowUser::class)->name('users.show');
Route::get('/users/{user}/edit', EditUser::class)->name('users.edit');

Route::get('/users', 'App\Http\Controllers\Admin\UserTable')->name('users.index');

use App\Livewire\Products\{CreateProduct, UpdateProduct, ShowProduct};
Route::get('/products/create', CreateProduct::class)->name('products.create');
Route::get('/products/{product}', ShowProduct::class)->name('products.show');
Route::get('/products/{product}/edit', UpdateProduct::class)->name('products.edit');

Route::get('/products', 'App\Http\Controllers\Admin\ProductTable')->name('products.index');


use App\Livewire\App\{HomePage, ShoppingCart};
Route::get('/', HomePage::class)->name('index');


Route::get('shopping-cart', ShoppingCart::class)->name('shopping.cart');


Route::get('/order', function() {
    return new App\Mail\OrderShipped();
});

Route::get('/send-order', function() {
    \Mail::to('test@my.com')->send(new App\Mail\OrderShipped());
    return "<h2>The message has been sentto MailTrap successfully. </h2>";
});


Route::get('/email/verify', function () {
    return view('auth.verify-email');
})->middleware('auth')->name('verification.notice');

use Illuminate\Foundation\Auth\EmailVerificationRequest;

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/home');
})->middleware(['auth', 'signed'])->name('verification.verify');

use Illuminate\Http\Request;

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth', 'throttle:6,1'])->name('verification.send');

