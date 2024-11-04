<?php

use App\Http\Controllers\Api\LevelController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\RegisterController;
use App\Http\Controllers\Api\LogoutController;
use App\Http\Controllers\Api\BarangController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\KategoriController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post('/register', RegisterController::class)->name('register');
Route::post('/register1', RegisterController::class)->name('register1');
Route::post('/login', LoginController::class)->name('login');
Route::post('logout', LogoutController::class)->name('logout');

Route::middleware('auth:api')->group(function () {
    //     // return $request->user();

    // });

    // Route::group(['middleware' => ['jwt.verify']], function () {
    //barang
    Route::get('barangs', [BarangController::class, 'index']);
    Route::post('barangs', [BarangController::class, 'store']);
    Route::get('barangs/{barang}', [BarangController::class, 'show']);
    Route::post('barangs/{barang}', [BarangController::class, 'update']);
    Route::delete('barangs/{barang}', [BarangController::class, 'destroy']);

    // user
    Route::get('users', [UserController::class, 'index']);
    Route::post('users', [UserController::class, 'store']);
    Route::get('users/{user}', [UserController::class, 'show']);
    Route::put('users/{user}', [UserController::class, 'update']);
    Route::delete('users/{user}', [UserController::class, 'destroy']);

    // kategori
    Route::get('kategories', [KategoriController::class, 'index']);
    Route::post('kategories', [KategoriController::class, 'store']);
    Route::get('kategories/{kategori}', [KategoriController::class, 'show']);
    Route::put('kategories/{kategori}', [KategoriController::class, 'update']);
    Route::delete('kategories/{kategori}', [KategoriController::class, 'destroy']);

    // level
    Route::get('levels', [LevelController::class, 'index']);
    Route::post('levels', [LevelController::class, 'store']);
    Route::get('levels/{level}', [LevelController::class, 'show']);
    Route::put('levels/{level}', [LevelController::class, 'update']);
    Route::delete('levels/{level}', [LevelController::class, 'destroy']);
});
