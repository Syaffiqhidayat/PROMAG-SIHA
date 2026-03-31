<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Management IP Address') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            {{-- Alert Success --}}
            @if(session('success'))
            <div class="mb-6 flex items-center p-4 text-green-800 rounded-lg bg-green-50 border border-green-200" role="alert">
                <div class="text-sm font-medium">{{ session('success') }}</div>
            </div>
            @endif

            <div class="bg-white shadow-sm sm:rounded-xl border border-gray-200 overflow-hidden">
                
                <div class="px-6 py-5 border-b border-gray-200 bg-white flex justify-between items-center">
                    <div>
                        <h3 class="text-lg font-bold text-gray-900">Daftar IP Address</h3>
                        <p class="text-sm text-gray-500">List alamat IP yang teralokasi pada perangkat hardware.</p>
                    </div>
                    <a href="{{ route('ip.create') }}"
                       class="inline-flex items-center px-4 py-2 bg-[#4d7c5f] hover:bg-[#3d634c] text-white text-xs font-bold rounded-lg shadow-sm transition duration-200 uppercase tracking-widest">
                        + Tambah IP
                    </a>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-left border-separate border-spacing-0">
                        <thead>
                            <tr class="bg-gray-50">
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase border-b">No</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase border-b">IP Address</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase border-b">Hardware Terkait</th>
                                <th class="px-6 py-4 text-xs font-bold text-gray-500 uppercase border-b text-center">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            @forelse($ips as $index => $item)
                            <tr class="hover:bg-gray-50/80 transition-colors">
                                <td class="px-6 py-4 text-sm text-gray-500">{{ $index + 1 }}</td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-3 py-1 rounded-md bg-blue-50 text-blue-700 font-mono font-bold text-sm border border-blue-100">
                                        {{ $item->subnet1 }}.{{ $item->subnet2 }}.{{ $item->subnet3 }}.{{ $item->subnet4 }}
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-semibold text-gray-900">{{ $item->hardwares->nama_barang ?? '-' }}</div>
                                    <div class="text-xs text-gray-400">{{ $item->hardwares->kd_barang ?? '' }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex justify-center items-center gap-3">
                                        <a href="{{ route('ip.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700 transition-colors">
                                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path></svg>
                                        </a>
                                        
                                        <form action="{{ route('ip.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus data IP ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-500 hover:text-red-700 transition-colors">
                                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path></svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-6 py-10 text-center text-gray-400">Belum ada data IP.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>