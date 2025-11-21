@extends('admin.layouts.app')

@section('title', 'Data Pendaftaran Lomba')

@section('content')
    <div class="p-8 bg-white rounded-2xl shadow-lg relative">

        {{-- Loader fullscreen untuk Kirim Semua --}}
        <div id="loaderAll" class="fixed inset-0 bg-black bg-opacity-40 flex items-center justify-center z-50 hidden">
            <div class="bg-white p-6 rounded-lg shadow-lg flex flex-col items-center">
                <svg class="animate-spin h-10 w-10 text-green-600 mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                </svg>
                <p class="text-gray-700 font-medium">Mengirim email ke semua peserta...</p>
            </div>
        </div>

        {{-- Header --}}
        <div class="flex items-center justify-between mb-6">
            <div>
                <h2 class="text-2xl font-bold text-gray-800">Data Pendaftaran Lomba</h2>
                <p class="text-sm text-gray-500">Kelola peserta yang sudah mendaftar lomba.</p>
            </div>

            <form id="form-send-all" action="{{ route('pendaftaran.sendAllEmail') }}" method="POST">
                @csrf
                <button type="submit"
                    class="px-4 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700 flex items-center shadow-md hover:shadow-lg transition-all">
                    <i class="fas fa-envelope mr-2"></i> Kirim Semua Email
                </button>
            </form>
        </div>

        {{-- Notifikasi sukses --}}
        @if(session('success'))
            <div class="mb-6 p-4 flex items-center bg-green-50 text-green-700 rounded-lg border border-green-200">
                <i class="fas fa-check-circle mr-3 text-green-600"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        {{-- Tabel data pendaftaran --}}
        <div class="overflow-x-auto rounded-lg border border-gray-200">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Nama
                            Peserta</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">NIS
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenis
                            Kelamin</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Kelas
                        </th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Asal
                            Sekolah</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Asal
                            PIK-R</th>

                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Email
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">No HP
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Lomba
                        </th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Jenis
                            Peserta</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Anggota
                            Kelompok</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Tanggal
                            Daftar</th>
                        <th class="px-6 py-3 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">Status
                        </th>
                        <th class="px-6 py-3 text-right text-xs font-semibold text-gray-600 uppercase tracking-wider">Aksi
                        </th>
                    </tr>
                </thead>

                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($pendaftaran as $index => $p)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-sm text-gray-700">{{ $index + 1 }}</td>
                            <td class="px-6 py-4 text-sm font-medium text-gray-900">{{ $p->peserta->nama_peserta }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $p->peserta->nis }}</td>
                            <td class="px-6 py-4 text-sm">
                                @if($p->peserta->jenis_kelamin == 'Laki-laki')
                                    <span class="text-blue-500"><i class="fas fa-mars mr-1.5"></i>Laki-laki</span>
                                @elseif($p->peserta->jenis_kelamin == 'Perempuan')
                                    <span class="text-pink-500"><i class="fas fa-venus mr-1.5"></i>Perempuan</span>
                                @else
                                    {{ $p->peserta->jenis_kelamin ?? '-' }}
                                @endif
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $p->peserta->kelas->nama_kelas ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $p->peserta->asal_sekolah ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $p->peserta->asal_pikr ?? '-' }}</td>

                            <td class="px-6 py-4 text-sm text-gray-600">{{ $p->peserta->email ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $p->peserta->no_hp ?? '-' }}</td>
                            <td class="px-6 py-4 text-sm text-gray-600">{{ $p->lomba->nama_lomba ?? '-' }}</td>

                            {{-- Jenis Peserta --}}
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $p->jenis_peserta ?? $p->peserta->jenis_peserta ?? '-' }}
                            </td>

                            {{-- Anggota Kelompok --}}
                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ $p->peserta->anggota_kelompok ?? '-' }}
                            </td>

                            <td class="px-6 py-4 text-sm text-gray-600">
                                {{ \Carbon\Carbon::parse($p->tanggal_daftar)->format('d-m-Y H:i') }}
                            </td>

                            {{-- Status --}}
                            <td class="px-6 py-4 text-sm">
                                <select data-id="{{ $p->id_pendaftaran }}"
                                    class="status-select px-2 py-1 rounded border border-gray-300 font-medium"
                                    style="color: {{ $p->status == 'menunggu' ? '#facc15' : ($p->status == 'diterima' ? '#16a34a' : '#ef4444') }}">
                                    <option value="menunggu" {{ $p->status == 'menunggu' ? 'selected' : '' }}>Menunggu</option>
                                    <option value="diterima" {{ $p->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                                    <option value="ditolak" {{ $p->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                                </select>
                            </td>

                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <div class="flex justify-end space-x-2">

                                    <form action="{{ route('pendaftaran.sendEmail', $p->id_pendaftaran) }}" method="POST"
                                        class="inline form-send-individual">
                                        @csrf
                                        <button type="submit" class="text-green-600 hover:text-green-900 flex items-center">
                                            <i class="fas fa-envelope mr-1"></i>
                                            <span class="btn-text">Kirim Email</span>
                                            <svg class="animate-spin h-5 w-5 ml-2 hidden loader-icon"
                                                xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor"
                                                    stroke-width="4"></circle>
                                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v8H4z"></path>
                                            </svg>
                                        </button>
                                    </form>

                                    <form action="{{ route('admin.pendaftaran.destroy', $p->id_pendaftaran) }}" method="POST"
                                        class="inline form-delete">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-red-600 hover:text-red-900 flex items-center">
                                            <i class="fas fa-trash-alt mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="13" class="px-6 py-12 text-center">
                                <img src="{{ asset('assets/img/data_kosong.svg') }}" alt="Belum ada peserta"
                                    class="mx-auto mb-4 w-48 h-auto">
                                <p class="text-gray-500 font-medium text-lg">Belum ada peserta yang mendaftar.</p>
                                <p class="text-sm text-gray-400">Silakan tunggu peserta mendaftar lomba.</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        // Loader untuk Kirim Semua
        function showFullLoader() {
            document.getElementById('loaderAll').classList.remove('hidden');
        }

        // Loader tombol per peserta
        function showBtnLoader(form) {
            const btn = form.querySelector('button');
            const text = btn.querySelector('.btn-text');
            const loader = btn.querySelector('.loader-icon');
            text.classList.add('hidden');
            loader.classList.remove('hidden');
            btn.disabled = true;
        }

        // Kirim Semua Email
        document.getElementById('form-send-all').addEventListener('submit', function (event) {
            event.preventDefault();
            const form = this;
            Swal.fire({
                title: 'Kirim Email ke Semua Peserta?',
                text: "Tindakan ini akan mengirim email konfirmasi ke SEMUA peserta. Lanjutkan?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#16a34a',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, Kirim Semua!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    showFullLoader();
                    form.submit();
                }
            });
        });

        // Kirim Email per peserta
        document.querySelectorAll('.form-send-individual').forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const currentForm = this;
                Swal.fire({
                    title: 'Kirim Email Konfirmasi?',
                    text: "Anda akan mengirim email ke peserta ini. Lanjutkan?",
                    icon: 'info',
                    showCancelButton: true,
                    confirmButtonColor: '#16a34a',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Kirim!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        showBtnLoader(currentForm);
                        currentForm.submit();
                    }
                });
            });
        });

        // Hapus data
        document.querySelectorAll('.form-delete').forEach(form => {
            form.addEventListener('submit', function (event) {
                event.preventDefault();
                const currentForm = this;
                Swal.fire({
                    title: 'Yakin ingin menghapus?',
                    text: "Data pendaftaran ini akan dihapus permanen!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        currentForm.submit();
                    }
                });
            });
        });

        // Update Status via AJAX
        document.querySelectorAll('.status-select').forEach(select => {
            select.dataset.prev = select.value; // simpan nilai sebelumnya
            select.addEventListener('change', function () {
                const id = this.dataset.id;
                const status = this.value;

                Swal.fire({
                    title: 'Ubah Status?',
                    text: `Anda akan mengubah status peserta menjadi "${status}".`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#16a34a',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, Ubah',
                    cancelButtonText: 'Batal'
                }).then(result => {
                    if (!result.isConfirmed) {
                        // Jika batal, kembalikan nilai sebelumnya
                        this.value = this.dataset.prev;
                        return;
                    }

                    fetch(`/admin/pendaftaran/${id}/update-status`, {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify({ status: status })
                    })
                        .then(res => res.json())
                        .then(data => {
                            if (data.success) {
                                // ubah warna sesuai status
                                this.style.color = status === 'menunggu' ? '#facc15' : (status === 'diterima' ? '#16a34a' : '#ef4444');
                                this.dataset.prev = status;
                                Swal.fire('Berhasil!', 'Status peserta berhasil diperbarui.', 'success');
                            } else {
                                this.value = this.dataset.prev;
                                Swal.fire('Gagal!', data.message || 'Terjadi kesalahan.', 'error');
                            }
                        })
                        .catch(() => {
                            this.value = this.dataset.prev;
                            Swal.fire('Gagal!', 'Terjadi kesalahan.', 'error');
                        });
                });
            });
        });


    </script>
@endpush