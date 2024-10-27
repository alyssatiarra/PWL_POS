<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\BarangController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\LevelController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\StokController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\TransaksiController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Route::get('/level', [LevelController::class, 'index']);
// Route::get('/kategori', [KategoriController::class, 'index']);
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/user/tambah', [UserController::class, 'tambah']);
// Route::post('/user/tambah_simpan', [UserController::class, 'tambah_simpan']);
// Route::get('/user/ubah/{id}', [UserController::class, 'ubah']);
// Route::put('/user/ubah_simpan/{id}', [UserController::class, 'ubah_simpan']);
// Route::get('/user/hapus/{id}', [UserController::class, 'hapus']);
// Route::get('/', [WelcomeController::class, 'index']);


Route::pattern('id', '[0-9]+');
Route::get('login', [AuthController::class, 'login'])->name('login');
Route::post('login', [AuthController::class, 'postlogin']);
Route::get('logout', [AuthController::class, 'logout']);
Route::get('register', [AuthController::class, 'register'])->name('register');
Route::post('register', [AuthController::class, 'postRegister']);

Route::middleware(['auth'])->group(function () {

    Route::get('/', [WelcomeController::class, 'index']);

    Route::group(['prefix' => 'user'], function () {
        Route::middleware(['authorize:ADM'])->group(function () {
            Route::get('/', [UserController::class, 'index']); //halaman awal
            Route::post('/list', [UserController::class, 'list']);  //data user (json)
            Route::get('/create', [UserController::class, 'create']); //form tambah user
            Route::post('/', [UserController::class, 'store']); //data user baru
            Route::get('/create_ajax', [UserController::class, 'create_ajax']); //form tambah user ajax
            Route::post('/ajax', [UserController::class, 'store_ajax']); //simpan data user baru ajax
            Route::get('/{id}', [UserController::class, 'show']); //detail user
            Route::get('/{id}/edit', [UserController::class, 'edit']); //form edit
            Route::put('/{id}', [UserController::class, 'update']); // simpan perubahan data
            Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']); //tampilkan form edit dengan ajax
            Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']); //simpan perubahan user ajax
            Route::get('/{id}/delete_ajax', [UserController::class, 'confirm_ajax']); //confirm delete ajax
            Route::delete('/{id}/delete_ajax', [UserController::class, 'delete_ajax']); //hapus ajax
            Route::delete('/{id}', [UserController::class, 'destroy']); //hapus data user
            Route::get('/export_pdf', [UserController::class, 'export_pdf']);
            Route::get('/import', [UserController::class, 'import']); //ajax import excel
            Route::post('/import_ajax', [UserController::class, 'import_ajax']); //ajax import excel
        });

        Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
            Route::get('/{id}/edit_ajax', [UserController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [UserController::class, 'update_ajax']);
        });
    });

    Route::middleware(['authorize:ADM,MNG,STF,CUS'])->group(function () {
        Route::get('/profile', [ProfileController::class, 'index']);
        Route::get('/profile/{id}/edit_ajax', [ProfileController::class, 'edit_ajax']);
        Route::put('/profile/{id}/update_ajax', [ProfileController::class, 'update_ajax']);
        Route::get('/profile/{id}/edit_foto', [ProfileController::class, 'edit_foto']);
        Route::put('/profile/{id}/update_foto', [ProfileController::class, 'update_foto']);
    });

    Route::middleware(['authorize:ADM'])->group(function () {
        Route::group(['prefix' => 'level'], function () {
            Route::get('/', [LevelController::class, 'index']); //halaman awal
            Route::post('/list', [LevelController::class, 'list']);  //data user (json)
            Route::get('/create', [LevelController::class, 'create']); //form tambah user
            Route::post('/', [LevelController::class, 'store']); //data user baru
            Route::get('/create_ajax', [LevelController::class, 'create_ajax']); //form tambah user ajax
            Route::post('/ajax', [LevelController::class, 'store_ajax']); //simpan data user baru ajax
            Route::get('/{id}', [LevelController::class, 'show']); //detail user
            Route::get('/{id}/edit', [LevelController::class, 'edit']); //form edit
            Route::put('/{id}', [LevelController::class, 'update']); // simpan perubahan data
            Route::get('/{id}/edit_ajax', [LevelController::class, 'edit_ajax']); //tampilkan form edit dengan ajax
            Route::put('/{id}/update_ajax', [LevelController::class, 'update_ajax']); //simpan perubahan user ajax
            Route::get('/{id}/delete_ajax', [LevelController::class, 'confirm_ajax']); //confirm delete ajax
            Route::delete('/{id}/delete_ajax', [LevelController::class, 'delete_ajax']); //hapus ajax
            Route::get('/{id}/show_ajax', [LevelController::class, 'show_ajax']);
            Route::get('/export_pdf', [LevelController::class, 'export_pdf']);
            Route::delete('/{id}', [LevelController::class, 'destroy']); //hapus data user
            Route::get('/import', [LevelController::class, 'import']); //ajax import excel
            Route::post('/import_ajax', [LevelController::class, 'import_ajax']); //ajax import excel
        });
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'kategori'], function () {
            Route::get('/', [KategoriController::class, 'index']); //halaman awal
            Route::post('/list', [KategoriController::class, 'list']);  //data user (json)
            Route::get('/create', [KategoriController::class, 'create']); //form tambah user
            Route::post('/', [KategoriController::class, 'store']); //data user baru
            Route::get('/create_ajax', [KategoriController::class, 'create_ajax']); //form tambah user ajax
            Route::post('/ajax', [KategoriController::class, 'store_ajax']); //simpan data user baru ajax
            Route::get('/{id}', [KategoriController::class, 'show']); //detail user
            Route::get('/{id}/edit', [KategoriController::class, 'edit']); //form edit
            Route::put('/{id}', [KategoriController::class, 'update']); // simpan perubahan data
            Route::get('/{id}/edit_ajax', [KategoriController::class, 'edit_ajax']); //tampilkan form edit dengan ajax
            Route::put('/{id}/update_ajax', [KategoriController::class, 'update_ajax']); //simpan perubahan user ajax
            Route::get('/{id}/show_ajax', [KategoriController::class, 'show_ajax']);
            Route::get('/export_pdf', [KategoriController::class, 'export_pdf']);
            Route::get('/{id}/delete_ajax', [KategoriController::class, 'confirm_ajax']); //confirm delete ajax
            Route::delete('/{id}/delete_ajax', [KategoriController::class, 'delete_ajax']); //hapus ajax
            Route::delete('/{id}', [KategoriController::class, 'destroy']); //hapus data user
            Route::post('/import_ajax', [KategoriController::class, 'import_ajax']);
            Route::get('/import', [KategoriController::class, 'import_ajax']);
        });
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'supplier'], function () {
            Route::get('/', [SupplierController::class, 'index']); //halaman awal
            Route::post('/list', [SupplierController::class, 'list']);  //data user (json)
            Route::get('/create', [SupplierController::class, 'create']); //form tambah user
            Route::post('/', [SupplierController::class, 'store']); //data user baru
            Route::get('/create_ajax', [SupplierController::class, 'create_ajax']); //form tambah user ajax
            Route::post('/ajax', [SupplierController::class, 'store_ajax']); //simpan data user baru ajax
            Route::get('/{id}', [SupplierController::class, 'show']); //detail user
            Route::get('/{id}/edit', [SupplierController::class, 'edit']); //form edit
            Route::put('/{id}', [SupplierController::class, 'update']); // simpan perubahan data
            Route::get('/{id}/edit_ajax', [SupplierController::class, 'edit_ajax']); //tampilkan form edit dengan ajax
            Route::put('/{id}/update_ajax', [SupplierController::class, 'update_ajax']); //simpan perubahan user ajax
            Route::get('/{id}/show_ajax', [SupplierController::class, 'show_ajax']);
            Route::get('/export_pdf', [SupplierController::class, 'export_pdf']);
            Route::get('/{id}/delete_ajax', [SupplierController::class, 'confirm_ajax']); //confirm delete ajax
            Route::delete('/{id}/delete_ajax', [SupplierController::class, 'delete_ajax']); //hapus ajax
            Route::delete('/{id}', [SupplierController::class, 'destroy']); //hapus data user
            Route::get('/import', [SupplierController::class, 'import']); //ajax import excel
            Route::post('/import_ajax', [SupplierController::class, 'import_ajax']); //ajax import excel
        });
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'barang'], function () {
            Route::get('/', [BarangController::class, 'index']); //halaman awal
            Route::post('/list', [BarangController::class, 'list']);  //data user (json)
            Route::get('/create', [BarangController::class, 'create']); //form tambah user
            Route::post('/', [BarangController::class, 'store']); //data user baru
            Route::get('/create_ajax', [BarangController::class, 'create_ajax']); //form tambah user ajax
            Route::post('/ajax', [BarangController::class, 'store_ajax']); //simpan data user baru ajax
            Route::get('/{id}', [BarangController::class, 'show']); //detail user
            Route::get('/{id}/edit', [BarangController::class, 'edit']); //form edit
            Route::put('/{id}', [BarangController::class, 'update']); // simpan perubahan data
            Route::get('/{id}/edit_ajax', [BarangController::class, 'edit_ajax']); //tampilkan form edit dengan ajax
            Route::put('/{id}/update_ajax', [BarangController::class, 'update_ajax']); //simpan perubahan user ajax
            Route::get('/{id}/delete_ajax', [BarangController::class, 'confirm_ajax']); //confirm delete ajax
            Route::delete('/{id}/delete_ajax', [BarangController::class, 'delete_ajax']); //hapus ajax
            Route::get('/{id}/show_ajax', [BarangController::class, 'show_ajax']);
            Route::delete('/{id}', [BarangController::class, 'destroy']); //hapus data user
            Route::get('/import', [BarangController::class, 'import']); //uppload excel
            Route::post('/import_ajax', [BarangController::class, 'import_ajax']); //ajax import excel
            Route::get('/export_excel', [BarangController::class, 'export_excel']);
            Route::get('/export_pdf', [BarangController::class, 'export_pdf']);
        });
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'stok'], function () {
            Route::get('/', [StokController::class, 'index']);
            Route::post('/list', [StokController::class, 'list']);
            Route::get('/create', [StokController::class, 'create']);
            Route::post('/', [StokController::class, 'store']);
            Route::get('/create_ajax', [StokController::class, 'create_ajax']);
            Route::post('/ajax', [StokController::class, 'store_ajax']);
            Route::get('/{id}', [StokController::class, 'show']);
            Route::get('/{id}/edit', [StokController::class, 'edit']);
            Route::put('/{id}', [StokController::class, 'update']);
            Route::get('/{id}/show_ajax', [StokController::class, 'show_ajax']);
            Route::get('/{id}/edit_ajax', [StokController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [StokController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [StokController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [StokController::class, 'delete_ajax']);
            Route::get('/export_pdf', [StokController::class, 'export_pdf']);
            Route::delete('/{id}', [StokController::class, 'destroy']);
            Route::get('/import', [StokController::class, 'import']); //ajax import excel
            Route::post('/import_ajax', [StokController::class, 'import_ajax']); //ajax import excel
        });
    });

    Route::middleware(['authorize:ADM,MNG,STF'])->group(function () {
        Route::group(['prefix' => 'transaksi'], function () {
            Route::get('/', [TransaksiController::class, 'index']);
            Route::post('/list', [TransaksiController::class, 'list']);
            Route::get('/create', [TransaksiController::class, 'create']);
            Route::post('/', [TransaksiController::class, 'store']);
            Route::get('/create_ajax', [TransaksiController::class, 'create_ajax']);
            Route::post('/ajax', [TransaksiController::class, 'store_ajax']);
            Route::get('/{id}', [TransaksiController::class, 'show']);
            Route::get('/{id}/edit', [TransaksiController::class, 'edit']);
            Route::put('/{id}', [TransaksiController::class, 'update']);
            Route::get('/{id}/show_ajax', [TransaksiController::class, 'show_ajax']);
            Route::get('/{id}/edit_ajax', [TransaksiController::class, 'edit_ajax']);
            Route::put('/{id}/update_ajax', [TransaksiController::class, 'update_ajax']);
            Route::get('/{id}/delete_ajax', [TransaksiController::class, 'confirm_ajax']);
            Route::delete('/{id}/delete_ajax', [TransaksiController::class, 'delete_ajax']);
            Route::get('/export_pdf', [TransaksiController::class, 'export_pdf']);
            Route::get('{id}/export_detail_pdf', [TransaksiController::class, 'export_detail_pdf']);
            Route::delete('/{id}', [TransaksiController::class, 'destroy']);
            Route::get('/import', [StokController::class, 'import']); //ajax import excel
            Route::post('/import_ajax', [StokController::class, 'import_ajax']); //ajax import excel
        });
    });
});
