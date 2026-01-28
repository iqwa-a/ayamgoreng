<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Outlet;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        
        // Admin bisa lihat semua produk, kasir hanya produk outlet mereka
        if ($user->role === 'admin') {
            $products = Product::latest()->get();
        } else {
            $outletId = $user->outlet_id;
            if ($outletId) {
                // Show products for the outlet (Shared)
                $products = Product::where('outlet_id', $outletId)->latest()->get();
            } else {
                // Fallback: If no outlet assigned, show by user_id
                $products = Product::where('user_id', $user->id)->latest()->get();
            }
        }

        return view('products.index', [
            'products' => $products,
            'totalProduk' => $products->count(),
            'totalStok' => $products->sum('stok'),
            // Menghitung potensi omset (Harga Jual * Stok)
            'nilaiStok' => $products->sum(function ($p) {
                return $p->harga * $p->stok;
            }),
            // Menghitung stok rendah (di bawah atau sama dengan 10)
            'stokRendah' => $products->where('stok', '<=', 10)->count(),
            'outlets' => Outlet::all(), // Pass outlets for Admin dropdown
            'categories' => Category::count() > 0 ? Category::orderBy('nama')->pluck('nama')->toArray() : ['Ayam Goreng', 'Minuman', 'Snack'], // Pass categories for dropdown, fallback jika belum ada
        ]);
    }

    public function store(Request $request)
    {
        // Clean currency format dari input
        $request->merge([
            'harga' => str_replace('.', '', $request->harga ?? '0'),
            'modal' => str_replace('.', '', $request->modal ?? '0'),
        ]);

        // 1. Validasi Input
        $val = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'modal' => 'required|numeric|min:0', // Validasi Modal
            'stok' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'outlet_id' => 'nullable|exists:outlets,id',
        ]);

        // 2. Tambahkan User ID & Outlet ID
        $user = Auth::user();
        $val['user_id'] = $user->id;

        if ($user->role === 'admin' && $request->filled('outlet_id')) {
            $val['outlet_id'] = $request->outlet_id;
        } else {
            $val['outlet_id'] = $user->outlet_id;
        }

        // 3. Handle Upload Foto
        if ($request->hasFile('foto')) {
            try {
                $file = $request->file('foto');
                if (!$file->isValid()) {
                    throw new \Exception('File tidak valid');
                }
                $val['foto'] = $file->store('produk', 'public');
            } catch (\Exception $e) {
                Log::error('Upload foto error: ' . $e->getMessage());
                return redirect()->route('products.index')
                    ->with('error', 'Error upload foto: ' . $e->getMessage());
            }
        }

        // 4. Simpan ke Database
        Product::create($val);

        return redirect()->route('products.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    public function update(Request $request, Product $product)
    {
        // Admin bisa update semua produk, kasir hanya produk outlet mereka
        $user = Auth::user();
        if ($user->role !== 'admin') {
            if ($product->outlet_id) {
                if ($product->outlet_id !== $user->outlet_id)
                    abort(403, 'Unauthorized Outlet Access');
            } else {
                // Legacy/Fallback check
                if ($product->user_id !== $user->id)
                    abort(403);
            }
        }

        // Clean currency format dari input
        $request->merge([
            'harga' => str_replace('.', '', $request->harga ?? '0'),
            'modal' => str_replace('.', '', $request->modal ?? '0'),
        ]);

        // 1. Validasi Input
        $val = $request->validate([
            'nama' => 'required|string|max:255',
            'kategori' => 'required|string',
            'harga' => 'required|numeric|min:0',
            'modal' => 'required|numeric|min:0',
            'stok' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'outlet_id' => 'nullable|exists:outlets,id',
        ]);

        // HANDLE ADMIN CHANGE OUTLET
        if (Auth::user()->role === 'admin' && $request->has('outlet_id')) {
            $val['outlet_id'] = $request->outlet_id;
        }

        // 2. Handle Ganti Foto
        if ($request->hasFile('foto')) {
            try {
                // Validasi file
                $file = $request->file('foto');
                if (!$file->isValid()) {
                    throw new \Exception('File tidak valid');
                }
                
                // Hapus foto lama jika ada (agar storage tidak penuh)
                if ($product->foto && Storage::disk('public')->exists($product->foto)) {
                    Storage::disk('public')->delete($product->foto);
                }
                
                // Simpan foto baru
                $val['foto'] = $file->store('produk', 'public');
            } catch (\Exception $e) {
                Log::error('Upload foto error: ' . $e->getMessage());
                return redirect()->route('products.index')
                    ->with('error', 'Error upload foto: ' . $e->getMessage());
            }
        }

        // 3. Update Database
        $product->update($val);

        return redirect()->route('products.index')->with('success', 'Menu berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        // Admin bisa hapus semua produk, kasir hanya produk outlet mereka
        $user = Auth::user();
        if ($user->role !== 'admin') {
            if ($product->outlet_id) {
                if ($product->outlet_id !== $user->outlet_id)
                    abort(403, 'Unauthorized Outlet Access');
            } else {
                if ($product->user_id !== $user->id)
                    abort(403);
            }
        }

        // Hapus foto fisik saat data dihapus
        if ($product->foto && Storage::disk('public')->exists($product->foto)) {
            Storage::disk('public')->delete($product->foto);
        }

        $product->delete();
        return back()->with('success', 'Menu dihapus.');
    }
}
