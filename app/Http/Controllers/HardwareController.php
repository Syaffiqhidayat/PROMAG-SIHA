<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Hardware;
use App\Models\Ip;
use App\Models\Unit;
use Illuminate\Http\RedirectResponse;

class HardwareController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:view hardware',   ['only' => ['index', 'show']]);
        $this->middleware('permission:create hardware', ['only' => ['create', 'store']]);
        $this->middleware('permission:update hardware', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete hardware', ['only' => ['destroy']]);
    }

    public function index(): View
    {
        if (!empty(request('units'))) {
            $hardware = Hardware::where('unit_id', '=', request('units'))->with('units')->latest()->get();
        } else {
            $hardware = Hardware::where('id', '>', 1)->with('units')->latest()->get();
        }

        $ip = Ip::get();

        return view('hardware.index', compact('hardware', 'ip'));
    }

    public function create(): View
    {
        $units = Unit::all();
        return view('hardware.create', compact('units'));
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'kd_barang'     => 'required|unique:hardwares,kd_barang',
            'no_iventaris'  => 'required',
            'nama_barang'   => 'required|min:3',
            'jenis_barang'  => 'required',
            'merek'         => 'required',
            'tipe'          => 'required',
            'spek'          => 'required',
            'keterangan'    => 'nullable|string',
            'unit_id'       => 'required|exists:units,id',
            'tanggal_masuk' => 'required|date',
        ]);

        Hardware::create($request->all());

        return redirect()->route('hardware.index')
            ->with('success', 'Data Hardware berhasil ditambahkan!');
    }

    public function show(string $id): View
    {
        $hardware = Hardware::with('units')->findOrFail($id);
        $units    = Unit::all();
        return view('hardware.show', compact('hardware', 'units'));
    }

    public function edit(string $id): View
    {
        $hardware = Hardware::findOrFail($id);
        $units    = Unit::all();
        return view('hardware.edit', compact('hardware', 'units'));
    }

    public function update(Request $request, string $id): RedirectResponse
    {
        $request->validate([
            'kd_barang'     => 'required|unique:hardwares,kd_barang,' . $id,
            'no_iventaris'  => 'required',
            'nama_barang'   => 'required|min:3',
            'jenis_barang'  => 'required',
            'merek'         => 'required',
            'tipe'          => 'required',
            'spek'          => 'required',
            'keterangan'    => 'nullable|string',
            'unit_id'       => 'required|exists:units,id',
            'tanggal_masuk' => 'required|date',
        ]);

        $hardware = Hardware::findOrFail($id);
        $hardware->update($request->all());

        return redirect()->route('hardware.index')
            ->with('success', 'Data Hardware Berhasil Diupdate!');
    }

    public function destroy(string $id): RedirectResponse
    {
        $hardware = Hardware::findOrFail($id);
        $hardware->delete();

        return redirect()->route('hardware.index')
            ->with('success', 'Data Hardware Berhasil Dihapus!');
    }
}