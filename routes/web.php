<?php

use App\Http\Livewire\Pos\OrderPage;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use App\Http\Livewire\Pos\KitchenDashboard;
use App\Http\Livewire\Settings\ManageBranches;
use App\Http\Livewire\Inventory\ManageProducts;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'], function(){

    Route::get('home', [HomeController::class, 'index'])->name('home');

    Route::get('branches', ManageBranches::class)->name('branches.index');

    Route::group(['prefix' => 'products'], function(){
        Route::get('/', ManageProducts::class)->name('products.index');
    });

    Route::group(['prefix' => 'pos'], function(){
        Route::get('/{branchId}', OrderPage::class)->name('pos.index');
        Route::get('/{branchId}/kitchen', KitchenDashboard::class)->name('pos.kitchen');
        Route::get('/{transactionId}/temporary-receipt', [OrderController::class, 'temporaryReceipt'])->name('pos.temporary-receipt');
        Route::get('/{transactionId}/official-receipt', [OrderController::class, 'officialReceipt'])->name('pos.official-receipt');
    });

});



Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';
