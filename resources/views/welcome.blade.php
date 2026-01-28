<!DOCTYPE html>
<html lang="id" class="scroll-smooth" itemscope itemtype="https://schema.org/Restaurant">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=5, user-scalable=yes, viewport-fit=cover">
    
    {{-- Primary Meta Tags --}}
    <title>Restoran Ragil Jaya Cilacap - Ayam Goreng Terenak di Cilacap | Menu Lezat & Harga Terjangkau</title>
    <meta name="title" content="Restoran Ragil Jaya Cilacap - Ayam Goreng Terenak di Cilacap | Menu Lezat & Harga Terjangkau">
    <meta name="description" content="Restoran Ragil Jaya Cilacap menyajikan ayam goreng renyah dan gurih dengan bumbu rahasia turun temurun. Lokasi di Jl. DI Panjaitan No.86a, Cilacap Selatan. Pesan via WhatsApp 0813 2861 9818. Buka setiap hari 09:00-21:00.">
    <meta name="keywords" content="restoran ragil jaya cilacap, ayam goreng cilacap, ragil jaya cilacap, restoran ayam goreng cilacap, ayam goreng terenak cilacap, menu ayam goreng cilacap, kuliner cilacap, makanan enak cilacap, warung ayam goreng cilacap, ragil jaya restaurant">
    <meta name="author" content="Ayam Goreng Ragil Jaya">
    <meta name="robots" content="index, follow">
    <meta name="language" content="Indonesian">
    <meta name="revisit-after" content="7 days">
    <meta name="geo.region" content="ID-JT">
    <meta name="geo.placename" content="Cilacap">
    <meta name="geo.position" content="-7.7212698;109.0054719">
    <meta name="ICBM" content="-7.7212698, 109.0054719">
    
    {{-- Open Graph / Facebook --}}
    <meta property="og:type" content="restaurant">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="Restoran Ragil Jaya Cilacap - Ayam Goreng Terenak di Cilacap">
    <meta property="og:description" content="Restoran Ragil Jaya Cilacap menyajikan ayam goreng renyah dan gurih dengan bumbu rahasia turun temurun. Lokasi di Jl. DI Panjaitan No.86a, Cilacap Selatan.">
    <meta property="og:image" content="{{ asset('assets/images/logo-ragil-jaya.png') }}">
    <meta property="og:locale" content="id_ID">
    <meta property="og:site_name" content="Restoran Ragil Jaya Cilacap">
    
    {{-- Twitter --}}
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="Restoran Ragil Jaya Cilacap - Ayam Goreng Terenak di Cilacap">
    <meta property="twitter:description" content="Restoran Ragil Jaya Cilacap menyajikan ayam goreng renyah dan gurih dengan bumbu rahasia turun temurun.">
    <meta property="twitter:image" content="{{ asset('assets/images/logo-ragil-jaya.png') }}">
    
    {{-- Canonical URL --}}
    <link rel="canonical" href="{{ url('/') }}">
    
    {{-- Alternate Languages (if needed) --}}
    <link rel="alternate" hreflang="id" href="{{ url('/') }}">
    
    <link rel="icon" href="{{ asset('assets/images/logo-ragil-jaya.png') }}" type="image/png">

    {{-- Fonts: Plus Jakarta Sans (Sama dengan Guest Blade) --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    {{-- Icons --}}
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Rounded:opsz,wght,FILL,GRAD@24,400,0,0" />

    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    fontFamily: { sans: ['"Plus Jakarta Sans"', 'sans-serif'] },
                    colors: {
                        brand: {
                            50: '#ecfeff', 100: '#cffafe', 200: '#a5f3fc', 300: '#67e8f9',
                            400: '#22d3ee', 500: '#06b6d4', 600: '#0891b2', 700: '#0e7490',
                            800: '#155e75', 900: '#164e63', 950: '#083344',
                        },
                        leaf: { 50: '#f0fdf4', 500: '#22c55e', 600: '#16a34a', 700: '#15803d' },
                        stone: {
                            50: '#fafaf9', 100: '#f5f5f4', 200: '#e7e5e4', 300: '#d6d3d1',
                            400: '#a8a29e', 500: '#78716c', 600: '#57534e', 700: '#44403c',
                            800: '#292524', 900: '#1c1917', 950: '#0c0a09'
                        }
                    },
                    animation: {
                        'fade-in': 'fadeIn 0.8s ease-out forwards',
                        'slide-up': 'slideUp 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'slide-down': 'slideDown 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'slide-left': 'slideLeft 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'slide-right': 'slideRight 0.8s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'scale-in': 'scaleIn 0.6s cubic-bezier(0.16, 1, 0.3, 1) forwards',
                        'float': 'float 6s ease-in-out infinite',
                        'float-slow': 'float 8s ease-in-out infinite',
                        'blob': 'blob 7s infinite',
                        'blob-slow': 'blob 10s infinite',
                        'rotate-slow': 'rotate 20s linear infinite',
                        'pulse-slow': 'pulse 3s ease-in-out infinite',
                        'shimmer': 'shimmer 3s linear infinite',
                        'gradient': 'gradient 8s ease infinite',
                    },
                    keyframes: {
                        fadeIn: { '0%': { opacity: '0' }, '100%': { opacity: '1' } },
                        slideUp: { '0%': { opacity: '0', transform: 'translateY(30px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                        slideDown: { '0%': { opacity: '0', transform: 'translateY(-30px)' }, '100%': { opacity: '1', transform: 'translateY(0)' } },
                        slideLeft: { '0%': { opacity: '0', transform: 'translateX(30px)' }, '100%': { opacity: '1', transform: 'translateX(0)' } },
                        slideRight: { '0%': { opacity: '0', transform: 'translateX(-30px)' }, '100%': { opacity: '1', transform: 'translateX(0)' } },
                        scaleIn: { '0%': { opacity: '0', transform: 'scale(0.9)' }, '100%': { opacity: '1', transform: 'scale(1)' } },
                        float: { '0%, 100%': { transform: 'translateY(0)' }, '50%': { transform: 'translateY(-15px)' } },
                        blob: {
                            '0%': { transform: 'translate(0px, 0px) scale(1)' },
                            '33%': { transform: 'translate(30px, -50px) scale(1.1)' },
                            '66%': { transform: 'translate(-20px, 20px) scale(0.9)' },
                            '100%': { transform: 'translate(0px, 0px) scale(1)' },
                        },
                        rotate: { '0%': { transform: 'rotate(0deg)' }, '100%': { transform: 'rotate(360deg)' } },
                        pulse: { '0%, 100%': { opacity: '1' }, '50%': { opacity: '0.5' } },
                        shimmer: {
                            '0%': { backgroundPosition: '-1000px 0' },
                            '100%': { backgroundPosition: '1000px 0' }
                        },
                        gradient: {
                            '0%, 100%': { backgroundPosition: '0% 50%' },
                            '50%': { backgroundPosition: '100% 50%' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .glass-nav {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(12px);
            border-bottom: 1px solid rgba(231, 229, 228, 0.6);
        }
        .text-glow {
            text-shadow: 0 0 30px rgba(6, 182, 212, 0.3);
        }
        /* Custom selection color to match brand */
        ::selection {
            background-color: #06b6d4;
            color: white;
        }
        
        /* Scroll animations */
        .fade-in-on-scroll {
            opacity: 0;
            transform: translateY(30px);
            transition: opacity 0.8s ease-out, transform 0.8s ease-out;
        }
        
        .fade-in-on-scroll.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        /* Particle system */
        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0.3;
        }
        
        /* Gradient text animation */
        .gradient-text {
                    background: linear-gradient(90deg, #06b6d4, #0891b2, #06b6d4);
            background-size: 200% auto;
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
            animation: gradient 3s linear infinite;
        }
        
        /* Navbar scroll effect */
        .glass-nav.scrolled {
            backdrop-filter: blur(20px);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }
        
        /* Smooth reveal animations */
        @keyframes reveal {
            from {
                clip-path: inset(0 0 100% 0);
            }
            to {
                clip-path: inset(0 0 0 0);
            }
        }
        
        .reveal {
            animation: reveal 1s ease-out forwards;
        }
        
        /* Animation delays */
        .animation-delay-2000 {
            animation-delay: 2s;
        }
        
        /* Enhanced hover effects */
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-8px);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }
        
        /* Loading animation */
        @keyframes spin-slow {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }
        
        .spin-slow {
            animation: spin-slow 3s linear infinite;
        }

        /* Map container responsive */
        .map-loading {
            transition: opacity 0.5s ease-out;
        }

        /* Responsive map iframe */
        @media (max-width: 640px) {
            iframe[src*="maps"] {
                min-height: 350px;
            }
        }
    </style>
    
    <script src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
</head>
<body class="font-sans antialiased text-stone-900 bg-stone-50 overflow-x-hidden selection:bg-brand-500 selection:text-white">

    {{-- Background Blobs (Enhanced with more effects) --}}
    <div class="fixed inset-0 z-0 pointer-events-none overflow-hidden">
        <div class="absolute top-[-10%] right-[-5%] w-[600px] h-[600px] bg-brand-100/40 rounded-full blur-[120px] mix-blend-multiply animate-blob"></div>
        <div class="absolute bottom-[-10%] left-[-5%] w-[500px] h-[500px] bg-stone-200/40 rounded-full blur-[100px] mix-blend-multiply animate-blob-slow" style="animation-delay: 2s;"></div>
        <div class="absolute top-[50%] left-[50%] -translate-x-1/2 -translate-y-1/2 w-[400px] h-[400px] bg-leaf-100/30 rounded-full blur-[100px] mix-blend-multiply animate-blob" style="animation-delay: 4s;"></div>
        
        {{-- Animated Grid Pattern --}}
        <div class="absolute inset-0 opacity-[0.02] bg-[linear-gradient(to_right,#80808012_1px,transparent_1px),linear-gradient(to_bottom,#80808012_1px,transparent_1px)] bg-[size:24px_24px]"></div>
        
        {{-- Floating Particles --}}
        <div class="particles-container absolute inset-0"></div>
    </div>

    {{-- Navbar --}}
    <nav id="navbar" class="fixed w-full z-50 glass-nav transition-all duration-300" x-data="{ scrolled: false }" x-init="window.addEventListener('scroll', () => { scrolled = window.scrollY > 50 })" :class="scrolled ? 'shadow-lg bg-white/95' : ''">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                {{-- Logo --}}
                <div class="flex items-center gap-3 animate-slide-right">
                    <div class="relative group">
                        <img src="{{ asset('assets/images/logo-ragil-jaya.png') }}" alt="Logo" class="w-10 h-10 object-contain transition-all duration-500 group-hover:rotate-12 group-hover:scale-110">
                        <div class="absolute inset-0 bg-brand-500/20 rounded-full blur-xl opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
                    </div>
                    <div class="flex flex-col leading-none">
                        <span class="font-bold text-lg text-stone-900 tracking-tight">Ayam Goreng</span>
                        <span class="text-[11px] font-bold text-brand-600 uppercase tracking-wider">Ragil Jaya</span>
                    </div>
                </div>

                {{-- Menu Kanan --}}
                <div class="flex items-center gap-3 sm:gap-4 animate-slide-left">
                    @auth
                        <a href="{{ url('/dashboard') }}" class="font-semibold text-sm text-stone-600 hover:text-brand-600 transition-all duration-300 relative group">
                            Dashboard
                            <span class="absolute bottom-0 left-0 w-0 h-0.5 bg-brand-600 group-hover:w-full transition-all duration-300"></span>
                        </a>
                    @else
                        <a href="{{ route('login') }}"
                           class="px-5 py-2.5 bg-stone-900 hover:bg-stone-800 text-white text-sm font-bold rounded-full shadow-lg shadow-stone-900/20 transition-all transform hover:-translate-y-0.5 hover:shadow-xl hover:scale-105 active:scale-95 relative overflow-hidden group">
                            <span class="relative z-10">Masuk</span>
                            <span class="absolute inset-0 bg-gradient-to-r from-brand-500 to-brand-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                        </a>
                    @endauth
                </div>
            </div>
        </div>
    </nav>

    {{-- Hero Section --}}
    <section class="relative pt-32 pb-16 lg:pt-48 lg:pb-32 min-h-[90vh] flex items-center z-10">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full">
            <div class="grid lg:grid-cols-12 gap-12 lg:gap-16 items-center">

                {{-- 1. Text Content (Left) --}}
                <div class="lg:col-span-7 flex flex-col items-center lg:items-start text-center lg:text-left">

                    {{-- Badge --}}
                    <div class="animate-fade-in inline-flex items-center gap-2 px-3 py-1.5 mb-8 rounded-full bg-white border border-stone-200 shadow-sm">
                        <span class="relative flex h-2 w-2">
                          <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-leaf-500 opacity-75"></span>
                          <span class="relative inline-flex rounded-full h-2 w-2 bg-leaf-500"></span>
                        </span>
                        <span class="text-[10px] font-bold tracking-widest text-stone-600 uppercase">Rasa Gurih & Renyah Terbaik</span>
                    </div>

                    {{-- Headline --}}
                    <h1 class="animate-slide-up text-5xl sm:text-6xl lg:text-7xl font-extrabold text-stone-900 mb-6 leading-[1.1] tracking-tight">
                        Gurihnya <br class="hidden lg:block">
                        <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-500 to-brand-600 text-glow">
                            Ayam Goreng Cilacap
                        </span>
                    </h1>

                    <p class="animate-slide-up text-lg text-stone-500 mb-10 leading-relaxed max-w-lg font-medium" style="animation-delay: 0.1s;">
                        <span class="text-stone-900 font-bold">Restoran Ragil Jaya Cilacap</span> menyajikan ayam goreng renyah dan gurih dengan bumbu rahasia turun temurun. Rasakan kenikmatan ayam goreng yang renyah di luar, juicy di dalam. Digoreng dengan minyak berkualitas, tanpa pengawet. Lokasi di Jl. DI Panjaitan No.86a, Cilacap Selatan.
                    </p>

                    <div class="animate-slide-up flex flex-col sm:flex-row gap-4 w-full sm:w-auto" style="animation-delay: 0.2s;">
                        <a href="{{ route('login') }}"
                           class="group inline-flex justify-center items-center px-8 py-4 text-base font-bold text-white bg-gradient-to-r from-brand-500 to-brand-600 rounded-full hover:from-brand-600 hover:to-brand-700 shadow-xl shadow-brand-500/20 transition-all transform hover:-translate-y-1 hover:scale-105 active:scale-95 w-full sm:w-auto relative overflow-hidden">
                            <span class="absolute inset-0 bg-gradient-to-r from-brand-400 to-brand-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                            <span class="material-symbols-rounded mr-2 text-[20px] relative z-10 group-hover:rotate-12 transition-transform duration-300">shopping_bag</span>
                            <span class="relative z-10">Pesan Sekarang</span>
                        </a>
                        <a href="#features"
                           class="inline-flex justify-center items-center px-8 py-4 text-base font-bold text-stone-600 bg-white border border-stone-200 rounded-full hover:bg-stone-50 hover:border-stone-300 hover:text-stone-900 transition-all w-full sm:w-auto shadow-sm hover:shadow-md hover:-translate-y-0.5 group">
                            <span class="material-symbols-rounded mr-2 text-[20px] group-hover:animate-bounce">arrow_downward</span>
                            Tentang Kami
                        </a>
                    </div>
                </div>

                {{-- 2. Image Content (Right) --}}
                <div class="lg:col-span-5 relative flex justify-center items-center mt-10 lg:mt-0 animate-fade-in" style="animation-delay: 0.3s;">

                    {{-- Glow effect behind image --}}
                    <div class="absolute z-0">
                         <div class="w-[300px] h-[300px] sm:w-[450px] sm:h-[450px] bg-gradient-to-tr from-brand-200/50 to-cyan-100/50 rounded-full blur-3xl opacity-60 animate-pulse"></div>
                    </div>

                    {{-- Main Image --}}
                    <div class="relative z-10 transform transition-transform hover:scale-105 duration-700 ease-out hero-image">
                        <img src="{{ asset('assets/images/produk-ragil-jaya-polos.jpg') }}"
                             alt="Ayam Goreng Ragil Jaya"
                             class="w-[240px] sm:w-[320px] lg:w-[400px] object-contain drop-shadow-[0_25px_50px_rgba(0,0,0,0.15)] animate-float">

                        {{-- Floating Card 1 (Top Right) --}}
                        <div class="absolute top-12 -right-4 lg:right-0 bg-white/80 backdrop-blur-md px-4 py-3 rounded-2xl shadow-lg border border-white/40 animate-float" style="animation-delay: 1.5s;">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-leaf-50 flex items-center justify-center text-leaf-600">
                                    <span class="material-symbols-rounded">restaurant</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-stone-400 font-bold uppercase tracking-wider">Renyah</span>
                                    <span class="text-sm font-bold text-stone-800">Kriuk di Luar</span>
                                </div>
                            </div>
                        </div>

                        {{-- Floating Card 2 (Bottom Left) --}}
                        <div class="absolute bottom-16 -left-4 lg:left-0 bg-white/80 backdrop-blur-md px-4 py-3 rounded-2xl shadow-lg border border-white/40 animate-float" style="animation-delay: 2.5s;">
                            <div class="flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-brand-50 flex items-center justify-center text-brand-600">
                                    <span class="material-symbols-rounded">verified</span>
                                </div>
                                <div class="flex flex-col">
                                    <span class="text-[10px] text-stone-400 font-bold uppercase tracking-wider">Bumbu</span>
                                    <span class="text-sm font-bold text-stone-800">Rahasia Turun Temurun</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    {{-- Stats Section (New) --}}
    <section class="py-20 bg-gradient-to-br from-brand-50 via-white to-stone-50 relative z-10 overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg width="60" height="60" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg"%3E%3Cg fill="none" fill-rule="evenodd"%3E%3Cg fill="%23f97316" fill-opacity="0.03"%3E%3Cpath d="M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z"/%3E%3C/g%3E%3C/g%3E%3C/svg%3E')] opacity-40"></div>
        
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 md:gap-8">
                <div class="text-center p-6 rounded-2xl bg-white/60 backdrop-blur-sm border border-white/80 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                    <div class="text-4xl md:text-5xl font-black text-brand-600 mb-2 counter-stat" data-target="10000">0</div>
                    <div class="text-xs font-bold text-stone-500 uppercase tracking-wider">Pelanggan Setia</div>
                    <div class="mt-2 w-12 h-1 bg-gradient-to-r from-brand-500 to-brand-600 mx-auto rounded-full group-hover:scale-x-150 transition-transform duration-300"></div>
                </div>
                <div class="text-center p-6 rounded-2xl bg-white/60 backdrop-blur-sm border border-white/80 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                    <div class="text-4xl md:text-5xl font-black text-brand-600 mb-2 counter-stat" data-target="50000">0</div>
                    <div class="text-xs font-bold text-stone-500 uppercase tracking-wider">Porsi Terjual</div>
                    <div class="mt-2 w-12 h-1 bg-gradient-to-r from-brand-500 to-brand-600 mx-auto rounded-full group-hover:scale-x-150 transition-transform duration-300"></div>
                </div>
                <div class="text-center p-6 rounded-2xl bg-white/60 backdrop-blur-sm border border-white/80 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                    <div class="text-4xl md:text-5xl font-black text-brand-600 mb-2 counter-stat" data-target="15">0</div>
                    <div class="text-xs font-bold text-stone-500 uppercase tracking-wider">Tahun Berpengalaman</div>
                    <div class="mt-2 w-12 h-1 bg-gradient-to-r from-brand-500 to-brand-600 mx-auto rounded-full group-hover:scale-x-150 transition-transform duration-300"></div>
                </div>
                <div class="text-center p-6 rounded-2xl bg-white/60 backdrop-blur-sm border border-white/80 shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-1 group">
                    <div class="text-4xl md:text-5xl font-black text-brand-600 mb-2 counter-stat" data-target="98">0</div>
                    <div class="text-xs font-bold text-stone-500 uppercase tracking-wider">% Kepuasan</div>
                    <div class="mt-2 w-12 h-1 bg-gradient-to-r from-brand-500 to-brand-600 mx-auto rounded-full group-hover:scale-x-150 transition-transform duration-300"></div>
                </div>
            </div>
        </div>
    </section>

    {{-- Features Section --}}
    <section id="features" class="py-24 bg-white relative z-10 border-t border-stone-100">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16 fade-in-on-scroll">
                <span class="text-brand-600 font-bold tracking-wider uppercase text-xs mb-2 block animate-slide-down">Keunggulan Kami</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-stone-900 tracking-tight animate-slide-up">Kualitas dalam Setiap Gigitan</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                {{-- Item 1 --}}
                <div class="p-8 rounded-[2rem] bg-gradient-to-br from-stone-50 to-white border border-stone-100 hover:shadow-2xl hover:shadow-brand-500/10 transition-all duration-500 group hover:-translate-y-2 hover:scale-[1.02] fade-in-on-scroll relative overflow-hidden">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-500/0 to-brand-600/0 group-hover:from-brand-500/5 group-hover:to-brand-600/5 transition-all duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 group-hover:bg-brand-500 group-hover:text-white group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 text-brand-500">
                            <span class="material-symbols-rounded text-3xl">restaurant_menu</span>
                        </div>
                        <h3 class="text-xl font-bold text-stone-900 mb-3 group-hover:text-brand-600 transition-colors">Ayam Pilihan</h3>
                        <p class="text-stone-500 leading-relaxed text-sm">Menggunakan ayam segar berkualitas premium yang dipilih dengan teliti untuk memastikan daging yang juicy dan lezat.</p>
                    </div>
                </div>

                {{-- Item 2 --}}
                <div class="p-8 rounded-[2rem] bg-gradient-to-br from-stone-50 to-white border border-stone-100 hover:shadow-2xl hover:shadow-brand-500/10 transition-all duration-500 group hover:-translate-y-2 hover:scale-[1.02] fade-in-on-scroll relative overflow-hidden" style="animation-delay: 0.1s;">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-500/0 to-brand-600/0 group-hover:from-brand-500/5 group-hover:to-brand-600/5 transition-all duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 group-hover:bg-brand-500 group-hover:text-white group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 text-brand-500">
                            <span class="material-symbols-rounded text-3xl">local_dining</span>
                        </div>
                        <h3 class="text-xl font-bold text-stone-900 mb-3 group-hover:text-brand-600 transition-colors">Bumbu Rahasia</h3>
                        <p class="text-stone-500 leading-relaxed text-sm">Racikan bumbu turun temurun yang diracik dengan rempah-rempah pilihan untuk menghasilkan cita rasa yang khas dan menggugah selera.</p>
                    </div>
                </div>

                {{-- Item 3 --}}
                <div class="p-8 rounded-[2rem] bg-gradient-to-br from-stone-50 to-white border border-stone-100 hover:shadow-2xl hover:shadow-brand-500/10 transition-all duration-500 group hover:-translate-y-2 hover:scale-[1.02] fade-in-on-scroll relative overflow-hidden" style="animation-delay: 0.2s;">
                    <div class="absolute inset-0 bg-gradient-to-br from-brand-500/0 to-brand-600/0 group-hover:from-brand-500/5 group-hover:to-brand-600/5 transition-all duration-500"></div>
                    <div class="relative z-10">
                        <div class="w-14 h-14 bg-white rounded-2xl flex items-center justify-center shadow-sm mb-6 group-hover:bg-brand-500 group-hover:text-white group-hover:scale-110 group-hover:rotate-6 transition-all duration-500 text-brand-500">
                            <span class="material-symbols-rounded text-3xl">oil_barrel</span>
                        </div>
                        <h3 class="text-xl font-bold text-stone-900 mb-3 group-hover:text-brand-600 transition-colors">Goreng Sempurna</h3>
                        <p class="text-stone-500 leading-relaxed text-sm">Digoreng dengan teknik khusus menggunakan minyak berkualitas untuk menghasilkan tekstur renyah di luar dan juicy di dalam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Testimonials Section (New) --}}
    <section class="py-24 bg-gradient-to-b from-white to-stone-50 relative z-10 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16 fade-in-on-scroll">
                <span class="text-brand-600 font-bold tracking-wider uppercase text-xs mb-2 block">Testimoni</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-stone-900 tracking-tight">Kata Pelanggan Kami</h2>
            </div>

            <div class="grid md:grid-cols-3 gap-8">
                <div class="p-6 rounded-2xl bg-white border border-stone-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 fade-in-on-scroll group">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-brand-400 to-brand-600 flex items-center justify-center text-white font-bold text-lg">B</div>
                        <div>
                            <div class="font-bold text-stone-900">Budi Santoso</div>
                            <div class="text-xs text-stone-500">Pelanggan Setia</div>
                        </div>
                    </div>
                    <div class="flex gap-1 mb-3 text-brand-500">
                        <span class="material-symbols-rounded text-sm">star</span>
                        <span class="material-symbols-rounded text-sm">star</span>
                        <span class="material-symbols-rounded text-sm">star</span>
                        <span class="material-symbols-rounded text-sm">star</span>
                        <span class="material-symbols-rounded text-sm">star</span>
                    </div>
                    <p class="text-stone-600 text-sm leading-relaxed italic">"Ayam gorengnya benar-benar renyah dan gurih! Bumbunya meresap sampai ke dalam. Sudah jadi favorit keluarga kami."</p>
                </div>

                <div class="p-6 rounded-2xl bg-white border border-stone-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 fade-in-on-scroll group" style="animation-delay: 0.1s;">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-emerald-400 to-emerald-600 flex items-center justify-center text-white font-bold text-lg">S</div>
                        <div>
                            <div class="font-bold text-stone-900">Siti Nurhaliza</div>
                            <div class="text-xs text-stone-500">Pelanggan Baru</div>
                        </div>
                    </div>
                    <div class="flex gap-1 mb-3 text-brand-500">
                        <span class="material-symbols-rounded text-sm">star</span>
                        <span class="material-symbols-rounded text-sm">star</span>
                        <span class="material-symbols-rounded text-sm">star</span>
                        <span class="material-symbols-rounded text-sm">star</span>
                        <span class="material-symbols-rounded text-sm">star</span>
                    </div>
                    <p class="text-stone-600 text-sm leading-relaxed italic">"Pertama kali coba langsung ketagihan! Teksturnya sempurna, renyah di luar tapi dagingnya masih juicy. Highly recommended!"</p>
                </div>

                <div class="p-6 rounded-2xl bg-white border border-stone-100 shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-1 fade-in-on-scroll group" style="animation-delay: 0.2s;">
                    <div class="flex items-center gap-3 mb-4">
                        <div class="w-12 h-12 rounded-full bg-gradient-to-br from-purple-400 to-purple-600 flex items-center justify-center text-white font-bold text-lg">A</div>
                        <div>
                            <div class="font-bold text-stone-900">Ahmad Rizki</div>
                            <div class="text-xs text-stone-500">Food Blogger</div>
                        </div>
                    </div>
                    <div class="flex gap-1 mb-3 text-brand-500">
                        <span class="material-symbols-rounded text-sm">star</span>
                        <span class="material-symbols-rounded text-sm">star</span>
                        <span class="material-symbols-rounded text-sm">star</span>
                        <span class="material-symbols-rounded text-sm">star</span>
                        <span class="material-symbols-rounded text-sm">star</span>
                    </div>
                    <p class="text-stone-600 text-sm leading-relaxed italic">"Sebagai food blogger, saya sudah mencoba banyak ayam goreng. Tapi yang ini benar-benar istimewa! Bumbunya autentik dan rasanya konsisten."</p>
                </div>
            </div>
        </div>
    </section>

    {{-- Location & Maps Section --}}
    <section id="location" class="py-24 bg-white relative z-10 border-t border-stone-100 overflow-hidden">
        {{-- Background Decoration --}}
        <div class="absolute top-0 right-0 w-96 h-96 bg-brand-100/20 rounded-full blur-3xl -mr-48 -mt-48"></div>
        <div class="absolute bottom-0 left-0 w-80 h-80 bg-stone-100/30 rounded-full blur-3xl -ml-40 -mb-40"></div>
        
        <div class="max-w-7xl mx-auto px-6 lg:px-8 relative z-10">
            {{-- Header --}}
            <div class="text-center max-w-2xl mx-auto mb-16 fade-in-on-scroll">
                <span class="text-brand-600 font-bold tracking-wider uppercase text-xs mb-2 block animate-slide-down">Temukan Kami</span>
                <h2 class="text-3xl md:text-4xl font-extrabold text-stone-900 tracking-tight animate-slide-up">Lokasi & Alamat</h2>
                <p class="text-stone-500 mt-4 text-base leading-relaxed animate-slide-up" style="animation-delay: 0.1s;">
                    Kunjungi outlet kami dan nikmati kelezatan Ayam Goreng Ragil Jaya langsung di tempat
                </p>
            </div>

            <div class="grid lg:grid-cols-2 gap-8 lg:gap-12">
                {{-- Left: Map --}}
                <div class="fade-in-on-scroll order-2 lg:order-1">
                    <div class="relative rounded-[2rem] overflow-hidden shadow-2xl border border-stone-200 group hover:shadow-brand-500/20 transition-all duration-500 hover:-translate-y-1">
                        {{-- Map Container --}}
                        <div class="relative w-full h-[400px] sm:h-[450px] lg:h-[500px] bg-stone-100 overflow-hidden">
                            {{-- Google Maps Embed --}}
                            <iframe 
                                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3951.314233720989!2d109.0054719!3d-7.7212698!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e6512996f242297%3A0x1305b93d068f178a!2sAyam%20Goreng%20Ragil%20Jaya!5e0!3m2!1sen!2sid!4v1736500000000!5m2!1sen!2sid&hl=en"
                                width="100%" 
                                height="100%" 
                                style="border:0;" 
                                allowfullscreen="" 
                                loading="lazy" 
                                referrerpolicy="no-referrer-when-downgrade"
                                class="absolute inset-0 w-full h-full">
                            </iframe>
                            
                            {{-- Loading Overlay --}}
                            <div class="absolute inset-0 bg-stone-50 flex items-center justify-center z-10 map-loading">
                                <div class="text-center">
                                    <div class="w-12 h-12 border-4 border-brand-500 border-t-transparent rounded-full animate-spin mx-auto mb-3"></div>
                                    <p class="text-sm text-stone-500 font-medium">Memuat peta...</p>
                                </div>
                            </div>
                        </div>
                        
                        {{-- Map Controls Overlay --}}
                        <div class="absolute top-4 right-4 z-20 flex gap-2">
                            <a href="https://www.google.com/maps/place/Ayam+Goreng+Ragil+Jaya/@-7.7212698,109.0054719,17z/data=!3m1!4b1!4m6!3m5!1s0x2e6512996f242297:0x1305b93d068f178a!8m2!3d-7.7212698!4d109.0054719!16s%2Fg%2F11dz5kqzsg?entry=ttu" 
                               target="_blank"
                               class="px-4 py-2 bg-white/90 backdrop-blur-md rounded-full text-xs font-bold text-stone-700 hover:bg-white hover:text-brand-600 transition-all shadow-lg flex items-center gap-2 group">
                                <span class="material-symbols-rounded text-base">open_in_new</span>
                                Buka di Maps
                            </a>
                        </div>
                    </div>
                </div>

                {{-- Right: Contact Info --}}
                <div class="fade-in-on-scroll order-1 lg:order-2 flex flex-col justify-center">
                    <div class="space-y-6">
                        {{-- Main Address Card --}}
                        <div class="p-8 rounded-[2rem] bg-gradient-to-br from-brand-50 to-white border border-brand-100 shadow-lg hover:shadow-xl transition-all duration-300 group hover:-translate-y-1">
                            <div class="flex items-start gap-4 mb-6">
                                <div class="w-14 h-14 bg-gradient-to-br from-brand-500 to-brand-600 rounded-2xl flex items-center justify-center text-white shadow-lg group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                    <span class="material-symbols-rounded text-3xl">location_on</span>
                                </div>
                                <div class="flex-1">
                                    <h3 class="text-xl font-bold text-stone-900 mb-2 group-hover:text-brand-600 transition-colors">Alamat Utama</h3>
                                    <p class="text-stone-600 leading-relaxed text-sm">
                                        Jl. DI Panjaitan No.86a<br>
                                        Kandang Macan, Tegalreja<br>
                                        Kec. Cilacap Sel., Kabupaten Cilacap<br>
                                        Jawa Tengah 53213, Indonesia
                                    </p>
                                </div>
                            </div>
                        </div>

                        {{-- Contact Cards Grid --}}
                        <div class="grid sm:grid-cols-2 gap-4">
                            {{-- Phone --}}
                            <div class="p-6 rounded-2xl bg-white border border-stone-100 shadow-sm hover:shadow-lg transition-all duration-300 group hover:-translate-y-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-10 h-10 bg-emerald-50 rounded-xl flex items-center justify-center text-emerald-600 group-hover:bg-emerald-500 group-hover:text-white transition-all">
                                        <span class="material-symbols-rounded">call</span>
                                    </div>
                                    <div>
                                        <div class="text-[10px] font-bold text-stone-400 uppercase tracking-wider">Telepon</div>
                                        <div class="text-sm font-bold text-stone-900">0813 2861 9818</div>
                                    </div>
                                </div>
                                <a href="tel:+6281328619818" class="text-xs text-brand-600 hover:text-brand-700 font-semibold flex items-center gap-1 group-hover:gap-2 transition-all">
                                    Hubungi Sekarang
                                    <span class="material-symbols-rounded text-sm">arrow_forward</span>
                                </a>
                            </div>

                            {{-- Hours --}}
                            <div class="p-6 rounded-2xl bg-white border border-stone-100 shadow-sm hover:shadow-lg transition-all duration-300 group hover:-translate-y-1">
                                <div class="flex items-center gap-3 mb-3">
                                    <div class="w-10 h-10 bg-amber-50 rounded-xl flex items-center justify-center text-amber-600 group-hover:bg-amber-500 group-hover:text-white transition-all">
                                        <span class="material-symbols-rounded">schedule</span>
                                    </div>
                                    <div>
                                        <div class="text-[10px] font-bold text-stone-400 uppercase tracking-wider">Jam Buka</div>
                                        <div class="text-sm font-bold text-stone-900">09:00 - 21:00</div>
                                    </div>
                                </div>
                                <p class="text-xs text-stone-500">Setiap Hari</p>
                            </div>
                        </div>

                        {{-- Additional Info --}}
                        <div class="p-6 rounded-2xl bg-gradient-to-br from-stone-50 to-white border border-stone-100">
                            <div class="flex items-start gap-3">
                                <span class="material-symbols-rounded text-brand-600 text-2xl">info</span>
                                <div>
                                    <h4 class="font-bold text-stone-900 mb-2 text-sm">Informasi Tambahan</h4>
                                    <ul class="space-y-2 text-xs text-stone-600">
                                        <li class="flex items-center gap-2">
                                            <span class="material-symbols-rounded text-base text-brand-500">check_circle</span>
                                            Tersedia parkir luas
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <span class="material-symbols-rounded text-base text-brand-500">check_circle</span>
                                            Area makan nyaman
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <span class="material-symbols-rounded text-base text-brand-500">check_circle</span>
                                            Tersedia layanan take away
                                        </li>
                                        <li class="flex items-center gap-2">
                                            <span class="material-symbols-rounded text-base text-brand-500">check_circle</span>
                                            Pemesanan via WhatsApp
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        {{-- CTA Button --}}
                        <a href="https://wa.me/6281328619818?text=Halo,%20saya%20ingin%20memesan%20Ayam%20Goreng%20Ragil%20Jaya" 
                           target="_blank"
                           class="group w-full px-6 py-4 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white font-bold rounded-2xl hover:from-emerald-600 hover:to-emerald-700 transition-all transform hover:-translate-y-1 hover:shadow-xl flex items-center justify-center gap-2">
                            <span class="material-symbols-rounded">chat</span>
                            Pesan via WhatsApp
                            <span class="material-symbols-rounded group-hover:translate-x-1 transition-transform">arrow_forward</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Dark CTA Section (Enhanced) --}}
    <section class="py-24 bg-stone-900 relative overflow-hidden">
        {{-- Background Elements --}}
        <div class="absolute inset-0 bg-gradient-to-br from-stone-900 via-stone-900 to-stone-800"></div>
        <div class="absolute inset-0 bg-brand-900/10 mix-blend-overlay"></div>
        <div class="absolute top-0 right-0 -mt-20 -mr-20 w-96 h-96 bg-brand-500/10 rounded-full blur-3xl animate-pulse-slow"></div>
        <div class="absolute bottom-0 left-0 -mb-20 -ml-20 w-80 h-80 bg-leaf-500/10 rounded-full blur-3xl animate-pulse-slow" style="animation-delay: 1s;"></div>
        
        {{-- Animated Grid --}}
        <div class="absolute inset-0 opacity-5 bg-[linear-gradient(to_right,#ffffff_1px,transparent_1px),linear-gradient(to_bottom,#ffffff_1px,transparent_1px)] bg-[size:50px_50px]"></div>

        <div class="relative z-10 max-w-7xl mx-auto px-6 lg:px-8 text-center fade-in-on-scroll">
            <div class="inline-block mb-6">
                <span class="text-brand-400 font-bold tracking-wider uppercase text-xs mb-2 block animate-slide-down">Bergabung Sekarang</span>
            </div>
            <h2 class="text-4xl md:text-5xl font-extrabold text-white mb-6 tracking-tight animate-slide-up">
                Siap Nikmati <span class="text-transparent bg-clip-text bg-gradient-to-r from-brand-400 to-brand-600">Kelezatannya?</span>
            </h2>
            <p class="text-lg text-stone-300 mb-10 max-w-2xl mx-auto font-light animate-slide-up" style="animation-delay: 0.1s;">
                Bergabunglah dengan ribuan pelanggan yang telah menikmati kelezatan Ayam Goreng Ragil Jaya.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center animate-slide-up" style="animation-delay: 0.2s;">
                <a href="{{ route('login') }}" class="group relative px-8 py-4 bg-white text-stone-900 font-bold rounded-full hover:bg-brand-50 transition-all transform hover:-translate-y-1 hover:scale-105 active:scale-95 shadow-lg shadow-white/10 overflow-hidden">
                    <span class="absolute inset-0 bg-gradient-to-r from-brand-500 to-brand-600 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></span>
                    <span class="relative z-10 flex items-center justify-center gap-2">
                        <span class="material-symbols-rounded">shopping_cart</span>
                        Pesan Sekarang
                    </span>
                </a>
                <a href="#features" class="px-8 py-4 bg-stone-800 text-white font-bold rounded-full hover:bg-stone-700 transition-all transform hover:-translate-y-1 border border-stone-700">
                    Pelajari Lebih Lanjut
                </a>
            </div>
        </div>
    </section>

    {{-- Footer --}}
    <footer class="bg-stone-50 border-t border-stone-200 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col items-center justify-center text-center">
                <div class="flex items-center gap-2 mb-6 opacity-60 grayscale hover:grayscale-0 transition-all duration-500">
                     <img src="{{ asset('assets/images/logo-ragil-jaya.png') }}" alt="Logo" class="h-8 w-8 object-contain">
                     <span class="font-bold text-stone-700 text-lg">Ayam Goreng Ragil Jaya</span>
                </div>

                <div class="flex gap-6 mb-8 text-sm font-medium text-stone-500">
                    <a href="#features" class="hover:text-brand-600 transition-colors">Tentang</a>
                    <a href="#features" class="hover:text-brand-600 transition-colors">Menu</a>
                    <a href="#location" class="hover:text-brand-600 transition-colors">Lokasi</a>
                    <a href="#location" class="hover:text-brand-600 transition-colors">Kontak</a>
                </div>

                <div class="w-full h-px bg-stone-200 mb-8 max-w-xs"></div>

                <p class="text-stone-400 text-xs">
                    © {{ date('Y') }} <span class="font-bold text-stone-600">Ayam Goreng Ragil Jaya</span>. <br class="sm:hidden"> All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    {{-- JavaScript for Animations --}}
    <script>
        // Intersection Observer for scroll animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('visible');
                }
            });
        }, observerOptions);

        // Observe all fade-in-on-scroll elements
        document.querySelectorAll('.fade-in-on-scroll').forEach(el => {
            observer.observe(el);
        });

        // Counter animation for stats
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
                element.textContent = Math.floor(current).toLocaleString('id-ID');
            }, 16);
        }

        // Animate counters when they come into view
        const counterObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                    entry.target.classList.add('counted');
                    const target = parseInt(entry.target.getAttribute('data-target'));
                    animateCounter(entry.target, target);
                }
            });
        }, { threshold: 0.5 });

        document.querySelectorAll('.counter-stat').forEach(counter => {
            counterObserver.observe(counter);
        });

        // Particle system
        function createParticles() {
            const container = document.querySelector('.particles-container');
            if (!container) return;
            
            const particleCount = 30;
            
            for (let i = 0; i < particleCount; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                
                const size = Math.random() * 4 + 2;
                const x = Math.random() * 100;
                const y = Math.random() * 100;
                const duration = Math.random() * 20 + 10;
                const delay = Math.random() * 5;
                
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.left = x + '%';
                particle.style.top = y + '%';
                particle.style.background = `rgba(${Math.random() > 0.5 ? '249, 115, 22' : '168, 162, 158'}, ${Math.random() * 0.3 + 0.1})`;
                particle.style.animation = `float ${duration}s ease-in-out infinite`;
                particle.style.animationDelay = delay + 's';
                
                container.appendChild(particle);
            }
        }

        // Smooth scroll for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });

        // Navbar scroll effect
        let lastScroll = 0;
        const navbar = document.getElementById('navbar');
        
        window.addEventListener('scroll', () => {
            const currentScroll = window.pageYOffset;
            
            if (currentScroll > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
            
            lastScroll = currentScroll;
        });

        // Initialize on load
        document.addEventListener('DOMContentLoaded', () => {
            createParticles();
            
            // Add initial animation classes
            document.querySelectorAll('.fade-in-on-scroll').forEach((el, index) => {
                el.style.transitionDelay = `${index * 0.1}s`;
            });
        });

        // Parallax effect for hero image
        window.addEventListener('scroll', () => {
            const scrolled = window.pageYOffset;
            const heroImage = document.querySelector('.hero-image');
            if (heroImage) {
                heroImage.style.transform = `translateY(${scrolled * 0.3}px)`;
            }
        });

        // Hide map loading overlay when map is loaded
        window.addEventListener('load', () => {
            const mapLoading = document.querySelector('.map-loading');
            if (mapLoading) {
                setTimeout(() => {
                    mapLoading.style.opacity = '0';
                    mapLoading.style.transition = 'opacity 0.5s ease-out';
                    setTimeout(() => {
                        mapLoading.style.display = 'none';
                    }, 500);
                }, 1000);
            }
        });

        // Smooth scroll for location anchor
        document.querySelectorAll('a[href="#location"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector('#location');
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
    </script>
</body>
</html>
