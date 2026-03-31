<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-indigo-600 rounded-lg flex items-center justify-center shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">Edit Data Mutasi</h2>
                <p class="text-sm text-gray-400 leading-none mt-0.5">Perbarui informasi mutasi hardware</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            {{-- Alert --}}
            @if (session('success'))
                <div class="mb-4 px-4 py-3 bg-green-50 border-l-4 border-green-400 text-green-700 rounded shadow-sm flex justify-between items-center">
                    <span>{{ session('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700 text-lg leading-none">&times;</button>
                </div>
            @endif

            <form action="{{ route('mutasis.update', $mutasi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">

                    {{-- ── Section: Info Hardware ── --}}
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex items-center gap-2">
                        <span class="w-1 h-5 bg-indigo-500 rounded-full inline-block"></span>
                        <h3 class="text-sm font-bold text-gray-600 uppercase tracking-wider">Info Hardware</h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- Hardware --}}
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">
                                Hardware <span class="text-red-500">*</span>
                            </label>
                            {{-- Info hardware yang sedang dimutasi (read-only hint) --}}
                            @if($mutasi->hardwares)
                                <div class="mb-2 flex items-center gap-2 text-xs text-indigo-700 bg-indigo-50 border border-indigo-200 rounded-lg px-3 py-2">
                                    <svg class="w-4 h-4 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 100 20A10 10 0 0012 2z"/></svg>
                                    Saat ini: <strong>{{ $mutasi->hardwares->nama_barang }}</strong> ({{ $mutasi->hardwares->kd_barang }})
                                </div>
                            @endif
                            <div class="relative">
                                <select name="hardware_id"
                                        class="w-full rounded-lg border @error('hardware_id') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition appearance-none pr-10">
                                    <option value="">-- Pilih Hardware --</option>
                                    @foreach ($hardwares as $hw)
                                        <option value="{{ $hw->id }}"
                                            {{ old('hardware_id', $mutasi->hardware_id) == $hw->id ? 'selected' : '' }}>
                                            {{ $hw->nama_barang }} ({{ $hw->kd_barang }})
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                            @error('hardware_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Teknisi --}}
                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">
                                Teknisi / Petugas <span class="text-red-500">*</span>
                            </label>
                            <div class="relative">
                                <select name="user_id"
                                        class="w-full rounded-lg border @error('user_id') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition appearance-none pr-10">
                                    <option value="">-- Pilih Teknisi --</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}"
                                            {{ old('user_id', $mutasi->user_id) == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                            @error('user_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- ── Section: Detail Mutasi ── --}}
                    <div class="px-6 py-4 bg-gray-50 border-t border-b border-gray-100 flex items-center gap-2">
                        <span class="w-1 h-5 bg-blue-500 rounded-full inline-block"></span>
                        <h3 class="text-sm font-bold text-gray-600 uppercase tracking-wider">Detail Mutasi</h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                        {{-- Unit Asal --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">
                                Unit Asal
                                <span class="ml-1.5 inline-block bg-red-100 text-red-600 text-xs font-semibold px-2 py-0.5 rounded-full normal-case tracking-normal">Dari</span>
                                <span class="text-red-500">*</span>
                            </label>
                            {{-- hint unit asal saat ini --}}
                            @if($mutasi->units1)
                                <div class="mb-2 text-xs text-red-700 bg-red-50 border border-red-200 rounded-lg px-3 py-2">
                                    Saat ini: <strong>{{ $mutasi->units1->nama_unit }}</strong>
                                </div>
                            @endif
                            <div class="relative">
                                <select name="unit_asal_id"
                                        class="w-full rounded-lg border @error('unit_asal_id') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition appearance-none pr-10">
                                    <option value="">-- Pilih Unit Asal --</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ old('unit_asal_id', $mutasi->unit_asal_id) == $unit->id ? 'selected' : '' }}>
                                            {{ $unit->nama_unit }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                            @error('unit_asal_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Unit Tujuan --}}
                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">
                                Unit Tujuan
                                <span class="ml-1.5 inline-block bg-emerald-100 text-emerald-700 text-xs font-semibold px-2 py-0.5 rounded-full normal-case tracking-normal">Ke</span>
                                <span class="text-red-500">*</span>
                            </label>
                            {{-- hint unit tujuan saat ini --}}
                            @if($mutasi->units2)
                                <div class="mb-2 text-xs text-emerald-700 bg-emerald-50 border border-emerald-200 rounded-lg px-3 py-2">
                                    Saat ini: <strong>{{ $mutasi->units2->nama_unit }}</strong>
                                </div>
                            @endif
                            <div class="relative">
                                <select name="unit_tujuan_id"
                                        class="w-full rounded-lg border @error('unit_tujuan_id') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition appearance-none pr-10">
                                    <option value="">-- Pilih Unit Tujuan --</option>
                                    @foreach ($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ old('unit_tujuan_id', $mutasi->unit_tujuan_id) == $unit->id ? 'selected' : '' }}>
                                            {{ $unit->nama_unit }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                            @error('unit_tujuan_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- ── Section: Keterangan ── --}}
                    <div class="px-6 py-4 bg-gray-50 border-t border-b border-gray-100 flex items-center gap-2">
                        <span class="w-1 h-5 bg-emerald-500 rounded-full inline-block"></span>
                        <h3 class="text-sm font-bold text-gray-600 uppercase tracking-wider">Keterangan</h3>
                    </div>
                    <div class="p-6">
                        <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">
                            Keterangan Mutasi <span class="text-red-500">*</span>
                        </label>
                        <textarea name="keterangan" rows="4"
                                  placeholder="Tuliskan alasan atau keterangan mutasi..."
                                  class="w-full rounded-lg border @error('keterangan') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition resize-y">{{ old('keterangan', $mutasi->keterangan) }}</textarea>
                        @error('keterangan')
                            <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- ── Action Buttons ── --}}
                    <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center gap-3">
                        <button type="submit"
                                class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-6 rounded-lg text-sm transition shadow-md hover:shadow-lg">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7" />
                            </svg>
                            Simpan Perubahan
                        </button>
                        <a href="{{ route('mutasis.index') }}"
                           class="inline-flex items-center gap-2 bg-white hover:bg-gray-100 text-gray-600 font-semibold py-2.5 px-6 rounded-lg text-sm border border-gray-300 transition shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Batal
                        </a>
                    </div>

                </div>{{-- end single card --}}

            </form>
        </div>
    </div>
</x-app-layout>