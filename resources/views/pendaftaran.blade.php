<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Lomba- Pik-r.Id</title>
    <link rel="shortcut icon" href="{{ asset('assets/img/logo_1.png') }}" type="image/png">

    <script src="https://cdn.tailwindcss.com?plugins=forms"></script>

    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />

    <style>
        @import url('https://rsms.me/inter/inter.css');

        html {
            font-family: 'Inter', sans-serif;
            scroll-behavior: smooth;
        }
    </style>
</head>

<body class="py-12 px-4">

    <div
        class="max-w-2xl mx-auto bg-white/70 backdrop-blur-xl rounded-2xl shadow-2xl overflow-hidden border border-white/30">

        <div class="bg-gradient-to-r from-blue-600/90 to-indigo-700/90 p-8 text-white text-center">
            <div class="flex flex-col items-center justify-center space-y-4">
                <img src="{{ asset('assets/img/logo_utama.png') }}" alt="Logo"
                    class="w-20 h-20 rounded-2xl border-2 border-white/30 shadow-lg bg-white/10 object-contain">

                <div>
                    <h1 class="text-3xl font-bold">Formulir Pendaftaran</h1>
                    <p class="text-blue-100 text-sm">Lengkapi data dengan benar sebelum dikirim.</p>
                </div>
            </div>
        </div>


        <div class="p-8">
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-100/80 border border-red-300 rounded-lg">
                    <h2 class="text-red-700 font-semibold mb-2 flex items-center gap-2">
                        <i class="fas fa-exclamation-triangle"></i> Ada yang perlu diperbaiki:
                    </h2>
                    <ul class="text-sm text-red-600 list-disc list-inside">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pendaftaran.store') }}" method="POST" class="space-y-12">
                @csrf

                <section>
                    <h3
                        class="text-lg font-semibold text-gray-900 mb-6 flex items-center gap-2 border-b border-gray-300 pb-2">
                        <i class="fas fa-user-circle text-blue-600"></i> Data Diri
                    </h3>

                    <div class="space-y-6">
                        <div>
                            <label for="nama_peserta" class="block text-sm font-medium text-gray-800 mb-1.5">Nama
                                Lengkap</label>
                            <div class="relative group">
                                <i
                                    class="fas fa-user absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                                <input type="text" id="nama_peserta" name="nama_peserta"
                                    placeholder="Masukkan nama lengkap" value="{{ old('nama_peserta') }}" required
                                    class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 text-gray-800 placeholder-gray-500 transition-all shadow-sm focus:shadow-md">
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="nis" class="block text-sm font-medium text-gray-800 mb-1.5">NISN</label>
                                <div class="relative group">
                                    <i
                                        class="fas fa-id-card absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                                    <input type="number" id="nis" name="nis" placeholder="Nomor Induk Siswa Nasional"
                                        value="{{ old('nis') }}" required
                                        class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 text-gray-800 placeholder-gray-500 transition-all shadow-sm focus:shadow-md">
                                </div>
                            </div>

                            <div>
                                <label for="jenis_kelamin" class="block text-sm font-medium text-gray-800 mb-1.5">Jenis
                                    Kelamin</label>
                                <div class="relative group">
                                    <i
                                        class="fas fa-venus-mars absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                                    <select id="jenis_kelamin" name="jenis_kelamin" required
                                        class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 text-gray-800 bg-white transition-all shadow-sm focus:shadow-md">
                                        <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki" {{ old('jenis_kelamin') == 'Laki-laki' ? 'selected' : '' }}>Laki-laki</option>
                                        <option value="Perempuan" {{ old('jenis_kelamin') == 'Perempuan' ? 'selected' : '' }}>Perempuan</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>

                <section class="pt-8 border-t border-gray-300">
                    <h3
                        class="text-lg font-semibold text-gray-900 mb-6 flex items-center gap-2 border-b border-gray-300 pb-2">
                        <i class="fas fa-school text-blue-600"></i> Info Akademik & Kontak
                    </h3>

                    <div class="space-y-6">
                        <div>
                            <label for="id_kelas" class="block text-sm font-medium text-gray-800 mb-1.5">Kelas</label>
                            <div class="relative group">
                                <i
                                    class="fas fa-chalkboard-teacher absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                                <select id="id_kelas" name="id_kelas" required
                                    class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 text-gray-800 bg-white transition-all shadow-sm focus:shadow-md">
                                    <option value="" disabled selected>Pilih Kelas</option>
                                    @foreach($kelases as $kelas)
                                        <option value="{{ $kelas->id_kelas }}" {{ old('id_kelas') == $kelas->id_kelas ? 'selected' : '' }}>
                                            {{ $kelas->nama_kelas }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="grid md:grid-cols-2 gap-6">
                            <div>
                                <label for="no_hp" class="block text-sm font-medium text-gray-800 mb-1.5">Nomor
                                    WhatsApp</label>
                                <div class="relative group">
                                    <i
                                        class="fab fa-whatsapp absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                                    <input type="text" id="no_hp" name="no_hp" placeholder="Nomor WhatsApp aktif"
                                        value="{{ old('no_hp') }}" required
                                        class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 text-gray-800 placeholder-gray-500 transition-all shadow-sm focus:shadow-md">
                                </div>
                            </div>

                            <div>
                                <label for="email" class="block text-sm font-medium text-gray-800 mb-1.5">Alamat
                                    Email</label>
                                <div class="relative group">
                                    <i
                                        class="fas fa-at absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                                    <input type="email" id="email" name="email" placeholder="Alamat email aktif"
                                        value="{{ old('email') }}"
                                        class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 text-gray-800 placeholder-gray-500 transition-all shadow-sm focus:shadow-md">
                                </div>
                            </div>
                        </div>

                        <!-- Tambahkan di bagian "Info Akademik & Kontak" -->
                        <div class="grid md:grid-cols-2 gap-6 mt-6">
                            <div>
                                <label for="asal_sekolah" class="block text-sm font-medium text-gray-800 mb-1.5">Asal
                                    Sekolah</label>
                                <div class="relative group">
                                    <i
                                        class="fas fa-school absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                                    <input type="text" id="asal_sekolah" name="asal_sekolah"
                                        placeholder="Masukkan asal sekolah" value="{{ old('asal_sekolah') }}" required
                                        class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 text-gray-800 placeholder-gray-500 transition-all shadow-sm focus:shadow-md">
                                </div>
                            </div>

                            <div>
                                <label for="asal_pikr" class="block text-sm font-medium text-gray-800 mb-1.5">Asal
                                    PIK-R</label>
                                <div class="relative group">
                                    <i
                                        class="fas fa-flag absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                                    <input type="text" id="asal_pikr" name="asal_pikr" placeholder="Masukkan asal PIK-R"
                                        value="{{ old('asal_pikr') }}"
                                        class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 text-gray-800 placeholder-gray-500 transition-all shadow-sm focus:shadow-md">
                                </div>
                            </div>
                        </div>

                    </div>
                </section>

                <section class="pt-8 border-t border-gray-300">
                    <h3
                        class="text-lg font-semibold text-gray-900 mb-6 flex items-center gap-2 border-b border-gray-300 pb-2">
                        <i class="fas fa-trophy text-blue-600"></i> Informasi Lomba
                    </h3>

                    <div class="space-y-6">
                        <div>
                            <label for="id_lomba" class="block text-sm font-medium text-gray-800 mb-1.5">Pilih
                                Lomba</label>
                            <div class="relative group">
                                <i
                                    class="fas fa-medal absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                                <select id="id_lomba" name="id_lomba" required
                                    class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 text-gray-800 bg-white transition-all shadow-sm focus:shadow-md">
                                    <option value="" disabled selected>Pilih Lomba</option>
                                    @foreach($lombas as $lomba)
                                        <option value="{{ $lomba->id_lomba }}" {{ old('id_lomba') == $lomba->id_lomba ? 'selected' : '' }}>
                                            {{ $lomba->nama_lomba }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div>
                            <label for="jenis_peserta" class="block text-sm font-medium text-gray-800 mb-1.5">Jenis
                                Peserta</label>
                            <div class="relative group">
                                <i
                                    class="fas fa-user-friends absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                                <select id="jenis_peserta" name="jenis_peserta" required
                                    class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 text-gray-800 bg-white transition-all shadow-sm focus:shadow-md">
                                    <option value="Individu" {{ old('jenis_peserta') == 'Individu' ? 'selected' : '' }}>
                                        Individu</option>
                                    <option value="Kelompok" {{ old('jenis_peserta') == 'Kelompok' ? 'selected' : '' }}>
                                        Kelompok</option>
                                </select>
                            </div>
                        </div>

                        <div id="anggota_kelompok_wrapper"
                            class="{{ old('jenis_peserta') == 'Kelompok' ? '' : 'hidden' }}">
                            <label for="anggota_kelompok" class="block text-sm font-medium text-gray-800 mb-1.5">Anggota
                                Kelompok</label>
                            <div class="relative group">
                                <i
                                    class="fas fa-users absolute left-3 top-3.5 text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                                <textarea id="anggota_kelompok" name="anggota_kelompok" rows="3"
                                    placeholder="Masukkan nama anggota kelompok (pisahkan dengan koma)"
                                    class="w-full pl-10 pr-3 py-3 rounded-lg border border-gray-300 focus:border-blue-600 focus:ring-1 focus:ring-blue-600 text-gray-800 placeholder-gray-500 transition-all shadow-sm focus:shadow-md">{{ old('anggota_kelompok') }}</textarea>
                            </div>
                        </div>
                    </div>
                </section>

                <div class="pt-10 border-t border-gray-300">
                    <button type="submit"
                        class="w-full flex items-center justify-center gap-2 bg-gradient-to-r from-blue-600 to-indigo-700 text-white font-bold text-lg py-3.5 rounded-xl shadow-md hover:shadow-lg hover:shadow-blue-500/40 hover:scale-[1.02] transition-all duration-300 group">
                        <i class="fas fa-paper-plane transition-transform duration-300 group-hover:translate-x-1"></i>
                        Kirim Pendaftaran
                    </button>
                </div>
            </form>
        </div>
    </div>

    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', () => {
                Swal.fire({
                    icon: 'success',
                    title: 'Pendaftaran Berhasil!',
                    text: '{{ session('success') }}',
                    confirmButtonColor: '#3B82F6',
                    /* PERUBAHAN 5: SweetAlert dengan Efek Blur */
                    backdrop: `
                                    rgba(0,0,123,0.4)
                                    blur(10px)
                                    left top
                                    no-repeat
                                `
                });
            });
        </script>
    @endif

    <script>
        // tampilkan/hidden input anggota_kelompok
        document.getElementById('jenis_peserta').addEventListener('change', function () {
            document.getElementById('anggota_kelompok_wrapper').classList.toggle('hidden', this.value !== 'Kelompok');
        });
    </script>
</body>

</html>