<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Inventaris Hardware') }}
        </h2>
    </x-slot>

    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.tailwindcss.css">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100">

                @if(session()->has('success'))
                <div class="mb-4 bg-green-50 border-l-4 border-green-400 text-green-700 p-4 rounded shadow-sm flex justify-between items-center">
                    <span>{{ session()->get('success') }}</span>
                    <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700">×</button>
                </div>
                @endif

                <div class="mb-6 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-700 uppercase tracking-wider">Data Inventaris</h3>

                    @can('create hardware')
                    <a href="{{ route('hardware.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg text-sm transition duration-150 ease-in-out shadow-md">
                        + Tambah Hardware
                    </a>
                    @endcan
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200" id="myTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">QR Code</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Jenis Barang</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Barang</th>

                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Spek</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Keterangan</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Unit</th>
                                <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Tgl Masuk</th>
                                <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse ($hardware as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap text-center">

                                    <a href="{{url('showqr')}}?kode={{$item->kd_barang}}" target="_blank">
                                        <div class="flex justify-center p-1 bg-white border rounded-md shadow-sm w-max mx-auto">

                                            {!! QrCode::size(60)->generate(url('menu').'/'. $item->kd_barang) !!}
                                        </div>
                                    </a>
                                    <center>
                                        {{ $item->kd_barang }}
                                    </center>
                                </td>
                                <td class="px-6 py-4">
                                    {{ $item->jenis_barang }}
                                    @php
                                      $ty =   $ip->where('hardware_id', '=' ,$item->id)->first();
                                    @endphp
                                    @if ($item->jenis_barang == 'CPU/Komputer')
                                        <small style="color:silver">
                                       IP={{ $ty->subnet1 }}.{{ $ty->subnet2 }}.{{ $ty->subnet3 }}.{{ $ty->subnet4 }}
                                 </small>
                                       @endif
                                </td>
                                <td class="px-6 py-4">
                                    <span class="text-sm font-bold text-gray-900" data-toggle="tooltip" title="{{$item->no_iventaris}}">
                                        {{ $item->nama_barang }} </span>
                                        <br>
                                    <span class="text-sm" style="color:silver">
                                        {{ $item->no_iventaris }}
                                    </span>
                                </td>

                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-gray-900">Merek : {{ $item->merek }} <br>Tipe : {{ $item->tipe }} <br>Spek : {{ $item->spek }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-gray-900">{{ $item->keterangan }}</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm font-bold text-gray-900">
                                        {{ $item->units->nama_unit ?? 'N/A' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 text-center whitespace-nowrap text-sm text-gray-600">
                                    {{ \Carbon\Carbon::parse($item->tanggal_masuk)->format('d/m/Y') }}
                                </td>

                                {{-- Ganti bagian <td> Aksi --}}
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-center items-center space-x-1">

                                        {{-- Show --}}
                                        <a href="{{ route('hardware.show', $item->id) }}"
                                            title="Lihat Detail"
                                            class="inline-flex items-center justify-center w-8 h-8 bg-gray-100 border border-gray-300 rounded-md text-gray-600 hover:bg-gray-200 hover:text-gray-800 transition shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.477 0 8.268 2.943 9.542 7-1.274 4.057-5.065 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                            </svg>
                                        </a>

                                        {{-- Mutasi --}}
                                        <a href="{{ route('mutasi.createid', $item->id) }}"
                                            title="Mutasi"
                                            class="inline-flex items-center justify-center w-8 h-8 bg-gray-600 rounded-md text-white hover:bg-gray-700 transition shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" />
                                            </svg>
                                        </a>

                                        {{-- Edit --}}
                                        @can('update hardware')
                                        <a href="{{ route('hardware.edit', $item->id) }}"
                                            title="Edit"
                                            class="inline-flex items-center justify-center w-8 h-8 bg-blue-50 border border-blue-200 rounded-md text-blue-700 hover:bg-blue-100 transition shadow-sm">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                            </svg>
                                        </a>
                                        @endcan

                                        {{-- Hapus --}}
                                        @can('delete hardware')
                                        <form action="{{ route('hardware.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                title="Hapus"
                                                class="inline-flex items-center justify-center w-8 h-8 bg-red-50 border border-red-200 rounded-md text-red-700 hover:bg-red-100 transition shadow-sm">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                </svg>
                                            </button>
                                        </form>
                                        @endcan

                                    </div>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td class="px-6 py-10 text-center text-gray-500 italic" colspan="9">
                                    Belum ada data hardware terdaftar.
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                columnDefs: [{
                        orderable: false,
                        targets: [0, 6]
                    } // nonaktifkan sort di QR & Aksi
                ]
            });
        });
    </script>
</x-app-layout>