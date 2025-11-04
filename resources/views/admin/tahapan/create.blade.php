@extends('admin.layouts.app')

@section('title', 'Tambah Tahapan Baru')

@section('content')
<div class="p-8 bg-white rounded-2xl shadow-lg">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-8">
        <div>
            <h2 class="text-3xl font-bold text-gray-800">Tambah Tahapan Baru</h2>
            <p class="text-sm text-gray-500 mt-1">Isi detail di bawah ini untuk membuat tahapan baru.</p>
        </div>
        <a href="{{ route('tahapan.index') }}" 
           class="flex items-center bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-300 transition">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>

    {{-- Form Tambah Data --}}
    <form id="tahapan-form" action="{{ route('tahapan.store') }}" method="POST">
        @csrf
        <div class="border-t border-gray-200 pt-8">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div class="md:col-span-1">
                    <label for="judul_tahap" class="block text-sm font-semibold text-gray-700 mb-2">
                        Judul Tahap <span class="text-red-500">*</span>
                    </label>
                    <input type="text" id="judul_tahap" name="judul_tahap" 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('judul_tahap') border-red-500 @enderror" 
                           value="{{ old('judul_tahap') }}" required>
                    @error('judul_tahap')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-1">
                    <label for="urutan" class="block text-sm font-semibold text-gray-700 mb-2">
                        Urutan <span class="text-red-500">*</span>
                    </label>
                    <input type="number" id="urutan" name="urutan" 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('urutan') border-red-500 @enderror" 
                           value="{{ old('urutan', 1) }}" min="1" required>
                    @error('urutan')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-1">
                    <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700 mb-2">
                        Tanggal Mulai <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="tanggal_mulai" name="tanggal_mulai" 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('tanggal_mulai') border-red-500 @enderror" 
                           value="{{ old('tanggal_mulai') }}" required>
                    @error('tanggal_mulai')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-1">
                    <label for="tanggal_selesai" class="block text-sm font-semibold text-gray-700 mb-2">
                        Tanggal Selesai <span class="text-red-500">*</span>
                    </label>
                    <input type="date" id="tanggal_selesai" name="tanggal_selesai" 
                           class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('tanggal_selesai') border-red-500 @enderror" 
                           value="{{ old('tanggal_selesai') }}" required>
                    @error('tanggal_selesai')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <div class="md:col-span-2">
                    <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">
                        Deskripsi (Opsional)
                    </label>
                    <textarea id="deskripsi" name="deskripsi" rows="4" 
                              class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500 @error('deskripsi') border-red-500 @enderror" 
                              placeholder="Jelaskan detail singkat mengenai tahapan ini...">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
                <button type="submit" id="submit-button" 
                        class="flex items-center justify-center bg-blue-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-blue-700 shadow-md hover:shadow-lg transition disabled:opacity-75 disabled:cursor-not-allowed">
                    
                    <span class="default-text">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Tahapan
                    </span>
                    
                    <span class="loading-text hidden">
                        <svg class="animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Menyimpan...
                    </span>
                </button>
            </div>
        </div>
    </form>

</div>
@endsection

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const form = document.getElementById('tahapan-form');
        const submitButton = document.getElementById('submit-button');
        const defaultText = submitButton.querySelector('.default-text');
        const loadingText = submitButton.querySelector('.loading-text');

        form.addEventListener('submit', function() {
            submitButton.disabled = true;
            defaultText.classList.add('hidden');
            loadingText.classList.remove('hidden');
        });
    });
</script>
@endpush
