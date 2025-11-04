@extends('admin.layouts.app')

@section('content')
<div class="p-8 bg-white rounded-2xl shadow-lg">
    
    <div class="flex items-center justify-between mb-6 pb-6 border-b border-gray-200">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Edit Timeline</h2>
            <p class="text-sm text-gray-500">Perbarui detail tahapan untuk lomba yang dipilih.</p>
        </div>
        <a href="{{ route('timeline.index') }}" class="flex items-center bg-gray-100 text-gray-700 px-5 py-2.5 rounded-lg font-semibold hover:bg-gray-200 transition">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>

    @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 text-red-700 rounded-lg border border-red-200">
            <strong class="font-bold">Oops! Ada yang salah:</strong>
            <ul class="mt-2 list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('timeline.update', $timeline) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="space-y-6">
            
            <div>
                <label for="id_lomba" class="block text-sm font-medium text-gray-700 mb-2">
                    Pilih Lomba <span class="text-red-500">*</span>
                </label>
                <select id="id_lomba" name="id_lomba" 
                        class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition" 
                        required>
                    <option value="" disabled>Pilih salah satu lomba</option>
                    @foreach($lombas as $lomba)
                        <option value="{{ $lomba->id_lomba }}" {{ $timeline->id_lomba == $lomba->id_lomba ? 'selected' : '' }}>
                            {{ $lomba->nama_lomba }}
                        </option>
                    @endforeach
                </select>
                @error('id_lomba')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="tanggal_mulai" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Mulai
                    </label>
                    <input type="text" id="tanggal_mulai" 
                           value="{{ \Carbon\Carbon::parse($timeline->tanggal_mulai)->format('d M Y, H:i') }}"
                           class="w-full rounded-lg border border-gray-300 bg-gray-100 px-3 py-2 shadow-sm focus:outline-none cursor-not-allowed" 
                           disabled>
                </div>
                <div>
                    <label for="tanggal_selesai" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal Selesai
                    </label>
                    <input type="text" id="tanggal_selesai" 
                           value="{{ \Carbon\Carbon::parse($timeline->tanggal_selesai)->format('d M Y, H:i') }}"
                           class="w-full rounded-lg border border-gray-300 bg-gray-100 px-3 py-2 shadow-sm focus:outline-none cursor-not-allowed" 
                           disabled>
                </div>
            </div>

            <div>
                <label for="keterangan" class="block text-sm font-medium text-gray-700 mb-2">
                    Keterangan Tahapan <span class="text-red-500">*</span>
                </label>
                <textarea id="keterangan" name="keterangan" rows="4" 
                          class="w-full rounded-lg border border-gray-300 bg-white px-3 py-2 shadow-sm focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition" 
                          placeholder="Contoh: Pendaftaran, Seleksi Berkas, Pengumuman Finalis, etc." 
                          required>{{ old('keterangan', $timeline->keterangan) }}</textarea>
                <p class="mt-1 text-xs text-gray-500">Jelaskan nama tahapan ini secara singkat (cth: Pendaftaran, Technical Meeting, dll).</p>
                @error('keterangan')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end pt-6 border-t border-gray-200">
                <button type="submit" class="flex items-center bg-blue-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-blue-700 shadow-md hover:shadow-lg transition">
                    <i class="fas fa-save mr-2"></i>
                    Perbarui Timeline
                </button>
            </div>

        </div>
    </form>
</div>
@endsection
