<nav x-data="{ open: false }" class="bg-white border-b border-gray-100">
    <!-- Primary Navigation Menu -->
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}">
                        <img src="{{ asset('images/1774513342 (1).png') }}" 
                                alt="Logo" 
                                class="block h-12 w-auto">
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-10 sm:flex">
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>

                    <x-nav-link :href="route('hardware.index')" :active="request()->routeIs('hardware.*')">
                        {{ __('Hardware') }}
                    </x-nav-link>

                    <x-nav-link :href="route('kerusakan.index')" :active="request()->routeIs('kerusakan.*')">
                        {{ __('Kerusakan') }}
                    </x-nav-link>

                    <x-nav-link :href="route('units.index')" :active="request()->routeIs('units.*')">
                        {{ __('Unit') }}
                    </x-nav-link>

                    <x-nav-link :href="route('mutasis.index')" :active="request()->routeIs('mutasis.*')">
                        {{ __('Mutasi') }}
                    </x-nav-link>

                    <x-nav-link :href="route('ip.index')" :active="request()->routeIs('ip.*')">
                        {{ __('Ip') }}
                    </x-nav-link>
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                @auth
                <div class="relative" x-data="{ open: false }">
                    <!-- Bell Button -->
                    <button @click="open = !open" class="relative p-3 text-gray-600 hover:text-gray-900">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 
                                    14.158V11a6 6 0 10-12 0v3.159c0 .538-.214 
                                    1.055-.595 1.437L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"/>
                        </svg>

                        {{-- Badge dinamis --}}
                        @php $unreadCount = auth()->user()->unreadNotifications->count(); @endphp
                        @if($unreadCount > 0)
                            <span class="absolute -top-1 -right-0 bg-red-500 text-white 
                                        text-xs rounded-full w-5 h-5 flex items-center justify-center">
                                {{ $unreadCount > 9 ? '9+' : $unreadCount }}
                            </span>
                        @endif
                    </button>

                    <!-- Dropdown -->
                    <div x-show="open" @click.outside="open = false"
                        class="absolute right-0 mt-2 w-80 bg-white rounded-lg shadow-xl z-50 
                                border border-gray-100 max-h-96 overflow-y-auto">

                        {{-- Header --}}
                        <div class="flex justify-between items-center px-4 py-3 border-b sticky top-0 bg-white">
                            <span class="font-semibold text-gray-800">Notifikasi</span>
                            <div class="flex gap-3 items-center">
                                @if(auth()->user()->unreadNotifications->count() > 0)
                                    <form action="{{ route('notifikasi.bacaSemua') }}" method="POST">
                                        @csrf @method('PATCH')
                                        <button type="submit" class="text-xs text-blue-500 hover:underline">
                                            Tandai semua dibaca
                                        </button>
                                    </form>
                                @endif
                                <a href="{{ route('notifikasi.index') }}" class="text-xs text-gray-400 hover:underline">
                                    Lihat semua
                                </a>
                            </div>
                        </div>

                        {{-- List --}}
                        @forelse(auth()->user()->notifications->take(10) as $notif)
                            <div class="flex gap-3 px-4 py-3 border-b {{ is_null($notif->read_at) ? 'bg-blue-50' : 'bg-white' }} hover:bg-gray-50">

                                {{-- Dot indicator --}}
                                <div class="mt-2 w-2 h-2 rounded-full flex-shrink-0 
                                    {{ is_null($notif->read_at) ? 'bg-blue-500' : 'bg-gray-300' }}">
                                </div>

                                {{-- Content --}}
                                <div class="flex-1 min-w-0">
                                    <p class="text-sm font-medium text-gray-800">
                                        🔧 {{ $notif->data['hardware'] ?? '-' }} — {{ $notif->data['unit'] ?? '-' }}
                                    </p>
                                    <p class="text-xs text-gray-500 mt-0.5">
                                        {{-- FIX: pakai null coalescing agar tidak error --}}
                                        {{ $notif->data['tanggal_request'] ?? $notif->data['tanggal'] ?? '-' }}
                                        @if(!empty($notif->data['waktu_request']))
                                            &bull; {{ $notif->data['waktu_request'] }}
                                        @endif
                                    </p>
                                    <p class="text-xs text-gray-600 mt-1 line-clamp-2">
                                        {{ $notif->data['laporan'] ?? $notif->data['deskripsi'] ?? '-' }}
                                    </p>

                                    {{-- Aksi --}}
                                    <div class="flex gap-3 mt-2">
                                        {{-- FIX: gunakan kerusakan_id bukan data['url'] --}}
                                        @if(!empty($notif->data['kerusakan_id']))
                                            <a href="{{ route('kerusakan.show', $notif->data['kerusakan_id']) }}"
                                               class="text-xs text-blue-500 hover:underline">
                                                Lihat Detail
                                            </a>
                                        @endif

                                        {{-- Tandai dibaca --}}
                                        @if(is_null($notif->read_at))
                                            <form action="{{ route('notifikasi.baca', $notif->id) }}" method="POST">
                                                @csrf @method('PATCH')
                                                <button type="submit" class="text-xs text-green-500 hover:underline">
                                                    Tandai Dibaca
                                                </button>
                                            </form>
                                        @endif

                                        {{-- Hapus --}}
                                        <form action="{{ route('notifikasi.hapus', $notif->id) }}" method="POST"
                                              onsubmit="return confirm('Hapus notifikasi ini?')">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-xs text-red-400 hover:underline">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                            <p class="px-4 py-6 text-sm text-gray-400 text-center">
                                Tidak ada notifikasi.
                            </p>
                        @endforelse

                    </div>
                </div>
                @endauth

                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition ease-in-out duration-150">
                            <div>{{ Auth::user()->name }}</div>
                            <div class="ms-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')">
                            {{ __('Profile') }}
                        </x-dropdown-link>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="px-4">
                <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>