<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased bg-gray-50 text-gray-900">
        <div class="min-h-screen">

            @if (isset($header))
                <header class="bg-white border-b border-gray-200">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                            {{ $header }}
                        </h2>
                    </div>
                </header>
            @endif

            <main class="py-12">
                <div class="max-w-xl mx-auto px-4 sm:px-6 lg:px-8">

                    <div class="bg-white rounded-2xl shadow-sm border border-gray-200 overflow-hidden">

                        {{-- Header Card --}}
                        <div class="bg-gray-50 px-6 py-4 border-b border-gray-200 flex justify-between items-center">
                            <span class="text-sm font-bold uppercase tracking-widest text-gray-500">Menu Aksi</span>
              
                        </div>

                        <div class="p-8">

                            {{-- Nama Barang --}}
                            <div class="text-center mb-4">
                                <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-1">Nama Barang</p>
                                <h3 class="text-2xl font-extrabold text-gray-800">
                                    {{ $menus->nama_barang ?? '-' }}
                                </h3>
                            </div>

                            {{-- Keterangan --}}
                            <div class="text-center mb-4">
                                <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-1">Keterangan</p>
                                <h3 class="text-base font-medium text-gray-600">
                                    {{ $menus->keterangan ?? '-' }}
                                </h3>
                            </div>

                            {{-- Unit --}}
                            <div class="text-center mb-8">
                                <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-1">Unit</p>
                                <h3 class="text-xl font-extrabold text-gray-800 mb-1">
                                    {{ $menus->units->nama_unit ?? 'Tidak ada unit' }}
                                </h3>
                                <p class="text-gray-500 text-sm">Pilih tindakan yang ingin dilakukan untuk aset ini</p>
                            </div>

                            {{-- IP Address (jika ada relasi ips) --}}
                          @if($ip != null  )
                            <div class="text-center mb-8">
                                <p class="text-xs font-semibold uppercase tracking-widest text-gray-400 mb-2">IP Address</p>
                                <div class="flex flex-wrap justify-center gap-2">
                              
                                        <span class="bg-green-100 text-green-700 text-sm font-bold px-3 py-1 rounded-full">
                                        
                                        {{ $ip->subnet1 }}.{{ $ip->subnet2 }}.{{ $ip->subnet3 }}.{{ $ip->subnet4 }}
                                        </span>
                                   
                                </div>
                            </div>
                           @endif

                            {{-- Tombol Aksi --}}
                            <div class="space-y-4">
                                <a href="{{ url('/kerusakan/create') }}/{{ $menus->id }}"
                                   class="group flex items-center justify-between w-full p-4 bg-red-50 hover:bg-red-100 text-red-700 font-bold rounded-xl transition-all duration-200 border border-red-100">
                                    <span class="flex items-center">
                                        <span class="p-2 bg-red-200 rounded-lg mr-3 group-hover:scale-110 transition-transform">⚠️</span>
                                        Lapor Rusak
                                    </span>
                                    <span class="text-xl">→</span>
                                </a>

                                <a href="{{ url('/mutasis/createid') }}/{{ $menus->id }}"
                                   class="group flex items-center justify-between w-full p-4 bg-blue-50 hover:bg-blue-100 text-blue-700 font-bold rounded-xl transition-all duration-200 border border-blue-100">
                                    <span class="flex items-center">
                                        <span class="p-2 bg-blue-200 rounded-lg mr-3 group-hover:scale-110 transition-transform">🔄</span>
                                        Mutasi Barang
                                    </span>
                                    <span class="text-xl">→</span>
                                </a>

                                <a href="{{ route('hardware.show', $menus->id) }}"
                                   class="group flex items-center justify-between w-full p-4 bg-gray-50 hover:bg-gray-200 text-gray-700 font-bold rounded-xl transition-all duration-200 border border-gray-200">
                                    <span class="flex items-center">
                                        <span class="p-2 bg-gray-300 rounded-lg mr-3 group-hover:scale-110 transition-transform">📄</span>
                                        Informasi Detail
                                    </span>
                                    <span class="text-xl">→</span>
                                </a>
                            </div>
                        </div>

                        <div class="px-6 py-4 bg-gray-50 border-t border-gray-100 text-center">
                            <a href="{{ url()->previous() }}" class="text-sm text-gray-500 hover:text-gray-800 underline">
                                Kembali ke Daftar
                            </a>
                        </div>

                    </div>
                </div>
            </main>
        </div>
    </body>
</html>