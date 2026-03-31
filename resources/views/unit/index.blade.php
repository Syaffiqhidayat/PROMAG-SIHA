<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Daftar Unit') }}
        </h2>
    </x-slot>

    {{-- DataTables CSS --}}
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.tailwindcss.css">

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg p-6 border border-gray-100">
                
                {{-- Notifikasi Flash Message --}}
                @if(session()->has('success'))
                    <div class="mb-4 bg-green-50 border-l-4 border-green-400 text-green-700 p-4 rounded shadow-sm flex justify-between items-center">
                        <span>{{ session()->get('success') }}</span>
                        <button onclick="this.parentElement.remove()" class="text-green-500 hover:text-green-700">×</button>
                    </div>
                @endif

                <div class="mb-6 flex justify-between items-center">
                    <h3 class="text-lg font-bold text-gray-700 uppercase tracking-wider">Data Unit</h3>
                    
                    {{-- Tombol Tambah --}}
                    {{-- Pastikan permission 'create unit' sudah ada atau hapus @can jika tidak diperlukan --}}
                    @can('create unit')
                    <a href="{{ route('units.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-6 rounded-lg text-sm transition duration-150 ease-in-out shadow-md">
                        + Tambah Unit
                    </a>
                    @endcan
                </div>

                <div class="overflow-x-auto rounded-lg border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200" id="unitTable">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Kode Unit</th>
                                <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama Unit</th>
                                <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                        @forelse ($units as $item)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-900">{{ $item->kd_unit }}</div>
                                </td>                                
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-bold text-gray-900">{{ $item->nama_unit }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex justify-center space-x-2">

                                        {{-- Tombol Edit --}}
                                        @can('update unit')
                                        <a href="{{ route('units.edit', $item->id) }}" class="inline-flex items-center px-3 py-1 bg-blue-50 border border-blue-200 rounded-md font-bold text-[10px] text-blue-700 uppercase tracking-widest hover:bg-blue-100 transition shadow-sm">
                                            Edit
                                        </a>
                                        @endcan
                                        
                                        {{-- Tombol Hapus --}}
                                        @can('delete unit')
                                        <form action="{{ route('units.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Yakin ingin menghapus data ini?');" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="inline-flex items-center px-3 py-1 bg-red-50 border border-red-200 rounded-md font-bold text-[10px] text-red-700 uppercase tracking-widest hover:bg-red-100 transition shadow-sm">
                                                Hapus
                                            </button>
                                        </form>
                                        @endcan
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td class="px-6 py-10 text-center text-gray-500 italic" colspan="3">
                                    Belum ada data unit terdaftar.
                                </td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    {{-- Script JS --}}
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.datatables.net/2.3.7/js/dataTables.js"></script>
    <script>
        $(document).ready(function () {
            $('#unitTable').DataTable({
                columnDefs: [
                    { orderable: false, targets: [2] } // Nonaktifkan sort di kolom Aksi (kolom index ke-2)
                ]
            });
        });
    </script>
</x-app-layout>