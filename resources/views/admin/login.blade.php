<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin LOMBAPIKR</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_1.png') }}" type="image/png">
</head>

<body class="bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 flex items-center justify-center min-h-screen">

    <!-- Login Card -->
    <div class="bg-white rounded-3xl shadow-2xl w-96 p-8 relative overflow-hidden">
        <!-- Decorative Circles -->
        <div
            class="absolute -top-16 -left-16 w-36 h-36 bg-blue-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse">
        </div>
        <div
            class="absolute -bottom-16 -right-16 w-36 h-36 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-30 animate-pulse">
        </div>

        <!-- Logo -->
        <div class="flex justify-center mb-6">
            <img src="{{ asset('assets/img/logo_utama.png') }}" alt="LOMBAPIKR" class="h-16 animate-bounce">
        </div>

        <!-- Title -->
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Login Admin</h2>

        <!-- Error Message -->
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-2 rounded mb-4 text-sm flex items-center">
                <i class="fas fa-exclamation-triangle mr-2"></i> {{ $errors->first() }}
            </div>
        @endif

        <!-- Login Form -->
        <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-5">
            @csrf

            <!-- Username -->
            <div class="mb-4">
                <p class="text-gray-500 text-sm mb-2">Masukkan username admin Anda</p>
                <div class="relative">
                    <input type="text" name="username" placeholder="Username"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-blue-400 focus:outline-none pl-10">
                    <i class="fas fa-user absolute left-3 top-3 text-gray-400"></i>
                </div>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <p class="text-gray-500 text-sm mb-2">Masukkan password Anda</p>
                <div class="relative">
                    <input type="password" id="password" name="password" placeholder="Password"
                        class="w-full px-4 py-3 rounded-xl border border-gray-300 focus:ring-2 focus:ring-purple-400 focus:outline-none pl-10 pr-10">
                    <i class="fas fa-lock absolute left-3 top-3 text-gray-400"></i>

                    
                    <button type="button" id="togglePassword"
                        class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-500">
                        <svg id="eyeIcon" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                            stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                            <circle cx="12" cy="12" r="3" />
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Tombol Login -->
            <button type="submit"
                class="w-full py-3 bg-blue-500 hover:bg-blue-600 text-white rounded-xl font-bold flex justify-center items-center space-x-2 transform hover:scale-105 transition duration-300">
                <i class="fas fa-sign-in-alt"></i>
                <span>Masuk</span>
            </button>
        </form>

        <!-- Extra Links -->
        <div class="flex justify-between mt-4 text-sm text-gray-500">
            <a href="{{ route('admin.password.request') }}" class="hover:text-gray-700 transition"><i class="fas fa-question-circle mr-1"></i> Lupa
                Password?</a>
            <a href="#" class="hover:text-gray-700 transition"><i class="fas fa-info-circle mr-1"></i> Bantuan</a>
        </div>

        <!-- Footer Note -->
        <p class="text-gray-400 text-center text-sm mt-6">
            &copy; 2025 LOMBAPIKR. All rights reserved.
        </p>
    </div>

    <script>
        // Fungsi untuk show/hide password
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');
        const eyeIcon = togglePassword.querySelector('i');

        togglePassword.addEventListener('click', function () {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);

            // Ganti ikon mata
            eyeIcon.classList.toggle('fa-eye');
            eyeIcon.classList.toggle('fa-eye-slash');
        });
    </script>
</body>

</html>