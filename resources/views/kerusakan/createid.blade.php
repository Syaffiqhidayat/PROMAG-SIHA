<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Kerusakan') }}
        </h2>
    </x-slot>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Alert Error jika validasi gagal --}}
            @if ($errors->any())
                <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                    <p class="font-bold">Terjadi Kesalahan:</p>
                    <ul class="list-disc list-inside text-sm">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">

                <div class="p-4 bg-gray-800 text-white font-bold uppercase tracking-wide text-sm">
                    FORM TAMBAH KERUSAKAN HARDWARE
                </div>

                <div class="p-6">
                    {{-- PERBAIKAN: Action diarahkan ke storeid --}}
                    <form action="{{ route('kerusakan.storeid') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            {{-- Tanggal Request --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Request <span class="text-red-500">*</span></label>
                                <input type="text" name="tgl_requst" id="tgl_requst"
                                       value="{{ old('tgl_requst') }}"
                                       placeholder="dd/mm/yyyy"
                                       readonly
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 bg-white @error('tgl_requst') border-red-500 @enderror">
                                @error('tgl_requst')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Waktu Request --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Waktu Request <span class="text-red-500">*</span></label>
                                <input type="time" name="waktu_requst" id="waktu_requst"
                                       value="{{ old('waktu_requst') }}"
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('waktu_requst') border-red-500 @enderror">
                                @error('waktu_requst')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Hardware (Otomatis) --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Hardware <span class="text-red-500">*</span></label>
                                <select name="hardware_id"
                                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('hardware_id') border-red-500 @enderror">
                                        <option value="{{ $hardware->id }}" selected>
                                            {{ $hardware->nama_barang }} ({{ $hardware->jenis_barang }})
                                        </option>
                                </select>
                                @error('hardware_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Unit (Otomatis) --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Unit <span class="text-red-500">*</span></label>
                                <select name="unit_id"
                                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('unit_id') border-red-500 @enderror">
                                        <option value="{{ $unit->id }}" selected>
                                            {{ $unit->nama_unit }}
                                        </option>
                                </select>
                                @error('unit_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- Laporan --}}
                        <div class="mt-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Laporan Kerusakan <span class="text-red-500">*</span></label>
                            <textarea name="laporan" rows="4"
                                      class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('laporan') border-red-500 @enderror"
                                      placeholder="Deskripsikan kerusakan...">{{ old('laporan') }}</textarea>
                            @error('laporan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Buttons --}}
                        <div class="mt-6 flex gap-3">
                            <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded shadow transition duration-150 text-xs uppercase">
                                SIMPAN
                            </button>
                            <a href="{{ route('kerusakan.index') }}"
                               class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded shadow transition duration-150 text-xs uppercase">
                                BATAL
                            </a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            // Tanggal Request
            flatpickr("#tgl_requst", {
                dateFormat: "d/m/Y",
                defaultDate: "{{ old('tgl_requst', date('d/m/Y')) }}",
                allowInput: false,
            });

            // Waktu Request
            const waktuInput = document.getElementById('waktu_requst');
            if (!waktuInput.value) {
                const now = new Date();
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                waktuInput.value = `${hours}:${minutes}`;
            }
        });
    </script>
</x-app-layout>