<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Tambah Data Ip') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">

                <div class="p-4 bg-gray-800 text-white font-bold uppercase tracking-wide text-sm">
                    FORM TAMBAH IP 
                </div>

                <div class="p-6">
                    <form action="{{ route('ip.store') }}" method="POST">
                        @csrf

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                            {{-- Subnet1 --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">subnet1 <span class="text-red-500">*</span></label>
                                <input type="int" name="subnet1" 
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('subnet1') border-red-500 @enderror">
                                @error('subnet1')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Subnet2  --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">subnet2  <span class="text-red-500">*</span></label>
                                <input type="int" name="subnet2"
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('subnet2') border-red-500 @enderror">
                                @error('subnet2')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Subnet3 --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">subnet3 <span class="text-red-500">*</span></label>
                                <input type="int" name="subnet3" 
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('subnet3') border-red-500 @enderror">
                                @error('subnet3')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            {{-- Subnet4  --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">subnet4  <span class="text-red-500">*</span></label>
                                <input type="int" name="subnet4"
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('subnet4') border-red-500 @enderror">
                                @error('subnet4')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>                       

                            {{-- Hardware --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Hardware <span class="text-red-500">*</span></label>
                                <select name="hardware_id"
                                        class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-gray-400 @error('hardware_id') border-red-500 @enderror">
                                    <option value="">-- Pilih Hardware --</option>
                                    @foreach($hardwares as $hardware)
                                        <option value="{{ $hardware->id }}">
                                            {{ $hardware->nama_barang }} ({{ $hardware->kd_barang }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('hardware_id')
                                    <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                @enderror
                            </div>

                            

                        </div>

                        {{-- Buttons --}}
                        <div class="mt-6 flex gap-3">
                            <button type="submit"
                                    class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-6 rounded shadow transition duration-150 text-xs uppercase">
                                SIMPAN
                            </button>
                            <a href="{{ route('ip.index') }}"
                               class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-6 rounded shadow transition duration-150 text-xs uppercase">
                                BATAL
                            </a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>