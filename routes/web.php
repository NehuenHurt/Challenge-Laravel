<?php

use Illuminate\Support\Facades\Route;
use App\Http\VoucherController;
use App\Http\LanguageController;
use App\Models\Voucher;
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
    if (auth()->user()) {
        return redirect('/voucher');
    } else {
        return redirect('/index');
    }
});

Route::get('/voucher', function () {
    $listado = Voucher::all();
    return view('voucher', compact('listado'));  
});

Route::get('/index', function () {
    return view('auth/login');;
});
Route::get('lang/{lang}',  [App\Http\Controllers\LanguageController::class, 'swap'])->name('lang.swap');
Auth::routes();



