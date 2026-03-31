<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-indigo-600 rounded-lg flex items-center justify-center shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">Edit Data Barang</h2>
                <p class="text-sm text-gray-400 leading-none mt-0.5">Perbarui informasi hardware inventaris</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <form action="{{ route('hardware.update', $hardware->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">

                    {{-- ── Section: Identitas Barang ── --}}
                    <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex items-center gap-2">
                        <span class="w-1 h-5 bg-indigo-500 rounded-full inline-block"></span>
                        <h3 class="text-sm font-bold text-gray-600 uppercase tracking-wider">Identitas Barang</h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Kode Barang</label>
                            <input type="text" name="kd_barang"
                                   placeholder="Contoh: QWE_213"
                                   value="{{ old('kd_barang', $hardware->kd_barang) }}"
                                   class="w-full rounded-lg border @error('kd_barang') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition">
                            @error('kd_barang')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">No. Inventaris</label>
                            <input type="text" name="no_iventaris"
                                   placeholder="Contoh: 2026/INV/001"
                                   value="{{ old('no_iventaris', $hardware->no_iventaris) }}"
                                   class="w-full rounded-lg border @error('no_iventaris') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition">
                            @error('no_iventaris')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Nama Barang</label>
                            <input type="text" name="nama_barang"
                                   placeholder="Nama lengkap barang"
                                   value="{{ old('nama_barang', $hardware->nama_barang) }}"
                                   class="w-full rounded-lg border @error('nama_barang') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition">
                            @error('nama_barang')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                    </div>

                    {{-- ── Section: Spesifikasi ── --}}
                    <div class="px-6 py-4 bg-gray-50 border-t border-b border-gray-100 flex items-center gap-2">
                        <span class="w-1 h-5 bg-blue-500 rounded-full inline-block"></span>
                        <h3 class="text-sm font-bold text-gray-600 uppercase tracking-wider">Spesifikasi</h3>
                    </div>
                    <div class="p-6 space-y-5">

                        <div class="grid grid-cols-1 md:grid-cols-3 gap-5">

                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Jenis Barang</label>
                                <div class="relative">
                                    <select name="jenis_barang"
                                            class="w-full rounded-lg border @error('jenis_barang') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition appearance-none pr-10">
                                        <option value="" disabled {{ old('jenis_barang') ? '' : 'selected' }}>-- Pilih Jenis --</option>
                                        @foreach(['Monitor','Printer','CPU/Komputer','Laptop','Stavol','Mouse','Keyboard','Scaner','Jaringan','WIFI','TV Display','Finger Print'] as $jenis)
                                            <option value="{{ $jenis }}"
                                                {{ ($hardware->jenis_barang == $jenis || old('jenis_barang') == $jenis) ? 'selected' : '' }}>
                                                {{ $jenis }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                    </div>
                                </div>
                                @error('jenis_barang')
                                    <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Merek</label>
                                <input type="text" name="merek"
                                       placeholder="Contoh: MSI, Asus"
                                       value="{{ old('merek', $hardware->merek) }}"
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition">
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Tipe</label>
                                <input type="text" name="tipe"
                                       placeholder="Contoh: Modern 14 C11M"
                                       value="{{ old('tipe', $hardware->tipe) }}"
                                       class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition">
                            </div>

                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Spesifikasi Teknis</label>
                            <textarea name="spek" rows="3"
                                      placeholder="Contoh: Intel Core i3, 8GB DDR4, 512GB SSD ..."
                                      class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition resize-y">{{ old('spek', $hardware->spek) }}</textarea>
                        </div>

                    </div>

                    {{-- ── Section: Penempatan & Info Tambahan ── --}}
                    <div class="px-6 py-4 bg-gray-50 border-t border-b border-gray-100 flex items-center gap-2">
                        <span class="w-1 h-5 bg-emerald-500 rounded-full inline-block"></span>
                        <h3 class="text-sm font-bold text-gray-600 uppercase tracking-wider">Penempatan &amp; Info Tambahan</h3>
                    </div>
                    <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">
                                Unit
                                <span class="ml-1.5 inline-block bg-emerald-100 text-emerald-700 text-xs font-semibold px-2 py-0.5 rounded-full normal-case tracking-normal">Lokasi</span>
                            </label>
                            <div class="relative">
                                <select name="unit_id"
                                        class="w-full rounded-lg border @error('unit_id') border-red-400 bg-red-50 @else border-gray-300 @enderror px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition appearance-none pr-10">
                                    <option value="" disabled {{ old('unit_id') ? '' : 'selected' }}>-- Pilih Unit --</option>
                                    @foreach($units as $unit)
                                        <option value="{{ $unit->id }}"
                                            {{ ($hardware->unit_id == $unit->id || old('unit_id') == $unit->id) ? 'selected' : '' }}>
                                            {{ $unit->nama_unit }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-3 text-gray-400">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/></svg>
                                </div>
                            </div>
                            @error('unit_id')
                                <p class="mt-1 text-xs text-red-500">{{ $message }}</p>
                            @enderror
                        </div>

                        <div>
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Tanggal Masuk</label>
                            <input type="date" name="tanggal_masuk"
                                   value="{{ old('tanggal_masuk', $hardware->tanggal_masuk ? $hardware->tanggal_masuk->format('Y-m-d') : '') }}"
                                   class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition">
                        </div>

                        <div class="md:col-span-2">
                            <label class="block text-xs font-semibold text-gray-500 uppercase tracking-wide mb-1.5">Keterangan</label>
                            <textarea name="keterangan" rows="2"
                                      placeholder="Catatan tambahan ..."
                                      class="w-full rounded-lg border border-gray-300 px-4 py-2.5 text-sm text-gray-800 focus:outline-none focus:ring-2 focus:ring-indigo-400 focus:border-transparent transition resize-y">{{ old('keterangan', $hardware->keterangan) }}</textarea>
                        </div>

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
                        <a href="{{ route('hardware.index') }}"
                           class="inline-flex items-center gap-2 bg-white hover:bg-gray-100 text-gray-600 font-semibold py-2.5 px-6 rounded-lg text-sm border border-gray-300 transition shadow-sm">
                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                            </svg>
                            Kembali
                        </a>
                    </div>

                </div>{{-- end single card --}}

            </form>
        </div>
    </div>
</x-app-layout>