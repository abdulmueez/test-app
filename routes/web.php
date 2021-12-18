<?php

use App\Http\Controllers\Web\PackageController;
use App\Http\Controllers\Web\UserController;
use App\Http\Controllers\Web\UserPackageController;
use Illuminate\Support\Facades\Route;

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
    return redirect('login');
});


Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::resource('users', UserController::class);
    Route::resource('packages', PackageController::class);
    Route::get('/user-packages/{user}', [UserPackageController::class, 'create'])->name('user-packages.show');
    Route::post('/user-packages/{user}', [UserPackageController::class, 'store'])->name('user-packages.store');


});


require __DIR__ . '/auth.php';
