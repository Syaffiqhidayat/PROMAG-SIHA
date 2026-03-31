<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Data Mutasi Hardware') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">

                <div class="p-4 bg-gray-800 text-white font-bold uppercase tracking-wide text-sm flex justify-between items-center">
                    <span>DAFTAR MUTASI HARDWARE</span>
                    @can('create mutasi')
                        <a href="{{ route('mutasis.create') }}"
                           class="bg-white text-gray-800 hover:bg-gray-100 font-bold py-1 px-4 rounded text-xs uppercase transition duration-150">
                            + Tambah
                        </a>
                    @endcan
                </div>

                <div class="p-6">

                    {{-- Alert --}}
                    @if (session('success'))
                        <div class="mb-4 px-4 py-3 bg-green-100 border border-green-300 text-green-800 rounded text-sm">
                            {{ session('success') }}
                        </div>
                    @endif

                    <div class="overflow-x-auto">
                        <table class="min-w-full text-sm border border-gray-200">
                            <thead>
                                <tr class="bg-gray-100 text-gray-700 uppercase text-xs">
                                    <th class="px-4 py-3 border-b text-left">#</th>
                                    <th class="px-4 py-3 border-b text-left">Hardware</th>
                                    <th class="px-4 py-3 border-b text-left">Unit Asal</th>
                                    <th class="px-4 py-3 border-b text-left">Unit Tujuan</th>
                                    <th class="px-4 py-3 border-b text-left">Keterangan</th>
                                    <th class="px-4 py-3 border-b text-left">Teknisi</th>
                                    <th class="px-4 py-3 border-b text-left">Tanggal</th>
                                    <th class="px-4 py-3 border-b text-center">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($mutasis as $mutasi)
                                    <tr class="hover:bg-gray-50 border-b">
                                        <td class="px-4 py-3">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-3">
                                            <span class="font-semibold">{{ $mutasi->hardwares->nama_barang ?? '-' }}</span><br>
                                            <span class="text-gray-400 text-xs">{{ $mutasi->hardwares->kd_barang ?? '' }}</span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="inline-block bg-red-100 text-red-700 text-xs px-2 py-1 rounded">
                                                {{ $mutasi->units1->nama_unit ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3">
                                            <span class="inline-block bg-green-100 text-green-700 text-xs px-2 py-1 rounded">
                                                {{ $mutasi->units2->nama_unit ?? '-' }}
                                            </span>
                                        </td>
                                        <td class="px-4 py-3 max-w-xs truncate">{{ $mutasi->keterangan }}</td>
                                        <td class="px-4 py-3">{{ $mutasi->users->name ?? '-' }}</td>
                                        <td class="px-4 py-3">{{ $mutasi->created_at->format('d M Y') }}</td>
                                        <td class="px-4 py-3 text-center">
                                            <div class="flex justify-center gap-2">

                                                @can('view mutasi')
                                                    <a href="{{ route('mutasis.show', $mutasi->id) }}"
                                                    class="bg-gray-700 hover:bg-gray-900 text-white text-xs font-bold py-1 px-3 rounded transition duration-150 uppercase">
                                                        Detail
                                                    </a>
                                                @endcan
                                                @can('update mutasi')
                                                    <a href="{{ route('mutasis.edit', $mutasi->id) }}"
                                                       class="bg-yellow-500 hover:bg-yellow-600 text-white text-xs font-bold py-1 px-3 rounded transition duration-150 uppercase">
                                                        Edit
                                                    </a>
                                                @endcan
                                                @can('delete mutasi')
                                                    <form action="{{ route('mutasis.destroy', $mutasi->id) }}" method="POST"
                                                          onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit"
                                                                class="bg-red-600 hover:bg-red-700 text-white text-xs font-bold py-1 px-3 rounded transition duration-150 uppercase">
                                                            Hapus
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="8" class="px-4 py-8 text-center text-gray-400">
                                            Belum ada data mutasi.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>