<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Data IP') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">

                <div class="p-4 bg-gray-800 text-white font-bold uppercase tracking-wide text-sm flex justify-between">
                    <span>FORM EDIT IP ADDRESS</span>
                    <span class="text-gray-400">ID: #{{ $ip->id }}</span>
                </div>

                <div class="p-6">
                    <form action="{{ route('ip.update', $ip->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                            {{-- Subnet 1 --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Subnet 1</label>
                                <input type="number" name="subnet1" value="{{ old('subnet1', $ip->subnet1) }}"
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 @error('subnet1') border-red-500 @enderror" placeholder="192">
                                @error('subnet1') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Subnet 2 --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Subnet 2</label>
                                <input type="number" name="subnet2" value="{{ old('subnet2', $ip->subnet2) }}"
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 @error('subnet2') border-red-500 @enderror" placeholder="168">
                                @error('subnet2') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Subnet 3 --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Subnet 3</label>
                                <input type="number" name="subnet3" value="{{ old('subnet3', $ip->subnet3) }}"
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 @error('subnet3') border-red-500 @enderror" placeholder="1">
                                @error('subnet3') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>

                            {{-- Subnet 4 --}}
                            <div>
                                <label class="block text-sm font-semibold text-gray-700 mb-1">Subnet 4</label>
                                <input type="number" name="subnet4" value="{{ old('subnet4', $ip->subnet4) }}"
                                       class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 @error('subnet4') border-red-500 @enderror" placeholder="10">
                                @error('subnet4') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                            </div>
                        </div>

                        {{-- Hardware --}}
                        <div class="mb-6">
                            <label class="block text-sm font-semibold text-gray-700 mb-1">Hardware Terkait <span class="text-red-500">*</span></label>
                            <select name="hardware_id"
                                    class="w-full border border-gray-300 rounded px-3 py-2 text-sm focus:ring-2 focus:ring-blue-500 @error('hardware_id') border-red-500 @enderror">
                                <option value="">-- Pilih Hardware --</option>
                                @foreach($hardwares as $hardware)
                                    <option value="{{ $hardware->id }}" {{ old('hardware_id', $ip->hardware_id) == $hardware->id ? 'selected' : '' }}>
                                        {{ $hardware->nama_barang }} ({{ $hardware->kd_barang }})
                                    </option>
                                @endforeach
                            </select>
                            @error('hardware_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                        </div>

                        {{-- Buttons --}}
                        <div class="mt-8 flex gap-3 border-t pt-6">
                            <button type="submit"
                                    class="bg-blue-600 hover:bg-blue-700 text-white font-bold py-2 px-8 rounded shadow transition duration-150 text-xs uppercase tracking-widest">
                                UPDATE DATA
                            </button>
                            <a href="{{ route('ip.index') }}"
                               class="bg-gray-500 hover:bg-gray-600 text-white font-bold py-2 px-8 rounded shadow transition duration-150 text-xs uppercase tracking-widest">
                                BATAL
                            </a>
                        </div>

                    </form>
                </div>

            </div>
        </div>
    </div>
</x-app-layout>