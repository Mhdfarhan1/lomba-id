@extends('admin.layouts.app')

@section('content')
    <div class="p-8 bg-white rounded-2xl shadow-lg">

        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Data Kelas</h2>
                <p class="text-sm text-gray-500">Kelola daftar kelas yang tersedia di sistem.</p>
            </div>
            <a href="{{ route('kelas.create') }}"
                class="flex items-center bg-blue-600 text-white px-3 py-2.5 rounded-lg font-semibold hover:bg-blue-700 shadow-md hover:shadow-lg transition">
                <i class="fas fa-plus mr-2"></i>
                Tambah Kelas
            </a>
        </div>

        @if(session('success'))
            <div class="mb-6 p-4 flex items-center bg-green-50 text-green-700 rounded-lg border border-green-200">
                <i class="fas fa-check-circle mr-3 text-green-600"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider w-10">
                            No
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            ID Kelas
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Nama Kelas
                        </th>
                        <th scope="col"
                            class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Aksi
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($kelases as $index => $kelas)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-700 text-center">
                                {{ $index + 1 }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-700">
                                KLS-{{ $kelas->id_kelas }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
                                {{ $kelas->nama_kelas }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-4">
                                    <a href="{{ route('kelas.edit', $kelas->id_kelas) }}"
                                        class="text-blue-600 hover:text-blue-900 flex items-center">
                                        <i class="fas fa-pen-to-square mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('kelas.destroy', $kelas->id_kelas) }}" method="POST" class="inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" onclick="return confirm('Yakin ingin menghapus kelas ini?')"
                                            class="text-red-600 hover:text-red-900 flex items-center">
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-12 text-center">
                                <img src="{{ asset('assets/img/data_kosong.svg') }}" alt="Belum ada kelas"
                                    class="mx-auto mb-4 w-48 h-auto">
                                <p class="text-gray-500 font-medium text-lg">Belum ada data kelas yang tersedia.</p>
                                <p class="text-sm text-gray-400">Silakan tambahkan kelas baru.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{-- {{ $kelases->links() }} --}}
        </div>
    </div>
@endsection