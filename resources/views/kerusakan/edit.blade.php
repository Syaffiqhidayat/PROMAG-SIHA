<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data Kerusakan') }}
        </h2>
    </x-slot>

    {{-- Import Flatpickr CSS --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">

                <div class="p-4 bg-gray-800 text-white font-bold uppercase tracking-wide text-sm">
                    FORM EDIT KERUSAKAN HARDWARE
                </div>

                <div class="p-6">
                    <form action="{{ route('kerusakan.update', $kerusakan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            {{-- Tanggal Request --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal Request <span class="text-red-500">*</span></label>
                                <input type="text" name="tgl_requst" id="tgl_requst"
                                       value="{{ old('tgl_requst', \Carbon\Carbon::parse($kerusakan->tgl_requst)->format('d/m/Y')) }}"
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 bg-white @error('tgl_requst') border-red-500 @enderror"
                                       placeholder="dd/mm/yyyy" readonly>
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
                                <input type="time" name="waktu_requst"
                                       value="{{ old('waktu_requst', $kerusakan->waktu_requst) }}"
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('waktu_requst') border-red-500 @enderror">
                            </div>

                            {{-- Waktu Respon --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Waktu Respon <span class="text-red-500">*</span></label>
                                <input type="time" name="waktu_respon"
                                       value="{{ old('waktu_respon', $kerusakan->waktu_respon ?? date('H:i')) }}"
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('waktu_respon') border-red-500 @enderror">
                            </div>

                            {{-- Hardware (Otomatis & Readonly) --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Hardware</label>
                                <input type="text" value="{{ $kerusakan->hardwares->nama_barang }}" class="w-full border border-gray-200 bg-gray-100 rounded px-3 py-2 text-sm text-gray-600 cursor-not-allowed" readonly>
                                <input type="hidden" name="hardware_id" value="{{ $kerusakan->hardware_id }}">
                            </div>

                            {{-- Unit (Otomatis & Readonly) --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Unit</label>
                                <input type="text" value="{{ $kerusakan->units->nama_unit }}" class="w-full border border-gray-200 bg-gray-100 rounded px-3 py-2 text-sm text-gray-600 cursor-not-allowed" readonly>
                                <input type="hidden" name="unit_id" value="{{ $kerusakan->unit_id }}">
                            </div>

                            {{-- Teknisi --}}
                            <div class="md:col-span-2">
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Teknisi <span class="text-red-500">*</span></label>
                                <select name="user_id" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">
                                    @foreach($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id', $kerusakan->user_id) == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                        </div>

                        {{-- Laporan --}}
                        <div class="mt-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Laporan Kerusakan <span class="text-red-500">*</span></label>
                            <textarea name="laporan" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400">{{ old('laporan', $kerusakan->laporan) }}</textarea>
                        </div>

                        {{-- Tindakan --}}
                        <div class="mt-4">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Tindakan Perbaikan <span class="text-red-500">*</span></label>
                            <textarea name="tindakan" rows="3" class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400" placeholder="Apa yang sudah diperbaiki?">{{ old('tindakan', $kerusakan->tindakan) }}</textarea>
                        </div>

                        <div class="mt-6 flex gap-3">
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow text-xs uppercase">UPDATE</button>
                            <a href="{{ route('kerusakan.index') }}" class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded shadow text-xs uppercase">BATAL</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    {{-- Script Flatpickr --}}
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <script>
        window.addEventListener('DOMContentLoaded', function () {
            flatpickr("#tgl_requst", { dateFormat: "d/m/Y", allowInput: false });
            flatpickr("#tgl_respon", { dateFormat: "d/m/Y", allowInput: false });
        });
    </script>
</x-app-layout>