<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LombaPIKR.id</title>
    <link rel="shortcut icon" href="assets/img/logo_1.png" type="image/png">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Alpine.js -->
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">

    <!-- AOS (Animate On Scroll) -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .hero-gradient {
            background: linear-gradient(135deg, #0a1733 0%, #1e3a8a 50%, #1b2a4d 100%);
        }

        .animate-glow {
            animation: glow 2s ease-in-out infinite alternate;
        }

        @keyframes glow {
            from {
                box-shadow: 0 0 20px #3b82f6, 0 0 30px #3b82f6;
            }

            to {
                box-shadow: 0 0 30px #60a5fa, 0 0 40px #60a5fa, 0 0 50px #60a5fa;
            }
        }

        .wave-animation {
            animation: wave 20s linear infinite;
        }

        @keyframes wave {
            0% {
                transform: translateX(0) translateZ(0) scaleY(1);
            }

            50% {
                transform: translateX(-25%) translateZ(0) scaleY(0.95);
            }

            100% {
                transform: translateX(-50%) translateZ(0) scaleY(1);
            }
        }

        .float-animation {
            animation: float 6s ease-in-out infinite;
        }

        @keyframes float {

            0%,
            100% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-20px);
            }
        }

        .card-hover {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .card-hover:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .gradient-text {
            background: linear-gradient(135deg, #3b82f6 0%, #60a5fa 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }

        .stat-card {
            background: linear-gradient(135deg, #3b82f6 0%, #2563eb 100%);
            position: relative;
            overflow: hidden;
        }

        .stat-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 200%;
            height: 200%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1) 0%, transparent 70%);
            animation: pulse 4s ease-in-out infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                transform: scale(1);
                opacity: 1;
            }

            50% {
                transform: scale(1.1);
                opacity: 0.8;
            }
        }

        .countdown-box {
            background: linear-gradient(145deg, #ffffff 0%, #f0f9ff 100%);
            box-shadow: 0 10px 30px rgba(59, 130, 246, 0.2);
        }

        .navbar-glass {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
        }

        .step-card {
            background: linear-gradient(135deg, #2563eb 0%, #1e40af 100%);
            position: relative;
            overflow: hidden;
        }

        .step-card::after {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.15) 0%, transparent 60%);
        }

        .category-badge {
            background: linear-gradient(135deg, #fbbf24 0%, #f59e0b 100%);
            animation: badge-pulse 2s ease-in-out infinite;
        }

        @keyframes badge-pulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        @keyframes waveMove {
            0% {
                transform: translateX(0);
            }

            100% {
                transform: translateX(-20px);
            }
        }

        .wave-animation path {
            animation: waveMove 10s linear infinite;
        }


        /* 2. Animasi "Glow" untuk Tombol */
        @keyframes glow {

            0%,
            100% {
                box-shadow: 0 0 10px rgba(255, 255, 255, 0.4),
                    0 0 20px rgba(255, 255, 255, 0.3);
            }

            50% {
                box-shadow: 0 0 20px rgba(255, 255, 255, 0.7),
                    0 0 40px rgba(255, 255, 255, 0.5);
            }
        }

        .animate-glow {
            animation: glow 3s infinite ease-in-out;
        }

        /* 3. Animasi "Float" untuk Logo */
        @keyframes float {

            0%,
            100% {
                transform: translateY(0);
            }

            50% {
                transform: translateY(-15px);
            }
        }

        .float-animation {
            animation: float 6s infinite ease-in-out;
        }

        /* 4. Animasi "Blob" (BARU, pengganti pulse) */
        @keyframes blob {

            0%,
            100% {
                transform: translate(0, 0) scale(1);
            }

            25% {
                transform: translate(30px, -50px) scale(1.1);
            }

            50% {
                transform: translate(0, 20px) scale(0.9);
            }

            75% {
                transform: translate(-40px, 30px) scale(1.05);
            }
        }

        .animate-blob {
            animation: blob 15s infinite ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fadeIn {
            animation: fadeIn 0.4s ease-in-out;
        }

        /* Custom scrollbar */
        .custom-scrollbar::-webkit-scrollbar {
            width: 8px;
            /* lebar scrollbar */
        }

        .custom-scrollbar::-webkit-scrollbar-track {
            background: linear-gradient(to bottom, #bfdbfe, #3b82f6);
            /* gradasi biru atas-bawah */
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb {
            background: #1d4ed8;
            /* warna thumb */
            border-radius: 10px;
        }

        .custom-scrollbar::-webkit-scrollbar-thumb:hover {
            background: #2563eb;
            /* hover thumb lebih terang */
        }

        html {
            scroll-behavior: smooth;
        }

        /* Scrollbar kustom */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #f1f1f1;
        }

        ::-webkit-scrollbar-thumb {
            background: #144eb9;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #a8a8a8;
        }

        [x-cloak] {
            display: none !important;
        }
    </style>
</head>

<body class="bg-gray-50" x-data="{ loading: true }" x-init="setTimeout(() => loading = false, 1800)">

    <!-- Preloader -->
    <div x-data="{ loading: true }" x-init="window.addEventListener('load', () => { 
         setTimeout(() => loading = false, 1000) 
     })">
        <div x-show="loading" x-transition.opacity.duration.700ms
            class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-gradient-to-b from-blue-100 via-white to-blue-50">

            <!-- Spiral Loader -->
            <div class="relative flex items-center justify-center">
                <div class="absolute w-20 h-20 rounded-full border-4 border-t-transparent border-blue-600 animate-spin">
                </div>
                <div
                    class="absolute w-16 h-16 rounded-full border-4 border-t-transparent border-blue-400 animate-[spin_2s_linear_infinite_reverse]">
                </div>
                <div
                    class="absolute w-12 h-12 rounded-full border-4 border-t-transparent border-blue-300 animate-[spin_3s_linear_infinite]">
                </div>
            </div>

            <!-- Loading Text -->
            <p class="mt-10 text-blue-700 font-semibold text-lg tracking-wide animate-pulse">
                Memuat LombaPIKR.id...
            </p>
        </div>
    </div>



    <!-- Navbar -->
    <nav class="fixed top-0 left-0 right-0 z-50 navbar-glass shadow-lg" x-data="{
        open: false,
        active: 'beranda',
        sections: ['beranda','kategori','tahapan'], // scrollable sections
        init() {
            window.addEventListener('scroll', () => {
                let scrollPos = window.scrollY + 100;
                for (let id of this.sections) {
                    let el = document.getElementById(id);
                    if (el) {
                        if (scrollPos >= el.offsetTop && scrollPos < el.offsetTop + el.offsetHeight) {
                            this.active = id;
                        }
                    }
                }
            });
        }
     }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex flex-wrap items-center justify-center gap-2 md:gap-3 max-w-full">
                    <img src="{{ asset('assets/img/sma.png') }}"
                        class="h-10 md:h-12 w-auto max-w-[60px] md:max-w-[80px]" alt="SMA Logo">

                    <img src="{{ asset('assets/img/logo_1.png') }}"
                        class="h-8 md:h-10 w-auto max-w-[55px] md:max-w-[70px]" alt="PIK-R Logo">

                    <img src="{{ asset('assets/img/logo_utama.png') }}"
                        class="h-10 md:h-12 w-auto max-w-[60px] md:max-w-[80px]" alt="Logo Utama">
                </div>


                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-6">
                    <!-- Beranda -->
                    <a href="#beranda"
                        @click.prevent="active = 'beranda'; document.querySelector('#beranda').scrollIntoView({behavior:'smooth'})"
                        class="relative flex items-center gap-2 text-gray-700 hover:text-blue-600 font-medium transition duration-300 text-base">
                        <i class="fas fa-home text-base"></i> Beranda
                        <span
                            class="absolute -bottom-1 left-0 h-0.5 rounded-full transition-all duration-500 ease-in-out"
                            :class="active === 'beranda' ? 'w-full bg-blue-600 opacity-100' : 'w-0 bg-blue-400 opacity-0'"></span>
                    </a>

                    <!-- Kategori -->
                    <a href="#kategori"
                        @click.prevent="active = 'kategori'; document.querySelector('#kategori').scrollIntoView({behavior:'smooth'})"
                        class="relative flex items-center gap-2 text-gray-700 hover:text-blue-600 font-medium transition duration-300 text-base">
                        <i class="fas fa-trophy text-base"></i> Kategori
                        <span
                            class="absolute -bottom-1 left-0 h-0.5 rounded-full transition-all duration-500 ease-in-out"
                            :class="active === 'kategori' ? 'w-full bg-blue-600 opacity-100' : 'w-0 bg-blue-400 opacity-0'"></span>
                    </a>

                    <!-- Statistik (halaman lain) -->
                    <a href="{{ route('public.statistik') }}"
                        class="flex items-center gap-2 font-medium transition duration-300 text-base
                        {{-- Ini akan membuat link berwarna biru jika sedang di halaman statistik --}}
                        {{ request()->routeIs('public.statistik') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }}">
                        <i class="fas fa-chart-bar text-base"></i>
                        Statistik
                    </a>
                    <!-- Tahapan -->
                    <a href="#tahapan"
                        @click.prevent="active = 'tahapan'; document.querySelector('#tahapan').scrollIntoView({behavior:'smooth'})"
                        class="relative flex items-center gap-2 text-gray-700 hover:text-blue-600 font-medium transition duration-300 text-base">
                        <i class="fas fa-list-ol text-base"></i> Tahapan
                        <span
                            class="absolute -bottom-1 left-0 h-0.5 rounded-full transition-all duration-500 ease-in-out"
                            :class="active === 'tahapan' ? 'w-full bg-blue-600 opacity-100' : 'w-0 bg-blue-400 opacity-0'"></span>
                    </a>
                    <!-- Login -->
                    <a href="{{ route('admin.login') }}"
                        class="flex items-center gap-4 bg-blue-600 text-white px-5 py-2.5 rounded-full font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 text-base">
                        <i class="fas fa-arrow-right-to-bracket text-base"></i> MASUK
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <button @click="open = !open" class="md:hidden text-gray-700 focus:outline-none mr-4">
                    <i :class="open ? 'fas fa-times text-2xl' : 'fas fa-bars text-2xl'"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-ref="menu" x-cloak x-bind:style="open ? 'height: ' + $refs.menu.scrollHeight + 'px' : 'height: 0'"
            class="md:hidden overflow-hidden transition-all duration-500 ease-in-out bg-white border-t border-gray-100">

            <div class="px-4 py-4 space-y-3">
                <!-- Beranda -->
                <a href="#beranda"
                    @click="open = false; active = 'beranda'; document.querySelector('#beranda').scrollIntoView({behavior:'smooth'})"
                    class="relative flex items-center gap-2 px-4 py-3 rounded-lg hover:bg-blue-50 text-gray-700 font-medium transition"
                    :class="active === 'beranda' ? 'border-l-4 border-blue-600 pl-3' : ''">
                    <i class="fas fa-home"></i> Beranda
                </a>

                <!-- Kategori -->
                <a href="#kategori"
                    @click="open = false; active = 'kategori'; document.querySelector('#kategori').scrollIntoView({behavior:'smooth'})"
                    class="relative flex items-center gap-2 px-4 py-3 rounded-lg hover:bg-blue-50 text-gray-700 font-medium transition"
                    :class="active === 'kategori' ? 'border-l-4 border-blue-600 pl-3' : ''">
                    <i class="fas fa-trophy"></i> Kategori
                </a>

                <!-- Statistik -->
                <a href="/statistik" @click="open = false"
                    class="flex items-center gap-2 px-4 py-3 rounded-lg hover:bg-blue-50 text-gray-700 font-medium transition">
                    <i class="fas fa-chart-bar"></i> Statistik
                </a>

                <!-- Tahapan -->
                <a href="#tahapan"
                    @click="open = false; active = 'tahapan'; document.querySelector('#tahapan').scrollIntoView({behavior:'smooth'})"
                    class="relative flex items-center gap-2 px-4 py-3 rounded-lg hover:bg-blue-50 text-gray-700 font-medium transition"
                    :class="active === 'tahapan' ? 'border-l-4 border-blue-600 pl-3' : ''">
                    <i class="fas fa-list-ol"></i> Tahapan
                </a>

                <!-- Login -->
                <a href="{{ route('admin.login') }}" @click="open = false"
                    class="flex items-center gap-2 justify-center text-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-3 py-5 rounded-lg font-semibold shadow-lg hover:scale-105 transition-transform duration-200">
                    <i class="fas fa-arrow-right-to-bracket"></i> MASUK
                </a>
            </div>
        </div>
    </nav>


    <!-- Hero Section -->
    <section id="beranda" class="relative hero-gradient text-white pt-32 pb-40 md:pb-60 overflow-hidden">
        <div class="absolute inset-0 overflow-hidden">
            <div class="animate-blob absolute top-20 left-10 w-72 h-72 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30"
                style="animation-delay: 0s"></div>
            <div class="animate-blob absolute top-40 right-10 w-96 h-96 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30"
                style="animation-delay: 2s"></div>
            <div class="animate-blob absolute bottom-20 left-1/2 w-80 h-80 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30"
                style="animation-delay: 4s"></div>
        </div>

        <div class="relative max-w-6xl mx-auto px-6 sm:px-8 lg:px-8 text-center" data-aos="fade-up">
            <h2 class="text-lg md:text-4xl font-semibold mb-4 tracking-wide text-blue-200">
                Selamat Datang di
            </h2>

            <div class="flex justify-center mb-6">
                <img src="{{ asset('assets/img/logo_utama.png') }}" alt="Logo LOMBAPIKR"
                    class="h-28 md:h-40 object-contain drop-shadow-2xl" />
            </div>

            <h1 class="text-3xl md:text-5xl font-extrabold mb-6 tracking-tight">
                Tunjukkan Bakatmu, Raih Prestasimu!
            </h1>

            <p class="text-base md:text-lg text-blue-100 max-w-3xl mx-auto mb-12 leading-relaxed">
                Lomba Pusat Informasi dan Konseling Remaja (LOMBAPIKR.id) merupakan
                platform perlombaan PIK-R tingkat
                <span class="font-bold block mt-1">REMAJA KABUPATEN KEPULAUAN MERANTI</span>
            </p>

            <div class="flex justify-center gap-3 md:gap-6 mb-12 flex-wrap" id="countdown" data-aos="fade-up"
                data-aos-delay="100">
                <div
                    class="bg-white/10 backdrop-blur-sm p-4 rounded-lg w-20 md:w-28 text-center border border-white/20">
                    <span class="text-3xl md:text-5xl font-bold" id="cd-days">00</span>
                    <span class="block text-xs md:text-sm text-blue-200">Hari</span>
                </div>
                <div
                    class="bg-white/10 backdrop-blur-sm p-4 rounded-lg w-20 md:w-28 text-center border border-white/20">
                    <span class="text-3xl md:text-5xl font-bold" id="cd-hours">00</span>
                    <span class="block text-xs md:text-sm text-blue-200">Jam</span>
                </div>
                <div
                    class="bg-white/10 backdrop-blur-sm p-4 rounded-lg w-20 md:w-28 text-center border border-white/20">
                    <span class="text-3xl md:text-5xl font-bold" id="cd-minutes">00</span>
                    <span class="block text-xs md:text-sm text-blue-200">Menit</span>
                </div>
                <div
                    class="bg-white/10 backdrop-blur-sm p-4 rounded-lg w-20 md:w-28 text-center border border-white/20">
                    <span class="text-3xl md:text-5xl font-bold" id="cd-seconds">00</span>
                    <span class="block text-xs md:text-sm text-blue-200">Detik</span>
                </div>
            </div>

            <a href="{{ route('pendaftaran.create') }}" id="btn-daftar"
                class="inline-block bg-white text-blue-700 font-bold text-base md:text-lg px-10 py-4 rounded-full shadow-2xl hover:shadow-3xl transform hover:scale-105 transition duration-300 animate-glow"
                data-aos="fade-up" data-aos-delay="200">
                <i class="fas fa-file-signature mr-2"></i> Daftar Sekarang
            </a>
        </div>

        <div class="absolute bottom-0 left-0 w-full pointer-events-none" style="transform: translateY(1px)">
            <svg class="w-full h-auto" viewBox="0 0 1440 220" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M0,160 C360,200 1080,120 1440,160 L1440,220 L0,220 Z" fill="#f8fafc"></path>
                <path d="M0,180 C360,140 1080,240 1440,180 L1440,220 L0,220 Z" fill="#818cf8" fill-opacity="0.3"></path>
                <path d="M0,200 C360,180 1080,140 1440,200 L1440,220 L0,220 Z" fill="#a5b4fc" fill-opacity="0.2"></path>
            </svg>
        </div>
    </section>


    <section id="panduan" class="py-20 px-4 bg-slate-100">
        <div class="max-w-7xl mx-auto">

            <!-- Judul Section -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-3xl font-bold text-slate-900 mb-3">
                    Download Asset
                </h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-blue-400 to-blue-600 mx-auto mb-4 rounded-full"></div>
                <p class="text-slate-600 text-base md:text-lg max-w-2xl mx-auto">
                    Unduh berbagai panduan dan asset lomba yang tersedia untuk membantu
                    kamu dalam mengikuti LOMBAPIKR.id!
                </p>
            </div>

            <!-- Grid untuk item panduan -->
            <div class="grid md:grid-cols-2 gap-10 max-w-4xl mx-auto mb-12">

                <!-- Item 1: Panduan Pendaftaran -->
                <a href="https://drive.google.com/drive/folders/1EbrskkytYwxKnsuqWcO3tc8oPI6FTyQk?usp=sharing"
                    target="_blank" data-aos="fade-up" data-aos-delay="100"
                    class="group relative block bg-white rounded-2xl shadow-xl border border-gray-200 p-8 text-center transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 overflow-hidden">


                    <!-- Gelembung dekoratif -->
                    <div class="absolute -top-4 -left-4 w-24 h-24 bg-blue-100 rounded-full opacity-30 animate-pulse">
                    </div>
                    <div class="absolute bottom-0 right-0 w-32 h-32 bg-blue-50 rounded-full opacity-20"></div>

                    <!-- Ikon / ilustrasi -->
                    <img src="{{ asset('assets/img/undraw_asset-selection_jrie.svg') }}" alt="Panduan Pendaftaran"
                        class="h-32 w-32 mx-auto mb-6 transition-transform duration-300 group-hover:scale-110">

                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                        Panduan Pendaftaran Lomba
                    </h3>
                    <div class="flex justify-center items-center gap-2 text-blue-600">
                        <i class="fas fa-download"></i>
                        <span>Unduh Panduan</span>
                    </div>
                </a>

                <!-- Item 2: Panduan Persyaratan -->
                <a href="https://drive.google.com/drive/folders/1EbrskkytYwxKnsuqWcO3tc8oPI6FTyQk?usp=sharing"
                    target="_blank" data-aos="fade-up" data-aos-delay="200"
                    class="group relative block bg-white rounded-2xl shadow-xl border border-gray-200 p-8 text-center transition-all duration-300 hover:shadow-2xl hover:-translate-y-1 overflow-hidden">
                    <!-- Gelembung dekoratif -->
                    <div class="absolute -top-4 -right-4 w-24 h-24 bg-pink-100 rounded-full opacity-30 animate-pulse">
                    </div>
                    <div class="absolute bottom-0 left-0 w-32 h-32 bg-pink-50 rounded-full opacity-20"></div>

                    <img src="{{ asset('assets/img/undraw_upload_cucu.svg') }}" alt="Asset Panduan"
                        class="h-32 w-32 mx-auto mb-6 transition-transform duration-300 group-hover:scale-110">

                    <h3 class="text-xl font-semibold text-gray-800 mb-2">
                        Logo & Asset Lomba
                    </h3>
                    <div class="flex justify-center items-center gap-2 text-blue-600">
                        <i class="fas fa-download"></i>
                        <span>Unduh Asset</span>
                    </div>
                </a>

            </div>

        </div>
    </section>


    <!-- Tema Section -->
    <!-- SECTION TEMA PIK-R SMA NEGERI 1 TASIK PUTRI PUYU -->
    <section id="tema" class="py-16 px-4 flex justify-center bg-slate-50" data-aos="fade-up">
        <div
            class="max-w-5xl w-full bg-gradient-to-b from-blue-700 to-blue-800 rounded-2xl shadow-xl p-10 text-center text-white">

            <!-- Label Tema -->
            <span
                class="bg-blue-600/70 text-blue-100 text-xs font-semibold px-4 py-1 rounded-full uppercase tracking-wider">
                Tema LOMBAPIKR.id
            </span>

            <!-- Teks Tema -->
            <h2 class="text-3xl md:text-4xl font-bold mt-6 leading-snug">
                "Generasi Berencana, Cerdas, Kreatif, dan Berkarakter Menuju
                <span class="text-orange-400">Indonesia Emas</span>"
            </h2>

            <!-- Titik Dekoratif -->
            <div class="flex justify-center mt-6 space-x-1">
                <div class="w-2 h-2 bg-orange-400 rounded-full"></div>
                <div class="w-2 h-2 bg-orange-300 rounded-full"></div>
                <div class="w-2 h-2 bg-orange-400 rounded-full"></div>
            </div>

            <!-- Nama Sekolah -->
            <p class="text-sm mt-6 text-blue-100 font-medium tracking-wide">
                SMA Negeri 1 Tasik Putri Puyu
            </p>
        </div>
    </section>


    <!-- Statistik Section -->
    <section id="kategori" class="py-20 px-4 bg-slate-50" data-aos="fade-up">
        <div class="max-w-7xl mx-auto">

            <!-- Header -->
            <div class="text-center mb-16">
                <h2 class="text-3xl md:text-3xl font-bold text-slate-900 mb-3">
                    kategori Lomba
                </h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-blue-400 to-blue-600 mx-auto mb-4 rounded-full"></div>
                <p class="text-slate-600 text-base md:text-lg max-w-2xl mx-auto">
                    Berbagai kategori lomba yang dapat kamu ikuti pada LOMBAPIKR.Id. Pilih bidang yang sesuai dengan
                    minat dan keahlianmu!
                </p>
            </div>

            <!-- Grid Lomba -->
            <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 md:gap-8">
                @forelse($lombas as $lomba)
                    @php
                        $jumlahPeserta = $lomba->pendaftaran_count ?? $lomba->pendaftaran->count();
                    @endphp

                    <div
                        class="bg-white rounded-2xl shadow-md border border-gray-100 p-8 flex flex-col justify-between text-center transition-all duration-300 hover:shadow-xl hover:-translate-y-1">

                        <div>
                            <h3 class="text-xl font-semibold text-gray-800 mb-3">
                                {{ $lomba->nama_lomba }}
                            </h3>
                            <p class="text-sm text-gray-500 mb-6 line-clamp-3">
                                {{ $lomba->deskripsi ?? 'Tidak ada deskripsi.' }}
                            </p>
                        </div>

                        <div class="mt-2">
                            @if ($lomba->status == 'dibuka')
                                <!-- Baris tanggal kiri-kanan -->

                                <!-- Badge status -->
                                <span
                                    class="inline-block bg-green-100 text-green-700 text-xs font-semibold px-3 py-1 rounded-full">
                                    Pendaftaran Dibuka
                                </span>
                            @else
                                <span class="inline-block bg-red-100 text-red-700 text-xs font-semibold px-3 py-1 rounded-full">
                                    Deadline Berakhir
                                </span>
                            @endif
                        </div>
                    </div>
                @empty
                    <div
                        class="col-span-full flex flex-col items-center justify-center p-10 bg-white rounded-2xl shadow-md border border-gray-100">
                        <!-- Gambar placeholder -->
                        <img src="{{ asset('assets/img/no_data.svg') }}" alt="Belum ada lomba" class="w-40 mb-4 opacity-80">
                        <!-- Judul -->
                        <h3 class="text-lg font-semibold text-gray-700 mb-2">Belum ada lomba tersedia</h3>
                        <!-- Keterangan -->
                        <p class="text-sm text-gray-500 max-w-xs text-center">
                            Saat ini belum ada lomba yang tersedia. Silakan kembali nanti atau periksa kategori lain.
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- Catatan -->
            <div class="bg-sky-50 border-l-4 border-sky-500 p-4 rounded-lg mt-16 max-w-3xl text-left" data-aos="fade-up"
                data-aos-delay="400">
                <div class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-sky-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor"
                        viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                    </svg>
                    <p class="text-sm text-sky-800 leading-relaxed">
                        Jumlah lomba yang tersedia berdasarkan lomba yang telah ditentukan.
                    </p>
                </div>
            </div>
        </div>
    </section>


    <!-- Tahapan Section -->
    <section id="tahapan" class="py-20 px-4 bg-slate-50 overflow-hidden">
        <div class="max-w-5xl mx-auto">
            <!-- Judul -->
            <div class="text-center mb-10" data-aos="fade-up">
                <h2 class="text-3xl md:text-3xl font-bold text-slate-900 mb-3">
                    Tahapan Pendaftaran
                </h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-blue-400 to-blue-600 mx-auto mb-4 rounded-full"></div>
                <p class="text-slate-600 text-base md:text-lg mb-8">
                    Ikuti langkah-langkah pendaftaran lomba PIK-R SMA Negeri 1 Tasik Putri Puyu
                </p>
            </div>

            <!-- Timeline -->
            <div id="timeline" class="relative mt-16">
                @php
                    use Carbon\Carbon;
                    $today = Carbon::now('Asia/Jakarta')->startOfDay();
                    $icons = [
                        1 => 'fa-user-edit',
                        2 => 'fa-list-check',
                        3 => 'fa-paper-plane',
                        4 => 'fa-bullhorn',
                        5 => 'fa-school',
                    ];
                @endphp

                <!-- Garis Tengah -->
                <div
                    class="absolute left-1/2 transform -translate-x-1/2 h-full w-[4px] bg-slate-300 rounded-full overflow-hidden">
                    <!-- Layer progress -->
                    <div id="progress-line"
                        class="absolute top-0 left-0 w-full h-0 transition-all duration-700 ease-out"></div>
                </div>

                @foreach($tahapan as $index => $item)
                    @php
                        $isEven = $index % 2 == 0;
                        $ikon = $icons[$item->urutan] ?? 'fa-circle-check';

                        $mulai = Carbon::parse($item->tanggal_mulai)->startOfDay();
                        $selesai = $item->tanggal_selesai
                            ? Carbon::parse($item->tanggal_selesai)->endOfDay()
                            : $mulai->endOfDay();

                        if ($today->between($mulai, $selesai)) {
                            $status = 'berlangsung';
                        } elseif ($today->lt($mulai)) {
                            $status = 'akan';
                        } else {
                            $status = 'selesai';
                        }

                        $warnaIcon = match ($status) {
                            'berlangsung' => 'bg-blue-500 ring-blue-200',
                            'akan' => 'bg-slate-300 ring-slate-100',
                            'selesai' => 'bg-green-500 ring-green-200',
                        };

                        $warnaBadge = match ($status) {
                            'berlangsung' => 'bg-blue-100 text-blue-700',
                            'akan' => 'bg-slate-100 text-slate-600',
                            'selesai' => 'bg-green-100 text-green-700',
                        };
                    @endphp

                    <!-- Hitung tinggi progres sampai ikon ini -->
                    <div class="relative mb-12 flex flex-col {{ $isEven ? 'md:flex-row' : 'md:flex-row-reverse' }} justify-between items-center w-full"
                        data-tahap="{{ $status }}">
                        <div class="hidden md:block md:w-5/12"></div>

                        <!-- Ikon Tengah -->
                        <div class="z-20 flex items-center {{ $warnaIcon }} shadow-xl w-12 h-12 rounded-full justify-center ring-8 mx-auto md:mx-0 transition-all duration-500 relative"
                            data-aos="zoom-in">
                            <i class="fas {{ $ikon }} text-white text-lg"></i>
                        </div>

                        <!-- Card -->
                        <div class="relative overflow-hidden bg-white rounded-xl shadow-lg border border-slate-200 w-full md:w-5/12 p-6 mt-6 md:mt-0 
                                                                                transition-all duration-300 ease-in-out hover:shadow-2xl hover:scale-[1.02]"
                            data-aos="{{ $isEven ? 'fade-left' : 'fade-right' }}">

                            <!-- Badge tanggal -->
                            <div class="inline-block {{ $warnaBadge }} text-sm font-semibold px-3 py-1 rounded-full mb-3">
                                {{ $mulai->translatedFormat('d F Y') }}
                                @if($item->tanggal_selesai)
                                    - {{ $selesai->translatedFormat('d F Y') }}
                                @endif
                            </div>

                            <!-- Judul Tahap -->
                            <h3 class="font-bold text-lg text-gray-800 mb-1">
                                {{ $item->judul_tahap }}
                            </h3>

                            <!-- Deskripsi Tahap -->
                            <p class="text-slate-700 text-sm leading-relaxed">
                                {{ $item->deskripsi }}
                            </p>

                            <!-- Status -->
                            @if($status === 'berlangsung')
                                <span class="mt-3 inline-block text-blue-600 text-xs font-semibold animate-pulse">
                                    <i class="fas fa-spinner fa-spin mr-1"></i> Sedang Berlangsung
                                </span>
                            @elseif($status === 'akan')
                                <span class="mt-3 inline-block text-slate-500 text-xs font-semibold">
                                    <i class="fas fa-clock mr-1"></i> Akan Datang
                                </span>
                            @else
                                <span class="mt-3 inline-block text-green-600 text-xs font-semibold">
                                    <i class="fas fa-check-circle mr-1"></i> Selesai
                                </span>
                            @endif

                            <!-- Gelembung dekoratif bawah -->
                            <div
                                class="absolute -bottom-6 -left-6 w-14 h-14 bg-blue-200 rounded-full opacity-20 pointer-events-none animate-bounce-slow">
                            </div>
                            <div
                                class="absolute -bottom-4 right-8 w-16 h-16 bg-indigo-200 rounded-full opacity-10 pointer-events-none animate-pulse">
                            </div>
                            <div
                                class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-8 h-8 bg-sky-300 rounded-full opacity-15 pointer-events-none">
                            </div>

                        </div>

                    </div>
                @endforeach
            </div>

            <div id="gift-left"
                class="fixed left-0 bottom-24 transform -translate-x-64 opacity-0 transition-all duration-700 z-50">
                <span class="text-4xl animate-bounce"></span>
            </div>

            <!-- Hadiah muncul dari kanan -->
            <div id="gift-right"
                class="fixed right-0 bottom-24 transform translate-x-64 opacity-0 transition-all duration-700 z-50">
                <span class="text-4xl animate-bounce"></span>
            </div>


            <!-- Tombol Detail -->
            <div class="text-center mt-10"> <a href="javascript:void(0)" onclick="openTimelineModal()"
                    class="inline-flex items-center gap-2 bg-blue-500 hover:bg-blue-600 text-white font-semibold px-6 py-3 rounded-full shadow-lg transition-all duration-300 hover:scale-105">
                    <i class="fas fa-clock"></i> Lihat Detail Timeline </a>
            </div>

            <div id="timelineModal"
                class="fixed inset-0 z-50 hidden bg-black bg-opacity-60 flex items-center justify-center">
                <div
                    class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full mx-4 relative animate-fadeIn overflow-hidden max-h-[85vh] flex flex-col">
                    <!-- Header (Sticky Top) -->
                    <div class="sticky top-0 bg-white z-20 p-6 border-b border-gray-200"> <!-- Tombol Close --> <button
                            onclick="closeTimelineModal()"
                            class="absolute top-4 right-6 text-gray-400 hover:text-red-500 transition"> <i
                                class="fas fa-times text-2xl"></i> </button> <!-- Judul -->
                        <div class="text-center">
                            <h2 class="text-2xl font-bold text-blue-800 flex items-center justify-center gap-2"> <i
                                    class="fas fa-calendar-days text-blue-500"></i> Timeline Lomba </h2>
                            <p class="text-gray-600 text-sm mt-1"> SMA Negeri 1 Tasik Putri Puyu – LOMBAPIKR.id </p>
                        </div>
                    </div>
                    <!-- Konten Scrollable -->
                    <div class="overflow-y-auto p-8 space-y-6 flex-1 custom-scrollbar"> <!-- Lomba Poster Kreatif -->
                        <section id="timeline" class="py-10 bg-gradient-to-b from-white to-blue-50"> {{-- py-12 -> py-10
                            --}} <div class="max-w-5xl mx-auto px-6"> @forelse($timelines as $timeline) {{-- PERUBAHAN:
                                - Padding p-5 -> p-4 (lebih ringkas) - mb-6 -> mb-5 (jarak dikurangi) --}} <div
                                    class="bg-white border border-gray-200 rounded-xl p-4 shadow-md hover:shadow-lg transition-shadow duration-300 mb-5">
                                    <h3 class="text-lg font-semibold text-blue-700 mb-3 flex items-center gap-2"> {{--
                                        mb-4 -> mb-3 --}} <i class="fas fa-trophy text-yellow-500"></i>
                                        {{ $timeline->lomba->nama_lomba ?? '-' }} </h3>
                                    <!-- Informasi Jadwal (Desain Ulang - Lebih Minimalis) -->
                                    <div class="grid sm:grid-cols-2 gap-4 text-sm"> {{-- Mulai Lomba --}} <div
                                            class="bg-green-50 border border-green-200 rounded-lg p-3 shadow-sm flex flex-col">
                                            <p class="text-green-600 font-medium mb-1 flex items-center gap-2"> <i
                                                    class="fas fa-play w-4 text-center"></i> Pendaftran </p>
                                            <p class="text-gray-600 text-sm pl-1">
                                                {{ \Carbon\Carbon::parse($lomba->tanggal_mulai)->translatedFormat('d F Y - H:i') }}
                                            </p>
                                        </div> {{-- Batas Lomba --}} <div
                                            class="bg-red-50 border border-red-200 rounded-lg p-3 shadow-sm flex flex-col">
                                            <p class="text-red-600 font-medium mb-1 flex items-center gap-2"> <i
                                                    class="fas fa-flag-checkered w-4 text-center"></i> Batas Pendaftaran
                                            </p>
                                            <p class="text-gray-600 text-sm pl-1">
                                                {{ \Carbon\Carbon::parse($lomba->tanggal_selesai)->translatedFormat('d F Y - H:i') }}
                                            </p>
                                        </div>
                                    </div> {{-- ============================================== --}}
                                    <!-- Keterangan Tahapan -->
                                    @php $tahapan = !empty($timeline->keterangan) ? explode(',', $timeline->keterangan) : []; @endphp
                                    @if(!empty($tahapan))
                                        <hr class="my-3 border-gray-200">
                                        <div>
                                            <h4 class="text-sm font-semibold text-blue-700 mb-2 flex items-center gap-2"> <i
                                                    class="fas fa-list-check text-blue-500"></i> Tahapan Lomba </h4>
                                            <ul class="text-gray-700 text-sm list-disc pl-4 space-y-1">
                                                @foreach($tahapan as $tahap) <li>{{ trim($tahap) }}</li> @endforeach </ul>
                                    </div> @endif
                                </div>
                            @empty
                                    <div class="col-span-full text-center py-10 flex flex-col items-center justify-center">
                                        <img src="{{ asset('assets/img/data_kosong.svg') }}" alt="Belum ada timeline"
                                            class="w-40 mb-4 opacity-80">
                                        <p class="text-gray-500 text-sm">Belum ada timeline lomba yang tersedia.</p>
                                    </div>
                                @endforelse
                            </div>
                        </section>
                    </div> <!-- Catatan (Sticky Bottom) -->
                    <div class="sticky bottom-0 w-full bg-white z-20 border-t border-gray-200 p-6 shadow-md">
                        <hr class="my-4 border-gray-200"> <!-- Bagian 2: Box "Catatan Penting" (Tambahan) -->
                        <div class="bg-blue-50 border-l-4 border-blue-500 p-4 rounded-md">
                            <p class="text-sm text-blue-800"> <strong>Catatan Penting:</strong> Lomba akan dilaksanakan
                                langsung di SMA Negeri 1 Tasik Putri Puyu untuk semua kategori. Pastikan Anda mengecek
                                jadwal lengkap kategori lomba yang akan diikuti melalui halaman resmi lombapik.id agar
                                hadir tepat waktu dan tidak ada kesalahan saat pelaksanaan. Kehadiran seluruh peserta
                                sesuai jadwal yang tercantum sangat penting demi kelancaran lomba. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section id="kontak" class="py-20 px-6 bg-slate-50 flex justify-center" data-aos="fade-up">
        <div class="w-full max-w-6xl flex flex-col items-center">

            <!-- Judul -->
            <div class="text-center mb-12">
                <h2 class="text-3xl md:text-4xl font-bold text-slate-900 mb-3">
                    Kontak Panitia
                </h2>
                <div class="w-24 h-1.5 bg-gradient-to-r from-blue-400 to-blue-600 mx-auto mb-5 rounded-full"></div>
                <p class="text-slate-600 text-base md:text-lg max-w-2xl mx-auto leading-relaxed">
                    Butuh bantuan atau ada pertanyaan seputar LOMBAPIKR.id? Jangan ragu untuk menghubungi kami di
                    <span class="font-semibold text-blue-600">LOMBAPIKR.id!</span>
                </p>
            </div>

            <!-- Konten utama -->
            <div
                class="w-full bg-gradient-to-b from-blue-700 to-blue-800 rounded-2xl shadow-xl p-10 md:p-14 text-center text-white space-y-8">

                <!-- Label Section -->
                <span
                    class="bg-blue-600/70 text-blue-100 text-xs font-semibold px-5 py-1.5 rounded-full uppercase tracking-wider">
                    Hubungi Kami
                </span>

                <!-- Judul -->
                <h2 class="text-2xl md:text-4xl font-bold leading-snug">
                    Kami Siap Membantu Kamu!
                </h2>

                <!-- Titik Dekoratif -->
                <div class="flex justify-center mt-2 space-x-1">
                    <div class="w-2 h-2 bg-orange-400 rounded-full"></div>
                    <div class="w-2 h-2 bg-orange-300 rounded-full"></div>
                    <div class="w-2 h-2 bg-orange-400 rounded-full"></div>
                </div>

                <!-- Kontak Langsung -->
                <div class="mt-10 grid grid-cols-1 sm:grid-cols-2 gap-6 md:gap-8">

                    <!-- Email -->
                    <a href="mailto:pikrsman1tasikputri@gmail.com"
                        class="group flex flex-col items-center gap-3 bg-white rounded-xl shadow-md p-6 transition-all duration-300 hover:scale-105 hover:shadow-lg text-blue-800">
                        <div
                            class="w-14 h-14 flex items-center justify-center rounded-full bg-blue-100 group-hover:bg-blue-200 transition-colors duration-300">
                            <i class="fas fa-envelope text-2xl group-hover:text-blue-700"></i>
                        </div>
                        <h3 class="text-base font-semibold group-hover:text-blue-700">Email</h3>
                    </a>

                    <!-- WhatsApp -->
                    <a href="https://wa.me/628229245081" target="_blank"
                        class="group flex flex-col items-center gap-3 bg-white rounded-xl shadow-md p-6 transition-all duration-300 hover:scale-105 hover:shadow-lg text-green-700">
                        <div
                            class="w-14 h-14 flex items-center justify-center rounded-full bg-green-100 group-hover:bg-green-200 transition-colors duration-300">
                            <i class="fab fa-whatsapp text-2xl group-hover:text-green-700"></i>
                        </div>
                        <h3 class="text-base font-semibold group-hover:text-green-700">WhatsApp</h3>
                    </a>

                </div>

                <!-- Nama Sekolah -->
                <p class="text-sm mt-8 text-blue-100 font-medium tracking-wide">
                    SMA NEGERI 1 TASIK PUTRI PUYU
                </p>
            </div>
        </div>
    </section>




    <!-- Footer Section -->
    <footer class="bg-blue-900 text-white pt-12 pb-8">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-10">
                <!-- Logo & About -->
                <div>
                    <img src="assets/img/logo_utama.png" alt="LOMBAPIKR" class="h-16 mb-4">
                    <p class="text-blue-200 text-sm leading-relaxed">
                        Lomba Pusat Informasi dan Konseling Remaja (LOMBAPIKR) - Platform perlombaan PIK-R tingkat SMA
                        NEGERI 1 TASIK PUTRI PUYU.
                    </p>
                </div>

                <!-- Quick Links -->
                <div>
                    <h4 class="text-white font-bold mb-4">Quick Links</h4>
                    <ul class="space-y-2 text-blue-200 text-sm">
                        <li><a href="#beranda" class="hover:text-blue-400 transition">Beranda</a></li>
                        <li><a href="#statistik" class="hover:text-blue-400 transition">Statistik</a></li>
                        <li><a href="#panduan" class="hover:text-blue-400 transition">Panduan</a></li>
                        <li><a href="#pendaftaran" class="hover:text-blue-400 transition">Pendaftaran</a></li>
                    </ul>
                </div>

                <!-- Contact -->
                <div>
                    <h4 class="text-white font-bold mb-4">Kontak</h4>
                    <ul class="space-y-2 text-blue-200 text-sm">
                        <li><i class="fas fa-map-marker-alt mr-2 text-blue-300"></i>
                            Jl. Husni Tamrin, Desa Kudap,
                            Kec. Tasik Putri Puyu,
                            Kab. Kepulauan Meranti, Provinsi Riau
                        </li>
                        <li><i class="fas fa-phone mr-2 text-green-300"></i>+62 822 2924 5081</li>
                        <li><i class="fas fa-envelope mr-2 text-yellow-300"></i>pikrequestsman1tpp25@gmail.com</li>
                    </ul>
                </div>

                <!-- Social Media -->
                <div>
                    <h4 class="text-white font-bold mb-4">Ikuti Kami</h4>
                    <div class="flex space-x-4">
                        <a href="https://www.facebook.com/share/1GkjhqjFq7/"
                            class="text-white hover:text-blue-400 text-2xl transition transform hover:scale-125"><i
                                class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/pik_request_sman_01ttp?igsh=cjNqdnZpZjR3OHkx"
                            class="text-white hover:text-pink-500 text-2xl transition transform hover:scale-125"><i
                                class="fab fa-instagram"></i></a>
                        <a href="https://youtube.com/@pik-rrequest?si=MmXH51ekZbZ9Owsm"
                            class="text-white hover:text-red-600 text-2xl transition transform hover:scale-125"><i
                                class="fab fa-youtube"></i></a>
                    </div>
                </div>
            </div>

            <div class="border-t border-white-700 my-6"></div>

            <div class="text-center text-blue-200 text-sm space-y-2">
                <p>&copy; <span id="year"></span> LOMBAPIKR.id. All rights reserved.</p>
                <p>
                    Developed by
                    <a href="https://yourportfolio.com" target="_blank"
                        class="text-white font-semibold hover:text-blue-400 transition">Muhamad Farhan</a>
                </p>
                <div class="mt-2">
                    <span class="px-2 py-1 text-xs rounded-full bg-blue-500/10 border border-blue-500/20 text-blue-300">
                        v1.1
                    </span>
                </div>
            </div>
        </div>
    </footer>





    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.6.0/dist/confetti.browser.min.js"></script>


    @php
        // Konversi dari DB (dikirim controller) ke timestamp JS (ms)
        $deadlineTimestamp = $mainDeadline ? strtotime($mainDeadline) * 1000 : null;
        $uploadMulaiTimestamp = $uploadMulai ? strtotime($uploadMulai) * 1000 : null;
    @endphp


    <script>
        AOS.init({
            duration: 800,
            once: true,
        });

        document.addEventListener('DOMContentLoaded', () => {
            // -------------------------------
            // Countdown
            // -------------------------------
            const deadlineTimestamp = {{ $deadlineTimestamp ?? 'null' }};
            const uploadMulaiTimestamp = {{ $uploadMulaiTimestamp ?? 'null' }};
            const btnDaftar = document.getElementById('btn-daftar');

            function updateCountdown() {
                const now = new Date().getTime();

                // Tentukan target countdown: jika sebelum upload mulai, countdown ke upload, else ke deadline utama
                let targetTime = deadlineTimestamp; // default
                if (uploadMulaiTimestamp && now < uploadMulaiTimestamp) {
                    targetTime = uploadMulaiTimestamp;
                }

                const distance = targetTime - now;

                // --- Update countdown ---
                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                const seconds = Math.floor((distance % (1000 * 60)) / 1000);

                document.getElementById('cd-days').innerText = distance > 0 ? String(days).padStart(2, '0') : '00';
                document.getElementById('cd-hours').innerText = distance > 0 ? String(hours).padStart(2, '0') : '00';
                document.getElementById('cd-minutes').innerText = distance > 0 ? String(minutes).padStart(2, '0') : '00';
                document.getElementById('cd-seconds').innerText = distance > 0 ? String(seconds).padStart(2, '0') : '00';

                const btnContainer = btnDaftar?.parentElement;

                // --- Tombol Daftar ---
                if (btnDaftar) {
                    btnDaftar.href = (now > deadlineTimestamp || !deadlineTimestamp)
                        ? "{{ route('pendaftaran.tutup') }}"
                        : "{{ route('pendaftaran.create') }}";
                }

                // --- Tombol Upload Karya ---
                let btnUpload = document.getElementById('btn-upload');
                if (!btnUpload && btnContainer) {
                    btnUpload = document.createElement('a');
                    btnUpload.id = 'btn-upload';
                    btnUpload.target = '_blank';
                    btnUpload.className = 'inline-block bg-yellow-500 text-white font-semibold px-6 py-4 rounded-full shadow-2xl ml-4';
                    btnUpload.innerText = 'Upload Karya';
                    btnContainer.appendChild(btnUpload);
                }

                if (btnUpload) {
                    const nowDate = new Date();

                    // Default: tombol disable → belum disetting
                    btnUpload.href = "{{ route('upload.belum_dibuka') }}";
                    btnUpload.onclick = e => {
                        e.preventDefault(); // hapus jika ingin langsung redirect tanpa alert
                        // Redirect ke route khusus
                        window.location.href = "{{ route('upload.belum_dibuka') }}";
                    };
                    btnUpload.classList.add('opacity-50', 'cursor-not-allowed');


                    if (uploadMulaiTimestamp) {
                        const uploadDate = new Date(uploadMulaiTimestamp);
                        nowDate.setHours(0, 0, 0, 0);
                        uploadDate.setHours(0, 0, 0, 0);

                        if (nowDate.getTime() <= uploadDate.getTime()) {
                            // Tombol aktif → sebelum atau sama dengan tanggal upload
                            btnUpload.href = "{{ route('upload.create') }}"; // ganti ID_UPLOAD dengan route Laravel
                            btnUpload.onclick = null;
                            btnUpload.classList.remove('opacity-50', 'cursor-not-allowed');
                        } else {

                            btnUpload.href = "{{ route('upload.habis') }}";
                            btnUpload.onclick = null;
                            btnUpload.classList.remove('cursor-not-allowed');
                            btnUpload.classList.add('opacity-50');



                            // Tombol Pengumuman muncul setelah upload ditutup
                            if (btnContainer && !document.getElementById('btn-pengumuman')) {
                                const btnPengumuman = document.createElement('a');
                                btnPengumuman.id = 'btn-pengumuman';
                                btnPengumuman.href = 'https://drive.google.com/drive/folders/1JdXfQWDqedIjDXPn9f2Amc-Hl-JpC_Hw?usp=sharing';
                                btnPengumuman.target = '_blank';
                                btnPengumuman.className = 'inline-block bg-green-500 text-white font-semibold px-6 py-4 rounded-full shadow-2xl ml-4 hover:shadow-3xl transform hover:scale-105 transition duration-300 animate-glow';
                                btnPengumuman.innerText = 'Pengumuman';
                                btnContainer.appendChild(btnPengumuman);
                            }
                        }
                    }
                }


            }

            updateCountdown();
            setInterval(updateCountdown, 1000);




            // -------------------------------
            // Smooth scroll
            // -------------------------------
            const linkTimeline = document.querySelector('a[href="#timeline"]');
            if (linkTimeline) {
                linkTimeline.addEventListener('click', e => {
                    e.preventDefault();
                    document.querySelector('#timeline').scrollIntoView({ behavior: 'smooth' });
                });
            }

            const sectionID = document.querySelector('#sectionID');
            if (sectionID) sectionID.scrollIntoView({ behavior: 'smooth' });

            // -------------------------------
            // Timeline progress
            // -------------------------------
            const timeline = document.getElementById('timeline');
            if (timeline) {
                const steps = timeline.querySelectorAll('[data-tahap]');
                const progressLine = document.getElementById('progress-line');

                setTimeout(() => {
                    let lastSelesai = 0;
                    let lastBerlangsung = 0;

                    steps.forEach(step => {
                        const icon = step.querySelector('.w-12.h-12');
                        if (!icon) return;
                        const offset = icon.offsetTop + (icon.offsetHeight / 2);
                        const status = step.getAttribute('data-tahap');
                        if (status === 'selesai') lastSelesai = offset;
                        if (status === 'berlangsung') lastBerlangsung = offset;
                    });

                    let height = lastBerlangsung > 0 ? lastBerlangsung : lastSelesai;
                    progressLine.animate([{ height: '0px' }, { height: height + 'px' }], { duration: 1800, easing: 'ease-in-out', fill: 'forwards' });
                    setTimeout(() => progressLine.style.height = height + 'px', 1800);

                    // Gradasi
                    if (lastBerlangsung > 0) {
                        const percentHijau = (lastSelesai / lastBerlangsung) * 100;
                        const style = document.createElement('style');
                        style.innerHTML = `
                @keyframes pulseLine{
                    0% { background-position:0 0; }
                    100% { background-position:0 30px; }
                }
                #progress-line.animate-blue{
                    background: repeating-linear-gradient(
                        to bottom,
                        #22c55e 0%,
                        #22c55e ${percentHijau}%,
                        #3b82f6 ${percentHijau}%,
                        #60a5fa ${percentHijau + 5}%,
                        #3b82f6 ${percentHijau + 10}%
                    );
                    background-size: 100% 200%;
                    animation: pulseLine 3s linear infinite;
                }`;
                        document.head.appendChild(style);
                        progressLine.classList.add('animate-blue');
                    } else if (lastSelesai > 0) {
                        progressLine.style.background = '#22c55e';
                    } else {
                        progressLine.style.background = '#94a3b8';
                    }

                    // -------------------------------
                    // Hadiah dari kiri-kanan
                    // -------------------------------
                    let semuaSelesai = true;
                    steps.forEach(step => {
                        if (step.dataset.tahap !== 'selesai') semuaSelesai = false;
                    });

                    if (semuaSelesai) {
                        // Buat elemen hadiah jika belum ada
                        if (!document.getElementById('gift-left')) {
                            const giftLeft = document.createElement('div');
                            giftLeft.id = 'gift-left';
                            giftLeft.className = 'fixed left-0 bottom-16 transform -translate-x-64 opacity-0 transition-all duration-700 z-50 text-4xl';
                            giftLeft.innerText = '';
                            document.body.appendChild(giftLeft);
                        }
                        if (!document.getElementById('gift-right')) {
                            const giftRight = document.createElement('div');
                            giftRight.id = 'gift-right';
                            giftRight.className = 'fixed right-0 bottom-16 transform translate-x-64 opacity-0 transition-all duration-700 z-50 text-4xl';
                            giftRight.innerText = '';
                            document.body.appendChild(giftRight);
                        }

                        const giftLeft = document.getElementById('gift-left');
                        const giftRight = document.getElementById('gift-right');

                        // Slide in
                        setTimeout(() => {
                            giftLeft.classList.remove('-translate-x-64', 'opacity-0');
                            giftLeft.classList.add('translate-x-0', 'opacity-100');

                            giftRight.classList.remove('translate-x-64', 'opacity-0');
                            giftRight.classList.add('translate-x-0', 'opacity-100');

                            // -------------------------------
                            // KONFETI SUPER BANYAK
                            // -------------------------------
                            const colors = ['#f59e0b', '#10b981', '#3b82f6', '#ef4444', '#8b5cf6', '#f472b6', '#06b6d4'];
                            for (let i = 0; i < 10; i++) {  // 10 gelombang konfeti
                                confetti({
                                    particleCount: 150,        // banyak partikel per gelombang
                                    spread: 150,               // sebaran lebih luas
                                    origin: { x: Math.random(), y: Math.random() * 0.4 }, // lebih tinggi
                                    colors: colors,
                                    ticks: 250,
                                    gravity: 0.8,
                                    scalar: Math.random() * 0.9 + 0.7,
                                });
                            }

                            // Auto hide hadiah
                            setTimeout(() => {
                                giftLeft.classList.remove('translate-x-0', 'opacity-100');
                                giftLeft.classList.add('-translate-x-64', 'opacity-0');
                                giftRight.classList.remove('translate-x-0', 'opacity-100');
                                giftRight.classList.add('translate-x-64', 'opacity-0');
                            }, 5000);
                        }, 300);
                    }


                }, 400);
            }

            // -------------------------------
            // Tabs
            // -------------------------------
            window.showTab = function (tab) {
                const tabs = ['kreatif', 'pengetahuan'];
                tabs.forEach(t => {
                    const btn = document.getElementById(`tab-${t}`);
                    const content = document.getElementById(`content-${t}`);
                    if (!btn || !content) return;
                    btn.classList.remove('bg-blue-100', 'text-blue-700', 'border-blue-400');
                    btn.classList.add('bg-gray-100', 'text-gray-600', 'border-gray-300');
                    content.classList.add('hidden');
                });
                const btnActive = document.getElementById(`tab-${tab}`);
                const contentActive = document.getElementById(`content-${tab}`);
                if (btnActive && contentActive) {
                    btnActive.classList.add('bg-blue-100', 'text-blue-700', 'border-blue-400');
                    contentActive.classList.remove('hidden');
                }
            }

            // Modal timeline
            window.openTimelineModal = () => document.getElementById('timelineModal')?.classList.remove('hidden');
            window.closeTimelineModal = () => document.getElementById('timelineModal')?.classList.add('hidden');

        });

        document.getElementById("year").textContent = new Date().getFullYear();
    </script>


</body>

</html>