<x-app-layout>
    <x-slot name="title">Laporan Keuangan</x-slot>

    {{-- Script Handle Search & Filter --}}
    <script>
        function setLaporanFilter(inputId, value) {
            const input = document.getElementById(inputId);
            if (input) input.value = value;
            showLoadingAndSubmit();
        }

        function setDateFilter(dateVal) {
            // Reset bulan/tahun jika pilih tanggal spesifik
            document.getElementById('bulanInput').value = '';
            document.getElementById('tahunInput').value = '';

            // Create hidden input for date if not exists or update it
            let dateInput = document.querySelector('input[name="date"]');
            if(!dateInput) {
                dateInput = document.createElement('input');
                dateInput.type = 'hidden';
                dateInput.name = 'date';
                document.getElementById('filterForm').appendChild(dateInput);
            }
            dateInput.value = dateVal;
            showLoadingAndSubmit();
        }

        function showLoadingAndSubmit() {
            document.getElementById('loadingOverlay').classList.remove('hidden');
            document.getElementById('filterForm').submit();
        }

        document.addEventListener('DOMContentLoaded', () => {
            const searchInput = document.getElementById('searchInput');
            let searchTimeout;
            if (searchInput) {
                searchInput.addEventListener('input', () => {
                    clearTimeout(searchTimeout);
                    searchTimeout = setTimeout(() => {
                        showLoadingAndSubmit();
                    }, 800);
                });
            }
        });
    </script>

    {{-- Loading Overlay --}}
    <div id="loadingOverlay" class="hidden fixed inset-0 z-[150]">
        <div class="h-full w-full bg-white/80 backdrop-blur-md flex items-center justify-center">
            <div class="flex flex-col items-center gap-4">
                <div class="relative">
                    <div class="animate-spin rounded-full h-16 w-16 border-4 border-brand-200"></div>
                    <div class="animate-spin rounded-full h-16 w-16 border-t-4 border-brand-600 absolute top-0 left-0"></div>
                </div>
                <div class="text-center">
                    <span class="text-sm font-bold text-brand-600 animate-pulse block">Memuat Data...</span>
                    <span class="text-xs text-stone-400 mt-1 block">Mohon tunggu sebentar</span>
                </div>
            </div>
        </div>
    </div>
    
    {{-- Custom Animations CSS --}}
    <style>
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes fadeInDown {
            from { 
                opacity: 0;
                transform: translateY(-20px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeInUp {
            from { 
                opacity: 0;
                transform: translateY(30px);
            }
            to { 
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        
        .animate-\[fadeInDown_0\.6s_ease-out\] {
            animation: fadeInDown 0.6s ease-out;
        }
        
        .animate-\[fadeInUp_0\.7s_ease-out\] {
            animation: fadeInUp 0.7s ease-out;
        }
        
        .animate-\[fadeInUp_0\.8s_ease-out\] {
            animation: fadeInUp 0.8s ease-out;
        }
        
        .animate-\[fadeInUp_0\.9s_ease-out\] {
            animation: fadeInUp 0.9s ease-out;
        }
        
        .animate-\[fadeInUp_1s_ease-out\] {
            animation: fadeInUp 1s ease-out;
        }
        
        .animate-\[fadeInUp_1\.1s_ease-out\] {
            animation: fadeInUp 1.1s ease-out;
        }
        
        .animate-\[fadeInUp_1\.2s_ease-out\] {
            animation: fadeInUp 1.2s ease-out;
        }
        
        .animate-\[fadeInUp_1\.3s_ease-out\] {
            animation: fadeInUp 1.3s ease-out;
        }
        
        @keyframes fadeInLeft {
            from { 
                opacity: 0;
                transform: translateX(-20px);
            }
            to { 
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        @keyframes fadeInRight {
            from { 
                opacity: 0;
                transform: translateX(20px);
            }
            to { 
                opacity: 1;
                transform: translateX(0);
            }
        }
        
        .animate-\[fadeInLeft_0\.6s_ease-out\] {
            animation: fadeInLeft 0.6s ease-out;
        }
        
        .animate-\[fadeInRight_0\.6s_ease-out\] {
            animation: fadeInRight 0.6s ease-out;
        }
        
        /* Counter Animation */
        .counter-number {
            display: inline-block;
        }
        
        /* Custom Scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            height: 8px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-track {
            background: #f5f5f4;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #06b6d4;
            border-radius: 10px;
        }
        
        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #0891b2;
        }
        
        /* Table row hover effect */
        tbody tr {
            transition: all 0.2s ease;
        }
        
        tbody tr:hover {
            transform: scale(1.01);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        /* Smooth transitions */
        * {
            transition-timing-function: cubic-bezier(0.4, 0, 0.2, 1);
        }
    </style>
    
    {{-- Counter Animation Script --}}
    <script>
        function animateCounter(element, target, duration = 2000) {
            const start = 0;
            const increment = target / (duration / 16);
            let current = start;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    current = target;
                    clearInterval(timer);
                }
                // Check if element contains "Rp" or just number
                const isCurrency = element.textContent.includes('Rp');
                if (isCurrency) {
                    element.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(Math.floor(current));
                } else {
                    element.textContent = new Intl.NumberFormat('id-ID').format(Math.floor(current));
                }
            }, 16);
        }
        
        document.addEventListener('DOMContentLoaded', () => {
            // Animate counters
            const counters = document.querySelectorAll('.counter-number');
            counters.forEach(counter => {
                const target = parseInt(counter.getAttribute('data-target'));
                if (!isNaN(target)) {
                    animateCounter(counter, target, 2000);
                }
            });
        });
    </script>

    {{-- Flash Messages --}}
    @if(session('error'))
        <div class="mb-6 bg-rose-50 border border-rose-200 rounded-2xl p-4 flex items-center gap-3 animate-fade-in">
            <span class="material-symbols-rounded text-rose-600">error</span>
            <div class="flex-1">
                <h4 class="font-bold text-rose-800 text-sm">Error</h4>
                <p class="text-xs text-rose-600 mt-0.5">{{ session('error') }}</p>
            </div>
        </div>
    @endif

    <div class="space-y-4 sm:space-y-6 md:space-y-8 relative animate-fade-in">

        {{-- 1. HEADER & EXPORT BUTTONS --}}
        <div class="flex flex-col md:flex-row md:items-end justify-between gap-4 animate-[fadeInDown_0.6s_ease-out]">
            <div class="flex items-start gap-4">
                <div class="p-3 bg-gradient-to-br from-brand-500 to-brand-600 rounded-2xl shadow-lg shadow-brand-500/20 shrink-0">
                    <span class="material-symbols-rounded text-white text-2xl">analytics</span>
                </div>
                <div>
                    <h1 class="text-2xl sm:text-3xl font-black text-stone-800 tracking-tight flex items-center gap-2">
                        Laporan <span class="text-brand-600">Keuangan</span>
                    </h1>
                    <p class="text-stone-500 text-sm mt-1.5 leading-relaxed max-w-xl font-medium">
                        Pantau performa outlet, arus kas, dan stok bahan secara <i>real-time</i> dengan analisis mendalam.
                    </p>
                </div>
            </div>

            <div class="flex gap-2 sm:gap-3 w-full md:w-auto">
                {{-- Tombol PDF --}}
                <a href="{{ route('laporan.export.pdf', request()->all()) }}" target="_blank"
                    class="flex-1 md:flex-none justify-center bg-gradient-to-br from-rose-50 to-white border-2 border-rose-200 text-rose-600 px-4 sm:px-5 md:px-6 py-2.5 sm:py-3 md:py-3.5 rounded-xl sm:rounded-2xl font-bold text-xs sm:text-sm hover:from-rose-100 hover:to-rose-50 hover:border-rose-300 hover:shadow-xl hover:shadow-rose-200/50 transition-all flex items-center gap-1.5 sm:gap-2 group active:scale-95 relative overflow-hidden">
                    <span class="absolute inset-0 bg-gradient-to-r from-rose-500/0 via-rose-500/10 to-rose-500/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></span>
                    <span class="material-symbols-rounded text-lg sm:text-xl group-hover:scale-110 transition-transform relative z-10">picture_as_pdf</span>
                    <span class="relative z-10 hidden sm:inline">Export PDF</span>
                    <span class="relative z-10 sm:hidden">PDF</span>
                </a>
                {{-- Tombol Excel --}}
                <a href="{{ route('laporan.export.excel', request()->all()) }}" target="_blank"
                    class="flex-1 md:flex-none justify-center bg-gradient-to-br from-emerald-50 to-white border-2 border-emerald-200 text-emerald-600 px-4 sm:px-5 md:px-6 py-2.5 sm:py-3 md:py-3.5 rounded-xl sm:rounded-2xl font-bold text-xs sm:text-sm hover:from-emerald-100 hover:to-emerald-50 hover:border-emerald-300 hover:shadow-xl hover:shadow-emerald-200/50 transition-all flex items-center gap-1.5 sm:gap-2 group active:scale-95 relative overflow-hidden">
                    <span class="absolute inset-0 bg-gradient-to-r from-emerald-500/0 via-emerald-500/10 to-emerald-500/0 translate-x-[-100%] group-hover:translate-x-[100%] transition-transform duration-1000"></span>
                    <span class="material-symbols-rounded text-lg sm:text-xl group-hover:scale-110 transition-transform relative z-10">table_view</span>
                    <span class="relative z-10 hidden sm:inline">Export Excel</span>
                    <span class="relative z-10 sm:hidden">Excel</span>
                </a>
            </div>
        </div>

        {{-- 2. FILTER & SEARCH BAR --}}
        <form method="GET" action="{{ route('laporan.index') }}" id="filterForm"
            class="bg-white p-2 sm:p-3 rounded-[1.5rem] sm:rounded-[24px] shadow-lg border border-stone-200 sticky top-[60px] sm:top-[70px] md:top-[80px] lg:top-[90px] z-30 transition-all ring-1 ring-stone-900/5 backdrop-blur-sm bg-white/95 animate-[fadeInUp_0.7s_ease-out]">

            <div class="flex flex-col md:flex-row gap-2 sm:gap-3">
                {{-- A. SEARCH INPUT --}}
                <div class="relative flex-1 w-full group">
                    <span class="material-symbols-rounded absolute left-3 sm:left-4 top-1/2 -translate-y-1/2 text-stone-400 group-focus-within:text-brand-500 transition-colors text-lg sm:text-xl">search</span>
                    <input type="text" name="search" id="searchInput" value="{{ request('search') }}"
                        placeholder="Cari transaksi..."
                        class="w-full pl-9 sm:pl-11 pr-3 sm:pr-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl border-none bg-stone-50 focus:bg-white focus:ring-2 focus:ring-brand-200 text-stone-700 text-xs sm:text-sm font-bold transition-all placeholder:text-stone-400">
                </div>

                <div class="grid grid-cols-2 md:flex gap-2 w-full md:w-auto items-center">
                    {{-- Quick Filter Presets (Hari Ini / Bulan Ini) --}}
                    <div class="hidden md:flex items-center gap-1 bg-stone-50 p-1 rounded-xl border border-stone-100 mr-1">
                        <button type="button" onclick="setDateFilter('{{ date('Y-m-d') }}')"
                           class="px-3 py-2 rounded-lg text-xs font-bold transition-colors {{ request('date') == date('Y-m-d') ? 'bg-white shadow text-brand-600' : 'text-stone-500 hover:text-brand-600' }}">
                           Hari Ini
                        </button>
                        <button type="button" onclick="setLaporanFilter('bulanInput', '{{ date('m') }}')"
                           class="px-3 py-2 rounded-lg text-xs font-bold transition-colors {{ !request('date') && (request('bulan') == date('m') || !$selectedBulan) ? 'bg-white shadow text-brand-600' : 'text-stone-500 hover:text-brand-600' }}">
                           Bulan Ini
                        </button>
                    </div>

                    {{-- B. FILTER BULAN --}}
                    <div class="relative col-span-1 md:w-36 lg:w-40" x-data="{ open: false }" @click.outside="open = false">
                        <input type="hidden" name="bulan" id="bulanInput" value="{{ $selectedBulan }}">
                        <button type="button" @click="open = !open"
                            class="w-full h-full px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl bg-stone-50 hover:bg-stone-100 text-stone-600 hover:text-stone-800 text-xs sm:text-sm font-bold flex items-center justify-between gap-1.5 sm:gap-2 transition-colors relative text-left group">
                            <span class="truncate text-[10px] sm:text-xs md:text-sm">
                                {{ $selectedBulan ? \Carbon\Carbon::create()->month($selectedBulan)->translatedFormat('M') : 'Bulan' }}
                            </span>
                            <span class="material-symbols-rounded text-stone-400 group-hover:text-stone-600 transition-colors text-base sm:text-lg shrink-0">expand_more</span>
                        </button>
                        <div x-cloak x-show="open"
                            class="absolute top-full right-0 mt-2 w-[160px] sm:w-[180px] bg-white border border-stone-100 rounded-xl sm:rounded-2xl shadow-xl z-50 p-1.5 max-h-[300px] overflow-y-auto ring-1 ring-stone-900/5">
                            <button type="button" onclick="setLaporanFilter('bulanInput', '')" class="text-left w-full px-3 py-2 rounded-lg sm:rounded-xl text-[10px] sm:text-xs font-bold text-stone-500 hover:bg-brand-50 hover:text-brand-700 transition-colors">Semua Bulan</button>
                            @for ($i = 1; $i <= 12; $i++)
                                <button type="button" onclick="setLaporanFilter('bulanInput', '{{ $i }}')"
                                    class="text-left w-full px-3 py-2 rounded-lg sm:rounded-xl text-[10px] sm:text-xs font-bold hover:bg-brand-50 hover:text-brand-700 transition-colors {{ $selectedBulan == $i ? 'bg-brand-50 text-brand-700' : 'text-stone-600' }}">
                                    {{ \Carbon\Carbon::create()->month($i)->translatedFormat('F') }}
                                </button>
                            @endfor
                        </div>
                    </div>

                    {{-- C. FILTER TAHUN --}}
                    <div class="relative col-span-1 md:w-24 lg:w-28" x-data="{ open: false }" @click.outside="open = false">
                        <input type="hidden" name="tahun" id="tahunInput" value="{{ $selectedTahun }}">
                        <button type="button" @click="open = !open"
                            class="w-full h-full px-3 sm:px-4 py-2.5 sm:py-3 rounded-lg sm:rounded-xl bg-stone-50 hover:bg-stone-100 text-stone-600 hover:text-stone-800 text-xs sm:text-sm font-bold flex items-center justify-between gap-1.5 sm:gap-2 transition-colors">
                            <span class="text-[10px] sm:text-xs md:text-sm">{{ $selectedTahun ?? 'Thn' }}</span>
                            <span class="material-symbols-rounded text-stone-400 text-base sm:text-lg shrink-0">expand_more</span>
                        </button>
                        <div x-cloak x-show="open"
                             class="absolute top-full right-0 mt-2 w-28 sm:w-32 bg-white border border-stone-100 rounded-xl sm:rounded-2xl shadow-xl z-50 p-1.5 ring-1 ring-stone-900/5">
                            <button type="button" onclick="setLaporanFilter('tahunInput', '')" class="text-left w-full px-3 py-2 rounded-lg sm:rounded-xl text-[10px] sm:text-xs font-bold text-stone-500 hover:bg-brand-50 hover:text-brand-700">Semua</button>
                            @foreach(($listTahun ?? [date('Y')]) as $th)
                                <button type="button" onclick="setLaporanFilter('tahunInput', '{{ $th }}')"
                                    class="text-left w-full px-3 py-2 rounded-lg sm:rounded-xl text-[10px] sm:text-xs font-bold hover:bg-brand-50 hover:text-brand-700 transition-colors {{ $selectedTahun == $th ? 'bg-brand-50 text-brand-700' : 'text-stone-600' }}">
                                    {{ $th }}
                                </button>
                            @endforeach
                        </div>
                    </div>

                    {{-- D. TOMBOL RESET --}}
                    @if(request('bulan') || request('tahun') || request('search') || request('date'))
                        <a href="{{ route('laporan.index') }}"
                           class="col-span-2 md:col-auto h-10 sm:h-11 md:h-auto md:aspect-square flex items-center justify-center rounded-lg sm:rounded-xl bg-rose-50 text-rose-600 hover:bg-rose-100 hover:text-rose-700 border border-rose-100 transition-colors shrink-0"
                           title="Reset Filter">
                            <span class="material-symbols-rounded text-base sm:text-lg">restart_alt</span>
                        </a>
                    @endif
                </div>
            </div>

            {{-- Badge Info jika Filter Harian Aktif --}}
            @if(request('date'))
            <div class="mt-2 text-xs text-stone-500 font-medium flex items-center gap-1 pl-4">
                <span class="material-symbols-rounded text-sm text-brand-500">event_available</span>
                Menampilkan data tanggal: <span class="font-bold text-stone-700">{{ \Carbon\Carbon::parse(request('date'))->translatedFormat('l, d F Y') }}</span>
            </div>
            @endif
        </form>

        {{-- 3. RINGKASAN KEUANGAN (Cards) --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-3 sm:gap-4 md:gap-6">

            {{-- B. Total Omzet (Pemasukan) --}}
            <div class="bg-gradient-to-br from-emerald-50/80 to-white p-4 sm:p-5 md:p-6 rounded-[1.5rem] sm:rounded-[24px] border border-emerald-100/60 shadow-lg hover:shadow-xl transition-all duration-300 relative overflow-hidden group hover:-translate-y-1 animate-[fadeInUp_0.8s_ease-out]">
                <div class="absolute top-0 right-0 w-32 h-32 bg-emerald-400/20 rounded-full blur-3xl -mr-12 -mt-12 group-hover:scale-125 transition-transform duration-700"></div>
                <div class="absolute inset-0 bg-gradient-to-br from-emerald-500/0 via-transparent to-emerald-600/0 group-hover:from-emerald-500/5 group-hover:to-emerald-600/5 transition-all duration-500"></div>
                <div class="flex items-center gap-3 mb-3 relative z-10">
                    <div class="p-2.5 bg-emerald-100 text-emerald-600 rounded-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-sm">
                        <span class="material-symbols-rounded text-[20px]">payments</span>
                    </div>
                    <span class="text-xs font-bold text-emerald-700 uppercase tracking-wide">Total Omzet</span>
                </div>
                <div class="text-xl sm:text-2xl md:text-3xl font-black text-stone-800 break-words mb-3 sm:mb-4 relative z-10 counter-number" data-target="{{ $totalMasuk }}">
                    Rp 0
                </div>
                <div class="space-y-1 pt-2 border-t border-emerald-100/50 relative z-10">
                    <div class="flex justify-between text-xs">
                        <span class="text-stone-500 font-medium">Tunai</span>
                        <span class="font-bold text-stone-700">Rp {{ number_format($totalMasukCash, 0, ',', '.') }}</span>
                    </div>
                    <div class="flex justify-between text-xs">
                        <span class="text-stone-500 font-medium">Non-Tunai</span>
                        <span class="font-bold text-stone-700">Rp {{ number_format($totalMasukNonCash, 0, ',', '.') }}</span>
                    </div>
                </div>
            </div>

            {{-- C. Pengeluaran --}}
            <div class="bg-gradient-to-br from-rose-50/80 to-white p-4 sm:p-5 md:p-6 rounded-[1.5rem] sm:rounded-[24px] border border-rose-100/60 shadow-lg hover:shadow-xl transition-all duration-300 relative overflow-hidden group hover:-translate-y-1 animate-[fadeInUp_0.9s_ease-out]">
                <div class="absolute top-0 right-0 w-32 h-32 bg-rose-400/20 rounded-full blur-3xl -mr-12 -mt-12 group-hover:scale-125 transition-transform duration-700"></div>
                <div class="absolute inset-0 bg-gradient-to-br from-rose-500/0 via-transparent to-rose-600/0 group-hover:from-rose-500/5 group-hover:to-rose-600/5 transition-all duration-500"></div>
                <div class="flex items-center gap-3 mb-3 relative z-10">
                    <div class="p-2.5 bg-rose-100 text-rose-600 rounded-xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-sm">
                        <span class="material-symbols-rounded text-[20px]">shopping_cart</span>
                    </div>
                    <span class="text-xs font-bold text-rose-700 uppercase tracking-wide">Pengeluaran</span>
                </div>
                <div class="text-xl sm:text-2xl md:text-3xl font-black text-stone-800 break-words mb-2 relative z-10 counter-number" data-target="{{ $totalKeluar }}">
                    Rp 0
                </div>
                <p class="text-[10px] text-stone-400 font-medium relative z-10">Belanja bahan & operasional (Tunai)</p>
            </div>

            {{-- D. Sisa Uang Fisik (REVISI: LOGIKA LACI KASIR) --}}
            <div class="bg-gradient-to-br from-stone-900 via-stone-800 to-stone-900 p-4 sm:p-5 md:p-6 rounded-[1.5rem] sm:rounded-[24px] shadow-xl shadow-stone-900/20 text-white relative overflow-hidden ring-1 ring-black/5 group hover:shadow-2xl hover:shadow-brand-500/10 transition-all duration-300 hover:-translate-y-1 animate-[fadeInUp_1s_ease-out] sm:col-span-2 lg:col-span-1">
                <div class="absolute -right-6 -bottom-6 w-40 h-40 bg-brand-500 rounded-full blur-[60px] opacity-30 pointer-events-none group-hover:opacity-40 group-hover:scale-125 transition-all duration-700"></div>
                <div class="absolute inset-0 bg-gradient-to-br from-brand-500/0 via-transparent to-brand-600/0 group-hover:from-brand-500/10 group-hover:to-brand-600/10 transition-all duration-500"></div>

                <div class="relative z-10 h-full flex flex-col justify-between gap-4">
                    <div class="flex justify-between items-start">
                        <div class="text-[10px] font-bold text-brand-400 uppercase tracking-widest mb-1 flex items-center gap-2">
                            <span class="material-symbols-rounded text-base">point_of_sale</span>
                            <span>UANG DI LACI</span>
                        </div>
                        {{-- Tooltip Info --}}
                        <div class="group/tooltip relative">
                            <span class="material-symbols-rounded text-stone-500 text-base cursor-help hover:text-brand-400 transition-colors">help</span>
                            <div class="absolute right-0 top-full mt-2 w-56 p-3 bg-stone-800 text-[10px] text-stone-300 rounded-xl shadow-2xl opacity-0 group-hover/tooltip:opacity-100 transition-all duration-300 pointer-events-none border border-stone-700 z-50 backdrop-blur-sm">
                                <div class="font-bold text-brand-400 mb-1">Info</div>
                                Estimasi uang fisik di laci kasir. Tidak termasuk pembayaran via QRIS/Transfer.
                            </div>
                        </div>
                    </div>

                    <div class="text-2xl sm:text-3xl md:text-4xl font-black tracking-tight text-white break-words counter-number" data-target="{{ $sisaUangFisik }}">
                        Rp 0
                    </div>

                    <div class="flex flex-col gap-1 pt-3 border-t border-stone-800">
                        <div class="flex justify-between text-[10px] text-stone-400">
                           <span>Masuk (Tunai):</span>
                           <span class="text-emerald-400 font-bold">+Rp {{ number_format($totalMasukCash, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-[10px] text-stone-400">
                           <span>Keluar (Tunai):</span>
                           <span class="text-rose-400 font-bold">-Rp {{ number_format($totalKeluar, 0, ',', '.') }}</span>
                        </div>
                        <div class="flex justify-between text-[10px] text-stone-400 mt-1">
                           <span>Info Saldo Akhir (All):</span>
                           <span class="text-stone-300 font-bold">Rp {{ number_format($saldoAkhir, 0, ',', '.') }}</span>
                        </div>
                   </div>
                </div>
            </div>
        </div>

        {{-- 4. ANALISA PRODUK & GUDANG --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 sm:gap-5 md:gap-6 animate-[fadeInUp_1.1s_ease-out]">
            {{-- Inventory --}}
            <div class="bg-white rounded-[1.5rem] sm:rounded-[24px] p-4 sm:p-5 md:p-6 border border-stone-200 shadow-lg hover:shadow-xl transition-all duration-300 flex flex-col h-full group hover:-translate-y-1">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-3 bg-gradient-to-br from-indigo-50 to-indigo-100 text-indigo-600 rounded-2xl group-hover:scale-110 group-hover:rotate-6 transition-all duration-300 shadow-sm">
                        <span class="material-symbols-rounded text-xl">inventory_2</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-stone-800 text-lg leading-tight">Stok Bahan</h3>
                        <p class="text-[11px] text-stone-400 font-medium">Monitoring ketersediaan gudang</p>
                    </div>
                </div>
                <div class="space-y-3 sm:space-y-4 mb-4">
                    <div class="p-4 sm:p-5 bg-gradient-to-br from-indigo-50 to-white rounded-xl sm:rounded-2xl border border-indigo-100 hover:border-indigo-200 hover:shadow-md transition-all group/stat text-center">
                        <div class="text-3xl sm:text-4xl font-black text-indigo-600 group-hover/stat:scale-110 transition-transform counter-number" data-target="{{ $productStats['inventory']['total_stok'] }}">0</div>
                        <div class="text-[9px] sm:text-[10px] text-stone-400 uppercase font-bold tracking-wide mt-1.5 sm:mt-2">Total Stok Unit</div>
                    </div>
                    <div class="p-4 sm:p-5 bg-gradient-to-br from-stone-50 to-white rounded-xl sm:rounded-2xl border border-stone-100 hover:border-indigo-200 hover:shadow-md transition-all group/stat text-center">
                        <div class="text-2xl sm:text-3xl font-black text-stone-700 group-hover/stat:scale-110 transition-transform">{{ $productStats['inventory']['total_categories'] ?? 0 }}</div>
                        <div class="text-[9px] sm:text-[10px] text-stone-400 uppercase font-bold tracking-wide mt-1.5 sm:mt-2">Kategori Produk</div>
                    </div>
                </div>
                <div class="mt-auto">
                    @if($productStats['inventory']['low_stock'] > 0)
                        <div class="flex items-center gap-3 px-4 py-3 bg-rose-50 text-rose-700 rounded-2xl text-xs font-bold border border-rose-100">
                            <span class="material-symbols-rounded text-[18px]">warning</span>
                            <span>{{ $productStats['inventory']['low_stock'] }} Barang hampir habis (< 10)</span>
                        </div>
                    @else
                        <div class="flex items-center gap-3 px-4 py-3 bg-emerald-50 text-emerald-700 rounded-2xl text-xs font-bold border border-emerald-100">
                            <span class="material-symbols-rounded text-[18px]">check_circle</span>
                            <span>Stok aman terkendali</span>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Top Sales --}}
            <div class="lg:col-span-2 bg-white rounded-[1.5rem] sm:rounded-[24px] p-4 sm:p-5 md:p-6 border border-stone-200 shadow-lg hover:shadow-xl transition-all duration-300">
                <div class="flex items-center gap-3 mb-6">
                    <div class="p-3 bg-gradient-to-br from-brand-50 to-brand-100 text-brand-600 rounded-2xl shadow-sm">
                        <span class="material-symbols-rounded text-xl">stars</span>
                    </div>
                    <div>
                        <h3 class="font-bold text-stone-800 text-lg leading-tight">Menu Terlaris</h3>
                        <p class="text-[11px] text-stone-400 font-medium">Top 5 Produk periode ini</p>
                    </div>
                </div>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-3 sm:gap-4">
                    @forelse($productStats['top_products'] as $name => $stat)
                        @php
                            $maxQty = collect($productStats['top_products'])->max(function($item) {
                                return is_array($item) ? ($item['qty'] ?? 0) : 0;
                            });
                            $percentage = $maxQty > 0 ? (($stat['qty'] ?? 0) / $maxQty) * 100 : 0;
                            $index = array_search($name, array_keys($productStats['top_products']));
                        @endphp
                        <div class="flex flex-col p-4 sm:p-5 rounded-xl sm:rounded-2xl border border-stone-100 bg-gradient-to-br from-white to-stone-50 hover:border-brand-200 hover:shadow-xl hover:shadow-brand-100/40 transition-all duration-300 group hover:-translate-y-1 animate-[fadeInUp_0.8s_ease-out]" style="animation-delay: {{ $index * 0.1 }}s;">
                            <div class="flex justify-between mb-3">
                                <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-brand-50 to-brand-100 text-brand-600 flex items-center justify-center font-bold text-sm group-hover:from-brand-500 group-hover:to-brand-600 group-hover:text-white group-hover:scale-110 transition-all duration-300 shadow-sm border border-brand-200 group-hover:border-brand-500">
                                    {{ substr($name, 0, 1) }}
                                </div>
                                <div class="text-right">
                                    <div class="text-[10px] font-bold text-stone-400 uppercase tracking-wide">Terjual</div>
                                    <div class="font-black text-xl text-stone-800 group-hover:text-brand-600 transition-colors">{{ $stat['qty'] ?? 0 }}</div>
                                </div>
                            </div>
                            <div class="font-bold text-stone-700 text-sm line-clamp-2 h-10 flex items-center mb-3 group-hover:text-brand-700 transition-colors">{{ $name }}</div>
                            <div class="mt-auto h-2 w-full bg-stone-100 rounded-full overflow-hidden shadow-inner">
                                <div class="h-full bg-gradient-to-r from-brand-500 to-brand-600 rounded-full group-hover:from-brand-600 group-hover:to-brand-700 transition-all duration-500 shadow-sm" style="width: {{ $percentage }}%"></div>
                            </div>
                        </div>
                    @empty
                        <div class="col-span-full py-16 text-center border-2 border-dashed border-stone-200 rounded-2xl bg-stone-50/50 animate-pulse">
                            <div class="p-4 bg-white rounded-full w-fit mx-auto mb-3 shadow-sm">
                                <span class="material-symbols-rounded text-5xl text-stone-300">shopping_bag</span>
                            </div>
                            <div class="text-stone-500 font-bold text-sm mb-1">Belum ada penjualan</div>
                            <div class="text-stone-400 text-xs">Data akan muncul setelah ada transaksi</div>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>

        {{-- 5. ADMIN SECTION (Outlet & Staff) --}}
        @if(Auth::user()->role === 'admin')
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-4 sm:gap-5 md:gap-6 animate-[fadeInUp_1.3s_ease-out]">
                {{-- Outlet Performance --}}
                <div class="bg-white rounded-[1.5rem] sm:rounded-[24px] border border-stone-200 shadow-lg hover:shadow-xl transition-all duration-300 p-4 sm:p-5 md:p-6 group">
                    <div class="flex items-center gap-2 sm:gap-3 mb-3 sm:mb-4 border-b border-stone-100 pb-3 sm:pb-4">
                        <div class="p-2 sm:p-2.5 bg-gradient-to-br from-purple-100 to-purple-200 text-purple-600 rounded-lg sm:rounded-xl shadow-sm group-hover:scale-110 transition-transform shrink-0"><span class="material-symbols-rounded text-lg sm:text-xl">store</span></div>
                        <h3 class="font-bold text-stone-800 text-base sm:text-lg">Performa Cabang</h3>
                    </div>
                    <div class="space-y-2 sm:space-y-3">
                        @forelse($outletStats as $index => $outlet)
                            <div class="flex justify-between items-center p-3 sm:p-4 bg-gradient-to-r from-stone-50 to-white rounded-xl sm:rounded-2xl hover:from-white hover:to-purple-50/30 hover:shadow-lg border border-transparent hover:border-purple-200 transition-all duration-300 group/item hover:-translate-x-1 animate-[fadeInLeft_0.6s_ease-out]" style="animation-delay: {{ $index * 0.1 }}s;">
                                <div class="flex items-center gap-2 sm:gap-3 min-w-0 flex-1">
                                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-full bg-white border border-stone-200 flex items-center justify-center text-stone-400 font-bold text-[10px] sm:text-xs group-hover:border-purple-200 group-hover:text-purple-600 shrink-0">
                                        {{ substr($outlet['name'], 0, 1) }}
                                    </div>
                                    <div class="min-w-0 flex-1">
                                        <div class="font-bold text-stone-800 text-xs sm:text-sm truncate">{{ $outlet['name'] }}</div>
                                        <div class="text-[10px] sm:text-xs text-stone-500 font-medium">{{ $outlet['trx_count'] }} Transaksi</div>
                                    </div>
                                </div>
                                <div class="font-mono font-bold text-purple-700 bg-purple-50 px-2 sm:px-3 py-1 rounded-lg text-xs sm:text-sm shrink-0 ml-2">Rp {{ number_format($outlet['omzet'], 0, ',', '.') }}</div>
                            </div>
                        @empty
                            <div class="text-center py-8">
                                <div class="p-3 bg-stone-50 rounded-full w-fit mx-auto mb-3">
                                    <span class="material-symbols-rounded text-3xl text-stone-300">store</span>
                                </div>
                                <div class="text-stone-400 text-sm font-medium">Tidak ada data cabang</div>
                            </div>
                        @endforelse
                    </div>
                </div>

                {{-- Staff Performance --}}
                <div class="bg-white rounded-[1.5rem] sm:rounded-[24px] border border-stone-200 shadow-lg hover:shadow-xl transition-all duration-300 p-4 sm:p-5 md:p-6 group">
                    <div class="flex items-center gap-2 sm:gap-3 mb-3 sm:mb-4 border-b border-stone-100 pb-3 sm:pb-4">
                        <div class="p-2 sm:p-2.5 bg-gradient-to-br from-blue-100 to-blue-200 text-blue-600 rounded-lg sm:rounded-xl shadow-sm group-hover:scale-110 transition-transform shrink-0"><span class="material-symbols-rounded text-lg sm:text-xl">badge</span></div>
                        <h3 class="font-bold text-stone-800 text-base sm:text-lg">Kinerja Pegawai</h3>
                    </div>
                    <div class="overflow-y-auto max-h-[300px] sm:max-h-[350px] pr-1 sm:pr-2 custom-scrollbar">
                        <table class="w-full text-xs sm:text-sm text-left">
                            <thead class="text-[10px] sm:text-xs text-stone-400 uppercase font-bold sticky top-0 bg-gradient-to-r from-white to-stone-50/50 backdrop-blur-sm z-10 border-b border-stone-200">
                                <tr>
                                    <th class="pb-2 sm:pb-3 pl-1 sm:pl-2">Nama</th>
                                    <th class="pb-2 sm:pb-3 text-right pr-1 sm:pr-2">Nota</th>
                                    <th class="pb-2 sm:pb-3 text-right">Omzet</th>
                                </tr>
                            </thead>
                            <tbody class="divide-y divide-stone-50">
                                @forelse($userStats as $index => $u)
                                    <tr class="group hover:bg-gradient-to-r hover:from-blue-50/30 hover:to-white transition-all duration-200 animate-[fadeInRight_0.6s_ease-out]" style="animation-delay: {{ $index * 0.05 }}s;">
                                        <td class="py-2 sm:py-3 pl-1 sm:pl-2">
                                            <div class="font-bold text-stone-700 group-hover:text-blue-600 transition-colors text-xs sm:text-sm">{{ $u['name'] }}</div>
                                            <div class="text-[9px] sm:text-[10px] text-stone-400 font-medium">{{ $u['outlet'] }}</div>
                                        </td>
                                        <td class="py-2 sm:py-3 text-right pr-1 sm:pr-2">
                                            <span class="bg-stone-100 px-1.5 sm:px-2 py-0.5 sm:py-1 rounded-md text-[10px] sm:text-xs font-bold text-stone-600">{{ $u['trx_count'] }}</span>
                                        </td>
                                        <td class="py-2 sm:py-3 text-right font-mono text-stone-700 font-bold text-xs sm:text-sm">Rp {{ number_format($u['omzet'], 0, ',', '.') }}</td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="text-center py-10">
                                            <div class="flex flex-col items-center gap-2">
                                                <div class="p-3 bg-stone-50 rounded-full">
                                                    <span class="material-symbols-rounded text-3xl text-stone-300">badge</span>
                                                </div>
                                                <div class="text-stone-400 text-sm font-medium">Belum ada data</div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif

        {{-- 6. TABEL MUTASI (Buku Kas) --}}
        <div class="bg-white rounded-[1.5rem] sm:rounded-[24px] border border-stone-200 shadow-lg hover:shadow-xl transition-all duration-300 overflow-hidden mb-6 sm:mb-8 animate-[fadeInUp_1.2s_ease-out]">
            <div class="px-4 sm:px-6 py-4 sm:py-5 border-b border-stone-100 bg-gradient-to-r from-stone-50 to-white flex items-center gap-2 sm:gap-3 backdrop-blur-sm">
                <div class="p-2.5 bg-gradient-to-br from-stone-200 to-stone-300 text-stone-700 rounded-xl shadow-sm">
                    <span class="material-symbols-rounded text-xl">receipt_long</span>
                </div>
                <div>
                    <h3 class="font-bold text-stone-800 text-lg leading-tight">Buku Kas Harian</h3>
                    <p class="text-[11px] text-stone-500 font-medium">Rincian uang masuk & keluar secara detail</p>
                </div>
            </div>

            {{-- DESKTOP TABLE --}}
            <div class="hidden md:block overflow-x-auto custom-scrollbar">
                <table class="w-full text-xs sm:text-sm text-left">
                    <thead class="bg-gradient-to-r from-stone-50 to-stone-100 text-stone-500 font-bold border-b-2 border-stone-200 text-[10px] sm:text-xs uppercase tracking-wider sticky top-0 z-10">
                        <tr>
                            <th class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 w-28 sm:w-32">Tanggal</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 sm:py-4">Keterangan</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 text-center">Metode</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 text-right text-emerald-600 bg-emerald-50/30">Masuk (+)</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 text-right text-rose-600 bg-rose-50/30">Keluar (-)</th>
                            <th class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 text-right w-32 sm:w-40">Saldo</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-stone-100">
                        @forelse($laporan as $index => $item)
                        <tr class="hover:bg-gradient-to-r hover:from-stone-50 hover:to-white transition-all duration-200 group animate-[fadeIn_0.5s_ease-out]" style="animation-delay: {{ $index * 0.05 }}s;">
                            <td class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 align-top">
                                <div class="font-bold text-stone-700 text-xs sm:text-sm">{{ $item['tanggal']->format('d M') }}</div>
                                <div class="text-[9px] sm:text-[10px] text-stone-400 font-mono mt-0.5">{{ $item['kode'] }}</div>
                            </td>
                            <td class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 align-top">
                                <div class="text-stone-800 font-bold text-xs sm:text-sm group-hover:text-brand-700 transition-colors">{{ $item['keterangan'] }}</div>
                                <div class="inline-flex mt-1.5 px-2 py-0.5 rounded-md text-[9px] sm:text-[10px] font-bold uppercase tracking-wide border {{ $item['type'] == 'masuk' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-rose-50 text-rose-600 border-rose-100' }}">
                                    {{ $item['kategori'] }}
                                </div>
                            </td>
                            <td class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 text-center align-top">
                                @if($item['type'] == 'masuk')
                                    @php $method = strtolower($item['payment']); @endphp
                                    @if(in_array($method, ['tunai', 'cash']))
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-stone-100 text-stone-600 text-[10px] font-bold border border-stone-200">
                                            <span class="material-symbols-rounded text-[12px]">payments</span> Tunai
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1 px-2.5 py-1 rounded-full bg-blue-50 text-blue-600 text-[10px] font-bold border border-blue-100">
                                            <span class="material-symbols-rounded text-[12px]">qr_code</span> {{ $item['payment'] }}
                                        </span>
                                    @endif
                                @else
                                    <span class="text-stone-300 font-bold text-lg">-</span>
                                @endif
                            </td>
                            <td class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 text-right font-mono font-bold text-emerald-600 bg-emerald-50/10 align-top group-hover:bg-emerald-50/20 transition-colors text-xs sm:text-sm">
                                {{ $item['masuk'] > 0 ? 'Rp ' . number_format($item['masuk'], 0, ',', '.') : '-' }}
                            </td>
                            <td class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 text-right font-mono font-bold text-rose-600 bg-rose-50/10 align-top group-hover:bg-rose-50/20 transition-colors text-xs sm:text-sm">
                                {{ $item['keluar'] > 0 ? 'Rp ' . number_format($item['keluar'], 0, ',', '.') : '-' }}
                            </td>
                            <td class="px-3 sm:px-4 md:px-6 py-3 sm:py-4 text-right font-mono font-bold text-stone-800 bg-stone-50/20 align-top group-hover:bg-stone-100/30 transition-colors text-xs sm:text-sm">
                                Rp {{ number_format($item['saldo'], 0, ',', '.') }}
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="px-6 py-16 text-center border-2 border-dashed border-stone-200 rounded-2xl">
                                <div class="flex flex-col items-center justify-center gap-3 animate-pulse">
                                    <div class="p-4 bg-stone-50 rounded-full">
                                        <span class="material-symbols-rounded text-5xl text-stone-300">receipt_long</span>
                                    </div>
                                    <div>
                                        <span class="text-stone-500 font-bold text-sm block mb-1">Belum ada transaksi</span>
                                        <span class="text-stone-400 text-xs">Coba ubah filter atau periode waktu</span>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{-- MOBILE LIST VIEW --}}
            <div class="md:hidden divide-y divide-stone-100">
                @forelse($laporan as $index => $item)
                <div class="p-3 sm:p-4 relative hover:bg-gradient-to-r hover:from-stone-50 hover:to-white transition-all duration-200 animate-[fadeIn_0.5s_ease-out]" style="animation-delay: {{ $index * 0.05 }}s;">
                    <div class="flex gap-3 sm:gap-4">
                        {{-- Icon Indicator --}}
                        <div class="mt-0.5 shrink-0">
                            @php $method = strtolower($item['payment']); @endphp
                            <div class="w-10 h-10 sm:w-12 sm:h-12 rounded-xl sm:rounded-2xl flex items-center justify-center border shadow-sm {{ $item['type'] == 'masuk' ? 'bg-emerald-50 border-emerald-100 text-emerald-600' : 'bg-rose-50 border-rose-100 text-rose-600' }}">
                                <span class="material-symbols-rounded text-lg sm:text-[24px]">
                                    {{ $item['type'] == 'masuk' ? (in_array($method, ['tunai', 'cash']) ? 'payments' : 'qr_code') : 'shopping_cart' }}
                                </span>
                            </div>
                        </div>

                        {{-- Content --}}
                        <div class="flex-1 min-w-0">
                            <div class="flex justify-between items-start gap-2">
                                <div class="min-w-0 flex-1">
                                    <div class="text-[9px] sm:text-[10px] font-bold text-stone-400 uppercase tracking-wider mb-0.5">
                                        {{ $item['tanggal']->format('d M') }} &bull; {{ $item['tanggal']->format('H:i') }}
                                    </div>
                                    <div class="font-bold text-stone-800 text-xs sm:text-sm leading-tight line-clamp-2 mb-1">{{ $item['keterangan'] }}</div>
                                    <div class="inline-flex px-1.5 sm:px-2 py-0.5 rounded-md text-[8px] sm:text-[9px] font-bold uppercase tracking-wide border {{ $item['type'] == 'masuk' ? 'bg-emerald-50 text-emerald-600 border-emerald-100' : 'bg-rose-50 text-rose-600 border-rose-100' }}">
                                        {{ $item['kategori'] }}
                                    </div>
                                </div>
                                <div class="text-right whitespace-nowrap shrink-0 ml-2">
                                    @if($item['masuk'] > 0)
                                        <div class="text-emerald-600 font-black font-mono text-xs sm:text-sm">+{{ number_format($item['masuk'], 0, ',', '.') }}</div>
                                    @else
                                        <div class="text-rose-600 font-black font-mono text-xs sm:text-sm">-{{ number_format($item['keluar'], 0, ',', '.') }}</div>
                                    @endif
                                    <div class="text-[9px] sm:text-[10px] text-stone-400 font-mono mt-0.5">Saldo: {{ number_format($item['saldo'], 0, ',', '.') }}</div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                @empty
                <div class="p-12 text-center flex flex-col items-center justify-center gap-4 border-2 border-dashed border-stone-200 rounded-2xl animate-pulse">
                     <div class="w-20 h-20 bg-gradient-to-br from-stone-50 to-stone-100 rounded-full flex items-center justify-center text-stone-300 shadow-sm">
                        <span class="material-symbols-rounded text-4xl">receipt_long</span>
                    </div>
                    <div>
                        <div class="text-stone-500 font-bold text-sm block mb-1">Belum ada transaksi</div>
                        <div class="text-stone-400 text-xs">Coba ubah filter atau periode waktu</div>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>
