<!-- Sidebar (desktop + mobile toggle) -->
<aside :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-50 w-72 bg-gradient-to-b from-blue-700 to-blue-900 text-white transform lg:transform-none lg:relative lg:translate-x-0 transition-transform duration-300">

    <!-- Header / Logo -->
    <div class="flex items-center justify-center h-20 border-b border-white/20 px-6">
        <div class="flex items-center space-x-3">
            <div class="w-12 h-12 bg-white rounded-xl flex items-center justify-center overflow-hidden">
                <img src="{{ asset('assets/img/logo_utama.png') }}" alt="Logo LOMBAPIKR"
                    class="w-10 h-10 object-contain">
            </div>
            <div>
                <h1 class="font-bold text-xl">LOMBAPIKR</h1>
                <p class="text-xs text-white/70">Admin Dashboard</p>
            </div>
        </div>
    </div>

    <!-- Menu -->
    <nav class="flex-1 px-3 py-4 space-y-2 overflow-y-auto">

        <!-- Menu Utama -->
        <div class="mb-1 px-3">
            <span class="text-[10px] text-white/70 uppercase block mb-1">Menu Utama</span>
            <hr class="border-white/30">
        </div>

        <a href="{{ route('dashboard') }}" 
           class="flex items-center px-3 py-2 rounded-lg sidebar-item group text-sm
           {{ request()->routeIs('dashboard') ? 'bg-blue-900' : '' }}">
            <i class="fas fa-tachometer-alt mr-2 text-base w-5 text-center"></i>
            <span class="font-medium text-sm">Dashboard</span>
        </a>

        <!-- Manajemen Data -->
        <div class="mb-1 px-3">
            <span class="text-[10px] text-white/70 uppercase block mb-1">Manajemen Data</span>
            <hr class="border-white/30">
        </div>

        <a href="{{ route('pendaftaran.index') }}" 
           class="flex items-center px-3 py-2 rounded-lg sidebar-item group text-sm
           {{ request()->routeIs('pendaftaran.*') ? 'bg-blue-900' : '' }}">
            <i class="fas fa-users mr-2 text-base w-5 text-center"></i>
            <span class="font-medium text-sm"> Validasi Data Peserta</span>
        </a>

        <a href="{{ route('kelas.index') }}" 
           class="flex items-center px-3 py-2 rounded-lg sidebar-item group text-sm
           {{ request()->routeIs('kelas.*') ? 'bg-blue-900' : '' }}">
            <i class="fas fa-school mr-2 text-base w-5 text-center"></i>
            <span class="font-medium text-sm">Kelas</span>
        </a>

        <a href="{{ route('lomba.index') }}" 
           class="flex items-center px-3 py-2 rounded-lg sidebar-item group text-sm
           {{ request()->routeIs('lomba.*') ? 'bg-blue-900' : '' }}">
            <i class="fas fa-trophy mr-2 text-base w-5 text-center"></i>
            <span class="font-medium text-sm">Lomba</span>
        </a>

        <a href="{{ route('tahapan.index') }}" 
           class="flex items-center px-3 py-2 rounded-lg sidebar-item group text-sm
           {{ request()->routeIs('tahapan.*') ? 'bg-blue-900' : '' }}">
            <i class="fas fa-timeline mr-2 text-base w-5 text-center"></i>
            <span class="font-medium text-sm">Tahapan</span>
        </a>

        <!-- Manajemen Set Waktu -->
        <div class="mb-1 px-3">
            <span class="text-[10px] text-white/70 uppercase block mb-1">Manajemen Set Waktu</span>
            <hr class="border-white/30">
        </div>

        <a href="{{ route('timeline.index') }}" 
           class="flex items-center px-3 py-2 rounded-lg sidebar-item group text-sm
           {{ request()->routeIs('timeline.*') ? 'bg-blue-900' : '' }}">
            <i class="fas fa-calendar-alt mr-2 text-base w-5 text-center"></i>
            <span class="font-medium text-sm">Timeline Lomba</span>
        </a>

        <a href="{{ route('admin.setting.index') }}" 
           class="flex items-center px-3 py-2 rounded-lg sidebar-item group text-sm
           {{ request()->routeIs('admin.setting.*') ? 'bg-blue-900' : '' }}">
            <i class="fas fa-cog mr-2 text-base w-5 text-center"></i>
            <span class="font-medium text-sm">Setting</span>
        </a>

        <!-- Lainnya -->
        <div class="mt-4 mb-1 px-3">
            <span class="text-[10px] text-white/70 uppercase block mb-1">Lainnya</span>
            <hr class="border-white/30">
        </div>

        <a href="#" class="flex items-center px-3 py-2 rounded-lg sidebar-item group text-sm">
            <i class="fas fa-cogs mr-2 text-base w-5 text-center"></i>
            <span class="font-medium text-sm">Pengaturan</span>
        </a>

        <a href="#" class="flex items-center px-3 py-2 rounded-lg sidebar-item group text-sm">
            <i class="fas fa-question-circle mr-2 text-base w-5 text-center"></i>
            <span class="font-medium text-sm">Bantuan</span>
        </a>

    </nav>

    <!-- Logout -->
    <div class="p-4 border-t border-white/20">
        <form action="{{ route('admin.logout') }}" method="POST">
            @csrf
            <button class="w-full flex items-center justify-center bg-red-500 hover:bg-red-600 px-4 py-3 rounded-xl font-semibold transition shadow-lg hover:shadow-xl">
                <i class="fas fa-sign-out-alt mr-2"></i> Logout
            </button>
        </form>
    </div>
</aside>

<!-- Overlay untuk mobile -->
<div x-show="sidebarOpen" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-50 z-40 lg:hidden"
    @click="sidebarOpen = false"></div>
