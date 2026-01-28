<x-app-layout>
    <x-slot name="title">Manajemen Kategori</x-slot>

    {{-- Load Font: Plus Jakarta Sans --}}
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <style>
        body { font-family: 'Plus Jakarta Sans', sans-serif; }
        .no-scrollbar::-webkit-scrollbar { display: none; }
        .no-scrollbar { -ms-overflow-style: none; scrollbar-width: none; }
    </style>

    {{-- SweetAlert2 --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <div class="flex flex-col space-y-8">

        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 animate-[fadeIn_0.5s_ease-out]">
            <div>
                <h1 class="text-3xl md:text-4xl font-extrabold text-stone-900 tracking-tight leading-tight">
                    Manajemen <span class="text-brand-600">Kategori</span>
                </h1>
                <p class="text-stone-500 mt-2 font-medium text-sm md:text-base max-w-xl">
                    Kelola kategori produk untuk mengorganisir menu Ayam Goreng Ragil Jaya dengan lebih baik.
                </p>
            </div>
            <a href="{{ route('categories.create') }}" class="inline-flex items-center gap-2 px-6 py-3 bg-brand-600 hover:bg-brand-700 text-white font-bold rounded-2xl shadow-lg shadow-brand-500/20 transition-all transform hover:-translate-y-0.5 hover:shadow-xl">
                <span class="material-symbols-rounded">add</span>
                Tambah Kategori
            </a>
        </div>

        {{-- Alert Messages --}}
        @if(session('success'))
            <div class="p-4 rounded-2xl bg-emerald-50/80 border border-emerald-100 flex items-center gap-4 text-emerald-800 shadow-sm backdrop-blur-sm animate-[slideIn_0.4s_ease-out]">
                <div class="bg-emerald-100 p-2 rounded-xl text-emerald-600">
                    <span class="material-symbols-rounded">check_circle</span>
                </div>
                <div>
                    <p class="font-bold text-sm">Berhasil!</p>
                    <p class="text-sm opacity-90">{{ session('success') }}</p>
                </div>
            </div>
        @endif

        @if ($errors->any())
            <div class="p-4 rounded-2xl bg-rose-50/80 border border-rose-100 flex items-center gap-4 text-rose-800 shadow-sm backdrop-blur-sm animate-[slideIn_0.4s_ease-out]">
                <div class="bg-rose-100 p-2 rounded-xl text-rose-600">
                    <span class="material-symbols-rounded">error</span>
                </div>
                <div>
                    <p class="font-bold text-sm">Terjadi Kesalahan:</p>
                    <ul class="list-disc ml-4 text-sm mt-1 opacity-90">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        @endif

        {{-- CONTENT AREA --}}
        <div class="bg-white border border-stone-100 rounded-[2.5rem] shadow-xl shadow-stone-200/50 overflow-hidden relative">

            {{-- Decorative Top Gradient --}}
            <div class="absolute top-0 left-0 w-full h-1.5 bg-gradient-to-r from-brand-500 via-cyan-500 to-rose-500"></div>

            {{-- A. DESKTOP TABLE VIEW --}}
            <div class="hidden md:block overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead class="bg-stone-50/80 text-stone-500 text-xs font-bold uppercase tracking-wider border-b border-stone-100">
                        <tr>
                            <th class="px-8 py-5 w-16 text-center">
                                <input type="checkbox" id="selectAll"
                                    class="w-5 h-5 text-brand-600 bg-white border-stone-300 rounded-[6px] focus:ring-brand-500 focus:ring-offset-0 transition-all cursor-pointer">
                            </th>
                            <th class="px-6 py-5">Nama Kategori</th>
                            <th class="px-6 py-5">Deskripsi</th>
                            <th class="px-6 py-5">Dibuat</th>
                            <th class="px-8 py-5 text-right">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-50">
                        @forelse($categories as $category)
                            <tr class="hover:bg-brand-50/30 transition-colors duration-300 group">
                                <td class="px-8 py-5 text-center">
                                    <input type="checkbox" name="selected_categories[]" value="{{ $category->id }}"
                                        class="category-checkbox w-5 h-5 text-brand-600 bg-white border-stone-300 rounded-[6px] focus:ring-brand-500 focus:ring-offset-0 transition-all cursor-pointer">
                                </td>
                                <td class="px-6 py-5">
                                    <div class="flex items-center gap-3">
                                        <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-brand-100 to-cyan-100 border border-white shadow-sm flex items-center justify-center text-brand-700 font-extrabold text-sm">
                                            {{ substr($category->nama, 0, 1) }}
                                        </div>
                                        <div class="font-bold text-stone-900 text-base group-hover:text-brand-700 transition-colors">{{ $category->nama }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-5">
                                    <p class="text-sm text-stone-500 max-w-md">{{ $category->deskripsi ?? '-' }}</p>
                                </td>
                                <td class="px-6 py-5">
                                    <span class="text-xs text-stone-400 font-medium">{{ $category->created_at->format('d M Y') }}</span>
                                </td>
                                <td class="px-8 py-5">
                                    <div class="flex items-center justify-end gap-2">
                                        <a href="{{ route('categories.edit', $category) }}" class="p-2 rounded-xl bg-stone-50 hover:bg-brand-50 text-stone-600 hover:text-brand-600 transition-all group">
                                            <span class="material-symbols-rounded text-lg">edit</span>
                                        </a>
                                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirmDelete(event)">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded-xl bg-stone-50 hover:bg-rose-50 text-stone-600 hover:text-rose-600 transition-all">
                                                <span class="material-symbols-rounded text-lg">delete</span>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-8 py-16 text-center">
                                    <div class="flex flex-col items-center gap-4">
                                        <div class="p-4 bg-stone-50 rounded-full">
                                            <span class="material-symbols-rounded text-4xl text-stone-300">category</span>
                                        </div>
                                        <div>
                                            <h3 class="font-bold text-stone-800 text-lg">Belum Ada Kategori</h3>
                                            <p class="text-stone-400 mt-1 text-sm">Mulai tambahkan kategori pertama Anda.</p>
                                        </div>
                                        <a href="{{ route('categories.create') }}" class="mt-2 inline-flex items-center gap-2 px-4 py-2 bg-brand-600 text-white rounded-xl text-sm font-bold hover:bg-brand-700 transition">
                                            <span class="material-symbols-rounded text-lg">add</span>
                                            Tambah Kategori
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- B. MOBILE CARD VIEW --}}
            <div class="md:hidden p-4 space-y-4">
                @forelse($categories as $category)
                    <div class="bg-stone-50 rounded-2xl p-4 border border-stone-100 shadow-sm">
                        <div class="flex items-start justify-between mb-3">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-xl bg-gradient-to-br from-brand-100 to-orange-100 border border-white shadow-sm flex items-center justify-center text-brand-700 font-extrabold text-sm">
                                    {{ substr($category->nama, 0, 1) }}
                                </div>
                                <div>
                                    <div class="font-bold text-stone-900">{{ $category->nama }}</div>
                                    <div class="text-xs text-stone-400 mt-0.5">{{ $category->created_at->format('d M Y') }}</div>
                                </div>
                            </div>
                            <div class="flex gap-2">
                                <a href="{{ route('categories.edit', $category) }}" class="p-2 rounded-xl bg-white text-brand-600">
                                    <span class="material-symbols-rounded text-lg">edit</span>
                                </a>
                                <form action="{{ route('categories.destroy', $category) }}" method="POST" class="inline" onsubmit="return confirmDelete(event)">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="p-2 rounded-xl bg-white text-rose-600">
                                        <span class="material-symbols-rounded text-lg">delete</span>
                                    </button>
                                </form>
                            </div>
                        </div>
                        @if($category->deskripsi)
                            <p class="text-sm text-stone-500 mt-2">{{ $category->deskripsi }}</p>
                        @endif
                    </div>
                @empty
                    <div class="text-center py-12">
                        <div class="p-4 bg-stone-50 rounded-full inline-block mb-4">
                            <span class="material-symbols-rounded text-4xl text-stone-300">category</span>
                        </div>
                        <h3 class="font-bold text-stone-800 text-lg mb-2">Belum Ada Kategori</h3>
                        <p class="text-stone-400 text-sm mb-4">Mulai tambahkan kategori pertama Anda.</p>
                        <a href="{{ route('categories.create') }}" class="inline-flex items-center gap-2 px-4 py-2 bg-brand-600 text-white rounded-xl text-sm font-bold">
                            <span class="material-symbols-rounded">add</span>
                            Tambah Kategori
                        </a>
                    </div>
                @endforelse
            </div>

            {{-- Bulk Actions (Desktop) --}}
            @if($categories->count() > 0)
                <div id="bulkActions" class="hidden md:flex items-center justify-between px-8 py-4 bg-stone-50 border-t border-stone-100">
                    <span class="text-sm font-bold text-stone-600" id="selectedCount">0 kategori dipilih</span>
                    <form id="bulkDeleteForm" action="{{ route('categories.bulk_destroy') }}" method="POST" onsubmit="return confirmBulkDelete(event)">
                        @csrf
                        @method('DELETE')
                        <div id="bulkIdsContainer"></div>
                        <button type="submit" class="px-4 py-2 bg-rose-600 hover:bg-rose-700 text-white font-bold rounded-xl text-sm transition">
                            Hapus Terpilih
                        </button>
                    </form>
                </div>
            @endif
        </div>
    </div>

    <script>
        // Select All Checkbox
        document.getElementById('selectAll')?.addEventListener('change', function() {
            const checkboxes = document.querySelectorAll('.category-checkbox');
            checkboxes.forEach(cb => cb.checked = this.checked);
            updateBulkActions();
        });

        // Individual Checkboxes
        document.querySelectorAll('.category-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', updateBulkActions);
        });

        function updateBulkActions() {
            const checked = document.querySelectorAll('.category-checkbox:checked');
            const bulkActions = document.getElementById('bulkActions');
            const selectedCount = document.getElementById('selectedCount');
            const bulkIdsContainer = document.getElementById('bulkIdsContainer');

            if (checked.length > 0) {
                bulkActions?.classList.remove('hidden');
                selectedCount.textContent = `${checked.length} kategori dipilih`;
                
                // Clear previous inputs
                bulkIdsContainer.innerHTML = '';
                
                // Add hidden inputs for each selected ID
                Array.from(checked).forEach(cb => {
                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'ids[]';
                    input.value = cb.value;
                    bulkIdsContainer.appendChild(input);
                });
            } else {
                bulkActions?.classList.add('hidden');
            }
        }

        function confirmDelete(event) {
            event.preventDefault();
            Swal.fire({
                title: 'Hapus Kategori?',
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#06b6d4',
                cancelButtonColor: '#f5f5f4',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                customClass: { popup: 'rounded-[2rem] font-sans', confirmButton: 'rounded-xl', cancelButton: 'rounded-xl text-stone-600' }
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.closest('form').submit();
                }
            });
            return false;
        }

        function confirmBulkDelete(event) {
            event.preventDefault();
            const count = document.querySelectorAll('.category-checkbox:checked').length;
            Swal.fire({
                title: `Hapus ${count} Kategori?`,
                text: "Data yang dihapus tidak dapat dikembalikan!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#06b6d4',
                cancelButtonColor: '#f5f5f4',
                confirmButtonText: 'Ya, Hapus',
                cancelButtonText: 'Batal',
                customClass: { popup: 'rounded-[2rem] font-sans', confirmButton: 'rounded-xl', cancelButton: 'rounded-xl text-stone-600' }
            }).then((result) => {
                if (result.isConfirmed) {
                    event.target.submit();
                }
            });
            return false;
        }
    </script>
</x-app-layout>

