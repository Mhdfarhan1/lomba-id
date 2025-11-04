@extends('admin.layouts.app')

@section('title', 'Edit Lomba')

@section('content')
<div class="p-8 md:p-10 bg-white rounded-2xl shadow-xl border border-gray-100">

    {{-- HEADER --}}
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
        <h2 class="text-3xl font-bold text-gray-800">Edit Lomba</h2>
        <a href="{{ route('lomba.index') }}" 
           class="px-5 py-2.5 bg-gray-600 text-white rounded-lg hover:bg-gray-700 transition-all duration-300 shadow-md">
           Kembali
        </a>
    </div>

   <form id="form-lomba" action="{{ route('lomba.update', $lomba) }}" method="POST" class="space-y-6">

        @csrf
        @method('PUT')

        {{-- NAMA LOMBA --}}
        <div>
            <label for="nama_lomba" class="flex items-center text-sm font-medium text-gray-700 mb-2">
                <svg class="h-5 w-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M17.707 9.293a1 1 0 010 1.414l-7 7a1 1 0 01-1.414 0l-7-7A.997.997 0 012 10V5a1 1 0 011-1h5a1 1 0 01.707.293l7 7zM5 6a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
                </svg>
                Nama Lomba
            </label>
            {{-- PERUBAHAN STYLING BOX --}}
            <input type="text" name="nama_lomba" id="nama_lomba"
                value="{{ old('nama_lomba', $lomba->nama_lomba) }}"
                class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition-all duration-300" required>
        </div>

        {{-- DESKRIPSI --}}
        <div>
            <label for="deskripsi" class="flex items-center text-sm font-medium text-gray-700 mb-2">
                <svg class="h-5 w-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a2 2 0 01-2 2H6a2 2 0 01-2-2V4zm2 4a1 1 0 100 2h8a1 1 0 100-2H6zm0 4a1 1 0 100 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                </svg>
                Deskripsi
            </label>
            {{-- PERUBAHAN STYLING BOX --}}
            <textarea name="deskripsi" id="deskripsi" rows="4"
                class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition-all duration-300">{{ old('deskripsi', $lomba->deskripsi) }}</textarea>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            {{-- TANGGAL MULAI --}}
            <div>
                <label for="tanggal_mulai" class="flex items-center text-sm font-medium text-gray-700 mb-2">
                    <svg class="h-5 w-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    Tanggal Mulai
                </label>
                {{-- PERUBAHAN STYLING BOX --}}
                <input type="date" name="tanggal_mulai" id="tanggal_mulai"
                    value="{{ old('tanggal_mulai', $lomba->tanggal_mulai) }}"
                    class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition-all duration-300" required>
            </div>

            {{-- TANGGAL SELESAI --}}
            <div>
                <label for="tanggal_selesai" class="flex items-center text-sm font-medium text-gray-700 mb-2">
                    <svg class="h-5 w-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                         <path fill-rule="evenodd" d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z" clip-rule="evenodd" />
                    </svg>
                    Tanggal Selesai
                </label>
                {{-- PERUBAHAN STYLING BOX --}}
                <input type="date" name="tanggal_selesai" id="tanggal_selesai"
                    value="{{ old('tanggal_selesai', $lomba->tanggal_selesai) }}"
                    class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition-all duration-300" required>
            </div>
        </div>

        {{-- STATUS --}}
        <div>
            <label for="status" class="flex items-center text-sm font-medium text-gray-700 mb-2">
                <svg class="h-5 w-5 mr-2 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                   <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                </svg>
                Status
            </label>
            {{-- PERUBAHAN STYLING BOX --}}
            <select name="status" id="status"
                class="mt-1 block w-full px-4 py-3 bg-gray-50 border border-gray-300 rounded-lg shadow-sm focus:bg-white focus:border-blue-500 focus:ring-2 focus:ring-blue-500 transition-all duration-300" required>
                <option value="dibuka" {{ $lomba->status == 'dibuka' ? 'selected' : '' }}>Dibuka</option>
                <option value="ditutup" {{ $lomba->status == 'ditutup' ? 'selected' : '' }}>Ditutup</option>
            </select>
        </div>

        {{-- TOMBOL AKSI --}}
        <div class="flex justify-end space-x-4 pt-8 border-t border-gray-200">
            <a href="{{ route('lomba.index') }}" 
               class="px-6 py-2.5 bg-gray-200 text-gray-800 rounded-lg hover:bg-gray-300 transition-all duration-300 shadow-md">Batal</a>
            
            <button type="submit" id="submit-button"
                class="flex items-center justify-center px-6 py-2.5 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-all duration-300 shadow-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 disabled:opacity-75 disabled:cursor-not-allowed">
                
                {{-- Loader (Sudah benar) --}}
                <svg id="button-loader" class="hidden animate-spin -ml-1 mr-3 h-5 w-5 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                
                <span id="button-text">Simpan Perubahan</span>
            </button>
        </div>
    </form>

</div>
@endsection

@push('scripts')
{{-- Skrip loader ini sudah benar dan tidak perlu diubah --}}
<script>
    document.getElementById('form-lomba').addEventListener('submit', function() {
        const submitButton = document.getElementById('submit-button');
        const buttonText = document.getElementById('button-text');
        const buttonLoader = document.getElementById('button-loader');

        submitButton.disabled = true;
        buttonText.classList.add('hidden');
        buttonLoader.classList.remove('hidden');
    });
</script>
@endpush