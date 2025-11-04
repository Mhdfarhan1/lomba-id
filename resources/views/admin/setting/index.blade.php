@extends('admin.layouts.app')

@section('content')
    <div class="p-8 bg-white rounded-2xl shadow-lg max-w-4xl mx-auto">

        <!-- Header -->
        <div class="mb-6 pb-6 border-b border-gray-200">
            <h2 class="text-2xl font-bold text-gray-800">Pengaturan Countdown Utama</h2>
            <p class="text-sm text-gray-500">Atur tanggal deadline utama yang akan muncul di countdown landing page.</p>
        </div>

        <!-- Alert Sukses -->
        @if(session('success'))
            <div class="mb-6 p-4 flex items-center bg-green-50 text-green-700 rounded-lg border border-green-200">
                <i class="fas fa-check-circle mr-3 text-green-600"></i>
                <span class="font-medium">{{ session('success') }}</span>
            </div>
        @endif

        <!-- Alert Error -->
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

        <!-- Form Pengaturan -->
        <form action="{{ route('admin.setting.update') }}" method="POST" id="deadline-form">
            @csrf
            @method('PUT')

            <div class="space-y-4">
                <div>
                    <label for="main_deadline" class="block text-sm font-medium text-gray-700 mb-2">
                        Tanggal & Waktu Deadline <span class="text-red-500">*</span>
                    </label>

                    @php
                        // Pastikan format datetime-local selalu YYYY-MM-DDTHH:MM
                        $deadlineValue = old('main_deadline', $mainDeadline ? \Carbon\Carbon::parse($mainDeadline)->format('Y-m-d\TH:i') : '');
                    @endphp

                    <input type="datetime-local" id="main_deadline" name="main_deadline" value="{{ $deadlineValue }}" class="w-full md:w-1/2 rounded-lg border border-gray-300 bg-white px-3 py-2 shadow-sm
                                  focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500 transition"
                        required>
                    <p class="mt-2 text-xs text-gray-500">
                        Ini adalah tanggal yang akan jadi target hitung mundur di landing page.
                    </p>
                </div>
            </div>

            <div class="flex justify-start pt-8 mt-8 border-t border-gray-200">
                <button type="submit" class="flex items-center bg-blue-600 text-white px-6 py-2.5 rounded-lg font-semibold
                                               hover:bg-blue-700 shadow-md hover:shadow-lg transition">
                    <i class="fas fa-save mr-2"></i>
                    Simpan Pengaturan
                </button>
            </div>

        </form>
    </div>
@endsection

@section('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const input = document.getElementById('main_deadline');

            // Pastikan value selalu valid saat klik Today atau date picker
            input.addEventListener('input', function () {
                if (!input.value) {
                    const now = new Date();
                    const year = now.getFullYear();
                    const month = String(now.getMonth() + 1).padStart(2, '0');
                    const day = String(now.getDate()).padStart(2, '0');
                    const hours = String(now.getHours()).padStart(2, '0');
                    const minutes = String(now.getMinutes()).padStart(2, '0');
                    input.value = `${year}-${month}-${day}T${hours}:${minutes}`;
                }
            });
        });
    </script>
@endsection