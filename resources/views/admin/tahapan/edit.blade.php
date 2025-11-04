

    {{-- Form Edit Data --}}
    @extends('admin.layouts.app')

    @section('title', 'Edit Tahapan')

    @section('content')
        <div class="p-8 bg-white rounded-2xl shadow-lg">

            <div class="flex items-center justify-between mb-8">
                <div>
                    <h2 class="text-3xl font-bold text-gray-800">Edit Tahapan</h2>
                    <p class="text-sm text-gray-500 mt-1">Perbarui informasi tahapan lomba di bawah ini.</p>
                </div>
                <a href="{{ route('tahapan.index') }}"
                    class="flex items-center bg-gray-200 text-gray-700 px-4 py-2 rounded-lg font-medium hover:bg-gray-300 transition">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>

            <form id="tahapan-form" action="{{ route('tahapan.update', $tahapan) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="border-t border-gray-200 pt-8">
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div class="md:col-span-1">
                            <label for="judul_tahap" class="block text-sm font-semibold text-gray-700 mb-2">
                                Judul Tahapan <span class="text-red-500">*</span>
                            </label>
                            <input type="text" id="judul_tahap" name="judul_tahap"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                value="{{ old('judul_tahap', $tahapan->judul_tahap) }}" required>
                        </div>

                        <div class="md:col-span-1">
                            <label for="urutan" class="block text-sm font-semibold text-gray-700 mb-2">
                                Urutan
                            </label>
                            <input type="number" id="urutan" name="urutan"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                value="{{ old('urutan', $tahapan->urutan) }}" min="1" required>
                        </div>

                        <div class="md:col-span-1">
                            <label for="tanggal_mulai" class="block text-sm font-semibold text-gray-700 mb-2">
                                Tanggal Mulai
                            </label>
                            <input type="date" id="tanggal_mulai" name="tanggal_mulai"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                value="{{ old('tanggal_mulai', $tahapan->tanggal_mulai) }}" required>
                        </div>

                        <div class="md:col-span-1">
                            <label for="tanggal_selesai" class="block text-sm font-semibold text-gray-700 mb-2">
                                Tanggal Selesai
                            </label>
                            <input type="date" id="tanggal_selesai" name="tanggal_selesai"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                value="{{ old('tanggal_selesai', $tahapan->tanggal_selesai) }}" required>
                        </div>

                        <div class="md:col-span-2">
                            <label for="deskripsi" class="block text-sm font-semibold text-gray-700 mb-2">
                                Deskripsi
                            </label>
                            <textarea id="deskripsi" name="deskripsi" rows="4"
                                class="w-full px-4 py-2 border rounded-lg focus:ring-blue-500 focus:border-blue-500"
                                placeholder="Jelaskan detail tahapan ini...">{{ old('deskripsi', $tahapan->deskripsi) }}</textarea>
                        </div>
                    </div>

                    <div class="mt-8 pt-6 border-t border-gray-200 flex justify-end">
                        <button type="submit" id="submit-button"
                            class="flex items-center justify-center bg-blue-600 text-white px-6 py-2.5 rounded-lg font-semibold hover:bg-blue-700 shadow-md hover:shadow-lg transition disabled:opacity-75 disabled:cursor-not-allowed">
                            <i class="fas fa-save mr-2"></i> Update Tahapan
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

                form.addEventListener('submit', function () {
                    submitButton.disabled = true;
                    defaultText.classList.add('hidden');
                    loadingText.classList.remove('hidden');
                });
            });
        </script>
    @endpush