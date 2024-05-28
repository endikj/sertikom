<?php

use App\Http\Controllers\Admin\Page\BannerController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\Page\DashboardController;
use App\Http\Controllers\Admin\Page\DataAdminController;
use App\Http\Controllers\Admin\Page\DataPembacaController;
use App\Http\Controllers\Admin\Page\EbookController;
use App\Http\Controllers\Admin\Page\KategoriController;
use App\Http\Controllers\Admin\Page\Laporan\JumlahPembacaController;
use App\Http\Controllers\Admin\Page\Laporan\UlasanController;
use App\Http\Controllers\Admin\Page\LogController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Pembaca\CariBukuController;
use App\Http\Controllers\Pembaca\DetailEbookController;
use App\Http\Controllers\TesController;
use App\Http\Controllers\PembacaEbookController;
use App\Http\Controllers\Pembaca\RiwayatBacaController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [PembacaEbookController::class, 'index'])->name('/')->middleware('guest');
Route::get('/detailebook/{id}', [DetailEbookController::class, 'index'])->name('detailebook');
Route::get('/caribuku', [CariBukuController::class, 'index'])->name('caribuku');


Route::controller(LoginController::class)->group(function () {
    Route::get('login', 'index')->name('login')->middleware('guest');
    Route::post('login', 'login');
    Route::post('logout', 'logout')->name('logout');
});

Route::controller(RegisterController::class)->group(function () {
    Route::get('register', 'index')->name('register')->middleware('guest');
    Route::post('register', 'register');
});




Route::group(['middleware' => ['auth']], function () {
    Route::group(['middleware' => ['cekUserLogin:1,2']], function () {
        Route::resource('dashboard', DashboardController::class)->names([
            'index' => 'dashboard.index',
        ]);
        // Route::resource('ebook',EbookController::class)->names([
        //     'index' => 'ebook.index',
        // ]);

        Route::get('/ebook', [EbookController::class, "index"])->name('ebook.index');
        Route::get('/ebook/list', [EbookController::class, "get_ebook"])->name('ebook.list');
        Route::post('/ebook/create', [EbookController::class, "store"])->name('ebook.create');
        Route::get('/get-cover/{id}', [EbookController::class, "get_foto"])->name('ebook.getfoto');
        Route::get('/get-ebook/{id}', [EbookController::class, "get_foto"])->name('ebook.getebook');

        Route::post('/ebook/publish/{id}', [EbookController::class, 'publish'])->name('ebook.publish');
        Route::post('/ebook/rekomendasi/{id}', [EbookController::class, 'rekomendasi'])->name('ebook.rekomendasi');

        Route::post('/ebook/edit', [EbookController::class, "edit"])->name('ebook.edit');
        Route::post('/ebook/update', [EbookController::class, "update"])->name('ebook.update');
        Route::post('/ebook/delete', [EbookController::class, "destroy"])->name('ebook.delete');

        // Route::resource('kategori',KategoriController::class)->names([
        //     'index' => 'kategori.index',
        // ]);

        Route::get('/kategori', [KategoriController::class, "index"])->name('kategori.index');
        Route::get('/kategori/list', [KategoriController::class, "get_kategori"])->name('kategori.list');
        Route::post('/kategori/create', [KategoriController::class, "store"])->name('kategori.create');
        Route::post('/kategori/edit', [KategoriController::class, "edit"])->name('kategori.edit');
        Route::post('/kategori/update', [KategoriController::class, "update"])->name('kategori.update');
        Route::post('/kategori/delete', [KategoriController::class, "destroy"])->name('kategori.delete');


        Route::resource('laporanjmlhpembaca', JumlahPembacaController::class)->names([
            'index' => 'laporanjmlhpembaca.index',
        ]);
        Route::resource('laporanulasan', UlasanController::class)->names([
            'index' => 'laporanulasan.index',
        ]);
    });

    Route::group(['middleware' => ['cekUserLogin:1']], function () {
        // Route::resource('banner',BannerController::class)->names([
        //     'index' => 'banner.index',
        // ]);

        // Route::resource('datapembaca',DataPembacaController::class)->names([
        //     'index' => 'datapembaca.index',
        // ]);

        // Route::resource('dataadmin',DataAdminController::class)->names([
        //     'index' => 'dataadmin.index',
        // ]);
        Route::get('/banner', [BannerController::class, "index"])->name('banner.index');
        Route::get('/banner/list', [BannerController::class, "get_banner"])->name('banner.list');
        Route::post('/banner/create', [BannerController::class, "store"])->name('banner.create');
        Route::get('/get-foto/{id}', [BannerController::class, "get_foto"])->name('banner.getfoto');
        Route::post('/banner/edit', [BannerController::class, "edit"])->name('banner.edit');
        Route::post('/banner/update', [BannerController::class, "update"])->name('banner.update');
        Route::post('/banner/delete', [BannerController::class, "destroy"])->name('banner.delete');

        Route::get('/datapembaca', [DataPembacaController::class, "index"])->name('datapembaca.index');
        Route::get('/datapembaca/list', [DataPembacaController::class, "get_user"])->name('datapembaca.list');

        Route::get('/dataadmin', [DataAdminController::class, "index"])->name('dataadmin.index');
        Route::get('/dataadmin/list', [DataAdminController::class, "get_user"])->name('dataadmin.list');
        Route::post('/dataadmin/create', [DataAdminController::class, "store"])->name('dataadmin.create');
        Route::post('/dataadmin/edit', [DataAdminController::class, "edit"])->name('dataadmin.edit');
        Route::post('/dataadmin/update', [DataAdminController::class, "update"])->name('dataadmin.update');
        Route::post('/dataadmin/delete', [DataAdminController::class, "destroy"])->name('dataadmin.delete');

        Route::resource('log', LogController::class)->names([
            'index' => 'log.index',
        ]);
    });

    Route::group(['middleware' => ['cekUserLogin:3']], function () {
        // Route::resource('home',PembacaEbookController::class);
        Route::get('/home', [PembacaEbookController::class, 'index'])->name('home');
        Route::get('/riwayatbaca', [RiwayatBacaController::class, 'index'])->name('riwayatbaca');
        Route::post('/detail/create', [DetailEbookController::class, "store"])->name('detail.create');
    });
    // 'create' => 'superadmin.create',
    // 'store' => 'superadmin.store',
    // 'show' => 'superadmin.show',
    // 'edit' => 'superadmin.edit',
    // 'update' => 'superadmin.update',
    // 'destroy' => 'superadmin.destroy',
});
