<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lupa Password - Admin LOMBAPIKR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 flex items-center justify-center min-h-screen">

    <div class="bg-white rounded-3xl shadow-2xl w-96 p-8 relative overflow-hidden">

        <!-- Dekorasi -->
        <div class="absolute -top-16 -left-16 w-36 h-36 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>
        <div class="absolute -bottom-16 -right-16 w-36 h-36 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse"></div>

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/img/logo_utama.png') }}" alt="LOMBAPIKR" class="h-16 animate-bounce">
        </div>

        <!-- Judul -->
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-4">Lupa Password</h2>
        <p class="text-gray-500 text-center mb-6 text-sm">Masukkan username admin Anda untuk mereset password.</p>

        <!-- Form -->
        <form id="forgotForm" method="POST" action="{{ route('admin.password.email') }}" class="space-y-5">
            @csrf

            <div>
                <label for="username" class="block text-gray-600 mb-2">Username</label>
                <input type="text" id="username" name="username" placeholder="Masukkan username"
                       class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none">
                @error('username')
                    <p class="text-red-500 text-sm mt-2">{{ $message }}</p>
                @enderror
            </div>

            <button id="submitBtn" type="submit"
                    class="w-full py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-bold flex justify-center items-center space-x-2 transform hover:scale-105 transition duration-300">
                <i class="fas fa-paper-plane" id="iconSend"></i>
                <span id="btnText">Kirim Permintaan</span>
            </button>
        </form>

        <!-- Kembali ke Login -->
        <div class="text-center mt-6">
            <a href="{{ route('admin.login') }}" class="text-sm text-gray-500 hover:text-gray-700 transition">
                <i class="fas fa-arrow-left mr-1"></i> Kembali ke Login
            </a>
        </div>

    </div>

    <!-- ✅ SweetAlert messages -->
    @if ($errors->any())
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: '{{ $errors->first() }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    @if (session('success'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: '{{ session('success') }}',
                confirmButtonColor: '#3085d6',
                confirmButtonText: 'OK'
            });
        </script>
    @endif

    <!-- ✅ Loading effect -->
    <script>
        const form = document.getElementById('forgotForm');
        const submitBtn = document.getElementById('submitBtn');
        const iconSend = document.getElementById('iconSend');
        const btnText = document.getElementById('btnText');

        form.addEventListener('submit', function() {
            // Disable tombol agar tidak diklik dua kali
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-70', 'cursor-not-allowed');

            // Ganti ikon & teks jadi loading
            iconSend.classList.remove('fa-paper-plane');
            iconSend.classList.add('fa-spinner', 'fa-spin');
            btnText.textContent = 'Mengirim...';
        });
    </script>

</body>
</html>
