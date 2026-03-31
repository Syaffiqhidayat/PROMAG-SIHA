<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            🔔 Notifikasi
        </h2>
    </x-slot>

    <div class="max-w-4xl mx-auto px-4 py-8">

        {{-- Header Aksi --}}
        <div class="flex justify-between items-center mb-6">
            <p class="text-sm text-gray-500">Daftar laporan kerusakan hardware masuk</p>
            @if(auth()->user()->unreadNotifications->count() > 0)
            <form action="{{ route('notifikasi.bacaSemua') }}" method="POST">
                @csrf @method('PATCH')
                <button class="text-sm px-3 py-1.5 rounded-lg border border-green-500 text-green-600 hover:bg-green-50">
                    ✔ Tandai Semua Dibaca
                </button>
            </form>
            @endif
        </div>

        {{-- Alert --}}
        @if(session('success'))
            <div class="mb-4 px-4 py-3 bg-green-100 text-green-700 rounded-lg text-sm">
                {{ session('success') }}
            </div>
        @endif

        {{-- Filter --}}
        <div class="flex gap-2 mb-4">
            <a href="{{ route('notifikasi.index') }}"
               class="px-3 py-1.5 rounded-lg text-sm font-medium
               {{ !request('filter') ? 'bg-gray-800 text-white' : 'border border-gray-300 text-gray-600 hover:bg-gray-50' }}">
                Semua
            </a>
            <a href="{{ route('notifikasi.index', ['filter' => 'belum']) }}"
               class="px-3 py-1.5 rounded-lg text-sm font-medium flex items-center gap-1
               {{ request('filter') === 'belum' ? 'bg-red-500 text-white' : 'border border-red-300 text-red-500 hover:bg-red-50' }}">
                Belum Dibaca
                @if(auth()->user()->unreadNotifications->count() > 0)
                    <span class="text-xs rounded-full px-1.5 py-0.5
                        {{ request('filter') === 'belum' ? 'bg-white text-red-500' : 'bg-red-500 text-white' }}">
                        {{ auth()->user()->unreadNotifications->count() }}
                    </span>
                @endif
            </a>
            <a href="{{ route('notifikasi.index', ['filter' => 'sudah']) }}"
               class="px-3 py-1.5 rounded-lg text-sm font-medium
               {{ request('filter') === 'sudah' ? 'bg-green-500 text-white' : 'border border-green-300 text-green-600 hover:bg-green-50' }}">
                Sudah Dibaca
            </a>
        </div>

        {{-- List --}}
        <div class="bg-white rounded-xl shadow-sm border border-gray-100 divide-y divide-gray-100">

            @forelse($notifikasi as $notif)
            <div class="flex gap-4 px-5 py-4 {{ is_null($notif->read_at) ? 'bg-blue-50' : 'bg-white' }}">

                {{-- Icon --}}
                <div class="text-2xl mt-0.5">
                    {{ is_null($notif->read_at) ? '🔴' : '✅' }}
                </div>

                {{-- Content --}}
                <div class="flex-1 min-w-0">
                    <div class="font-semibold text-gray-800">
                        Hardware: <span class="text-green-600">{{ $notif->data['hardware'] ?? '-' }}</span>
                    </div>
                    <div class="text-xs text-gray-500 mt-0.5">
                        Unit: {{ $notif->data['unit'] ?? '-' }}
                        &bull; Dilaporkan oleh: {{ $notif->data['pelapor'] ?? '-' }}
                        &bull; {{ $notif->data['tanggal_request'] ?? ($notif->data['tanggal'] ?? '-') }}
                        @if(!empty($notif->data['waktu_request']))
                            &bull; {{ $notif->data['waktu_request'] }}
                        @endif
                    </div>
                    <div class="text-sm text-gray-700 mt-1">
                        {{ $notif->data['laporan'] ?? ($notif->data['deskripsi'] ?? '-') }}
                    </div>
                    <span class="inline-block mt-1 text-xs px-2 py-0.5 rounded-full
                        {{ is_null($notif->read_at) ? 'bg-red-100 text-red-600' : 'bg-green-100 text-green-600' }}">
                        {{ is_null($notif->read_at) ? 'Belum Dibaca' : 'Sudah Dibaca' }}
                    </span>
                </div>

                {{-- Aksi --}}
                <div class="flex flex-col gap-2 items-end flex-shrink-0">
                    {{-- Tombol Detail --}}
                    <a href="{{ route('kerusakan.show', $notif->data['kerusakan_id']) }}"
                       class="text-xs px-2 py-1 rounded border border-blue-400 text-blue-500 hover:bg-blue-50">
                        👁 Detail
                    </a>

                    {{-- Tombol Tandai Dibaca (hanya jika belum dibaca) --}}
                    @if(is_null($notif->read_at))
                    <form action="{{ route('notifikasi.markAsRead', $notif->id) }}" method="POST">
                        @csrf @method('PATCH')
                        <button class="text-xs px-2 py-1 rounded border border-green-400 text-green-600 hover:bg-green-50">
                            ✔ Dibaca
                        </button>
                    </form>
                    @endif

                    {{-- Tombol Hapus --}}
                    <form action="{{ route('notifikasi.destroy', $notif->id) }}" method="POST"
                          onsubmit="return confirm('Hapus notifikasi ini?')">
                        @csrf @method('DELETE')
                        <button class="text-xs px-2 py-1 rounded border border-red-300 text-red-400 hover:bg-red-50">
                            🗑 Hapus
                        </button>
                    </form>
                </div>

            </div>
            @empty
            <div class="px-5 py-10 text-center text-gray-400 text-sm">
                <div class="text-4xl mb-2">🔕</div>
                Tidak ada notifikasi.
            </div>
            @endforelse

        </div>

        {{-- Pagination --}}
        <div class="mt-4 flex justify-center">
            {{ $notifikasi->appends(request()->query())->links() }}
        </div>

    </div>
</x-app-layout>