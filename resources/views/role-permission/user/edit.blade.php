<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit Profil Pengguna') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            
            @if ($errors->any())
                <div class="mb-6 p-4 bg-red-50 border-l-4 border-red-400 text-red-700 shadow-sm rounded-r-md">
                    <div class="flex">
                        <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                        </svg>
                        <ul class="text-sm list-disc list-inside font-medium">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg border border-gray-100">
                <div class="p-8">
                    <div class="flex items-center justify-between mb-8 pb-4 border-b border-gray-100">
                        <div>
                            <h3 class="text-xl font-bold text-gray-900 uppercase tracking-tight">Informasi Akun</h3>
                            <p class="text-sm text-gray-500">Perbarui detail nama, kata sandi, dan hak akses pengguna.</p>
                        </div>
                        <a href="{{ url('users') }}" class="inline-flex items-center px-4 py-2 bg-gray-100 hover:bg-gray-200 text-gray-700 text-xs font-bold uppercase tracking-widest rounded-md transition duration-150">
                            Kembali
                        </a>
                    </div>

                    <form action="{{ url('users/'.$user->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            
                            <div class="space-y-6">
                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Nama Lengkap</label>
                                    <input type="text" name="name" value="{{ $user->name }}" 
                                        class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm font-medium">
                                    @error('name') <p class="mt-1 text-xs text-red-600 font-semibold">{{ $message }}</p> @enderror
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Alamat Email</label>
                                    <input type="text" name="email" readonly value="{{ $user->email }}" 
                                        class="block w-full bg-gray-50 border-gray-300 text-gray-500 cursor-not-allowed rounded-lg shadow-sm font-medium">
                                    <p class="mt-1 text-[10px] text-gray-400 font-medium">* Email tidak dapat diubah untuk keamanan identitas.</p>
                                </div>

                                <div>
                                    <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Ganti Kata Sandi</label>
                                    <input type="password" name="password" 
                                        class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm"
                                        placeholder="Kosongkan jika tidak ingin ganti">
                                    @error('password') <p class="mt-1 text-xs text-red-600 font-semibold">{{ $message }}</p> @enderror
                                </div>
                            </div>

                            <div>
                                <label class="block text-sm font-bold text-gray-700 mb-2 uppercase tracking-wide">Penetapan Peran (Roles)</label>
                                <div class="relative">
                                    <select name="roles[]" class="block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-lg shadow-sm min-h-[160px]" multiple>
                                        @foreach ($roles as $role)
                                        <option value="{{ $role }}" {{ in_array($role, $userRoles) ? 'selected':'' }} class="p-2 border-b border-gray-50 last:border-0 font-medium">
                                            {{ strtoupper($role) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <p class="mt-2 text-xs text-gray-400 italic">Gunakan Ctrl + Klik (Windows) untuk memilih lebih dari satu role.</p>
                                @error('roles') <p class="mt-1 text-xs text-red-600 font-semibold">{{ $message }}</p> @enderror
                            </div>

                        </div>

                        <div class="flex items-center justify-end pt-8 mt-8 border-t border-gray-100">
                            <button type="submit" class="inline-flex items-center px-8 py-3 bg-indigo-600 border border-transparent rounded-lg font-bold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow-lg shadow-indigo-200">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                                Simpan Perubahan Data
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>