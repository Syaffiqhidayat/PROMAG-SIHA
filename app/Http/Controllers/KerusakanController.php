<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Kerusakan;
use App\Notifications\KerusakanBaruNotification;
use Illuminate\Support\Facades\Notification;
use App\Models\Hardware;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;

class KerusakanController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view kerusakan',   ['only' => ['index', 'show']]);
        $this->middleware('permission:create kerusakan', ['only' => ['create', 'store']]);
        $this->middleware('permission:update kerusakan', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete kerusakan', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $kerusakans = Kerusakan::with(['hardwares', 'units', 'users'])->latest()->get();
        return view('kerusakan.index', compact('kerusakans'));
    }

    public function create(): View
    {
        $hardwares = Hardware::all();
        $units     = Unit::all();
        $users     = User::all();
        return view('kerusakan.create', compact('hardwares', 'units', 'users'));
    }

    public function createid($id): View
    {
        $hardware = Hardware::find($id);
        $unit     = $hardware->units;

        return view('kerusakan.createid', compact('hardware', 'unit'));
    }

    /**
     * Store - untuk admin (dengan tgl_respon, tindakan, user_id manual)
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'tgl_requst'   => 'required|date_format:d/m/Y',
            'waktu_requst' => 'required',
            'laporan'      => 'required|string',
            'tindakan'     => 'nullable|string',
            'hardware_id'  => 'required|exists:hardwares,id',
            'unit_id'      => 'required|exists:units,id',
            'user_id'      => 'required|exists:users,id',
        ]);

        $data                = $request->all();
        $data['tgl_requst']  = Carbon::createFromFormat('d/m/Y', $request->tgl_requst)->format('Y-m-d');
        $data['tgl_respon']  = $request->filled('tgl_respon')
                                ? Carbon::createFromFormat('d/m/Y', $request->tgl_respon)->format('Y-m-d')
                                : null;
        $data['waktu_respon'] = $request->waktu_respon ?? null;

        $kerusakan = Kerusakan::create($data);

        // Kirim notifikasi ke Staff IT
        $staffIT = User::role('staff it')->get();
        if ($staffIT->isNotEmpty()) {
            Notification::send($staffIT, new KerusakanBaruNotification($kerusakan));
        }

        return redirect()->route('kerusakan.index')
            ->with('success', 'Data Kerusakan berhasil ditambahkan!');
    }

    /**
     * Storeid - untuk user biasa (laporan mandiri dari hardware tertentu)
     */
    public function storeid(Request $request): RedirectResponse
    {
        $request->validate([
            'tgl_requst'   => 'required|date_format:d/m/Y',
            'waktu_requst' => 'required',
            'laporan'      => 'required|string',
            'hardware_id'  => 'required|exists:hardwares,id',
            'unit_id'      => 'required|exists:units,id',
        ]);

        $data                 = $request->only(['tgl_requst', 'waktu_requst', 'laporan', 'hardware_id', 'unit_id']);
        $data['tgl_requst']   = Carbon::createFromFormat('d/m/Y', $request->tgl_requst)->format('Y-m-d');
        $data['tgl_respon']   = null;
        $data['waktu_respon'] = null;
        $data['tindakan']     = null;
        $data['user_id']      = auth()->id();

        try {
            $kerusakan = Kerusakan::create($data);

            // Kirim notifikasi ke Staff IT
            $staffIT = User::role('staff it')->get();
            if ($staffIT->isNotEmpty()) {
                Notification::send($staffIT, new KerusakanBaruNotification($kerusakan));
            }

            return redirect()->route('kerusakan.index')
                ->with('success', 'Laporan Kerusakan berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->withInput()
                ->with('error', 'Gagal menyimpan data: ' . $e->getMessage());
        }
    }

    public function show(string $id): View
    {
        $kerusakan = Kerusakan::with(['hardwares', 'units', 'users'])->findOrFail($id);
        return view('kerusakan.show', compact('kerusakan'));
    }

    public function edit(string $id): View
    {
        $kerusakan = Kerusakan::findOrFail($id);
        $hardwares = Hardware::all();
        $units     = Unit::all();
        $users     = User::all();
        return view('kerusakan.edit', compact('kerusakan', 'hardwares', 'units', 'users'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'tgl_requst'   => 'required|date_format:d/m/Y',
            'waktu_requst' => 'required',
            'laporan'      => 'required|string',
            'tindakan'     => 'nullable|string',
            'hardware_id'  => 'required|exists:hardwares,id',
            'unit_id'      => 'required|exists:units,id',
            'user_id'      => 'required|exists:users,id',
        ]);

        $data                = $request->all();
        $data['tgl_requst']  = Carbon::createFromFormat('d/m/Y', $request->tgl_requst)->format('Y-m-d');
        $data['tgl_respon']  = $request->filled('tgl_respon')
                                ? Carbon::createFromFormat('d/m/Y', $request->tgl_respon)->format('Y-m-d')
                                : null;
        $data['waktu_respon'] = $request->waktu_respon ?? null;

        $kerusakan = Kerusakan::findOrFail($id);
        $kerusakan->update($data);

        return redirect()->route('kerusakan.index')
            ->with('success', 'Data Kerusakan berhasil diupdate!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $kerusakan = Kerusakan::findOrFail($id);
        $kerusakan->delete();

        return redirect()->route('kerusakan.index')
            ->with('success', 'Data Kerusakan berhasil dihapus!');
    }
}