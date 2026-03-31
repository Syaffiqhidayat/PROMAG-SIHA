<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 bg-gray-700 rounded-lg flex items-center justify-center shadow">
                <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
            </div>
            <div>
                <h2 class="font-bold text-xl text-gray-800 leading-tight">Detail Data Barang</h2>
                <p class="text-sm text-gray-400 leading-none mt-0.5">Informasi lengkap hardware inventaris</p>
            </div>
        </div>
    </x-slot>

    <div class="py-10">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">

            <div class="bg-white shadow-sm rounded-xl border border-gray-100 overflow-hidden">

                {{-- ── Section: Identitas Barang ── --}}
                <div class="px-6 py-4 bg-gray-50 border-b border-gray-100 flex items-center gap-2">
                    <span class="w-1 h-5 bg-indigo-500 rounded-full inline-block"></span>
                    <h3 class="text-sm font-bold text-gray-600 uppercase tracking-wider">Identitas Barang</h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Kode Barang</p>
                        <p class="text-sm font-semibold text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5">
                            {{ $hardware->kd_barang ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">No. Inventaris</p>
                        <p class="text-sm font-semibold text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5">
                            {{ $hardware->no_iventaris ?? '-' }}
                        </p>
                    </div>

                    <div class="md:col-span-2">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Nama Barang</p>
                        <p class="text-sm font-semibold text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5">
                            {{ $hardware->nama_barang ?? '-' }}
                        </p>
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
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Jenis Barang</p>
                            <p class="text-sm font-semibold text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5">
                                {{ $hardware->jenis_barang ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Merek</p>
                            <p class="text-sm font-semibold text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5">
                                {{ $hardware->merek ?? '-' }}
                            </p>
                        </div>

                        <div>
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Tipe</p>
                            <p class="text-sm font-semibold text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5">
                                {{ $hardware->tipe ?? '-' }}
                            </p>
                        </div>

                    </div>

                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Spesifikasi Teknis</p>
                        <div class="text-sm text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 leading-relaxed min-h-[72px]">
                            {!! nl2br(e($hardware->spek ?? '-')) !!}
                        </div>
                    </div>

                </div>

                {{-- ── Section: Penempatan & Info Tambahan ── --}}
                <div class="px-6 py-4 bg-gray-50 border-t border-b border-gray-100 flex items-center gap-2">
                    <span class="w-1 h-5 bg-emerald-500 rounded-full inline-block"></span>
                    <h3 class="text-sm font-bold text-gray-600 uppercase tracking-wider">Penempatan &amp; Info Tambahan</h3>
                </div>
                <div class="p-6 grid grid-cols-1 md:grid-cols-2 gap-5">

                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">
                            Unit
                            <span class="ml-1.5 inline-block bg-emerald-100 text-emerald-700 text-xs font-semibold px-2 py-0.5 rounded-full normal-case tracking-normal">Lokasi</span>
                        </p>
                        <p class="text-sm font-semibold text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5">
                            {{ $hardware->units->nama_unit ?? '-' }}
                        </p>
                    </div>

                    <div>
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Tanggal Masuk</p>
                        <p class="text-sm font-semibold text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5">
                            {{ $hardware->tanggal_masuk ? \Carbon\Carbon::parse($hardware->tanggal_masuk)->format('d F Y') : '-' }}
                        </p>
                    </div>

                    <div class="md:col-span-2">
                        <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide mb-1">Keterangan</p>
                        <div class="text-sm text-gray-800 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5 min-h-[48px]">
                            {{ $hardware->keterangan ?? '-' }}
                        </div>
                    </div>

                </div>

                {{-- ── Action Buttons ── --}}
                <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 flex items-center gap-3">
                    <a href="{{ route('hardware.index') }}"
                       class="inline-flex items-center gap-2 bg-white hover:bg-gray-100 text-gray-600 font-semibold py-2.5 px-6 rounded-lg text-sm border border-gray-300 transition shadow-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18" />
                        </svg>
                        Kembali
                    </a>

                    @can('update hardware')
                    <a href="{{ route('hardware.edit', $hardware->id) }}"
                       class="inline-flex items-center gap-2 bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2.5 px-6 rounded-lg text-sm transition shadow-md hover:shadow-lg">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                        </svg>
                        Edit Data
                    </a>
                    @endcan
                </div>

            </div>{{-- end single card --}}

        </div>
    </div>
</x-app-layout>