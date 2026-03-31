<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Mutasi') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">

                <div class="p-4 bg-gray-800 text-white font-bold uppercase tracking-wide text-sm">
                    FORM TAMBAH MUTASI HARDWARE
                </div>

                <div class="p-6">
                    <form action="{{ route('mutasis.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            {{-- Hardware --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">
                                    Hardware <span class="text-red-500">*</span>
                                </label>
                                <select name="hardware_id" id="hardware_id"
                                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('hardware_id') border-red-500 @enderror">
                                    <option value="">-- Pilih Hardware --</option>
                                    @foreach ($hardwares as $hw)
                                        <option value="{{ $hw->id }}"
                                            {{ old('hardware_id') == $hw->id ? 'selected' : '' }}>
                                            {{ $hw->nama_barang }} ({{ $hw->kd_barang }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('hardware_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Teknisi / User --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">
                                    Teknisi <span class="text-red-500">*</span>
                                </label>
                                <select name="user_id"
                                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('user_id') border-red-500 @enderror">
                                    <option value="">-- Pilih Teknisi --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Unit Asal (otomatis terisi dari hardware) --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">
                                    Unit Asal <span class="text-red-500">*</span>
                                </label>
                                {{-- Hidden input untuk dikirim ke server --}}
                                <input type="hidden" name="unit_asal_id" id="unit_asal_id" value="{{ old('unit_asal_id') }}">
                                {{-- Field readonly sebagai tampilan --}}
                                <input type="text" id="unit_asal_nama"
                                       class="w-full border border-gray-300 bg-gray-100 rounded px-3 py-2 text-sm text-gray-600 cursor-not-allowed @error('unit_asal_id') border-red-500 @enderror"
                                       placeholder="Otomatis terisi saat pilih hardware..."
                                       readonly>
                                @error('unit_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Unit Tujuan --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">
                                    Unit Tujuan <span class="text-red-500">*</span>
                                </label>
                                <select name="unit_tujuan_id" id="unit_tujuan_id"
                                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('unit_tujuan_id') border-red-500 @enderror">
                                    <option value="">-- Pilih Unit Tujuan --</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ old('unit_tujuan_id') == $unit->id ? 'selected' : '' }}>
                                            {{ $unit->nama_unit }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('unit_tujuan_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                        </div>

                        {{-- Keterangan --}}
                        <div class="mt-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">
                                Keterangan <span class="text-red-500">*</span>
                            </label>
                            <textarea name="keterangan" rows="4"
                                      class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('keterangan') border-red-500 @enderror"
                                      placeholder="Tuliskan alasan atau keterangan mutasi...">{{ old('keterangan') }}</textarea>
                            @error('keterangan')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Buttons --}}
                        <div class="mt-6 flex gap-3">
                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow transition duration-150 text-xs uppercase">
                                SIMPAN
                            </button>
                            <a href="{{ route('mutasis.index') }}"
                               class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded shadow transition duration-150 text-xs uppercase">
                                BATAL
                            </a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>

    {{-- Script AJAX untuk mengisi unit asal otomatis --}}
    <script>
        document.getElementById('hardware_id').addEventListener('change', function () {
            const hardwareId = this.value;
            const unitAsalId   = document.getElementById('unit_asal_id');
            const unitAsalNama = document.getElementById('unit_asal_nama');

            if (!hardwareId) {
                unitAsalId.value   = '';
                unitAsalNama.value = '';
                return;
            }

            // Loading state
            unitAsalNama.value = 'Memuat...';

            fetch(`/mutasis/get-unit/${hardwareId}`)
                .then(res => {
                    if (!res.ok) throw new Error('Gagal fetch');
                    return res.json();
                })
                .then(data => {
                    if (data.unit_asal_id) {
                        unitAsalId.value   = data.unit_asal_id;
                        unitAsalNama.value = data.unit_asal_nama;
                    } else {
                        unitAsalId.value   = '';
                        unitAsalNama.value = 'Unit tidak ditemukan';
                    }
                })
                .catch(() => {
                    unitAsalId.value   = '';
                    unitAsalNama.value = 'Gagal mengambil data unit';
                });
        });
    </script>

</x-app-layout>