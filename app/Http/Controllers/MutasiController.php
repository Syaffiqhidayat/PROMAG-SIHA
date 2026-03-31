<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\Mutasi;
use App\Models\Hardware;
use App\Models\Unit;
use App\Models\User;

class MutasiController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view mutasi',   ['only' => ['index', 'show']]);
        $this->middleware('permission:create mutasi', ['only' => ['create', 'store']]);
        $this->middleware('permission:createid mutasi', ['only' => ['createid', 'store']]);
        $this->middleware('permission:update mutasi', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete mutasi', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        $mutasis = Mutasi::with(['hardwares', 'units1', 'units2', 'users'])
            ->latest()
            ->paginate(10);

        return view('mutasi.index', compact('mutasis'));
    }

    public function create(): View
    {
        $hardwares = Hardware::with('units')->get();
        $units     = Unit::all();
        $users     = User::all();

        return view('mutasi.create', compact('hardwares', 'units', 'users'));
    }

    public function createid($id): View
    {
        $hardware = Hardware::with('units')->findOrFail($id);
        $units    = Unit::all();     

        return view('mutasi.createid', compact('hardware', 'units'));
    }

    /**
     * Endpoint AJAX: mengambil unit asal berdasarkan hardware_id
     * Route: GET /mutasis/get-unit/{hardware_id}
     */
    public function getUnitByHardware(string $hardware_id)
    {
        $hardware = Hardware::with('unit')->findOrFail($hardware_id);
        $unitAsal = $hardware->unit;

        return response()->json([
            'unit_asal_id'   => $unitAsal?->id ?? null,
            'unit_asal_nama' => $unitAsal?->nama_unit ?? 'Tidak ada unit',
        ]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'hardware_id'    => 'required|exists:hardwares,id',
            'unit_asal_id'   => 'required|exists:units,id',
            'unit_tujuan_id' => 'required|exists:units,id|different:unit_asal_id',
            'keterangan'     => 'required|string|max:500',
            'user_id'        => 'nullable|exists:users,id',
        ]);

        if (empty($validated['user_id'])) {
            $validated['user_id'] = auth()->id();
        }

        Mutasi::create($validated);

        $hardware = Hardware::find($validated['hardware_id']);
        if ($hardware) {
            $hardware->update([
                'unit_id' => $validated['unit_tujuan_id']
            ]);
        }

        return redirect('/hardware?unit='.$validated['unit_tujuan_id'])
            ->with('success', 'Data Mutasi berhasil ditambahkan!');
    }

    public function show(string $id): View
    {
        $mutasi = Mutasi::with(['hardwares', 'units1', 'units2', 'users'])
            ->findOrFail($id);

        return view('mutasi.show', compact('mutasi'));
    }

    public function edit(string $id): View
    {
        $mutasi    = Mutasi::with(['hardwares', 'units1', 'units2', 'users'])->findOrFail($id);
        $hardwares = Hardware::with('unit')->get();
        $units     = Unit::all();
        $users     = User::all();

        return view('mutasi.edit', compact('mutasi', 'hardwares', 'units', 'users'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'keterangan'     => 'required|string|max:500',
            'unit_asal_id'   => 'required|exists:units,id',
            'unit_tujuan_id' => 'required|exists:units,id|different:unit_asal_id',
            'hardware_id'    => 'required|exists:hardwares,id',
            'user_id'        => 'required|exists:users,id',
        ]);

        $mutasi = Mutasi::findOrFail($id);
        $mutasi->update($request->all());

        return redirect()->route('mutasis.index')
            ->with('success', 'Data Mutasi berhasil diupdate!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $mutasi = Mutasi::findOrFail($id);
        $mutasi->delete();

        return redirect()->route('mutasis.index')
            ->with('success', 'Data Mutasi berhasil dihapus!');
    }
}