<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOMBAPIKR.id - Lomba Pusat Informasi dan Konseling Remaja </title>
    <link rel="shortcut icon" href="assets/img/logo_1.png" type="image/png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700;800&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="https://unpkg.com/aos@2.3.1/dist/aos.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }

        /* [BARU] Ini untuk efek glassmorphism di navbar */
        .navbar-glass {
            background-color: rgba(255, 255, 255, 0.85);
            /* Background putih transparan */
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            /* Support untuk Safari */
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
    </style>
</head>

<body class="bg-gray-100">

    <nav class="fixed top-0 left-0 right-0 z-50 navbar-glass shadow-lg" x-data="{
    open: false,
    active: 'beranda',
    sections: ['beranda','kategori','tahapan'],
    init() {
        // Hanya jalankan 'event listener' scroll jika kita ada di halaman utama
        if (window.location.pathname === '/') {
            window.addEventListener('scroll', () => {
                let scrollPos = window.scrollY + 100;
                for (let id of this.sections) {
                    let el = document.getElementById(id);
                    if (el && scrollPos >= el.offsetTop && scrollPos < el.offsetTop + el.offsetHeight) {
                        this.active = id;
                    }
                }
            });
        }
    }
}">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-20">
                <!-- Logo -->
                <div class="flex items-center space-x-2">
                    <img src="{{ asset('assets/img/sma.png') }}" class="h-12 md:h-14 w-auto" alt="SMA Logo">
                    <img src="{{ asset('assets/img/logo_1.png') }}" class="h-8 md:h-10 w-auto" alt="PIK-R Logo">
                    <img src="{{ asset('assets/img/logo_utama.png') }}" class="h-12 md:h-14 w-auto" alt="Logo Utama">
                </div>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-6">
                    <a href="{{ request()->is('/') ? '#beranda' : '/' }}" @if(request()->is('/'))
                        @click.prevent="active = 'beranda'; document.querySelector('#beranda').scrollIntoView({behavior:'smooth'})"
                    @endif
                        class="relative flex items-center gap-2 text-gray-700 hover:text-blue-600 font-medium transition duration-300 text-base">
                        <i class="fas fa-home text-base"></i> Beranda
                        <span
                            class="absolute -bottom-1 left-0 h-0.5 rounded-full transition-all duration-500 ease-in-out"
                            :class="active === 'beranda' ? 'w-full bg-blue-600 opacity-100' : 'w-0 bg-blue-400 opacity-0'"></span>
                    </a>

                    <a href="{{ request()->is('/') ? '#kategori' : '/#kategori' }}" @if(request()->is('/'))
                        @click.prevent="active = 'kategori'; document.querySelector('#kategori').scrollIntoView({behavior:'smooth'})"
                    @endif
                        class="relative flex items-center gap-2 text-gray-700 hover:text-blue-600 font-medium transition duration-300 text-base">
                        <i class="fas fa-trophy text-base"></i> Kategori
                        <span
                            class="absolute -bottom-1 left-0 h-0.5 rounded-full transition-all duration-500 ease-in-out"
                            :class="active === 'kategori' ? 'w-full bg-blue-600 opacity-100' : 'w-0 bg-blue-400 opacity-0'"></span>
                    </a>

                    <a href="{{ route('public.statistik') }}"
                        class="relative flex items-center gap-2 font-medium transition duration-300 text-base
                   {{ request()->routeIs('public.statistik') ? 'text-blue-600' : 'text-gray-700 hover:text-blue-600' }}">
                        <i class="fas fa-chart-bar text-base"></i> Statistik
                        <span
                            class="absolute -bottom-1 left-0 h-0.5 rounded-full transition-all duration-500 ease-in-out
                          {{ request()->routeIs('public.statistik') ? 'w-full bg-blue-600 opacity-100' : 'w-0 opacity-0' }}"></span>
                    </a>

                    <a href="{{ request()->is('/') ? '#tahapan' : '/#tahapan' }}" @if(request()->is('/'))
                        @click.prevent="active = 'tahapan'; document.querySelector('#tahapan').scrollIntoView({behavior:'smooth'})"
                    @endif
                        class="relative flex items-center gap-2 text-gray-700 hover:text-blue-600 font-medium transition duration-300 text-base">
                        <i class="fas fa-list-ol text-base"></i> Tahapan
                        <span
                            class="absolute -bottom-1 left-0 h-0.5 rounded-full transition-all duration-500 ease-in-out"
                            :class="active === 'tahapan' ? 'w-full bg-blue-600 opacity-100' : 'w-0 bg-blue-400 opacity-0'"></span>
                    </a>

                    <a href="{{ route('admin.login') }}"
                        class="flex items-center gap-2 bg-blue-600 text-white px-5 py-2.5 rounded-full font-semibold shadow-lg hover:shadow-xl transform hover:scale-105 transition duration-300 text-base">
                        <i class="fas fa-arrow-right-to-bracket text-base"></i> MASUK
                    </a>
                </div>

                <!-- Mobile Toggle Button -->
                <button @click="open = !open" class="md:hidden text-gray-700 focus:outline-none mr-4">
                    <i :class="open ? 'fas fa-times text-2xl' : 'fas fa-bars text-2xl'"></i>
                </button>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div x-ref="menu" x-bind:style="open ? 'height: ' + $refs.menu.scrollHeight + 'px' : 'height: 0'"
            class="md:hidden overflow-hidden transition-all duration-500 ease-in-out bg-white border-t border-gray-100">
            <div class="px-4 py-4 space-y-3">
                <a href="{{ request()->is('/') ? '#beranda' : '/' }}" @if(request()->is('/'))
                    @click.prevent="open = false; active = 'beranda'; document.querySelector('#beranda').scrollIntoView({behavior:'smooth'})"
                @else @click="open = false" @endif
                    class="relative flex items-center gap-2 px-4 py-3 rounded-lg hover:bg-blue-50 text-gray-700 font-medium transition"
                    :class="active === 'beranda' ? 'border-l-4 border-blue-600 pl-3' : ''">
                    <i class="fas fa-home"></i> Beranda
                </a>

                <a href="{{ request()->is('/') ? '#kategori' : '/#kategori' }}" @if(request()->is('/'))
                    @click.prevent="open = false; active = 'kategori'; document.querySelector('#kategori').scrollIntoView({behavior:'smooth'})"
                @else @click="open = false" @endif
                    class="relative flex items-center gap-2 px-4 py-3 rounded-lg hover:bg-blue-50 text-gray-700 font-medium transition"
                    :class="active === 'kategori' ? 'border-l-4 border-blue-600 pl-3' : ''">
                    <i class="fas fa-trophy"></i> Kategori
                </a>

                <a href="{{ route('public.statistik') }}" @click="open = false"
                    class="relative flex items-center gap-2 px-4 py-3 rounded-lg hover:bg-blue-50 font-medium transition
               {{ request()->routeIs('public.statistik') ? 'text-blue-600 border-l-4 border-blue-600 pl-3' : 'text-gray-700' }}">
                    <i class="fas fa-chart-bar"></i> Statistik
                </a>

                <a href="{{ request()->is('/') ? '#tahapan' : '/#tahapan' }}" @if(request()->is('/'))
                    @click.prevent="open = false; active = 'tahapan'; document.querySelector('#tahapan').scrollIntoView({behavior:'smooth'})"
                @else @click="open = false" @endif
                    class="relative flex items-center gap-2 px-4 py-3 rounded-lg hover:bg-blue-50 text-gray-700 font-medium transition"
                    :class="active === 'tahapan' ? 'border-l-4 border-blue-600 pl-3' : ''">
                    <i class="fas fa-list-ol"></i> Tahapan
                </a>

                <a href="{{ route('admin.login') }}" @click="open = false"
                    class="flex items-center gap-2 justify-center text-center bg-gradient-to-r from-blue-600 to-blue-700 text-white px-6 py-3 rounded-lg font-semibold shadow-lg hover:scale-105 transition-transform duration-200">
                    <i class="fas fa-arrow-right-to-bracket"></i> MASUK
                </a>
            </div>
        </div>
    </nav>

    <main class="pt-20">
        <div class="py-12">
            <div class="container mx-auto px-4">

                <div class="text-center mb-8" data-aos="fade-down">
                    <h1 class="text-2xl md:text-3xl font-bold text-gray-800">
                        <i class="fas fa-chart-line mr-1 text-blue-500"></i>
                        Dashboard Statistik
                    </h1>
                    <p class="text-sm md:text-base text-gray-600 mt-1">
                        Pantau perkembangan kompetisi dengan data real-time dan visualisasi yang interaktif.
                    </p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-10">

                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-between transition transform hover:-translate-y-1.5 hover:shadow-xl "
                        data-aos="fade-up" data-aos-delay="100">
                        <div>
                            <span class="text-sm font-medium text-gray-500">Total Tim</span>
                            <p class="text-3xl font-bold text-gray-800">{{ $totalTim }}</p>
                        </div>
                        <div class="text-blue-500 bg-blue-100 p-3 rounded-full">
                            <i class="fas fa-users text-2xl"></i>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-between transition transform hover:-translate-y-1.5 hover:shadow-xl "
                        data-aos="fade-up" data-aos-delay="150">
                        <div>
                            <span class="text-sm font-medium text-gray-500">Total Lomba Tersedia</span>
                            <p class="text-3xl font-bold text-gray-800">{{ $totalLomba }}</p>
                        </div>
                        <div class="text-indigo-500 bg-indigo-100 p-3 rounded-full">
                            <i class="fas fa-trophy text-2xl"></i>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-between transition transform hover:-translate-y-1.5 hover:shadow-xl "
                        data-aos="fade-up" data-aos-delay="300">
                        <div>
                            <span class="text-sm font-medium text-gray-500">Tim Terverifikasi</span>
                            <p class="text-3xl font-bold text-gray-800">{{ $timTerverifikasi }}</p>
                        </div>
                        <div class="text-yellow-500 bg-yellow-100 p-3 rounded-full">
                            <i class="fas fa-trophy text-2xl"></i>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-lg shadow-lg flex items-center justify-between transition transform hover:-translate-y-1.5 hover:shadow-xl "
                        data-aos="fade-up" data-aos-delay="400">
                        <div>
                            <span class="text-sm font-medium text-gray-500">Institusi Aktif</span>
                            <p class="text-3xl font-bold text-gray-800">{{ $institusiAktif }}</p>
                        </div>
                        <div class="text-purple-500 bg-purple-100 p-3 rounded-full">
                            <i class="fas fa-building text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <!-- Top Institusi -->
                    <div class="bg-white p-4 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="500">
                        <div class="flex items-center justify-between mb-3">
                            <div>
                                <h3 class="text-lg font-semibold text-gray-700">Top Institusi</h3>
                                <p class="text-xs text-gray-500">Institusi dengan partisipasi terbanyak</p>
                            </div>
                            <a href="#" onclick="openModal('modalTopInstitusi')"
                                class="bg-blue-500 text-white px-3 py-1 rounded-lg text-xs font-semibold hover:bg-orange-600 transition">
                                Detail
                            </a>
                        </div>

                        <div class="h-64 relative">
                            <canvas id="chartInstitusi"></canvas>
                        </div>
                    </div>

                    <!-- Total Lomba -->
                    <div class="bg-white p-4 rounded-lg shadow-lg flex flex-col items-center justify-center text-center"
                        data-aos="fade-up" data-aos-delay="600">
                        <div class="mb-3">
                            <h3 class="text-lg font-semibold text-gray-700">Partisipasi Lomba Saat Ini</h3>
                            <p class="text-xs text-gray-500">Lomba dengan Peserta Terdaftar</p>
                        </div>

                        <div class="flex justify-center w-full h-64">
                            <canvas id="chartTotalLomba" class="w-48 h-48"></canvas>
                        </div>
                    </div>

                    <!-- Tim Terverifikasi per Lomba -->
                    <div class="bg-white p-4 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="700">
                        <div class="mb-3">
                            <h3 class="text-lg font-semibold text-gray-700">Tim Terverifikasi</h3>
                            <p class="text-xs text-gray-500">Jumlah tim yang diterima per lomba beserta kelas</p>
                        </div>

                        <div class="h-64 relative">
                            <canvas id="chartTimTerverifikasi"></canvas>
                        </div>
                    </div>

                    <div class="bg-white p-4 rounded-lg shadow-lg" data-aos="fade-up" data-aos-delay="700">
                        <div class="mb-3">
                            <h3 class="text-lg font-semibold text-gray-700">Total Tim</h3>
                            <p class="text-xs text-gray-500">Jumlah seluruh tim yang terdaftar saat ini</p>
                        </div>

                        <div class="h-64 relative">
                            <canvas id="chartTotalTim"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div id="modalTopInstitusi"
            class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center hidden z-50 p-4 transition-all duration-300 ease-out opacity-0 scale-95">

            <!-- Konten modal -->
            <div id="modalContentInstitusi"
                class="bg-white w-full max-w-4xl max-h-[85vh] rounded-xl shadow-2xl flex flex-col overflow-hidden transform transition-all duration-300 ease-out scale-95 opacity-0">

                <!-- Header -->
                <div class="flex justify-between items-center border-b border-gray-200 p-4 bg-gray-50 flex-shrink-0">
                    <h3 class="text-lg font-semibold text-gray-800">Detail Partisi Institusi</h3>
                    <button onclick="closeModal('modalTopInstitusi')"
                        class="text-gray-500 hover:text-gray-700 text-2xl font-bold leading-none">&times;</button>
                </div>

                <!-- Input Cari -->
                <div class="p-4 border-b border-gray-100">
                    <input type="text" id="searchInstitusi" placeholder="Cari berdasarkan nama Institusi"
                        class="border border-blue-300 rounded-md px-3 py-2 focus:ring-2 focus:ring-blue-400 focus:outline-none text-sm placeholder-gray-400 w-64">
                </div>

                <!-- Konten scrollable -->
                <div class="p-6 overflow-y-auto flex-1">
                    <table class="w-full text-sm border-collapse">
                        <thead class="bg-gray-100 sticky top-0 z-10">
                            <tr class="text-left text-gray-700 font-semibold">
                                <th class="py-3 px-4 border-b">Kelas Terdaftar</th>
                                <th class="py-3 px-4 border-b text-center">Tim Terverifikasi</th>
                                <th class="py-3 px-4 border-b text-center">Tim Belum Terverifikasi</th>
                                <th class="py-3 px-4 border-b text-center">Total Tim</th>
                            </tr>
                        </thead>

                        <tbody id="tableInstitusi" class="text-gray-800">
                            @forelse($topInstitusi as $institusi)
                                @php
                                    $pendaftaranInstitusi = $pendaftaran->filter(function ($p) use ($institusi) {
                                        return strtolower(trim(optional(optional($p->peserta)->kelas)->nama_kelas ?? '')) ===
                                            strtolower(trim($institusi->nama_institusi ?? ''));
                                    });
                                    $verified = $pendaftaranInstitusi->where('status', 'diterima')->count();
                                    $unverified = $pendaftaranInstitusi->where('status', '!=', 'diterima')->count();
                                    $total = $pendaftaranInstitusi->count();
                                @endphp

                                <tr class="hover:bg-gray-50 transition">
                                    <td class="py-2 px-4 border-b">{{ $institusi->nama_institusi ?? '-' }}</td>
                                    <td class="py-2 px-4 border-b text-center text-green-600 font-semibold">{{ $verified }}
                                    </td>
                                    <td class="py-2 px-4 border-b text-center text-red-500 font-semibold">{{ $unverified }}
                                    </td>
                                    <td class="py-2 px-4 border-b text-center font-semibold">{{ $total }}</td>
                                </tr>
                            @empty
                                <tr class="no-data">
                                    <td colspan="4" class="text-center text-gray-500 py-8">
                                        <i class="fas fa-info-circle text-2xl mb-2"></i>
                                        <p>Belum ada data institusi untuk ditampilkan.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Footer -->
                <div class="flex justify-between items-center border-t border-gray-200 p-4 bg-gray-50 flex-shrink-0">
                    <div class="flex items-center space-x-2 text-sm">
                        <button id="prevPage"
                            class="px-4 py-2 border rounded-md hover:bg-gray-100 transition disabled:opacity-50 disabled:cursor-not-allowed">Previous</button>
                        <button id="nextPage"
                            class="px-4 py-2 border rounded-md hover:bg-gray-100 transition disabled:opacity-50 disabled:cursor-not-allowed">Next</button>
                    </div>

                    <button onclick="closeModal('modalTopInstitusi')"
                        class="bg-gray-200 text-gray-800 px-5 py-2 rounded-lg hover:bg-gray-300 transition text-sm font-medium">
                        Tutup
                    </button>
                </div>
            </div>
        </div>

    </main>



    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script
        src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2.2.0/dist/chartjs-plugin-datalabels.min.js"></script>

    <script>
        Chart.register(ChartDataLabels);

        document.addEventListener('DOMContentLoaded', function () {
            // ===== CHART =====
            const dataInstitusi = @json($topInstitusi);
            const totalLomba = @json($pesertaPerLomba);
            const timTerverifikasi = @json($timTerverifikasiPerLomba ?? []);
            const totalTimValue = @json($totalTim);

            // Chart Top Institusi
            const ctxInstitusi = document.getElementById('chartInstitusi');
            if (ctxInstitusi) {
                new Chart(ctxInstitusi, {
                    type: 'bar',
                    data: {
                        labels: dataInstitusi.map(i => i.nama_institusi).reverse(),
                        datasets: [{
                            label: 'Jumlah Partisipasi',
                            data: dataInstitusi.map(i => i.jumlah).reverse(),
                            nama_institusi: dataInstitusi.map(i => i.nama_institusi).reverse(),
                            backgroundColor: '#38A169',
                            borderRadius: 6,
                            barThickness: 50,      // <--- atur tebal balok (default lebih besar)
                            maxBarThickness: 50    // opsional, maksimal tebal balok
                        }]
                    },
                    options: {
                        indexAxis: 'y',
                        responsive: true,
                        maintainAspectRatio: false
                    }
                });
            }


            // Chart Total Lomba
            const ctxTotalLomba = document.getElementById('chartTotalLomba');
            if (ctxTotalLomba && totalLomba.length > 0) {
                new Chart(ctxTotalLomba, {
                    type: 'doughnut',
                    data: {
                        labels: totalLomba.map(i => i.nama_lomba),
                        datasets: [{ data: totalLomba.map(i => i.total_peserta), backgroundColor: ['#4F46E5', '#3B82F6', '#10B981', '#F59E0B', '#EF4444'], borderColor: '#fff', borderWidth: 2 }]
                    },
                    options: { responsive: true, cutout: '60%' },
                    plugins: [ChartDataLabels]
                });
            }

            // Chart Tim Terverifikasi
            const ctxTim = document.getElementById('chartTimTerverifikasi');
            if (ctxTim && timTerverifikasi.length > 0) {
                const labels = timTerverifikasi.map(i => `${i.nama_lomba} (${i.kelas.join(', ')})`);
                const data = timTerverifikasi.map(i => i.total_tim);
                const gradientColors = data.map(() => {
                    const ctx = ctxTim.getContext('2d');
                    const gradient = ctx.createLinearGradient(0, 0, 0, ctxTim.height);
                    gradient.addColorStop(0, 'rgba(59, 130, 246, 0.8)');
                    gradient.addColorStop(1, 'rgba(99, 102, 241, 0.8)');
                    return gradient;
                });
                new Chart(ctxTim, { type: 'bar', data: { labels, datasets: [{ data, backgroundColor: gradientColors, borderRadius: 12, barThickness: 20 }] }, options: { responsive: true }, plugins: [ChartDataLabels] });
            }

            // Chart Total Tim
            const ctxTotalTim = document.getElementById('chartTotalTim');
            if (ctxTotalTim) {
                new Chart(ctxTotalTim, { type: 'bar', data: { labels: ['Total Tim'], datasets: [{ data: [totalTimValue], backgroundColor: 'rgba(59,130,246,0.8)', borderRadius: 20, barThickness: 40 }] }, options: { indexAxis: 'y', responsive: true }, plugins: [ChartDataLabels] });
            }

            // ===== MODAL =====
            window.openModal = function (id) {
                const modal = document.getElementById(id);
                const content = modal.querySelector('#modalContentInstitusi');
                modal.classList.remove('hidden');
                setTimeout(() => { modal.classList.add('opacity-100', 'scale-100'); content.classList.add('opacity-100', 'scale-100'); }, 10);
            };
            window.closeModal = function (id) {
                const modal = document.getElementById(id);
                const content = modal.querySelector('#modalContentInstitusi');
                modal.classList.remove('opacity-100', 'scale-100'); content.classList.remove('opacity-100', 'scale-100');
                setTimeout(() => { modal.classList.add('hidden'); }, 200);
            };

            // ===== SEARCH + PAGINATION =====
            const searchInput = document.getElementById('searchInstitusi');
            const tableBody = document.getElementById('tableInstitusi');
            const prevBtn = document.getElementById('prevPage');
            const nextBtn = document.getElementById('nextPage');
            const rowsPerPage = 5;
            let currentPage = 1;

            function updateTable() {
                const keyword = searchInput.value.toLowerCase();
                const allRows = Array.from(tableBody.querySelectorAll('tr')).filter(r => !r.classList.contains('no-data'));
                let visibleRows = [];

                allRows.forEach(row => {
                    if (row.textContent.toLowerCase().includes(keyword)) {
                        row.classList.remove('hidden');
                        visibleRows.push(row);
                    } else {
                        row.classList.add('hidden');
                    }
                });

                // Pesan "Data tidak ditemukan"
                let existingNoData = tableBody.querySelector('.no-data');
                if (visibleRows.length === 0) {
                    if (!existingNoData) {
                        const noDataRow = document.createElement('tr');
                        noDataRow.classList.add('no-data');
                        noDataRow.innerHTML = `<td colspan="4" class="text-center text-gray-500 py-6"><i class="fas fa-search text-xl mb-2"></i><p>Data tidak ditemukan.</p></td>`;
                        tableBody.appendChild(noDataRow);
                    }
                } else if (existingNoData) {
                    existingNoData.remove();
                }

                currentPage = 1;
                renderTable();
            }

            function renderTable() {
                const allRows = Array.from(tableBody.querySelectorAll('tr')).filter(r => !r.classList.contains('no-data'));
                const visibleRows = allRows.filter(r => !r.classList.contains('hidden'));
                const totalPages = Math.ceil(visibleRows.length / rowsPerPage);

                visibleRows.forEach((row, i) => {
                    row.style.display = (i >= (currentPage - 1) * rowsPerPage && i < currentPage * rowsPerPage) ? "" : "none";
                });

                prevBtn.disabled = currentPage === 1;
                nextBtn.disabled = currentPage === totalPages || totalPages === 0;
            }

            searchInput.addEventListener('input', updateTable);
            prevBtn.addEventListener('click', () => { if (currentPage > 1) { currentPage--; renderTable(); } });
            nextBtn.addEventListener('click', () => { const allRows = Array.from(tableBody.querySelectorAll('tr')).filter(r => !r.classList.contains('no-data')); const visibleRows = allRows.filter(r => !r.classList.contains('hidden')); const totalPages = Math.ceil(visibleRows.length / rowsPerPage); if (currentPage < totalPages) { currentPage++; renderTable(); } });

            updateTable(); // run once on load
        });
    </script>



    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 600, // Durasi animasi
            once: true, // Animasi hanya terjadi sekali
        });
    </script>

</body>

</html>