<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Website Sedang Maintenance | LOMBAPIKR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="icon" href="{{ asset('assets/img/logo_utama.png') }}" type="image/png">
</head>

<body class="bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 flex items-center justify-center min-h-screen relative overflow-hidden">

    <!-- Efek cahaya latar -->
    <div class="absolute w-80 h-80 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 -top-20 -left-20 animate-pulse"></div>
    <div class="absolute w-80 h-80 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 -bottom-20 -right-20 animate-pulse"></div>

    <!-- Kartu utama -->
   <div class="bg-white/90 backdrop-blur-lg shadow-2xl rounded-3xl p-10 text-center max-w-xl w-full z-10 transform transition-all duration-500 hover:scale-[1.02]">

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/img/logo_utama.png') }}" alt="LOMBAPIKR" class="h-16 drop-shadow-md">
        </div>

        <!-- Gambar ilustrasi -->
        <img src="{{ asset('assets/img/undraw_maintenance_4unj.svg') }}" alt="Maintenance"
             class="w-56 mx-auto mb-6 animate-float drop-shadow-sm">

        <!-- Judul -->
        <h1 class="text-3xl font-extrabold text-gray-800 mb-3">Website Sedang Maintenance 🚧</h1>

        <!-- Deskripsi -->
        <p class="text-gray-600 text-sm leading-relaxed mb-8">
            Kami sedang melakukan pembaruan sistem untuk meningkatkan pengalaman Anda.<br>
            Mohon bersabar, website akan segera kembali online 💫
        </p>

        <!-- Spinner -->
        <div class="flex justify-center mb-6">
            <div class="w-10 h-10 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
        </div>

        <!-- Tombol kontak admin -->
        <a href="mailto:pikrequestsman1tpp25@gmail.com"
           class="inline-block px-6 py-3 bg-gradient-to-r from-blue-500 to-purple-500 text-white rounded-xl shadow-md hover:shadow-lg hover:scale-105 transform transition duration-300 font-semibold">
           Hubungi Admin
        </a>

        <!-- Footer -->
        <p class="text-gray-400 text-xs mt-8">&copy; {{ date('Y') }} LOMBAPIKR. All rights reserved.</p>
    </div>

    <!-- Animasi custom -->
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-float {
            animation: float 3s ease-in-out infinite;
        }
    </style>
</body>
</html>
