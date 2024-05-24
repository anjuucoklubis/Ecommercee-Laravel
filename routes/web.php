<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryProductController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomepageController;
use App\Http\Controllers\ManageUserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RoleController;
use App\Models\CategoryProduct;
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
//     return view('modules.front.layouts.app');
// });

// Route::get('/dashboard', function () {   
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/', [HomepageController::class, 'GetKategoriHomePage'])->name('homepage');
Route::get('/detail/{id}', [HomepageController::class, 'GetProductbyid'])->name('GetProductbyid');
Route::get('/detailcat/{id}', [HomepageController::class, 'GetProductbyCategory'])->name('GetProductbyCategory');


Route::middleware(['auth'])->group(function () {
    Route::get('/carts', [CartController::class, 'index'])->name('carts.index');
    Route::post('/carts/{id}', [CartController::class, 'pesan']);
    Route::delete('cartItemdelete/{id}', [CartController::class, 'delete']);
    Route::put('carts/update/{id}', [CartController::class, 'updateQty']);

    Route::get('/checkout', [CheckoutController::class, 'index'])->name('checkoutt');
    Route::get('getCity/ajax/{id}', [CheckoutController::class, 'ajax']);
    Route::post('/checkout', [CheckoutController::class, 'create_transaction'])->name('checkout.create');
});


Route::middleware(['auth', 'checkRole:admin,karyawan'])->group(function () {


    Route::get('/dashboard', [DashboardController::class, 'getViewDashboard'])->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('getCityy/ajax/{id}', [ProfileController::class, 'ajax']);


    Route::get('/dashboard/product', [ProductController::class, 'Viewproduct'])->name('dashboard.product');
    Route::get('/dashboard/product/create', [ProductController::class, 'createProduct']);
    Route::post('/dashboard/product/create', [ProductController::class, 'saveProduct']);
    Route::get('/dashboard/product/update/{id}', [ProductController::class, 'updateProduct'])->name('update-product');
    Route::put('/dashboard/product/update/{id}', [ProductController::class, 'saveUpdateProduct'])->name('saveUpdate-product');
    Route::get('/dashboard/product/detele/{id}', [ProductController::class, 'deleteProduct']);

    Route::get('/dashboard/categoryproduct', [CategoryProductController::class, 'getViewCategoryProduct'])->name('dashboard.categoryproduct');
    Route::get('/dashboard/categoryproduct/create', [CategoryProductController::class, 'createCategoryProduct']);
    Route::post('/dashboard/categoryproduct/create', [CategoryProductController::class, 'saveCreateCategoryProduct']);
    Route::get('/dashboard/categoryproduct/update/{id}', [CategoryProductController::class, 'updateCategoryProduct'])->name('update-product');
    Route::put('/dashboard/categoryproduct/update/{id}', [CategoryProductController::class, 'saveUpdateCategoryProduct'])->name('saveUpdate-product');
    Route::get('/dashboard/categoryproduct/detele/{id}', [CategoryProductController::class, 'deleteCategoryProduct']);

    Route::get('/dashboard/manageuser', [ManageUserController::class, 'index'])->name('dashboard.manageuser');
    Route::get('/dashboard/manageuser/create', [ManageUserController::class, 'createProduct']);
    Route::post('/dashboard/manageuser/create', [ManageUserController::class, 'saveProduct']);
    Route::get('/dashboard/manageuser/update/{id}', [ManageUserController::class, 'updateuser'])->name('updateuser');
    Route::put('/dashboard/manageuser/update/{id}', [ManageUserController::class, 'saveuser'])->name('saveuser');
    Route::get('/dashboard/manageuser/detele/{id}', [ManageUserController::class, 'deleteProduct']);
});


Route::middleware(['auth', 'checkRole:admin'])->group(function () {

    Route::get('/dashboard/manageuser', [ManageUserController::class, 'index'])->name('dashboard.manageuser');
    Route::get('/dashboard/manageuser/create', [ManageUserController::class, 'createUser'])->name('registeruserbyadmin');;
    Route::post('/dashboard/manageuser/create', [ManageUserController::class, 'saveUsercreatebyadmin']);
    Route::get('/dashboard/manageuser/update/{id}', [ManageUserController::class, 'updateuser'])->name('updateuser');
    Route::put('/dashboard/manageuser/update/{id}', [ManageUserController::class, 'saveuser'])->name('saveuser');
    Route::get('/dashboard/manageuser/detele/{id}', [ManageUserController::class, 'deleteUserByAdmin']);

    Route::get('/dashboard/managerole', [RoleController::class, 'index'])->name('dashboard.managerole');
    Route::get('/dashboard/managerole/create', [RoleController::class, 'createRole']);
    Route::post('/dashboard/managerole/create', [RoleController::class, 'saveRole']);
    Route::get('/dashboard/managerole/update/{id}', [RoleController::class, 'updateRole'])->name('updateRole');
    Route::put('/dashboard/managerole/update/{id}', [RoleController::class, 'saveUpdateRole'])->name('saveUpdateRole');
    Route::get('/dashboard/managerole/detele/{id}', [RoleController::class, 'deleteRoleByAdmin']);
});

require __DIR__ . '/auth.php';
