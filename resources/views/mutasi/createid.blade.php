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

                            {{-- Merek/Tipe (Otomatis) --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Merek / Tipe <span class="text-red-500">*</span></label>
                                <select name="hardware_id"
                                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('hardware_id') border-red-500 @enderror">
                                        <option value="{{ $hardware->id }}" selected>
                                            {{ $hardware->merek }} / {{ $hardware->tipe }}
                                        </option>
                                </select>
                                @error('hardware_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Unit Asal --}}
                                <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Unit Asal<span class="text-red-500">*</span></label>
                                <select name="unit_asal_id"
                                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('unit_asal_id') border-red-500 @enderror">
                                        <option value="{{ $hardware->units->id }}" selected>
                                            {{ $hardware->units->nama_unit }}
                                        </option>
                                </select>
                                @error('unit_asal_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Unit Tujuan --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">
                                    Unit Tujuan <span class="text-red-500">*</span>
                                </label>
                                <select name="unit_tujuan_id"
                                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('unit_tujuan_id') border-red-500 @enderror">
                                    <option value="">-- Pilih Unit Tujuan --</option>
                                    @foreach ($units as $u)
                                        {{-- Filter agar tidak menampilkan unit yang sama dengan unit asal hardware --}}
                                        @if ($u->id !== ($hardware->unit->id ?? null))
                                            <option value="{{ $u->id }}"
                                                {{ old('unit_tujuan_id') == $u->id ? 'selected' : '' }}>
                                                {{ $u->nama_unit }}
                                            </option>
                                        @endif
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
</x-app-layout>