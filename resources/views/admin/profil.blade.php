@extends('admin.layouts.app')

@section('title', 'Profil Admin')
@section('header-title', 'Profil Admin')

@section('content')
<div class="max-w-3xl mx-auto bg-white rounded-xl shadow-xl p-6">

    <!-- Header Profil -->
    <div class="flex items-center space-x-6 mb-8">
        <div class="w-24 h-24 bg-gradient-to-br from-blue-500 to-blue-700 rounded-full flex items-center justify-center text-white text-4xl font-bold shadow-lg">
            {{ strtoupper(substr($adminName,0,1)) }}
        </div>
        <div>
            <h2 class="text-2xl font-semibold text-gray-800 flex items-center gap-2">
                <i class="fas fa-user-circle text-blue-600"></i>
                {{ $adminName }}
            </h2>
            <p class="text-gray-500 flex items-center gap-2">
                <i class="fas fa-shield-alt"></i> Super Admin
            </p>
        </div>
    </div>

    <!-- Detail Akun -->
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-8">
        <div class="p-4 bg-blue-50 rounded-lg shadow hover:shadow-md transition flex items-center gap-3">
            <i class="fas fa-id-badge text-blue-600 text-xl"></i>
            <div>
                <p class="text-gray-500 text-sm">Nama</p>
                <p class="text-gray-800 font-medium">{{ $adminName }}</p>
            </div>
        </div>
        <div class="p-4 bg-green-50 rounded-lg shadow hover:shadow-md transition flex items-center gap-3">
            <i class="fas fa-user text-green-600 text-xl"></i>
            <div>
                <p class="text-gray-500 text-sm">Username</p>
                <p class="text-gray-800 font-medium">{{ $adminUsername ?? '-' }}</p>
            </div>
        </div>
        <div class="p-4 bg-yellow-50 rounded-lg shadow hover:shadow-md transition flex items-center gap-3">
            <i class="fas fa-calendar-alt text-yellow-600 text-xl"></i>
            <div>
                <p class="text-gray-500 text-sm">Terdaftar</p>
                <p class="text-gray-800 font-medium">{{ \Carbon\Carbon::parse($adminCreatedAt ?? now())->format('d M Y') }}</p>
            </div>
        </div>
        <div class="p-4 bg-purple-50 rounded-lg shadow hover:shadow-md transition flex items-center gap-3">
            <i class="fas fa-shield-alt text-purple-600 text-xl"></i>
            <div>
                <p class="text-gray-500 text-sm">Role</p>
                <p class="text-gray-800 font-medium">Super Admin</p>
            </div>
        </div>
    </div>

    <!-- Form Update Username & Password -->
    <div class="bg-gray-50 p-6 rounded-xl shadow-inner mb-8">
        <h3 class="text-gray-700 font-semibold mb-4 flex items-center gap-2">
            <i class="fas fa-edit text-blue-600"></i> Ubah Akun
        </h3>
        <form action="{{ route('admin.updateProfile') }}" method="POST" class="space-y-4">
            @csrf
            <div>
                <label class="block text-gray-600 text-sm mb-1" for="username">Username Baru</label>
                <input type="text" name="username" id="username" value="{{ $adminUsername ?? '' }}"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-600 text-sm mb-1" for="password">Password Baru</label>
                <input type="password" name="password" id="password"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div>
                <label class="block text-gray-600 text-sm mb-1" for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation"
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500">
            </div>
            <div class="flex justify-end">
                <button type="submit"
                    class="bg-blue-600 hover:bg-blue-700 text-white px-6 py-2 rounded-lg shadow-md transition flex items-center gap-2">
                    <i class="fas fa-save"></i> Simpan Perubahan
                </button>
            </div>
        </form>
    </div>

    <!-- Kembali ke Dashboard -->
    <div class="text-center">
        <a href="{{ route('dashboard') }}"
           class="inline-block bg-gray-200 hover:bg-gray-300 text-gray-800 px-6 py-2 rounded-lg shadow-md transition flex items-center gap-2 justify-center">
           <i class="fas fa-arrow-left"></i> Kembali ke Dashboard
        </a>
    </div>
</div>
@endsection
