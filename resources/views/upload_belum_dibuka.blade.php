<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'Upload Belum Dibuka' }} - Lomba PIK-R</title>
    <link rel="shortcut icon" href="assets/img/logo_1.png" type="image/png">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* Custom Float Animation for Icon */
        @keyframes float {
            0% {
                transform: translateY(0px);
            }

            50% {
                transform: translateY(-15px);
            }

            100% {
                transform: translateY(0px);
            }
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .bg-pattern {
            background-color: #F3F4F6;
            background-image: radial-gradient(#3B82F6 0.5px, transparent 0.5px), radial-gradient(#3B82F6 0.5px, #F3F4F6 0.5px);
            background-size: 20px 20px;
            background-position: 0 0, 10px 10px;
        }
    </style>
</head>

<body class="bg-pattern min-h-screen flex items-center justify-center p-4 overflow-hidden relative">

    <div
        class="absolute top-0 left-1/4 w-96 h-96 bg-blue-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob">
    </div>
    <div
        class="absolute top-0 right-1/4 w-96 h-96 bg-purple-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-2000">
    </div>
    <div
        class="absolute -bottom-32 left-1/3 w-96 h-96 bg-pink-300 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-blob animation-delay-4000">
    </div>

    <div class="relative w-full max-w-md transform transition-all hover:scale-[1.01] duration-300">

        <div class="bg-white/70 backdrop-blur-xl border border-white/50 rounded-3xl shadow-2xl overflow-hidden">

            <div class="h-2 w-full bg-gradient-to-r from-blue-500 via-purple-500 to-pink-500"></div>

            <div class="p-8 text-center">

                <div class="relative mx-auto w-24 h-24 mb-6 animate-float">
                    <div class="absolute inset-0 bg-blue-100 rounded-full opacity-50"></div>
                    <div class="absolute -right-2 -bottom-2 bg-white rounded-full p-2 shadow-lg z-20">
                        <i class="fas fa-lock text-orange-500 text-xl"></i>
                    </div>
                    <div class="absolute inset-0 flex items-center justify-center z-10">
                        <i class="fas fa-cloud-upload-alt text-5xl text-blue-600"></i>
                    </div>
                </div>

                <h1 class="text-2xl font-bold text-gray-800 mb-2">
                    {{ $title ?? 'Sabar Dulu ya, Kak!' }}
                </h1>

                <p class="text-gray-500 text-sm leading-relaxed mb-6">
                    {{ $message ?? 'Fitur upload karya saat ini belum dibuka. Pastikan kamu sudah mempersiapkan karyamu dengan maksimal sebelum waktu upload dimulai!' }}
                </p>

                <div class="bg-blue-50 border border-blue-100 rounded-xl p-4 mb-8 text-left flex items-start gap-3">
                    <div class="mb-8">
                        <div
                            class="flex items-start gap-4 p-4 bg-white border-l-4 border-pink-500 shadow-sm rounded-r-lg">
                            <div class="flex-shrink-0">
                                <div
                                    class="w-10 h-10 rounded-full bg-pink-50 flex items-center justify-center text-pink-600">
                                    <i class="fab fa-instagram text-xl"></i>
                                </div>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900">Pantau Instagram Kami</h4>
                                <p class="text-xs text-gray-600 mt-1 leading-5">
                                    Jadwal upload akan diumumkan melalui <strong>Instagram</strong>.
                                    <strong></strong> setelah info
                                    dirilis.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-3">
                    <a href="{{ route('landing') }}"
                        class="block w-full py-3 px-4 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-xl shadow-lg hover:shadow-blue-500/30 transition-all duration-300 transform hover:-translate-y-0.5">
                        <i class="fas fa-arrow-left mr-2"></i> Kembali ke Beranda
                    </a>

                    <a href="" onclick="window.location.reload(); return false;"
                        class="block w-full py-3 px-4 bg-white border border-gray-200 text-gray-600 font-semibold rounded-xl hover:bg-gray-50 transition-colors">
                        <i class="fas fa-sync-alt mr-2 text-gray-400"></i> Coba Refresh
                    </a>
                </div>

            </div>

            <div class="bg-gray-50 px-8 py-4 border-t border-gray-100 flex justify-between items-center">
                <span class="text-xs font-medium text-gray-400">Status Sistem</span>
                <span
                    class="flex items-center gap-2 text-xs font-bold text-orange-500 bg-orange-50 px-3 py-1 rounded-full border border-orange-100">
                    <span class="relative flex h-2 w-2">
                        <span
                            class="animate-ping absolute inline-flex h-full w-full rounded-full bg-orange-400 opacity-75"></span>
                        <span class="relative inline-flex rounded-full h-2 w-2 bg-orange-500"></span>
                    </span>
                    Belum Dibuka
                </span>
            </div>

        </div>

        <p class="text-center text-gray-400 text-xs mt-6 font-medium tracking-wide">
            &copy; 2025 Panitia Lomba PIK-R
        </p>
    </div>

</body>

</html>