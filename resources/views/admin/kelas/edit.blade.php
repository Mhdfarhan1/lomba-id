@extends('admin.layouts.app')

@section('title', 'Edit Kelas')

@section('content')
<div class="p-8 bg-white rounded-2xl shadow-xl border border-gray-100">
    
    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-200">
        <div>
            <h2 class="text-2xl font-bold text-gray-800">Edit Kelas</h2>
            <p class="text-sm text-gray-500">Perbarui data kelas yang sudah ada.</p>
        </div>
        
        <a href="{{ route('kelas.index') }}" 
           class="flex items-center text-gray-500 px-5 py-2.5 rounded-lg font-semibold hover:bg-gray-100 hover:text-gray-800 transition-colors">
            <i class="fas fa-arrow-left mr-2"></i>
            Kembali
        </a>
    </div>

    <form id="kelasForm" action="{{ route('kelas.update', $kelas->id_kelas) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT')

        <div>
            <label for="nama_kelas" class="block text-sm font-semibold text-gray-700 mb-2">Nama Kelas</label>
            
            <div class="relative group">
                <div class="absolute inset-y-0 left-0 flex items-center pl-3.5 pointer-events-none">
                    <i class="fas fa-chalkboard-teacher text-gray-400 transition-colors group-focus-within:text-blue-600"></i>
                </div>
                <input type="text" name="nama_kelas" id="nama_kelas" 
                       value="{{ old('nama_kelas', $kelas->nama_kelas) }}"
                       class="w-full pl-10 pr-4 py-3 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500/50 focus:border-blue-500 focus:shadow-md transition-all"
                       placeholder="Contoh: XII IPA 1" required>
            </div>
        </div>

        <div class="flex justify-end pt-4">
            <button id="btnSubmit" type="submit" 
                    class="group flex items-center bg-gradient-to-r from-yellow-500 to-amber-600 text-white px-6 py-2.5 rounded-lg font-semibold shadow-md hover:shadow-lg hover:from-yellow-600 hover:to-amber-700 transition-all duration-300">
                
                <i id="btnIcon" class="fas fa-save mr-2 transition-transform group-hover:scale-110"></i> 
                <span id="btnText">Perbarui</span>
            </button>
        </div>
    </form>
</div>

<script>
    document.getElementById('kelasForm').addEventListener('submit', function() {
        const btn = document.getElementById('btnSubmit');
        const icon = document.getElementById('btnIcon');
        const text = document.getElementById('btnText');

        text.textContent = 'Memperbarui...';
        icon.className = 'fas fa-spinner fa-spin mr-2';
        btn.disabled = true;
        btn.classList.add('opacity-75', 'cursor-not-allowed');
    });
</script>
@endsection
