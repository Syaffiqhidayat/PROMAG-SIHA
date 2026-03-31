<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Kerusakan') }}
        </h2>
    </x-slot>

    {{-- Flatpickr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">

                <div class="p-4 bg-gray-800 text-white font-bold uppercase tracking-wide text-sm">
                    FORM TAMBAH KERUSAKAN HARDWARE
                </div>

                <div class="p-6">
                    <form action="{{ route('kerusakan.store') }}" method="POST">
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

                            {{-- Tanggal Respon --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Respon <span class="text-red-500">*</span></label>
                                <input type="text" name="tgl_respon" id="tgl_respon"
                                       value="{{ old('tgl_respon') }}"
                                       placeholder="dd/mm/yyyy"
                                       readonly
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 bg-white @error('tgl_respon') border-red-500 @enderror">
                                @error('tgl_respon')
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

                            {{-- Waktu Respon --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Waktu Respon <span class="text-red-500">*</span></label>
                                <input type="time" name="waktu_respon" id="waktu_respon"
                                       value="{{ old('waktu_respon') }}"
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('waktu_respon') border-red-500 @enderror">
                                @error('waktu_respon')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Hardware --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Hardware <span class="text-red-500">*</span></label>
                                <select name="hardware_id"
                                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('hardware_id') border-red-500 @enderror">
                                    <option value="">-- Pilih Hardware --</option>
                                    @foreach($hardwares as $hardware)
                                        <option value="{{ $hardware->id }}" {{ old('hardware_id') == $hardware->id ? 'selected' : '' }}>
                                            {{ $hardware->nama_barang }} ({{ $hardware->kd_barang }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('hardware_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Unit --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Unit <span class="text-red-500">*</span></label>
                                <select name="unit_id"
                                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('unit_id') border-red-500 @enderror">
                                    <option value="">-- Pilih Unit --</option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}" {{ old('unit_id') == $unit->id ? 'selected' : '' }}>
                                            {{ $unit->nama_unit }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('unit_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Teknisi --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Teknisi <span class="text-red-500">*</span></label>
                                <select name="user_id"
                                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('user_id') border-red-500 @enderror">
                                    <option value="">-- Pilih Teknisi --</option>
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
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

                        {{-- Tindakan --}}
                        <div class="mt-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Tindakan Perbaikan <span class="text-red-500">*</span></label>
                            <textarea name="tindakan" rows="4"
                                      class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('tindakan') border-red-500 @enderror"
                                      placeholder="Tindakan yang dilakukan...">{{ old('tindakan') }}</textarea>
                            @error('tindakan')
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

    {{-- Flatpickr JS --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function () {

            // Tanggal Request - otomatis hari ini
            flatpickr("#tgl_requst", {
                dateFormat: "d/m/Y",
                defaultDate: "today",
                allowInput: false,
            });

            // Tanggal Respon - pilih manual
            flatpickr("#tgl_respon", {
                dateFormat: "d/m/Y",
                allowInput: false,
            });

            // Waktu Request - otomatis jam sekarang
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