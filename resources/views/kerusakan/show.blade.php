<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Detail Kerusakan Hardware') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">

                <div class="p-4 bg-gray-800 text-white font-bold uppercase tracking-wide text-sm">
                    DETAIL KERUSAKAN: {{ $kerusakan->hardware->nama_barang ?? '-' }}
                </div>

                <div class="p-6 bg-white">
                    <table class="min-w-full table-fixed border-collapse border border-gray-200">
                        <tbody class="bg-white">
                            <tr>
                                <td class="px-4 py-3 bg-gray-50 font-bold text-gray-700 border border-gray-200 w-1/3">Hardware</td>
                                <td class="px-4 py-3 border border-gray-200 text-gray-600">
                                    {{ $kerusakan->hardwares->nama_barang ?? '-' }}
                                    @if($kerusakan->hardwares)
                                        <span class="text-gray-400 text-xs">({{ $kerusakan->hardwares->kd_barang }})</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 bg-gray-50 font-bold text-gray-700 border border-gray-200">Unit</td>
                                <td class="px-4 py-3 border border-gray-200 text-gray-600">{{ $kerusakan->units->nama_unit ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 bg-gray-50 font-bold text-gray-700 border border-gray-200">Teknisi</td>
                                <td class="px-4 py-3 border border-gray-200 text-gray-600">{{ $kerusakan->users->name ?? '-' }}</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 bg-gray-50 font-bold text-gray-700 border border-gray-200">Tanggal Request</td>
                                <td class="px-4 py-3 border border-gray-200 text-gray-600">
                                    {{ \Carbon\Carbon::parse($kerusakan->tgl_requst)->format('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 bg-gray-50 font-bold text-gray-700 border border-gray-200">Tanggal Respon</td>
                                <td class="px-4 py-3 border border-gray-200 text-gray-600">
                                    {{ \Carbon\Carbon::parse($kerusakan->tgl_respon)->format('d F Y') }}
                                </td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 bg-gray-50 font-bold text-gray-700 border border-gray-200">Waktu Request</td>
                                <td class="px-4 py-3 border border-gray-200 text-gray-600">{{ $kerusakan->waktu_requst }}</td>
                            </tr>                            
                            <tr>
                                <td class="px-4 py-3 bg-gray-50 font-bold text-gray-700 border border-gray-200">Waktu Respon</td>
                                <td class="px-4 py-3 border border-gray-200 text-gray-600">{{ $kerusakan->waktu_respon }}</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 bg-gray-50 font-bold text-gray-700 border border-gray-200">Laporan Kerusakan</td>
                                <td class="px-4 py-3 border border-gray-200 text-gray-600">{!! nl2br(e($kerusakan->laporan)) !!}</td>
                            </tr>
                            <tr>
                                <td class="px-4 py-3 bg-gray-50 font-bold text-gray-700 border border-gray-200">Tindakan Perbaikan</td>
                                <td class="px-4 py-3 border border-gray-200 text-gray-600">{!! nl2br(e($kerusakan->tindakan)) !!}</td>
                            </tr>
                        </tbody>
                    </table>

                    <div class="mt-8 flex space-x-3">
                        <a href="{{ route('kerusakan.index') }}"
                           class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded shadow transition duration-150 text-xs uppercase">
                            KEMBALI
                        </a>

                        @can('update kerusakan')
                        <a href="{{ route('kerusakan.edit', $kerusakan->id) }}"
                           class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded shadow transition duration-150 text-xs uppercase">
                            EDIT DATA
                        </a>
                        @endcan

                        @can('delete kerusakan')
                        <form action="{{ route('kerusakan.destroy', $kerusakan->id) }}" method="POST"
                              onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                    class="bg-red-600 hover:bg-red-700 text-white font-bold py-2 px-6 rounded shadow transition duration-150 text-xs uppercase">
                                HAPUS
                            </button>
                        </form>
                        @endcan
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>