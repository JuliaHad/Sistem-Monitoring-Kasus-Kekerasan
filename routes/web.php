<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\AnalisisController;
use App\Http\Controllers\RekomendasiController;
use App\Http\Controllers\AdminAuthController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\ExcelController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\UserMonitoringController;
use App\Http\Controllers\UserAnalisisController;
use App\Http\Controllers\UserRekomendasiController;
use App\Http\Controllers\UserLaporanController;
use App\Http\Controllers\UserKasusController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\OperatorController;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return redirect('/login');
});

/*
|--------------------------------------------------------------------------
| Admin Login
|--------------------------------------------------------------------------
*/

Route::get('/admin/login', [AdminAuthController::class, 'showLoginForm'])
    ->name('admin.login');

Route::post('/admin/login', [AdminAuthController::class, 'login'])
    ->name('admin.login.post');

Route::post('/admin/logout', [AdminAuthController::class, 'logout'])
    ->name('admin.logout');

/*
|--------------------------------------------------------------------------
| Dashboard
|--------------------------------------------------------------------------
*/

Route::get('/dashboard', function () {

    if(auth()->user()->role == 'admin'){
        return redirect()->route('admin.dashboard');
    }

    return redirect()->route('user.dashboard');

})->middleware(['auth']);

/*
|--------------------------------------------------------------------------
| User Route
|--------------------------------------------------------------------------
*/
Route::middleware(['auth','user'])->group(function () {
    Route::get(
    '/user/dashboard',
    [UserDashboardController::class,'dashboard']
)->name('user.dashboard');

    Route::get(
        '/monitoring',
        [UserMonitoringController::class, 'index']
    )->name('user.monitoring');

    Route::get(
        '/analisis',
        [UserAnalisisController::class, 'index']
    )->name('user.analisis');

    Route::get(
        '/rekomendasi',
        [UserRekomendasiController::class, 'index']
    )->name('user.rekomendasi');

     Route::resource(
        'lapor-kasus',
        UserLaporanController::class
    );

    Route::get(
        '/data-kasus',
        [UserKasusController::class, 'index']
    )->name('user.kasus',
    );

});

/*
|--------------------------------------------------------------------------
| Operator Route
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'operator'])
    ->prefix('operator')
    ->group(function () {

        Route::get(
            '/dashboard',
            [OperatorController::class, 'dashboard']
        )->name('operator.dashboard');

    });

    /*
|--------------------------------------------------------------------------
| Operator Route
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'operator'])
    ->prefix('operator')
    ->group(function () {

        /*
        |--------------------------------------------------------------------------
        | Dashboard Operator
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/dashboard',
            [App\Http\Controllers\OperatorController::class, 'dashboard']
        )->name('operator.dashboard');

        /*
        |--------------------------------------------------------------------------
        | Riwayat Laporan
        |--------------------------------------------------------------------------
        */

        Route::get(
    '/laporan-riwayat',
    [App\Http\Controllers\Operator\LaporanController::class, 'riwayat']
)->name('operator.laporan.riwayat');


        /*
        |--------------------------------------------------------------------------
        | Data Kasus
        |--------------------------------------------------------------------------
        */

        Route::resource(
    'kasus',
    App\Http\Controllers\Operator\KasusController::class
)->names('operator.kasus');


        /*
        |--------------------------------------------------------------------------
        | Import Data Kasus
        |--------------------------------------------------------------------------
        */

Route::post(
    '/kasus/import',
    [App\Http\Controllers\Operator\KasusController::class, 'import']
)->name('operator.kasus.import');


        /*
        |--------------------------------------------------------------------------
        | Monitoring
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/monitoring',
            [MonitoringController::class, 'index']
        )->name('operator.monitoring.index');


        /*
        |--------------------------------------------------------------------------
        | Analisis & Prediksi
        |--------------------------------------------------------------------------
        */

        Route::get(
    '/analisis',
    [App\Http\Controllers\Operator\AnalisisController::class, 'index']
)->name('operator.analisis.index');


        /*
        |--------------------------------------------------------------------------
        | Rekomendasi
        |--------------------------------------------------------------------------
        */

        Route::get(
    '/rekomendasi',
    [App\Http\Controllers\Operator\RekomendasiController::class, 'index']
)->name('operator.rekomendasi.index');


        /*
        |--------------------------------------------------------------------------
        | Export Data Kasus
        |--------------------------------------------------------------------------
        */

        Route::get(
            '/export/kasus',
            [PdfController::class, 'kasus']
        )->name('operator.export.kasus');


        Route::get(
            '/export/kasus-excel',
            [ExcelController::class, 'kasus']
        )->name('operator.export.kasus.excel');

    });
/*
|--------------------------------------------------------------------------
| Admin Route
|--------------------------------------------------------------------------
*/

Route::middleware(['auth', 'admin'])->prefix('admin')->group(function () {

    Route::get(
    '/dashboard',
    [AdminController::class, 'dashboard']
)->name('admin.dashboard');

Route::get(
    '/pengguna',
    [AdminController::class, 'pengguna']
)->name('admin.pengguna');

Route::get(
    '/pengguna/tambah',
    [AdminController::class, 'create']
)->name('admin.pengguna.create');

Route::post(
    '/pengguna',
    [AdminController::class, 'store']
)->name('admin.pengguna.store');

Route::get(
    '/pengguna/{id}/edit',
    [AdminController::class, 'edit']
)->name('admin.pengguna.edit');

Route::put(
    '/pengguna/{id}',
    [AdminController::class, 'update']
)->name('admin.pengguna.update');

Route::delete(
    '/pengguna/{id}',
    [AdminController::class, 'destroy']
)->name('admin.pengguna.destroy');

Route::get('/analisis', function () {
    return view('admin.analisis.index');
})->name('admin.analisis');

Route::get('/rekomendasi', function () {
    return view('admin.rekomendasi.index');
})->name('admin.rekomendasi');

    Route::resource(
        'laporan',
        App\Http\Controllers\Admin\LaporanController::class
        );

        Route::get(
    '/laporan/verifikasi/{id}',
    [App\Http\Controllers\Admin\LaporanController::class, 'verifikasi']
)->name('laporan.verifikasi');

    Route::post(
    '/laporan/{id}/verifikasi',
    [App\Http\Controllers\Admin\LaporanController::class,'verifikasi']
)->name('laporan.verifikasi');

    Route::get(
    '/laporan/tolak/{id}',
    [App\Http\Controllers\Admin\LaporanController::class,'tolak']
)->name('laporan.tolak');

    Route::get(
    '/laporan-riwayat',
    [App\Http\Controllers\Admin\LaporanController::class,'riwayat']
)->name('laporan.riwayat');

    Route::resource(
        'kasus',
        App\Http\Controllers\Admin\KasusController::class
    );

    Route::post(
    '/kasus/import',
    [App\Http\Controllers\Admin\KasusController::class, 'import']
)->name('kasus.import');

    Route::get(
        '/monitoring',
        [MonitoringController::class, 'index']
    )->name('admin.monitoring.index');

    Route::get(
        '/analisis',
        [AnalisisController::class, 'index']
    )->name('admin.analisis.index');

    Route::get(
        '/rekomendasi',
        [RekomendasiController::class, 'index']
    )->name('admin.rekomendasi.index');

    Route::get(
'/export/kasus',
[PdfController::class,'kasus']
)->name('export.kasus');

    Route::get(
    '/export/kasus-excel',
    [ExcelController::class, 'kasus']
    )->name('export.kasus.excel');
});

/*
|--------------------------------------------------------------------------
| Auth Route
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';