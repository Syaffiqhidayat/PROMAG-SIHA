<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manajemen Pengguna (Users)') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="flex flex-wrap gap-2 mb-6">
                <a href="{{ url('roles') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
                    Roles
                </a>
                <a href="{{ url('permissions') }}" class="inline-flex items-center px-4 py-2 bg-white border border-gray-300 rounded-md font-semibold text-xs text-gray-700 uppercase tracking-widest shadow-sm hover:bg-gray-50 transition ease-in-out duration-150">
                    Permissions
                </a>
                <a href="{{ url('users') }}" class="inline-flex items-center px-4 py-2 bg-amber-500 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-amber-600 shadow-md transition ease-in-out duration-150">
                    Users
                </a>
            </div>

            @if (session('status'))
                <div class="mb-6 p-4 bg-green-50 border-l-4 border-green-400 text-green-700 shadow-sm rounded-r-md">
                    <div class="flex items-center">
                        <svg class="h-5 w-5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                        </svg>
                        <span class="text-sm font-medium">{{ session('status') }}</span>
                    </div>
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6">
                    <div class="sm:flex sm:items-center sm:justify-between mb-6">
                        <div>
                            <h3 class="text-lg font-bold leading-6 text-gray-900">Daftar Pengguna</h3>
                            <p class="mt-1 text-sm text-gray-500">Kelola informasi pengguna dan penetapan peran (roles) mereka.</p>
                        </div>
                        <div class="mt-4 sm:mt-0">
                            @can('create user')
                                <a href="{{ url('users/create') }}" class="inline-flex items-center justify-center px-4 py-2 bg-blue-600 border border-transparent rounded-md font-bold text-xs text-white uppercase tracking-widest hover:bg-blue-700 active:bg-blue-800 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition ease-in-out duration-150 shadow">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                                    Add User
                                </a>
                            @endcan
                        </div>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full divide-y divide-gray-200 border">
                            <thead class="bg-gray-50">
                                <tr>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">ID</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Nama</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Email</th>
                                    <th class="px-6 py-3 text-left text-xs font-bold text-gray-500 uppercase tracking-wider">Roles</th>
                                    <th class="px-6 py-3 text-center text-xs font-bold text-gray-500 uppercase tracking-wider">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="bg-white divide-y divide-gray-200">
                                @foreach ($users as $user)
                                <tr class="hover:bg-gray-50 transition-colors duration-200">
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 font-mono">#{{ $user->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold text-gray-900">{{ $user->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-600">{{ $user->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        @if (!empty($user->getRoleNames()))
                                            @foreach ($user->getRoleNames() as $rolename)
                                                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800 mr-1">
                                                    {{ $rolename }}
                                                </span>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-center text-sm font-medium space-x-2">
                                        @can('update user')
                                            <a href="{{ url('users/'.$user->id.'/edit') }}" class="text-green-600 hover:text-green-900 bg-green-50 px-3 py-1 rounded-md transition-colors font-bold">Edit</a>
                                        @endcan

                                        @can('delete user')
                                            <a href="{{ url('users/'.$user->id.'/delete') }}" 
                                               class="text-red-600 hover:text-red-900 bg-red-50 px-3 py-1 rounded-md transition-colors font-bold"
                                               onclick="return confirm('Hapus pengguna ini?')">
                                                Delete
                                            </a>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    </div>
            </div>
        </div>
    </div>
</x-app-layout>