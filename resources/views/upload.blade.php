<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Karya - Lomba PIK-R</title>
    <link rel="shortcut icon" href="assets/img/logo_1.png" type="image/png">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

    <link rel="shortcut icon" href="{{ asset('assets/img/logo_1.png') }}" type="image/png">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .animate-fade-up {
            animation: fadeUp 0.8s ease-out forwards;
        }

        @keyframes fadeUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .glass-effect {
            background: rgba(255, 255, 255, 0.85);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.6);
        }
    </style>
</head>

<body
    class="bg-gradient-to-br from-blue-100 via-blue-50 to-indigo-100 min-h-screen flex items-center justify-center p-4 relative overflow-hidden">

    <div
        class="absolute top-10 left-10 w-32 h-32 bg-blue-300 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse">
    </div>
    <div class="absolute bottom-10 right-10 w-40 h-40 bg-yellow-200 rounded-full mix-blend-multiply filter blur-xl opacity-40 animate-pulse"
        style="animation-delay: 1s"></div>

    <div class="glass-effect rounded-3xl shadow-2xl p-8 max-w-lg w-full relative animate-fade-up">

        <div class="absolute -top-8 left-1/2 transform -translate-x-1/2">
            <div class="bg-gradient-to-br from-blue-600 to-indigo-600 rounded-2xl p-4 shadow-lg shadow-blue-500/30">
                <i class="fas fa-cloud-upload-alt text-3xl text-white"></i>
            </div>
        </div>

        <div class="mt-8 text-center">
            <span
                class="inline-block py-1 px-3 rounded-full bg-green-100 text-green-600 text-xs font-bold tracking-wide mb-3">
                <span class="w-2 h-2 bg-green-500 rounded-full inline-block mr-1 animate-pulse"></span>
                JALUR UPLOAD DIBUKA
            </span>

            <h1 class="text-2xl font-bold text-gray-800 mb-2">Kirim Karya Terbaikmu!</h1>
            <p class="text-gray-500 text-sm px-4">
                Silakan unggah karya kamu ke folder Google Drive panitia melalui tombol di bawah ini.
            </p>
        </div>

        <div class="my-6 bg-blue-50 border border-blue-100 rounded-xl p-4 text-left">
            <p class="text-xs font-bold text-blue-800 mb-2 uppercase tracking-wide flex items-center gap-2">
                <i class="fas fa-check-circle"></i> Pastikan Sebelum Upload:
            </p>
            <ul class="space-y-2">
                <li class="text-xs text-gray-600 flex items-start gap-2">
                    <i class="fas fa-angle-right text-blue-400 mt-0.5"></i>
                    <span>Format nama file: <strong>Nama_Instansi_Kategori</strong></span>
                </li>
                <li class="text-xs text-gray-600 flex items-start gap-2">
                    <i class="fas fa-angle-right text-blue-400 mt-0.5"></i>
                    <span>Ukuran file sesuai ketentuan.</span>
                </li>
                <li class="text-xs text-gray-600 flex items-start gap-2">
                    <i class="fas fa-angle-right text-blue-400 mt-0.5"></i>
                    <span>Pastikan file tidak korup/rusak.</span>
                </li>
            </ul>
        </div>

        <div class="relative group">
            <div
                class="absolute -inset-0.5 bg-gradient-to-r from-yellow-400 to-orange-500 rounded-xl blur opacity-60 group-hover:opacity-100 transition duration-200">
            </div>
            <a href="https://drive.google.com/drive/folders/1cJVKIxGiVkJmjrw9aviJ0noVJB0B6Qh9?usp=sharing" target="_blank"
                class="relative flex items-center justify-center gap-3 w-full bg-white text-gray-900 font-bold py-4 px-6 rounded-xl hover:bg-gray-50 transition-all transform hover:-translate-y-0.5">
                <i class="fab fa-google-drive text-yellow-500 text-xl"></i>
                <span>Buka Google Drive</span>
                <i class="fas fa-arrow-right text-gray-400 group-hover:text-orange-500 transition-colors ml-auto"></i>
            </a>
        </div>


        <div class="mt-8 text-center border-t border-gray-100 pt-4">
            <a href="{{ url('/') }}"
                class="inline-flex items-center text-sm font-medium text-gray-500 hover:text-blue-600 transition-colors">
                <i class="fas fa-arrow-left mr-2 text-xs"></i>
                Kembali ke Beranda
            </a>
        </div>

    </div>

</body>

</html>