<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\RolesController;
use App\Http\Middleware\AdminMiddleware;
use App\Http\Controllers\ReviewsController;
use App\Http\Controllers\RestaurantController;
use App\Http\Controllers\StoresController;
use App\Http\Controllers\StoreOrderController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\SearchController;


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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/userhome', function () {
    return view('userhome');
});


Route::view('/access-denied', 'access_denied')->name('access.denied');


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/roles', [RolesController::class, 'index'])->name('roles.index');
    Route::get('/roles/create', [RolesController::class, 'create'])->name('roles.create');
    Route::post('/roles', [RolesController::class, 'store'])->name('roles.store');
    Route::get('/roles/{role}', [RolesController::class, 'show'])->name('roles.show');
    Route::get('/roles/{role}/edit', [RolesController::class, 'edit'])->name('roles.edit');
    Route::put('/roles/{role}', [RolesController::class, 'update'])->name('roles.update');
    Route::delete('/roles/{role}', [RolesController::class, 'destroy'])->name('roles.destroy');

    Route::get('/roles2', [RolesController::class, 'index2'])->name('roles.index2');
    Route::post('/roles/store/{id}/accept', [RolesController::class, 'acceptStore'])->name('roles.acceptStore');
    Route::post('/roles/store/{id}/reject', [RolesController::class, 'rejectStore'])->name('roles.rejectStore');

    Route::get('assignform', [RolesController::class, 'showAssignForm'])->name('roles.assignForm');
    Route::post('assignrole', [RolesController::class, 'assignRole'])->name('roles.assign');

    Route::get('users', [RolesController::class, 'indexUsers'])->name('roles.indexUsers');
    Route::delete('users/{id}', [RolesController::class, 'deleteUser'])->name('roles.deleteUser');
    Route::get('users/{id}/edit', [RolesController::class, 'editUser'])->name('roles.editUser');
    Route::delete('users/{id}/role', [RolesController::class, 'deleteUserRole'])->name('roles.deleteUserRole');
    Route::put('users/{id}', [RolesController::class, 'updateUser'])->name('roles.updateUser');

    Route::get('/liststores', [RolesController::class, 'listStores'])->name('roles.listStores');
    Route::get('/stores/{store}/edit', [RolesController::class, 'editStore'])->name('stores.edit');
    Route::put('/stores/{store}', [RolesController::class, 'updateStore'])->name('stores.update');
    Route::delete('/stores/{store}', [RolesController::class, 'destroyStore'])->name('stores.destroy');
    Route::get('/stores/create', [RolesController::class, 'createStore'])->name('stores.create');
    Route::post('/stores', [RolesController::class, 'storeStore'])->name('stores.store');
});

Route::get('/access-denied', function () {
    return view('access_denied');
})->name('access.denied');

Route::get('/restaurant/create', [RestaurantController::class,'create'])->name('restaurant.create');


//Route::post("store/{id}", [reviewcontroller::class,'store'])->name('store');
//Route::get("create/{id}", [reviewcontroller::class,'create'])->name('create');
Route::get('/review', function () {
    return view('reviews');
});
Route::post("review/{store_id}", [ReviewsController::class,'create'])->name('review');


Route::get('review/{id}',[ReviewsController::class,'review'])->name('reviews');
Route::post('postreview/{id}',[ReviewsController::class,'addReview'])->name('addReview');
Route::get('/stores', [StoresController::class, 'index'])->name('stores.index');
Route::post('/StoreCreated', [StoresController::class, 'create'])->name('stores.create2');
Route::get('/stores/{storeId}', [StoresController::class, 'showMenu'])->name('stores.show_menu');
Route::get('/stores/{storeId}/menus/{menuId}', [StoresController::class, 'menu'])->name('stores.menu');
Route::delete('/reviews/{id}', [ReviewsController::class,'destroy'])->name('reviews.destroy');
Route::get('/stores/{storeId}/menus/{menuId}/items/{itemId}', [StoreOrderController::class, 'create'])->name('stores.order');

Route::get('/stores/{store_id}/reviews', 'App\Http\Controllers\StoreController@showReviews')->name('store.reviews');

    // Show order form
 //   Route::get('createorder', [StoreOrderController::class, 'create'])->name('');
    Route::get('createorder/{id}',[StoreOrderController::class,'create'])->name('store.orders.create');

    // Store order
    Route::post('postorder/{id}', [StoreOrderController::class, 'storeOrder'])->name('store.orders.store');
    
    // Show specific order

    Route::get('/orders', [StoreOrderController::class, 'showOrders'])->name('showorder');
