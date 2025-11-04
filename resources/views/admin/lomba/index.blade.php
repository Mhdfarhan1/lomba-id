@extends('admin.layouts.app')

@section('title', 'Data Lomba')

@section('content')
    <div class="p-8 bg-white rounded-2xl shadow-lg">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Data Lomba</h2>
                <p class="text-sm text-gray-500">Kelola daftar lomba yang tersedia di sistem.</p>
            </div>
            <a href="{{ route('lomba.create') }}"
                class="flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-blue-700 shadow-md hover:shadow-lg transition">
                <i class="fas fa-plus mr-2"></i>
                Tambah Lomba
            </a>
        </div>

        {{-- Notifikasi sukses --}}
        @if(session('success'))
            <div class="mb-6 p-4 flex items-center bg-green-50 text-green-700 rounded-lg border border-green-200">
                <i class="fas fa-check-circle mr-3 text-green-600"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Tabel data lomba --}}
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama
                            Lomba</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($lombas as $index => $lomba)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $lomba->nama_lomba }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ \Carbon\Carbon::parse($lomba->tanggal_mulai)->format('d M Y') }} -
                                {{ \Carbon\Carbon::parse($lomba->tanggal_selesai)->format('d M Y') }}
                            </td>
                            <td class="px-6 py-4 text-sm">
                                @if($lomba->status === 'Aktif')
                                    <span
                                        class="px-3 py-1 rounded-full bg-green-100 text-green-700 text-xs font-semibold">{{ $lomba->status }}</span>
                                @elseif($lomba->status === 'Selesai')
                                    <span
                                        class="px-3 py-1 rounded-full bg-blue-100 text-blue-700 text-xs font-semibold">{{ $lomba->status }}</span>
                                @else
                                    <span
                                        class="px-3 py-1 rounded-full bg-red-100 text-red-700 text-xs font-semibold">{{ $lomba->status }}</span>
                                @endif
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-4">
                                    <a href="{{ route('lomba.edit', $lomba->id_lomba) }}"
                                        class="text-blue-600 hover:text-blue-900 flex items-center">
                                        <i class="fas fa-pen-to-square mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('lomba.destroy', $lomba->id_lomba) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus lomba ini?')"
                                            class="text-red-600 hover:text-red-900 flex items-center">
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-12 text-center">
                                <img src="{{ asset('assets/img/data_kosong.svg') }}" alt="Belum ada lomba"
                                    class="mx-auto mb-4 w-48 h-auto">
                                <p class="text-gray-500 font-medium text-lg">Belum ada data lomba yang tersedia.</p>
                                <p class="text-sm text-gray-400">Silakan tambahkan lomba baru.</p>
                            </td>
                        </tr>

                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{-- {{ $lombas->links() }} --}}
        </div>
    </div>
@endsection