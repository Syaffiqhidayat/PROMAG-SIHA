<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Give Permissions to Role') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if (session('status'))
                <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700 shadow-sm">
                    {{ session('status') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg border border-gray-200">
                <div class="p-6 bg-white border-b border-gray-200 flex justify-between items-center">
                    <h3 class="text-xl font-semibold text-gray-800">
                        Role : {{ $role->name }}
                    </h3>
                    <a href="{{ url('roles') }}" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded shadow transition duration-150 text-sm font-bold">
                        Back
                    </a>
                </div>

                <div class="p-6">
                    <form action="{{ url('roles/'.$role->id.'/give-permissions') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="mb-6">
                            <h4 class="text-md font-bold text-gray-700 mb-4">Permissions</h4>
                            
                            @error('permission')
                                <p class="text-red-500 text-xs italic mb-4 font-bold">{{ $message }}</p>
                            @enderror

                            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-5 gap-4">
                                @foreach ($permissions as $permission)
                                    <div class="flex items-center space-x-2 p-1">
                                        <input 
                                            type="checkbox" 
                                            id="perm-{{ $permission->id }}"
                                            name="permission[]" 
                                            value="{{ $permission->name }}" 
                                            class="rounded border-gray-300 text-blue-600 shadow-sm focus:ring-blue-500 h-4 w-4"
                                            {{ in_array($permission->id, $rolePermissions) ? 'checked' : '' }}
                                        />
                                        <label for="perm-{{ $permission->id }}" class="text-sm text-gray-700 cursor-pointer hover:text-blue-600 transition duration-150">
                                            {{ $permission->name }}
                                        </label>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <div class="mt-8">
                            <button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-6 rounded shadow-lg transition duration-150 transform active:scale-95">
                                Update
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>