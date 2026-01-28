<x-app-layout>
    <x-slot name="title">Tambah Kategori</x-slot>

    <div class="flex flex-col space-y-8">
        {{-- Header --}}
        <div class="flex items-center gap-4">
            <a href="{{ route('categories.index') }}" class="p-2 rounded-xl bg-stone-100 hover:bg-stone-200 text-stone-600 transition">
                <span class="material-symbols-rounded">arrow_back</span>
            </a>
            <div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-stone-900 tracking-tight">
                    Tambah <span class="text-brand-600">Kategori</span>
                </h1>
                <p class="text-stone-500 mt-1 text-sm">Buat kategori baru untuk mengorganisir produk</p>
            </div>
        </div>

        {{-- Form --}}
        <div class="bg-white border border-stone-100 rounded-[2.5rem] shadow-xl shadow-stone-200/50 overflow-hidden">
            <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-brand-500 via-cyan-500 to-rose-500"></div>
            
            <form action="{{ route('categories.store') }}" method="POST" class="p-8">
                @csrf

                <div class="space-y-6 max-w-2xl">
                    {{-- Nama Kategori --}}
                    <div>
                        <label for="nama" class="block text-sm font-bold text-stone-700 mb-2">
                            Nama Kategori <span class="text-rose-500">*</span>
                        </label>
                        <input type="text" 
                               id="nama" 
                               name="nama" 
                               value="{{ old('nama') }}"
                               required
                               class="w-full px-4 py-3 rounded-2xl border border-stone-200 bg-stone-50 focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all outline-none"
                               placeholder="Contoh: Ayam Goreng, Minuman, dll">
                        @error('nama')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <label for="deskripsi" class="block text-sm font-bold text-stone-700 mb-2">
                            Deskripsi
                        </label>
                        <textarea id="deskripsi" 
                                  name="deskripsi" 
                                  rows="4"
                                  class="w-full px-4 py-3 rounded-2xl border border-stone-200 bg-stone-50 focus:bg-white focus:border-brand-500 focus:ring-4 focus:ring-brand-500/10 transition-all outline-none resize-none"
                                  placeholder="Deskripsi kategori (opsional)">{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <p class="mt-1 text-sm text-rose-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Actions --}}
                    <div class="flex gap-4 pt-4">
                        <button type="submit" class="flex-1 px-6 py-3 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-2xl shadow-lg shadow-brand-500/20 transition-all transform hover:-translate-y-0.5">
                            Simpan Kategori
                        </button>
                        <a href="{{ route('categories.index') }}" class="px-6 py-3 bg-stone-100 hover:bg-stone-200 text-stone-700 font-bold rounded-2xl transition">
                            Batal
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>

