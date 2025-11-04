@extends('admin.layouts.app')

@section('content')
    <div class="p-8 bg-white rounded-2xl shadow-lg">

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Timeline Lomba</h2>
                <p class="text-sm text-gray-500">Kelola semua jadwal dan tahapan untuk setiap lomba.</p>
            </div>
            <a href="{{ route('timeline.create') }}"
                class="flex items-center bg-blue-600 text-white px-5 py-2.5 rounded-lg font-semibold hover:bg-blue-700 shadow-md hover:shadow-lg transition">
                <i class="fas fa-plus mr-2"></i> Tambah Timeline
            </a>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-6 p-4 flex items-center bg-green-50 text-green-700 rounded-lg border border-green-200">
                <i class="fas fa-check-circle mr-3 text-green-600"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Tabel Timeline --}}
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Lomba
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                            Mulai</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Tanggal
                            Selesai</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Keterangan</th>
                        <th class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($timelines as $t)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="text-sm font-medium text-gray-900">{{ $t->lomba->nama_lomba }}</div>
                                <div class="text-xs text-gray-500">ID: LOMBA-{{ $t->lomba_id }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ \Carbon\Carbon::parse($t->lomba->tanggal_mulai)->format('d M Y, H:i') }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                {{ \Carbon\Carbon::parse($t->lomba->tanggal_selesai)->format('d M Y, H:i') }}
                            </td>

                            <td class="px-6 py-4 whitespace-normal max-w-sm text-sm text-gray-600">
                                {{ $t->keterangan }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-4">
                                    <a href="{{ route('timeline.edit', $t) }}"
                                        class="text-blue-600 hover:text-blue-900 flex items-center">
                                        <i class="fas fa-pen-to-square mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('timeline.destroy', $t) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus timeline ini?')"
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
                                <i class="fas fa-calendar-times text-4xl text-gray-300 mb-3"></i>
                                <p class="text-gray-500">Data timeline belum tersedia.</p>
                                <p class="text-sm text-gray-400">Silakan tambahkan timeline baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
@endsection