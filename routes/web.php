<?php

use App\Http\Controllers\admin\kategori;
use App\Http\Controllers\user\bills;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homepage\beranda;
use App\Http\Controllers\homepage\login;
use App\Http\Controllers\homepage\register;
use App\Http\Controllers\admin\dashboard;
use App\Http\Controllers\admin\meteran;
use App\Http\Controllers\admin\pelanggan;
use App\Http\Controllers\admin\tagihan;


Route::get('/', function () {
    // return view('welcome');
    return redirect('/homepage');
});

Route::get('homepage', [beranda::class, 'index'])->name('homepage');

// Routes for guests (not logged in)
Route::middleware('guest')->group(function () {
    Route::get('login', [login::class, 'index'])->name('login');
    Route::post('login', [login::class, 'actionlogin'])->name('actionlogin');
    Route::get('login/lupasandi', [login::class, 'lupasandi'])->name('password.request');
    Route::get('register', [register::class, 'index'])->name('register');
    Route::post('register', [register::class, 'actionregis'])->name('actionregis');
});

// Routes for authenticated users
Route::middleware('auth')->group(function () {
    Route::get('dashboard', [dashboard::class, 'index'])->name('dashboard');
    Route::get('/admin/pelanggan', [pelanggan::class, 'list'])->name('admin.pelanggan');
    Route::get('/admin/pelanggan/detail/{id}', [pelanggan::class, 'detail'])->name('admin.pelanggan.detail');

    Route::get('/admin/meteran/edit/{id}', [pelanggan::class, 'edit'])->name('admin.meteran.edit');
    Route::put('/admin/meteran/edit/{id}', [pelanggan::class, 'update'])->name('admin.meteran.update');
    Route::delete('/admin/meteran/delete/{id}', [pelanggan::class, 'destroy'])->name('admin.meteran.delete');

    Route::get('/admin/meteran/add/{user_id}', [pelanggan::class, 'add'])->name('admin.meteran.add');
    Route::post('/admin/meteran/add', [pelanggan::class, 'addaction'])->name('admin.meteran.action.add');

    Route::get('/admin/meteran/{id}/tagihan', [tagihan::class, 'list'])->name('admin.tagihan.list');
    Route::post('/admin/meteran/input/hours', [tagihan::class, 'inputHours'])->name('admin.bills.input.hours');
    Route::get('/admin/meters', [meteran::class, 'listMeters'])->name('admin.meters.list');


    Route::get('/admin/kategori', [kategori::class, 'list'])->name('admin.ketegori');

    Route::get('admin/kategori/create', [kategori::class, 'create'])->name('kategori.create');
    Route::post('admin/kategoricreate', [kategori::class, 'store'])->name('kategori.store');

    Route::get('admin/kategori/{id}', [kategori::class, 'show'])->name('kategori.show');
    Route::get('admin/kategori/{id}/edit', [kategori::class, 'edit'])->name('kategori.edit');
    Route::put('admin/kategori/{id}/edit', [kategori::class, 'update'])->name('kategori.update');

    Route::delete('admin/kategori/{id}', [kategori::class, 'destroy'])->name('kategori.destroy');


    Route::get('/customer/bills', [bills::class, 'bills'])->name('customer.bills');
    Route::get('/customer/bills/pay/{id}', [bills::class, 'payBill'])->name('customer.bills.pay');
    Route::get('/user/bill-history/{meterId}', [bills::class, 'billHistory'])->name('user.billHistory');





    Route::post('logout', [Login::class, 'logout'])->name('logout');
});
