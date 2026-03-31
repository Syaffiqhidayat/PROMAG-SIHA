<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                @role('super-admin|admin') Dashboard @else Scan QR Code @endrole
            </h2>
            
            {{-- 🔍 Tombol Scan: HANYA untuk User Biasa --}}
            @role('user')
            <button onclick="startScan()" 
                    class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg text-sm font-medium flex items-center gap-2 transition">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                </svg>
                Scan QR Code
            </button>
            @endrole
        </div>
    </x-slot>

    <div class="py-6">
        <div class="max-w-full mx-auto px-4 sm:px-6 lg:px-8 space-y-6">

            {{-- ═══════════════════════════════════════════════
                 📊 DASHBOARD ADMIN: Panel Rekomendasi
                 HANYA untuk Super-Admin & Admin
            ════════════════════════════════════════════════ --}}
            @role('super-admin|admin')
            @if(isset($semuaRekomendasi) && $semuaRekomendasi->count() > 0)
            <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100 bg-gray-50">
                    <div class="flex items-center gap-3">
                        <span class="text-red-500 text-lg">🔔</span>
                        <div>
                            <p class="font-semibold text-gray-800 text-sm">Rekomendasi Penggantian Hardware</p>
                            <p class="text-xs text-gray-500 mt-0.5">Sistem mendeteksi hardware yang perlu diperhatikan</p>
                        </div>
                    </div>
                    <div class="flex items-center gap-2">
                        @if($totalRekomendasiDanger > 0)
                            <span class="inline-flex items-center gap-1 text-xs font-medium bg-red-100 text-red-700 px-2.5 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-red-500 inline-block"></span>
                                {{ $totalRekomendasiDanger }} Segera Ganti
                            </span>
                        @endif
                        @if($totalRekomendasiWarning > 0)
                            <span class="inline-flex items-center gap-1 text-xs font-medium bg-amber-100 text-amber-700 px-2.5 py-1 rounded-full">
                                <span class="w-1.5 h-1.5 rounded-full bg-amber-400 inline-block"></span>
                                {{ $totalRekomendasiWarning }} Perlu Perhatian
                            </span>
                        @endif
                    </div>
                </div>

                <div class="overflow-x-auto">
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left text-xs font-medium text-gray-500 uppercase tracking-wide border-b border-gray-100">
                                <th class="px-5 py-3">Status</th>
                                <th class="px-5 py-3">Nama Barang</th>
                                <th class="px-5 py-3">No. Inventaris</th>
                                <th class="px-5 py-3">Merek / Tipe</th>
                                <th class="px-5 py-3">Unit</th>
                                <th class="px-5 py-3">Alasan Rekomendasi</th>
                                <th class="px-5 py-3">Tgl Masuk</th>
                                <th class="px-5 py-3">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @foreach($semuaRekomendasi as $rek)
                            @php $hw = $rek['hardware']; $level = $rek['level']; $tipe = $rek['tipe']; @endphp
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-5 py-3">
                                    @if($level === 'danger')
                                        <span class="inline-flex items-center gap-1.5 text-xs font-medium bg-red-100 text-red-700 px-2.5 py-1 rounded-full">
                                            <span class="w-1.5 h-1.5 rounded-full bg-red-500 animate-pulse inline-block"></span>
                                            Segera Ganti
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 text-xs font-medium bg-amber-100 text-amber-700 px-2.5 py-1 rounded-full">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-400 inline-block"></span>
                                            Perlu Perhatian
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-3 font-medium text-gray-900">{{ $hw->nama_barang ?? '-' }}</td>
                                <td class="px-5 py-3 text-gray-500 font-mono text-xs">{{ $hw->no_iventaris ?? '-' }}</td>
                                <td class="px-5 py-3 text-gray-600">
                                    {{ $hw->merek ?? '-' }}
                                    @if($hw->tipe ?? false) <span class="text-gray-400">/ {{ $hw->tipe }}</span> @endif
                                </td>
                                <td class="px-5 py-3">
                                    @if($rek['unit'])
                                        <span class="inline-block text-xs bg-blue-50 text-blue-700 px-2 py-0.5 rounded font-medium">
                                            {{ $rek['unit']->nama_unit ?? $rek['unit']->kode_unit }}
                                        </span>
                                    @else <span class="text-gray-400">-</span> @endif
                                </td>
                                <td class="px-5 py-3">
                                    <div class="flex items-start gap-1.5">
                                        @if($tipe === 'kerusakan_berulang') <span class="text-red-400 mt-0.5">🔧</span>
                                        @elseif($tipe === 'hardware_tua') <span class="text-amber-400 mt-0.5">📅</span>
                                        @else <span class="text-red-400 mt-0.5">⚠️</span> @endif
                                        <span class="text-gray-600 text-xs leading-relaxed">{{ $rek['alasan'] }}</span>
                                    </div>
                                </td>
                                <td class="px-5 py-3 text-gray-500 text-xs whitespace-nowrap">
                                    @if($hw->tanggal_masuk)
                                        {{ \Carbon\Carbon::parse($hw->tanggal_masuk)->format('d/m/Y') }}
                                        <div class="text-gray-400 mt-0.5">{{ \Carbon\Carbon::parse($hw->tanggal_masuk)->diffForHumans() }}</div>
                                    @else - @endif
                                </td>
                                <td class="px-5 py-3">
                                    <div class="flex items-center gap-2">
                                        <a href="{{ route('hardware.show', $hw->id) }}" class="text-xs text-blue-600 hover:text-blue-800 font-medium">Detail</a>
                                        <a href="{{ route('hardware.edit', $hw->id) }}" class="text-xs text-gray-500 hover:text-gray-700 font-medium">Edit</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="px-5 py-3 bg-gray-50 border-t border-gray-100 text-xs text-gray-400 flex items-center gap-4">
                    <span>🔧 Kerusakan berulang: ≥5 laporan</span>
                    <span>·</span>
                    <span>📅 Hardware tua: ⚠️ ≥5 tahun | 🔴 ≥7 tahun</span>
                </div>
            </div>
            @endif
            @endrole


            {{-- ═══════════════════════════════════════════════
                 📈 DASHBOARD ADMIN: Kartu Statistik
                 HANYA untuk Super-Admin & Admin
            ════════════════════════════════════════════════ --}}
            @role('super-admin|admin')
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white rounded-xl border border-gray-200 p-5">
                    <p class="text-xs text-gray-500 mb-2">Total Hardware</p>
                    <p class="text-3xl font-semibold text-blue-600">{{ $totalHardware }}</p>
                    <p class="text-xs text-gray-400 mt-1">terdaftar dalam sistem</p>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-5">
                    <p class="text-xs text-gray-500 mb-2">Laporan Kerusakan</p>
                    <p class="text-3xl font-semibold text-red-500">{{ $totalKerusakan }}</p>
                    <p class="text-xs text-gray-400 mt-1">total laporan</p>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-5">
                    <p class="text-xs text-gray-500 mb-2">Perlu Perhatian</p>
                    <p class="text-3xl font-semibold text-amber-500">{{ $totalRekomendasiWarning }}</p>
                    <p class="text-xs text-gray-400 mt-1">hardware umur ≥5 tahun</p>
                </div>
                <div class="bg-white rounded-xl border border-gray-200 p-5">
                    <p class="text-xs text-gray-500 mb-2">Total Unit</p>
                    <p class="text-3xl font-semibold text-gray-700">{{ $totalUnit }}</p>
                    <p class="text-xs text-gray-400 mt-1">unit terdaftar</p>
                </div>
            </div>
            @endrole


            {{-- ═══════════════════════════════════════════════
                 📱 USER BIASA: Hanya Card Scan QR (Full Focus)
                 HANYA untuk User Biasa
            ════════════════════════════════════════════════ --}}
            @role('user')
            <div class="max-w-2xl mx-auto">
                <div class="bg-gradient-to-br from-blue-600 to-blue-800 rounded-2xl shadow-2xl p-8 text-white text-center">
                    <div class="mb-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-20 w-20 mx-auto mb-4 text-blue-200" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v1m6 11h2m-6 0h-2v4m0-11v3m0 0h.01M12 12h4.01M16 20h4M4 12h4m12 0h.01M5 8h2a1 1 0 001-1V5a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1zm12 0h2a1 1 0 001-1V5a1 1 0 00-1-1h-2a1 1 0 00-1 1v2a1 1 0 001 1zM5 20h2a1 1 0 001-1v-2a1 1 0 00-1-1H5a1 1 0 00-1 1v2a1 1 0 001 1z" />
                        </svg>
                        <h2 class="text-3xl font-bold mb-2">Scan QR Code Hardware</h2>
                        <p class="text-blue-100">Arahkan kamera ke QR Code untuk melihat detail menu hardware</p>
                    </div>
                    <button onclick="startScan()" 
                            class="bg-white text-blue-700 hover:bg-blue-50 font-bold py-4 px-10 rounded-xl text-lg transition transform hover:scale-105 shadow-lg">
                        <span class="flex items-center gap-3">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 9a2 2 0 012-2h.93a2 2 0 001.664-.89l.812-1.22A2 2 0 0110.07 4h3.86a2 2 0 011.664.89l.812 1.22A2 2 0 0018.07 7H19a2 2 0 012 2v9a2 2 0 01-2 2H5a2 2 0 01-2-2V9z" />
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 13a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            Mulai Scan Sekarang
                        </span>
                    </button>
                    <div class="mt-8 pt-6 border-t border-blue-500 text-sm text-blue-200">
                        <p>📷 Pastikan pencahayaan cukup untuk scan QR Code</p>
                        <p class="mt-1">🔒 Hanya QR Code dari sistem ini yang dapat dipindai</p>
                    </div>
                </div>
            </div>
            @endrole


            {{-- ═══════════════════════════════════════════════
                 📋 DASHBOARD ADMIN: Hardware & Kerusakan Terbaru
                 HANYA untuk Super-Admin & Admin
            ════════════════════════════════════════════════ --}}
            @role('super-admin|admin')
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
                {{-- Hardware terbaru --}}
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                        <p class="font-medium text-sm text-gray-800">Hardware Terbaru Ditambahkan</p>
                        <a href="{{ route('hardware.index') }}" class="text-xs text-blue-600 hover:underline">Lihat semua</a>
                    </div>
                    <table class="w-full text-sm">
                        <thead>
                            <tr class="text-left text-xs text-gray-400 uppercase tracking-wide border-b border-gray-100">
                                <th class="px-5 py-2.5">Nama Barang</th>
                                <th class="px-5 py-2.5">Merek / Tipe</th>
                                <th class="px-5 py-2.5">Unit</th>
                                <th class="px-5 py-2.5">Tgl Masuk</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50">
                            @forelse($hardwareTerbaru as $hw)
                            <tr class="hover:bg-gray-50">
                                <td class="px-5 py-3 font-medium text-gray-800">{{ $hw->nama_barang }}</td>
                                <td class="px-5 py-3 text-gray-500">{{ $hw->merek }} / {{ $hw->tipe }}</td>
                                <td class="px-5 py-3">
                                    <span class="text-xs bg-blue-50 text-blue-700 px-2 py-0.5 rounded font-medium">
                                        {{ $hw->units->nama_unit ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-5 py-3 text-gray-400 text-xs">
                                    {{ \Carbon\Carbon::parse($hw->tanggal_masuk)->format('d/m/Y') }}
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="px-5 py-4 text-center text-gray-400 text-sm">Belum ada data</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Kerusakan terbaru --}}
                <div class="bg-white rounded-xl border border-gray-200 overflow-hidden">
                    <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                        <p class="font-medium text-sm text-gray-800">Laporan Kerusakan Terbaru</p>
                        <a href="{{ route('kerusakan.index') }}" class="text-xs text-blue-600 hover:underline">Lihat semua</a>
                    </div>
                    <div class="divide-y divide-gray-50">
                        @forelse($kerusakanTerbaru as $k)
                        <div class="flex items-start gap-3 px-5 py-3 hover:bg-gray-50">
                            <span class="w-7 h-7 rounded-lg bg-red-50 text-red-400 flex items-center justify-center flex-shrink-0 text-sm mt-0.5">⚠</span>
                            <div class="flex-1 min-w-0">
                                <p class="text-sm text-gray-800 truncate">{{ $k->detail_laporan }}</p>
                                <p class="text-xs text-gray-400 mt-0.5">
                                    {{ $k->hardwares->nama_barang ?? '-' }} ·
                                    {{ $k->hardwares->units->nama_unit ?? '-' }} ·
                                    {{ \Carbon\Carbon::parse($k->created_at)->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                        @empty
                        <div class="px-5 py-4 text-center text-gray-400 text-sm">Belum ada laporan</div>
                        @endforelse
                    </div>
                </div>
            </div>

            {{-- Distribusi Hardware --}}
            <div class="bg-white rounded-xl border border-gray-200 p-5">
                <p class="font-medium text-sm text-gray-800 mb-4">Distribusi Hardware per Unit</p>
                @php $maxCount = $distribusiUnit->max('hardwares_count') ?: 1; @endphp
                <div class="space-y-3">
                    @foreach($distribusiUnit as $unit)
                    <div class="flex items-center gap-3">
                        <span class="text-xs text-gray-600 w-40 truncate">{{ $unit->nama_unit }}</span>
                        <div class="flex-1 bg-gray-100 rounded-full h-2 overflow-hidden">
                            <div class="h-2 rounded-full bg-blue-500 transition-all duration-500"
                                 style="width: {{ ($unit->hardwares_count / $maxCount) * 100 }}%">
                            </div>
                        </div>
                        <span class="text-xs text-gray-400 w-6 text-right">{{ $unit->hardwares_count }}</span>
                    </div>
                    @endforeach
                </div>
            </div>
            @endrole

        </div>
    </div>

    {{-- 🔍 MODAL SCAN QR: HANYA untuk User Biasa --}}
    @role('user')
    <div id="scanModal" class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-2xl max-w-md w-full overflow-hidden">
            <div class="bg-gradient-to-r from-blue-600 to-blue-700 px-6 py-4 flex justify-between items-center">
                <h3 class="text-white font-semibold text-lg">Scan QR Code</h3>
                <button onclick="stopScan()" class="text-white hover:bg-blue-800 rounded-lg p-1 transition">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
            <div class="p-6">
                <div id="reader" class="rounded-lg overflow-hidden border-2 border-gray-200"></div>
                <div class="mt-4 text-center">
                    <p class="text-sm text-gray-600" id="scanStatus">
                        <span class="inline-flex items-center gap-2">
                            <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                            Arahkan kamera ke QR Code menu...
                        </span>
                    </p>
                    <p class="text-xs text-gray-400 mt-2">Hanya QR Code dari sistem ini yang diterima</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Script Scan QR --}}
    <script src="https://unpkg.com/html5-qrcode" type="text/javascript"></script>
    <script>
        let html5QrCode;
        let isScanning = false;
        const BASE_URL = "{{ url('/') }}";

        function startScan() {
            document.getElementById('scanModal').classList.remove('hidden');
            html5QrCode = new Html5Qrcode("reader");
            
            html5QrCode.start(
                { facingMode: "environment" },
                { fps: 10, qrbox: { width: 250, height: 250 } },
                (decodedText) => {
                    if (decodedText.startsWith(BASE_URL)) {
                        document.getElementById('scanStatus').innerText = '✅ Menu ditemukan, membuka...';
                        html5QrCode.stop();
                        isScanning = false;
                        window.location.href = decodedText;
                    } else {
                        document.getElementById('scanStatus').innerText = '❌ QR Code tidak valid';
                        setTimeout(() => {
                            document.getElementById('scanStatus').innerHTML = `
                                <span class="inline-flex items-center gap-2">
                                    <span class="w-2 h-2 bg-green-500 rounded-full animate-pulse"></span>
                                    Arahkan kamera ke QR Code menu...
                                </span>
                            `;
                        }, 2000);
                    }
                },
                (error) => { /* abaikan error normal */ }
            ).catch(err => {
                console.error("Error starting scanner:", err);
                document.getElementById('scanStatus').innerHTML = `<span class="text-red-600">❌ Gagal akses kamera</span>`;
            });
            isScanning = true;
        }

        function stopScan() {
            if (html5QrCode && isScanning) {
                html5QrCode.stop().then(() => {
                    isScanning = false;
                    document.getElementById('scanModal').classList.add('hidden');
                }).catch(err => {
                    isScanning = false;
                    document.getElementById('scanModal').classList.add('hidden');
                });
            } else {
                document.getElementById('scanModal').classList.add('hidden');
            }
        }

        document.getElementById('scanModal').addEventListener('click', function(e) {
            if (e.target === this) stopScan();
        });
    </script>
    @endrole

</x-app-layout>