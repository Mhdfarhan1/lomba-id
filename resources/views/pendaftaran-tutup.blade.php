<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Ditutup - Lomba PIK-R ID</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_1.png') }}" type="image/png">
    <style>
        @import url('https://rsms.me/inter/inter.css');

        html {
            font-family: 'Inter', sans-serif;
        }

        /* Animasi Gradient Background */
        body {
            background-color: #e0f2fe;
            background-image: radial-gradient(circle at top left, #3b82f6, #60a5fa, #e0f2fe 70%);
            overflow: hidden;
            background-size: 400% 400%;
            animation: gradientShift 20s ease infinite;
        }

        /* Keyframes untuk animasi background */
        @keyframes gradientShift {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        /* Animasi fade in kartu */
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 0.6s ease-out forwards;
        }

        /* Animasi ikon jam utama (pulse) */
        @keyframes mainIconPulse {

            0%,
            100% {
                transform: scale(1);
            }

            50% {
                transform: scale(1.05);
            }
        }

        .main-icon-pulse {
            animation: mainIconPulse 2s infinite ease-in-out;
        }

        /* Animasi ikon berputar */
        @keyframes rotateAround {
            0% {
                transform: rotate(0deg) translateX(48px) rotate(0deg);
            }

            100% {
                transform: rotate(360deg) translateX(48px) rotate(-360deg);
            }
        }

        .rotating-icon {
            animation: rotateAround 8s linear infinite;
            transform-origin: 50% 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -16px;
            margin-left: -16px;
        }

        /* Animasi Ikon Kedua (berlawanan arah) */
        .rotating-icon-2 {
            animation: rotateAround 10s linear infinite reverse;
            transform-origin: 50% 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            margin-top: -16px;
            margin-left: -16px;
        }
    </style>
</head>

<body class="py-12 px-4 flex items-center justify-center min-h-screen">

    <div class="relative max-w-lg w-full animate-fade-in">

        <div class="absolute z-10 left-1/2 -translate-x-1/2 top-0 -translate-y-1/2" style="width: 140px; height: 140px;">

            <div class="relative flex items-center justify-center w-28 h-28 rounded-full 
                        bg-gradient-to-br from-blue-500 to-sky-400 
                        shadow-2xl shadow-blue-400/40 border-4 border-white/20 
                        mx-auto main-icon-pulse">
                <i class="fas fa-clock text-5xl text-white"></i>
            </div>

            <div class="rotating-icon">
                <div class="flex items-center justify-center w-8 h-8 rounded-full 
                            bg-gradient-to-br from-green-400 to-teal-400 
                            shadow-lg shadow-green-400/30">
                    <i class="fas fa-file-signature text-sm text-white"></i>
                </div>
            </div>

            <div class="rotating-icon-2">
                <div class="flex items-center justify-center w-8 h-8 rounded-full 
                            bg-gradient-to-br from-yellow-400 to-orange-400 
                            shadow-lg shadow-yellow-400/30">
                    <i class="fas fa-star text-sm text-white"></i>
                </div>
            </div>
        </div>

        <div class="w-full text-center bg-white/80 backdrop-blur-lg 
                    p-8 rounded-3xl shadow-xl border border-blue-200 mt-24">

            <h1 class="text-2xl font-extrabold text-blue-700 flex items-center justify-center mb-4">
                <i class="fas fa-exclamation-circle text-blue-500 mr-3"></i>
                Pendaftaran Ditutup
            </h1>

            <p class="text-blue-900 mt-2 mb-8 px-2">
                Maaf, periode pendaftaran <strong>LOMBAPIKR</strong> sudah berakhir.<br>
                Terima kasih atas partisipasi Anda! Pantau terus informasi terbaru untuk event selanjutnya.
            </p>

            <div class="flex flex-col sm:flex-row gap-4 justify-center mb-6">
                <a href="/"
                    class="inline-flex items-center justify-center gap-2 bg-blue-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-blue-700 shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-home text-sm"></i>
                    Kembali ke Beranda
                </a>

                <a href="#"
                    onclick="window.location.reload();"
                    class="inline-flex items-center justify-center gap-2 bg-sky-500 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-sky-600 shadow-md hover:shadow-xl transition-all duration-300 transform hover:scale-105">
                    <i class="fas fa-sync-alt text-sm"></i>
                    Refresh
                </a>
            </div>

            <div class="border-t border-blue-200 pt-4">
                <p class="text-sm text-blue-800">Status: Pendaftaran Ditutup</p>
            </div>
        </div>

    </div>

</body>

</html>