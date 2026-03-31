<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Kerusakan Hardware') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- Alert Success --}}
            @if(session('success'))
            <div class="mb-6 flex items-center p-4 text-green-800 rounded-lg bg-green-50 border border-green-200" role="alert">
                <svg class="flex-shrink-0 w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="M10 .5a9.5 9.5 0 1 0 9.5 9.5A9.51 9.51 0 0 0 10 .5Zm3.707 8.207-4 4a1 1 0 0 1-1.414 0l-2-2a1 1 0 0 1 1.414-1.414L9 10.586l3.293-3.293a1 1 0 0 1 1.414 1.414Z"/>
                </svg>
                <div class="ml-3 text-sm font-medium">{{ session('success') }}</div>
            </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-xl border border-gray-200 overflow-hidden">
                
                <div class="px-6 py-5 border-b border-gray-200 bg-white flex flex-col sm:flex-row justify-between items-center gap-4">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Log Kerusakan</h3>
                        <p class="text-sm text-gray-500">Daftar riwayat laporan kerusakan perangkat keras unit.</p>
                    </div>
                    @can('create kerusakan')
                    <a href="{{ route('kerusakan.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-[#4d7c5f] hover:bg-[#3d634c] text-white text-sm font-bold rounded-lg shadow-sm transition duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                        TAMBAH DATA
                    </a>
                    @endcan
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-0">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b">No</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b">Informasi Waktu</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b">Hardware & Unit</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b">Detail Laporan</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase tracking-wider border-b text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($kerusakans as $index => $item)
                            <tr class="hover:bg-gray-50/80 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-500 font-medium">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">
                                    <div class="flex flex-col">
                                        <span class="text-sm font-semibold text-gray-900">Req: {{ \Carbon\Carbon::parse($item->tgl_requst)->format('d M Y') }}</span>
                                        <span class="text-xs text-gray-400">Resp: {{ $item->tgl_respon ? \Carbon\Carbon::parse($item->tgl_respon)->format('d M Y') : '-' }}</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-[#4d7c5f]">{{ $item->hardwares->nama_barang ?? '-' }}</div>
                                    <div class="text-xs text-gray-500">{{ $item->units->nama_unit ?? '-' }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <p class="text-sm text-gray-600 line-clamp-2 max-w-xs">
                                        {{ $item->laporan }}
                                    </p>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center gap-2">
                                        <a href="{{ route('kerusakan.show', $item->id) }}" class="p-2 text-gray-400 hover:text-gray-600 transition-colors" title="Detail">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path></svg>
                                        </a>

                                        @can('update kerusakan')
                                        <a href="{{ route('kerusakan.edit', $item->id) }}" class="p-2 text-blue-500 hover:text-blue-700 transition-colors" title="Edit">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>
                                        @endcan

                                        @can('delete kerusakan')
                                        <form action="{{ route('kerusakan.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 text-red-500 hover:text-red-700 transition-colors" title="Hapus">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center text-gray-400">
                                    <div class="flex flex-col items-center">
                                        <svg class="w-12 h-12 mb-3 text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path></svg>
                                        <p>Belum ada data kerusakan terdaftar.</p>
                                    </div>
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                
                
            </div>
        </div>
    </div>
</x-app-layout>