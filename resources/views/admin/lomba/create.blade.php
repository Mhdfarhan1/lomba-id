@extends('admin.layouts.app')

@section('content')
<div class="max-w-3xl mx-auto mt-10 bg-white shadow-xl rounded-2xl p-8 border border-gray-100 relative">

    {{-- 
      PERUBAHAN 4: Loader "Glassmorphism"
      - Latar belakang diubah 'bg-gray-900/70'
      - Ditambahkan 'backdrop-blur-sm'
    --}}
    <div id="loader-overlay" class="hidden fixed inset-0 bg-gray-900/70 backdrop-blur-sm flex items-center justify-center z-50">
        <div class="flex flex-col items-center">
            <div class="w-12 h-12 border-4 border-blue-500 border-t-transparent rounded-full animate-spin"></div>
            <p class="text-white mt-3 font-medium text-lg">Menyimpan data...</p>
        </div>
    </div>

    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Tambah Lomba</h2>
            <p class="text-sm text-gray-500">Isi data lomba yang ingin ditambahkan.</p>
        </div>
        <a href="{{ route('lomba.index') }}" 
           class="flex items-center text-gray-500 px-5 py-2.5 rounded-lg font-semibold hover:bg-gray-100 hover:text-gray-800 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>

    <form id="form-lomba" action="{{ route('lomba.store') }}" method="POST" class="space-y-6">
        @csrf

        <div>
            <label for="nama_lomba" class="block text-gray-700 font-medium mb-2">Nama Lomba</label>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <i class="fas fa-trophy text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                </div>
                <input type="text" id="nama_lomba" name="nama_lomba" class="w-full pl-10 pr-4 py-3 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 focus:shadow-md transition-all"
                       value="{{ old('nama_lomba') }}" placeholder="Contoh: Lomba Desain Poster" required>
            </div>
        </div>

        <div>
            <label for="deskripsi" class="block text-gray-700 font-medium mb-2">Deskripsi</label>
            <div class="relative group">
                <div class="absolute left-0 top-3.5 flex items-center pl-3.5 pointer-events-none">
                    <i class="fas fa-file-alt text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                </div>
                <textarea id="deskripsi" name="deskripsi" rows="4" class="w-full pl-10 pr-4 py-3 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 focus:shadow-md transition-all" 
                          placeholder="Tuliskan deskripsi singkat lomba...">{{ old('deskripsi') }}</textarea>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label for="tanggal_mulai" class="block text-gray-700 font-medium mb-2">Tanggal Mulai</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <i class="fas fa-calendar-plus text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                    </div>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai" class="w-full pl-10 pr-4 py-3 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 focus:shadow-md transition-all"
                           value="{{ old('tanggal_mulai') }}" required>
                </div>
            </div>
            <div>
                <label for="tanggal_selesai" class="block text-gray-700 font-medium mb-2">Tanggal Selesai</label>
                <div class="relative group">
                    <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                        <i class="fas fa-calendar-check text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                    </div>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai" class="w-full pl-10 pr-4 py-3 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 focus:shadow-md transition-all"
                           value="{{ old('tanggal_selesai') }}" required>
                </div>
            </div>
        </div>

        <div>
            <label for="status" class="block text-gray-700 font-medium mb-2">Status</label>
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <i class="fas fa-info-circle text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                </div>
                <select id="status" name="status" class="w-full pl-10 pr-4 py-3 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 focus:shadow-md transition-all" required>
                    <option value="dibuka" {{ old('status') == 'dibuka' ? 'selected' : '' }}>Dibuka</option>
                    <option value="ditutup" {{ old('status') == 'ditutup' ? 'selected' : '' }}>Ditutup</option>
                </select>
            </div>
        </div>

        <div class="flex justify-end pt-6 border-t border-gray-200">
            <button type="submit" id="btn-submit" 
                    class="group flex items-center bg-gradient-to-r from-blue-600 to-indigo-700 text-white px-6 py-2.5 rounded-lg font-semibold shadow-md hover:shadow-lg hover:from-blue-700 hover:to-indigo-800 transition-all duration-300">
                <i id="btnIcon" class="fas fa-save mr-2 transition-transform group-hover:scale-110"></i> 
                <span id="btnText">Simpan</span>
            </button>
        </div>
    </form>
</div>

{{-- 
  PERUBAHAN 5: Script Loader Ditingkatkan
  - Menargetkan ID tombol, ikon, dan teks yang baru
  - Menambahkan logika untuk mengubah teks/ikon
--}}
<script>
    const form = document.getElementById('form-lomba');
    const loader = document.getElementById('loader-overlay');
    const submitBtn = document.getElementById('btn-submit');
    const btnIcon = document.getElementById('btnIcon');
    const btnText = document.getElementById('btnText');

    form.addEventListener('submit', function () {
        // 1. Tampilkan loader overlay
        loader.classList.remove('hidden');

        // 2. Ubah tombol menjadi loading
        btnText.textContent = 'Menyimpan...';
        btnIcon.className = 'fas fa-spinner fa-spin mr-2';

        // 3. Nonaktifkan tombol
        submitBtn.disabled = true;
        submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
    });
</script>
@endsection