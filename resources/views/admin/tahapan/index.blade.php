@extends('admin.layouts.app')

@section('title', 'Data Tahapan')

@section('content')
<div class="p-8 bg-white rounded-2xl shadow-lg">

    {{-- Header --}}
    <div class="flex items-center justify-between mb-6">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Manajemen Tahapan</h2>
            <p class="text-sm text-gray-500 mt-1">Kelola alur dan jadwal tahapan untuk kompetisi.</p>
        </div>
        <a href="{{ route('tahapan.create') }}" 
           class="flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-blue-700 shadow-md hover:shadow-lg transition">
            <i class="fas fa-plus mr-2"></i>
            Tambah Tahapan
        </a>
    </div>

    {{-- Notifikasi sukses (diambil dari template Lomba Anda) --}}
    @if(session('success'))
    <div class="mb-6 p-4 flex items-center bg-green-50 text-green-700 rounded-lg border border-green-200">
        <i class="fas fa-check-circle mr-3 text-green-600"></i>
        <span class="font-medium">{{ session('success') }}</span>
    </div>
    @endif

    {{-- Tabel data tahapan --}}
    <div class="overflow-x-auto rounded-lg ring-1 ring-black ring-opacity-5 shadow-sm">
        <table class="min-w-full divide-y divide-gray-200">
            <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">No</th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Nama Tahapan</th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Periode</th>
                    <th scope="col" class="px-6 py-3 text-left text-sm font-semibold text-gray-600 uppercase tracking-wider">Status</th>
                    <th scope="col" class="px-6 py-3 text-center text-sm font-semibold text-gray-600 uppercase tracking-wider">Urutan</th>
                    <th scope="col" class="px-6 py-3 text-right text-sm font-semibold text-gray-600 uppercase tracking-wider">Aksi</th>
                </tr>
            </thead>

            <tbody class="bg-white divide-y divide-gray-200">
                
                {{-- Set variabel $now sekali di luar loop untuk efisiensi --}}
                @php $now = \Carbon\Carbon::now(); @endphp 

                @forelse($tahapans as $tahapan)
                <tr class="hover:bg-gray-50 transition-colors">
                    
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $loop->iteration }}</td>
                    
                    {{-- Kolom Nama Tahap (Ikon + Judul + Deskripsi) --}}
                    <td class="px-6 py-4">
                        <div class="flex items-center gap-4">
                            @if($tahapan->ikon)
                                <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center bg-blue-50 text-blue-600 rounded-lg text-xl">
                                    <i class="{{ $tahapan->ikon }}"></i>
                                </div>
                            @else
                                <div class="flex-shrink-0 h-10 w-10 flex items-center justify-center bg-gray-50 text-gray-400 rounded-lg text-xl">
                                    <i class="fas fa-question"></i>
                                </div>
                            @endif
                            <div>
                                <div class="text-sm font-medium text-gray-900">{{ $tahapan->judul_tahap }}</div>
                                <div class="text-xs text-gray-500 truncate max-w-xs" title="{{ $tahapan->deskripsi }}">
                                    {{ Str::limit($tahapan->deskripsi, 60) }}
                                </div>
                            </div>
                        </div>
                    </td>
                    
                    {{-- Kolom Periode --}}
                    <td class="px-6 py-4 text-sm text-gray-600 whitespace-nowrap">
                        <div class="font-medium">{{ \Carbon\Carbon::parse($tahapan->tanggal_mulai)->format('d M Y') }}</div>
                        <div class="text-xs text-gray-500">sampai</div>
                        <div class="font-medium">{{ \Carbon\Carbon::parse($tahapan->tanggal_selesai)->format('d M Y') }}</div>
                    </td>
                    
                    {{-- Kolom Status (Otomatis) --}}
                    <td class="px-6 py-4 text-sm">
                        @if($now->lt($tahapan->tanggal_mulai))
                            <span class="px-3 py-1 rounded-full bg-gray-100 text-gray-700 text-xs font-semibold">Akan Datang</span>
                        @elseif($now->between($tahapan->tanggal_mulai, $tahapan->tanggal_selesai))
                            <span class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">Berlangsung</span>
                        @else
                            <span class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">Selesai</span>
                        @endif
                    </td>

                    {{-- Kolom Urutan (Badge Bulat) --}}
                    <td class="px-6 py-4 text-center">
                        <span class="inline-flex items-center justify-center min-w-[2rem] h-8 bg-blue-100 text-blue-800 text-sm font-bold rounded-full px-2">
                            {{ $tahapan->urutan }}
                        </span>
                    </td>

                    {{-- Kolom Aksi (Soft Badge) --}}
                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                        <div class="flex justify-end space-x-2">
                            <a href="{{ route('tahapan.edit', $tahapan->id_tahapan) }}" 
                               class="inline-block px-3 py-1.5 rounded-md bg-yellow-100 text-yellow-800 text-xs font-medium hover:bg-yellow-200 transition">
                                Edit
                            </a>
                            <form action="{{ route('tahapan.destroy', $tahapan->id_tahapan) }}" method="POST" class="inline" onsubmit="return confirm('Yakin ingin menghapus tahapan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="inline-block px-3 py-1.5 rounded-md bg-red-100 text-red-800 text-xs font-medium hover:bg-red-200 transition">
                                    Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>

                {{-- Empty State (diambil dari template Lomba) --}}
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-16 text-center">
                            <img src="{{ asset('assets/img/data_kosong.svg') }}" alt="Belum ada tahapan" class="mx-auto mb-4 w-48 h-auto">
                            <p class="text-gray-500 font-semibold text-lg">Belum ada data tahapan.</p>
                            <p class="text-sm text-gray-400 mt-1">Silakan tambahkan tahapan pertama untuk memulai.</p>
                            <a href="{{ route('tahapan.create') }}" 
                                class="mt-4 inline-flex items-center bg-blue-600 text-white px-4 py-2 rounded-lg font-semibold hover:bg-blue-700 shadow-md hover:shadow-lg transition text-sm">
                                <i class="fas fa-plus mr-2"></i>
                                Tambah Tahapan
                            </a>
                        </td>
                    </tr>
                    @endempty
            </tbody>
        </table>
    </div>

    {{-- Pagination --}}
    <div class="mt-6">
        {{ $tahapans->links() }}
    </div>
</div>
@endsection