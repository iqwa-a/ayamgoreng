<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KasMasukController;
use App\Http\Controllers\KasKeluarController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\OutletController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CategoryController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// ====================================================
// LANDING PAGE (Halaman Depan / Welcome)
// ====================================================
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

// ====================================================
// SEO: Sitemap
// ====================================================
Route::get('/sitemap.xml', function () {
    $sitemap = '<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
        xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
        xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
        http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>' . url('/') . '</loc>
        <lastmod>' . date('Y-m-d') . '</lastmod>
        <changefreq>weekly</changefreq>
        <priority>1.0</priority>
    </url>
</urlset>';
    
    return response($sitemap, 200)
        ->header('Content-Type', 'application/xml');
})->name('sitemap');

// Middleware Group (Auth & Verified)
Route::middleware(['auth', 'verified'])->group(function () {

    /** ===================================================
     * 1. KHUSUS ADMIN (Middleware role:admin)
     * (Berisi Laporan, Manajemen User/Outlet, dan DELETE Data)
     * ==================================================== */
    Route::middleware(['role:admin'])->group(function () {
        // --- LAPORAN ---
        Route::get('/laporan', [LaporanController::class, 'index'])->name('laporan.index');
        Route::get('/laporan/export/pdf', [LaporanController::class, 'exportPdf'])->name('laporan.export.pdf');
        Route::get('/laporan/export/excel', [LaporanController::class, 'exportExcel'])->name('laporan.export.excel');

        // --- MANAJEMEN DATA ---
        Route::delete('/outlets/bulk-destroy', [OutletController::class, 'bulkDestroy'])->name('outlets.bulk_destroy');
        Route::resource('outlets', OutletController::class);

        Route::delete('/users/bulk-destroy', [UserController::class, 'bulkDestroy'])->name('users.bulk_destroy');
        Route::resource('users', UserController::class)->except(['create', 'edit', 'show']);

        // --- KATEGORI ---
        Route::delete('/categories/bulk-destroy', [CategoryController::class, 'bulkDestroy'])->name('categories.bulk_destroy');
        Route::resource('categories', CategoryController::class)->except(['show']);

        // --- HAPUS KAS MASUK (FIXED) ---
        // PENTING: Route bulk-destroy harus diatas route {id}
        Route::delete('/kas-masuk/bulk-destroy', [KasMasukController::class, 'bulkDestroy'])->name('kas-masuk.bulk_destroy');
        // REVISI: Menggunakan DELETE method, bukan GET. URL disesuaikan standar RESTful.
        Route::delete('/kas-masuk/{id}', [KasMasukController::class, 'destroy'])->name('kas-masuk.destroy');

        // --- HAPUS KAS KELUAR ---
        Route::delete('/kas-keluar/bulk-destroy', [KasKeluarController::class, 'bulkDestroy'])->name('kas-keluar.bulk_destroy');
        Route::delete('/kas-keluar/{id}', [KasKeluarController::class, 'destroy'])->name('kas-keluar.destroy');
    });

    /** ===================================================
     * 2. DASHBOARD (Hanya Admin)
     * ==================================================== */
    Route::middleware(['role:admin'])->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    });

    /** ===================================================
     * 3. SHARED ACCESS (Admin & Kasir)
     * (Berisi POS, Input Data Kas, Input Produk)
     * ==================================================== */

    // Redirect Logic
    Route::get('/redirect-role', function() {
        $user = Auth::user();
        if($user && $user->role === 'admin') {
            return redirect()->route('dashboard');
        }
        return redirect()->route('pos.index');
    })->name('redirect.role');

    // POS System
    Route::get('/pos', [PosController::class, 'index'])->name('pos.index');
    Route::post('/pos/cart/add', [PosController::class, 'addToCart'])->name('pos.cart.add');
    Route::post('/pos/cart/plus', [PosController::class, 'qtyPlus'])->name('pos.cart.plus');
    Route::post('/pos/cart/minus', [PosController::class, 'qtyMinus'])->name('pos.cart.minus');
    Route::post('/pos/cart/remove', [PosController::class, 'removeItem'])->name('pos.cart.remove');
    Route::post('/pos/checkout', [PosController::class, 'checkout'])->name('pos.checkout');

    // Produk (Resource controller menangani index, create, store, edit, update, destroy)
    // Jika kasir tidak boleh hapus produk, tambahkan ->except(['destroy'])
    Route::resource('products', ProductController::class);

    // --- KAS MASUK (Resource minus destroy) ---
    // Ini otomatis membuat route: index, create, store, edit, update.
    // Route destroy sudah ditangani di grup Admin di atas.
    Route::resource('kas-masuk', KasMasukController::class)->except(['destroy', 'show']);

    // --- KAS KELUAR (Resource minus destroy) ---
    Route::resource('kas-keluar', KasKeluarController::class)->except(['destroy', 'show']);

    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
