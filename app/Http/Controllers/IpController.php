<?php

namespace App\Http\Controllers;

use App\Models\Ip;
use App\Models\Hardware;
use Illuminate\Http\Request;

class IpController extends Controller
{
    /**
     * Menampilkan daftar IP.
     */
    public function index()
    {
        // Mengambil data IP beserta relasi hardware-nya
        $ips = Ip::with('hardwares')->latest()->get();
        
        return view('ip.index', compact('ips'));
    }

    /**
     * Menampilkan form tambah IP.
     */
    public function create()
    {
        $hardwares = Hardware::all();
        return view('ip.create', compact('hardwares'));
    }

    /**
     * Menyimpan data IP baru.
     */
    public function store(Request $request)
    {
        $request->validate([
            'subnet1'     => 'required|numeric|between:0,255',
            'subnet2'     => 'required|numeric|between:0,255',
            'subnet3'     => 'required|numeric|between:0,255',
            'subnet4'     => 'required|numeric|between:0,255',
            'hardware_id' => 'required|exists:hardwares,id',
        ]);

        Ip::create($request->all());

        return redirect()->route('ip.index')
            ->with('success', 'Data IP berhasil ditambahkan.');
    }

    /**
     * Menampilkan form edit IP.
     */
    public function edit($id)
    {
        $ip = Ip::findOrFail($id);
        $hardwares = Hardware::all();
        
        return view('ip.edit', compact('ip', 'hardwares'));
    }

    /**
     * Memperbarui data IP.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'subnet1'     => 'required|numeric|between:0,255',
            'subnet2'     => 'required|numeric|between:0,255',
            'subnet3'     => 'required|numeric|between:0,255',
            'subnet4'     => 'required|numeric|between:0,255',
            'hardware_id' => 'required|exists:hardwares,id',
        ]);

        $ip = Ip::findOrFail($id);
        $ip->update($request->all());

        return redirect()->route('ip.index')
            ->with('success', 'Data IP berhasil diperbarui.');
    }

    /**
     * Menghapus data IP.
     */
    public function destroy($id)
    {
        $ip = Ip::findOrFail($id);
        $ip->delete();

        return redirect()->route('ip.index')
            ->with('success', 'Data IP berhasil dihapus.');
    }
}