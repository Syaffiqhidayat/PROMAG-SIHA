<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Hardware;
use App\Models\Kerusakan;
use App\Models\Unit;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    public function index(): View
    {
        $user = Auth::user();

        if ($user->hasRole(['super-admin', 'admin'])) {
            return $this->adminDashboard();
        }

        return $this->userDashboard();
    }

    /**
     * Dashboard untuk Super-Admin & Admin (Full Fitur)
     */
    private function adminDashboard(): View
    {
        $totalHardware  = Hardware::count();
        $totalUnit      = Unit::count();
        $totalKerusakan = Kerusakan::count();

        $hardwareTerbaru = Hardware::with('units')
            ->orderByDesc('tanggal_masuk')
            ->take(5)
            ->get();

        $kerusakanTerbaru = Kerusakan::with(['hardwares', 'units', 'users'])
            ->orderByDesc('tgl_requst')
            ->take(5)
            ->get();

        $distribusiUnit = Unit::withCount('hardwares')
            ->orderByDesc('hardwares_count')
            ->get();

        // ── REKOMENDASI 1: Kerusakan berulang ──
        $rekomendasiKerusakan = Kerusakan::selectRaw('hardware_id, COUNT(*) as total_kerusakan')
            ->groupBy('hardware_id')
            ->having('total_kerusakan', '>=', 5)
            ->with(['hardwares', 'hardwares.units'])
            ->orderByDesc('total_kerusakan')
            ->get()
            ->map(function ($item) {
                $hw = $item->hardwares; 
                return [
                    'hardware'        => $hw,
                    'unit'            => $hw?->units ?? null,
                    'total_kerusakan' => $item->total_kerusakan,
                    'alasan'          => "Tercatat {$item->total_kerusakan}x kerusakan berulang",
                    'tipe'            => 'kerusakan_berulang',
                    'level'           => 'danger',
                ];
            });

        // ── REKOMENDASI 2: Hardware tua ──
        $now = Carbon::now();
        $rekomendasiUmur = Hardware::with('units')
            ->get()
            ->map(function ($hw) use ($now) {
                if (!$hw->tanggal_masuk) return null;
                
                $tglMasuk  = Carbon::parse($hw->tanggal_masuk);
                $umurTahun = $tglMasuk->diffInYears($now);
                $sisaBulan = $tglMasuk->diffInMonths($now) % 12;

                if ($umurTahun >= 7) {
                    return [
                        'hardware' => $hw,
                        'unit'     => $hw->units,
                        'alasan'   => "Umur perangkat {$umurTahun} tahun (≥7 tahun)",
                        'tipe'     => 'hardware_tua',
                        'level'    => 'danger',
                    ];
                } elseif ($umurTahun >= 5) {
                    return [
                        'hardware' => $hw,
                        'unit'     => $hw->units,
                        'alasan'   => "Umur perangkat {$umurTahun} tahun {$sisaBulan} bulan (≥5 tahun)",
                        'tipe'     => 'hardware_tua',
                        'level'    => 'warning',
                    ];
                }
                return null;
            })
            ->filter()
            ->values();

        // ── Gabungkan rekomendasi ──
        $semuaRekomendasi = collect();
        foreach ($rekomendasiKerusakan as $r) $semuaRekomendasi->push($r);
        
        foreach ($rekomendasiUmur as $r) {
            $hwId = $r['hardware']->id ?? null;
            $sudahAda = $semuaRekomendasi->first(fn($x) => ($x['hardware']->id ?? null) === $hwId);
            
            if ($sudahAda) {
                $semuaRekomendasi = $semuaRekomendasi->map(function ($item) use ($r, $hwId) {
                    if (($item['hardware']->id ?? null) === $hwId) {
                        $item['alasan'] .= ' + ' . $r['alasan'];
                        $item['level'] = 'danger';
                        $item['tipe'] = 'kerusakan_dan_tua';
                    }
                    return $item;
                });
            } else {
                $semuaRekomendasi->push($r);
            }
        }

        $semuaRekomendasi = $semuaRekomendasi
            ->sortByDesc(fn($item) => $item['level'] === 'danger' ? 1 : 0)
            ->values();

        $totalRekomendasiDanger = $semuaRekomendasi->where('level', 'danger')->count();
        $totalRekomendasiWarning = $semuaRekomendasi->where('level', 'warning')->count();

        return view('dashboard', compact(
            'totalHardware', 'totalUnit', 'totalKerusakan',
            'hardwareTerbaru', 'kerusakanTerbaru', 'distribusiUnit',
            'semuaRekomendasi', 'totalRekomendasiDanger', 'totalRekomendasiWarning'
        ));
    }

    /**
     * Dashboard untuk User Biasa - HANYA Scan QR, tanpa data lain
     */
    private function userDashboard(): View
    {
        // User biasa tidak perlu data apapun dari database
        // Hanya mengembalikan view dengan tombol scan
        return view('dashboard');
    }
}