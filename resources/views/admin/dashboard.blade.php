@extends('admin.layouts.app')

@section('title', 'Dashboard Admin')

@section('content')
    <div class="p-6">

        <!-- Header Selamat Datang -->
        <div
            class="relative bg-gradient-to-r from-blue-600 to-indigo-600 text-white rounded-2xl shadow-lg p-6 overflow-hidden flex items-center justify-between">
            <!-- Gelembung dekoratif -->
            <div class="absolute -top-10 -left-6 w-24 h-24 bg-white/10 rounded-full animate-bounce-slow"></div>

            <!-- Konten utama -->
            <div class="relative z-10 flex items-center space-x-4">
                <i class="fas fa-user-circle text-6xl opacity-40"></i>
                <div>
                    <h1 class="text-2xl font-bold">Selamat datang, {{ session('admin_name') }}!</h1>
                    <p class="text-blue-200 mt-1">Dashboard Admin - Kelola Lomba & Peserta</p>
                </div>
            </div>

            <!-- Gambar dekoratif di samping avatar -->
            <img src="{{ asset('assets/img/admin_header.png') }}" alt="Dekorasi"
                class="absolute right-4 w-40 opacity-90 pointer-events-none z-0 filter brightness-125 drop-shadow-lg">
        </div>



        <!-- Shortcut Action Cepat -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4 mt-6">
            <a href="{{ route('lomba.create') }}"
                class="bg-gradient-to-r from-purple-500 to-indigo-500 text-white p-6 rounded-xl shadow hover:shadow-2xl flex items-center justify-center space-x-3 transition transform hover:-translate-y-1">
                <i class="fas fa-plus text-2xl"></i>
                <span class="font-semibold">Tambah Lomba</span>
            </a>
            <a href="{{ route('kelas.create') }}"
                class="bg-gradient-to-r from-green-500 to-teal-500 text-white p-6 rounded-xl shadow hover:shadow-2xl flex items-center justify-center space-x-3 transition transform hover:-translate-y-1">
                <i class="fas fa-plus text-2xl"></i>
                <span class="font-semibold">Tambah Kelas</span>
            </a>
            <a href="{{ route('pendaftaran.index') }}"
                class="bg-gradient-to-r from-yellow-400 to-orange-500 text-white p-6 rounded-xl shadow hover:shadow-2xl flex items-center justify-center space-x-3 transition transform hover:-translate-y-1">
                <i class="fas fa-users text-2xl"></i>
                <span class="font-semibold">Daftar Peserta</span>
            </a>
        </div>

        <!-- Statistik Singkat -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 mt-6">
            @foreach($stats as $stat)
                <div class="relative rounded-2xl shadow-lg p-6 transition transform hover:-translate-y-2 hover:shadow-2xl"
                    style="background: linear-gradient(135deg, {{ $stat['color_from'] }}, {{ $stat['color_to'] }});">
                    <div class="absolute top-4 right-4 w-16 h-16 flex items-center justify-center rounded-full bg-white/20">
                        <i class="{{ $stat['icon'] }} text-2xl text-white"></i>
                    </div>
                    <div>
                        <h3 class="text-sm font-semibold text-white/80">{{ $stat['title'] }}</h3>
                        <p class="text-3xl font-bold text-white mt-1">{{ $stat['value'] }}</p>
                        <span
                            class="mt-2 inline-block text-xs font-medium bg-white/20 px-2 py-1 rounded-full text-white">{{ $stat['growth'] }}</span>
                    </div>
                    <div class="absolute -bottom-6 -right-6 w-24 h-24 rounded-full bg-white/10"></div>
                </div>
            @endforeach
        </div>

        <!-- Chart -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mt-6">
            <!-- Bar Chart: Peserta Per Lomba -->
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition duration-300">
                <h3 class="text-md font-semibold text-gray-700 mb-1">Peserta Terdaftar Per Lomba</h3>
                <p class="text-xs text-gray-500 mb-2">Menampilkan jumlah peserta yang mendaftar untuk setiap lomba saat ini.
                </p>
                </p>
                <div class="relative w-full h-64">
                    <canvas id="pesertaChart" class="absolute top-0 left-0 w-full h-full"></canvas>
                </div>
            </div>

            <!-- Line Chart: Peserta Terverifikasi Per Kelas -->
            <div class="bg-white rounded-2xl shadow-lg p-6 hover:shadow-2xl transition duration-300">
                <h3 class="text-md font-semibold text-gray-700 mb-1">Tim Terverifikasi Per Kelas</h3>
                <p class="text-xs text-gray-500 mb-4">Menampilkan jumlah tim yang sudah diverifikasi untuk masing-masing
                    kelas.</p>
                <div class="relative w-full h-64">
                    <canvas id="terverifikasiChart" class="absolute top-0 left-0 w-full h-full"></canvas>
                </div>
            </div>
        </div>

        <!-- Lomba & Peserta Terbaru -->
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">

            <!-- Lomba Terbaru -->
            <div class="bg-white rounded-2xl shadow-lg p-4 hover:shadow-xl transition transform hover:-translate-y-0.5">
                <h3 class="flex items-center text-gray-700 mb-3 text-sm">
                    <i class="fas fa-trophy text-yellow-400 text-base mr-2"></i>
                    <div>
                        <span class="font-semibold text-sm">Lomba Terbaru</span><br>
                        <span class="text-xs text-gray-400">Menampilkan lomba yang baru saja ditambahkan</span>
                    </div>
                </h3>
                <ul class="space-y-3">
                    @forelse($lombaTerbaru as $lomba)
                        <li
                            class="flex items-center justify-between p-3 bg-gradient-to-r from-blue-50 to-blue-100 rounded-xl hover:shadow-md transition transform hover:-translate-y-0.5">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="bg-blue-500 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-md text-xl">
                                    <i class="fas fa-trophy"></i>
                                </div>
                                <div>
                                    <p class="text-gray-800 font-semibold text-base">{{ $lomba->nama_lomba }}</p>
                                    <p class="text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($lomba->tanggal_mulai)->translatedFormat('d F Y') }}
                                    </p>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-white bg-blue-500 px-2 py-0.5 rounded-full shadow-sm">
                                {{ \Carbon\Carbon::parse($lomba->tanggal_mulai)->locale('id')->diffForHumans() }}
                            </span>
                        </li>
                    @empty
                        <li class="text-center py-8">
                            <img src="{{ asset('assets/img/data_kosong.svg') }}" alt="Belum ada lomba"
                                class="mx-auto w-32 h-auto mb-4">
                            <p class="text-gray-500 font-medium">Belum ada lomba terbaru.</p>
                            <p class="text-sm text-gray-400">Silakan tambahkan lomba baru untuk ditampilkan di sini.</p>
                        </li>
                    @endforelse
                </ul>
            </div>


            <!-- Peserta Terverifikasi Terbaru -->
            <div class="bg-white rounded-2xl shadow-lg p-4 hover:shadow-xl transition transform hover:-translate-y-0.5">
                <h3 class="flex items-center text-gray-700 mb-3 text-sm">
                    <i class="fas fa-user-check text-pink-400 text-base mr-2"></i>
                    <div>
                        <span class="font-semibold text-sm">Peserta Terverifikasi Terbaru</span><br>
                        <span class="text-xs text-gray-400">Menampilkan peserta yang baru saja diverifikasi</span>
                    </div>
                </h3>
                <ul class="space-y-3">
                    @forelse($pesertaTerverifikasi as $peserta)
                        <li
                            class="flex items-center justify-between p-3 bg-gradient-to-r from-pink-50 to-pink-100 rounded-xl hover:shadow-md transition transform hover:-translate-y-0.5">
                            <div class="flex items-center space-x-3">
                                <div
                                    class="bg-pink-500 text-white w-12 h-12 flex items-center justify-center rounded-full shadow-md text-xl">
                                    <i class="fas fa-user-check"></i>
                                </div>
                                <div>
                                    <p class="text-gray-800 font-semibold text-base">{{ $peserta->nama_peserta }}</p>
                                    <p class="text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($peserta->tanggal_daftar)->translatedFormat('d F Y') }}
                                    </p>
                                </div>
                            </div>
                            <span class="text-xs font-bold text-white bg-pink-500 px-2 py-0.5 rounded-full shadow-sm">
                                Diverifikasi {{ \Carbon\Carbon::parse($peserta->updated_at)->locale('id')->diffForHumans() }}
                            </span>
                        </li>
                    @empty
                        <li class="text-center py-8">
                            <img src="{{ asset('assets/img/users.svg') }}" alt="Belum ada peserta terverifikasi"
                                class="mx-auto w-32 h-auto mb-4">
                            <p class="text-gray-500 font-medium">Belum ada peserta terverifikasi.</p>
                            <p class="text-sm text-gray-400">Silakan verifikasi peserta untuk menampilkan di sini.</p>
                        </li>
                    @endforelse
                </ul>
            </div>

        </div>

    </div>

    <!-- Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        function createGradient(ctx, colorStart, colorEnd) {
            const gradient = ctx.createLinearGradient(0, 0, 0, ctx.canvas.height);
            gradient.addColorStop(0, colorStart);
            gradient.addColorStop(1, colorEnd);
            return gradient;
        }

        // Bar Chart: Peserta Per Lomba
        const ctxPeserta = document.getElementById('pesertaChart').getContext('2d');
        const labelsPeserta = {!! json_encode($pesertaPerLomba->pluck('nama_lomba')) !!};
        const dataPeserta = {!! json_encode($pesertaPerLomba->pluck('total_peserta')) !!};

        new Chart(ctxPeserta, {
            type: 'bar',
            data: {
                labels: labelsPeserta, datasets: [{
                    label: 'Peserta Terdaftar',
                    data: dataPeserta,
                    backgroundColor: createGradient(ctxPeserta, 'rgba(59,130,246,0.8)', 'rgba(59,130,246,0.2)'),
                    borderColor: '#3b82f6',
                    borderWidth: 1,
                    borderRadius: 12
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false }, tooltip: { backgroundColor: '#3b82f6', titleColor: '#fff', bodyColor: '#fff', padding: 12, cornerRadius: 8 } },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#4b5563',
                            font: { weight: '600' },
                            stepSize: 1, // angka naik per 1
                            callback: function (value) { return value.toFixed(1); } // tetap pakai desimal
                        },
                        grid: { color: 'rgba(0,0,0,0.1)', borderDash: [5, 5] }
                    },
                    x: { ticks: { color: '#4b5563', font: { weight: '600' } }, grid: { display: false } }
                }
            }
        });

        // Line Chart: Peserta Terverifikasi Per Kelas
        const ctxTerverifikasi = document.getElementById('terverifikasiChart').getContext('2d');
        const labelsTerverifikasi = {!! json_encode($terverifikasiPerKelas->pluck('nama_kelas')) !!};
        const dataTerverifikasi = {!! json_encode($terverifikasiPerKelas->pluck('total_peserta')) !!};

        new Chart(ctxTerverifikasi, {
            type: 'line',
            data: {
                labels: labelsTerverifikasi, datasets: [{
                    label: 'Jumlah Peserta Terverifikasi',
                    data: dataTerverifikasi,
                    backgroundColor: createGradient(ctxTerverifikasi, 'rgba(236,72,153,0.6)', 'rgba(236,72,153,0.1)'),
                    borderColor: '#ec4899', borderWidth: 3, tension: 0.4, fill: true,
                    pointRadius: 6, pointHoverRadius: 8, pointBackgroundColor: '#fff', pointBorderColor: '#ec4899', pointBorderWidth: 3
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: { legend: { display: false }, tooltip: { backgroundColor: '#ec4899', titleColor: '#fff', bodyColor: '#fff', padding: 12, cornerRadius: 10 } },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            color: '#4b5563',
                            font: { weight: '600' },
                            stepSize: 1, // angka naik per 1
                            callback: function (value) { return value.toFixed(1); } // desimal
                        },
                        grid: { color: 'rgba(0,0,0,0.1)', borderDash: [5, 5] }
                    },
                    x: { ticks: { color: '#4b5563', font: { weight: '600' } }, grid: { display: false } }
                }
            }
        });
    </script>

@endsection