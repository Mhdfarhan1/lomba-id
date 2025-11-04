<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard Admin LOMBAPIKR')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css">

    <link rel="shortcut icon" href="{{ asset('assets/img/logo_1.png') }}" type="image/png">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="//unpkg.com/alpinejs" defer></script>


    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        .sidebar-item {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .sidebar-item::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            height: 100%;
            width: 4px;
            background: white;
            transform: scaleY(0);
            transition: transform 0.3s ease;
        }

        .sidebar-item:hover::before,
        .sidebar-item.active::before {
            transform: scaleY(1);
        }

        .sidebar-item:hover {
            background: rgba(255, 255, 255, 0.1);
            padding-left: 1.5rem;
        }

        .sidebar-item.active {
            background: rgba(255, 255, 255, 0.2);
            padding-left: 1.5rem;
            font-weight: 600;
        }

        .stat-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
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
            background: radial-gradient(circle, rgba(255, 255, 255, 0.2) 0%, transparent 70%);
            opacity: 0;
            transition: opacity 0.3s ease;
        }

        .stat-card:hover::before {
            opacity: 1;
            animation: rotate 3s linear infinite;
        }

        .stat-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        @keyframes rotate {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .badge-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        @keyframes pulse {

            0%,
            100% {
                opacity: 1;
            }

            50% {
                opacity: 0.7;
            }
        }

        .chart-container {
            position: relative;
            height: 300px;
        }

        .activity-item {
            transition: all 0.3s ease;
        }

        .activity-item:hover {
            background: #f3f4f6;
            transform: translateX(5px);
        }

        .mobile-menu {
            transform: translateX(-100%);
            transition: transform 0.3s ease;
        }

        .mobile-menu.active {
            transform: translateX(0);
        }

        .quick-action {
            transition: all 0.3s ease;
        }

        .quick-action:hover {
            transform: scale(1.05);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
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

        @keyframes fadeInDown {
            0% {
                opacity: 0;
                transform: translateY(-20px);
            }

            100% {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animated.fadeInDown {
            animation: fadeInDown 0.5s ease;
        }
    </style>
    @stack('styles')
</head>

<body class="bg-gray-100 min-h-screen">

    <div class="flex h-screen overflow-hidden" x-data="{ sidebarOpen: false, activeMenu: 'dashboard' }">

        {{-- Sidebar --}}
        @include('admin.layouts.sidebar')

        {{-- Main content --}}
        <div class="flex-1 flex flex-col overflow-hidden">
            <header class="bg-white shadow-sm border-b border-gray-200">
                <div class="flex items-center justify-between px-6 py-4">
                    <!-- Tombol toggle sidebar mobile -->
                    <button @click="sidebarOpen = true" class="lg:hidden text-gray-600 hover:text-gray-900">
                        <i class="fas fa-bars text-2xl"></i>
                    </button>

                    <!-- Judul & subtitle -->
                    <div>
                        <h2
                            class="text-2xl font-bold bg-gradient-to-r from-blue-400 to-blue-700 text-transparent bg-clip-text">
                            @yield('header-title', 'Dashboard')
                        </h2>
                    </div>

                    <!-- Akun & notifikasi -->
                    <div class="flex items-center space-x-4">
                        <!-- Notifikasi -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open"
                                class="relative p-2 text-gray-600 hover:text-gray-900 hover:bg-gray-100 rounded-lg transition">
                                <i class="fas fa-bell text-xl"></i>
                                <span id="notifDot"
                                    class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full {{ $notifikasiCount == 0 ? 'hidden' : '' }}"></span>
                            </button>

                            <!-- Dropdown notifikasi -->
                            <div x-show="open" @click.away="open = false"
                                x-transition:enter="transition ease-out duration-200"
                                x-transition:enter-start="opacity-0 transform scale-95"
                                x-transition:enter-end="opacity-100 transform scale-100"
                                x-transition:leave="transition ease-in duration-150"
                                x-transition:leave-start="opacity-100 transform scale-100"
                                x-transition:leave-end="opacity-0 transform scale-95"
                                class="absolute right-0 mt-2 w-64 bg-white shadow-lg rounded-lg z-50 overflow-hidden max-h-80 overflow-y-auto">

                                <div id="notifList"
                                    class="divide-y divide-gray-200 scrollbar-thin scrollbar-thumb-gray-400 scrollbar-track-gray-100">
                                    @if($notifikasiCount == 0)
                                        <div class="flex flex-col items-center justify-center p-4 text-sm text-gray-500">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mb-2 text-gray-400"
                                                fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                                    d="M9 12h6m2 0a9 9 0 11-18 0 9 9 0 0118 0z" />
                                            </svg>
                                            Tidak ada notifikasi
                                        </div>
                                    @else
                                        <div class="p-2 text-gray-700 divide-y divide-gray-200 max-h-80 overflow-y-auto">
                                            @foreach($notifikasiData as $notif)
                                                <div
                                                    class="flex items-start p-2 mb-1 rounded-md shadow-sm hover:shadow-md transition cursor-pointer bg-gradient-to-r from-blue-50 to-blue-100 border-l-4 border-blue-500">
                                                    <div class="flex-shrink-0 mr-2 mt-0.5">
                                                        <i class="fas fa-info-circle text-blue-500"></i>
                                                    </div>
                                                    <div class="flex-1">
                                                        <p class="text-xs font-medium text-blue-700">{{ $notif->message }}</p>
                                                        <span class="text-[10px] text-blue-500">
                                                            {{ \Carbon\Carbon::parse($notif->created_at)->format('d M Y H:i') }}
                                                        </span>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Profile / akun -->
                        <div x-data="{ open: false }" class="relative">
                            <button @click="open = !open" class="flex items-center space-x-2 focus:outline-none">
                                <div
                                    class="w-10 h-10 bg-blue-600 rounded-full flex items-center justify-center text-white font-bold">
                                    {{ strtoupper(substr($adminName, 0, 1)) }}
                                </div>
                                <div class="hidden sm:block">
                                    <p class="text-sm font-semibold text-gray-800">{{ $adminUsername }}</p>
                                    <p class="text-xs text-gray-500">Super Admin</p>
                                </div>
                                <i class="fas fa-chevron-down text-gray-500"></i>
                            </button>

                            <!-- Dropdown akun -->
                            <div x-show="open" @click.away="open = false" x-transition
                                class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-lg border border-gray-200 z-50">
                                <a href="{{ route('admin.profil') }}"
                                    class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    Profil
                                </a>
                                <form action="{{ route('admin.logout') }}" method="POST">
                                    @csrf
                                    <button type="submit"
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Logout</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </header>

            <main class="flex-1 overflow-y-auto p-6 bg-gray-100">
                @yield('content')
            </main>
        </div>
    </div>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @stack('scripts')
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('notifications', () => ({
                init() {
                    const notifList = document.getElementById('notifList');
                    const notifDot = document.getElementById('notifDot');

                    fetch('/admin/notifications')
                        .then(res => res.json())
                        .then(data => {
                            if (data.length === 0) {
                                notifList.innerHTML = '<div class="p-2 text-sm text-gray-500 text-center">Tidak ada notifikasi</div>';
                                return;
                            }
                            notifList.innerHTML = data.map(n => `
                                <div class="p-2 hover:bg-gray-100 transition">
                                    <p class="text-sm text-gray-700">${n.message}</p>
                                    <span class="text-xs text-gray-400">${new Date(n.created_at).toLocaleString()}</span>
                                </div>
                            `).join('');
                            if (data.length > 0) {
                                notifDot.classList.remove('hidden');
                            }
                        });
                }
            }));
        });
    </script>

    @if (session('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                background: 'rgba(255, 255, 255, 0.9)',
                color: '#111827',
                customClass: {
                    popup: 'animated fadeInDown shadow-lg rounded-lg backdrop-blur-md',
                },
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: 'success',
                title: '{{ session('success') }}',
                iconColor: '#10b981', // hijau lembut
            });
        </script>
    @endif


</body>

</html>