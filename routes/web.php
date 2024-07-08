<?php


use App\Http\Controllers\Admin\V1\AdminController;
use App\Http\Controllers\Admin\V1\BonusController;
use App\Http\Controllers\Admin\V1\ProductController;
use App\Http\Controllers\Admin\V1\SaleController;
use App\Http\Controllers\Admin\V1\UserController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function (){
    Route::middleware(['is_admin'])->name('admin.')->prefix('admin')->group(callback: function (){
        Route::get('/',[AdminController::class,'index'])->name('index');

    });
});

Route::resource('/products', ProductController::class);
Route::resource('/sales', SaleController::class);
Route::resource('/bonuses', BonusController::class);
Route::resource('/users', UserController::class );
Route::get('/bonus', [BonusController::class, 'index'])->name('bonus.index');
Route::get('/users/{userId}/affiliations', [UserController::class,'show'])->name('users.sales');


require __DIR__.'/auth.php';
