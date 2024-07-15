<?php


use App\Http\Controllers\Admin\V1\BonusController;
use App\Http\Controllers\Admin\V1\ProductController;
use App\Http\Controllers\Admin\V1\SaleController;
use App\Http\Controllers\Admin\V1\UserController;
use App\Http\Controllers\HomeController;
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
    return redirect('login');
});


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/home',[HomeController::class,'index'])->middleware(['auth'])->name('home');



// Routes Admin
Route::middleware(['auth'])->group(function () {
    Route::middleware(['admin'])
        ->name('admin.')
        ->prefix('admin')
        ->namespace('App\Http\Controllers\Admin\V1')
        ->group(function () {

            Route::resource('/products', 'ProductController');
            Route::resource('/sales', 'SaleController');
            Route::resource('/bonuses', 'BonusController');
            Route::resource('/users', 'UserController');
            Route::get('/bonus', 'BonusController@index')->name('bonus.index');
            Route::get('/users/{userId}/affiliations', 'UserController@show')->name('users.sales');
            Route::get('/dashboard',[\App\Http\Controllers\DashboardController::class,'index'])->name('dashboard');
        });
});

// Routes User
Route::group(['namespace' => 'App\Http\Controllers\Frontend\V1', 'middleware' => ['auth','secretaire']], function () {
    Route::resource('/products', \App\Http\Controllers\Frontend\V1\ProductController::class);
    Route::resource('/sales', \App\Http\Controllers\Frontend\V1\SaleController::class);
    Route::resource('/bonuses', \App\Http\Controllers\Frontend\V1\BonusController::class);
    Route::resource('/users', \App\Http\Controllers\Frontend\V1\UserController::class);
    Route::get('/bonus', [\App\Http\Controllers\Frontend\V1\BonusController::class, 'index'])->name('bonus.index');
    Route::get('/users/{userId}/affiliations', [UserController::class, 'show'])->name('users.sales');
});



require __DIR__.'/auth.php';
