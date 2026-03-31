<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::latest()->paginate(10);
        // Mengarah ke folder 'unit'
        return view('unit.index', compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mengarah ke folder 'unit'
        return view('unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kd_unit' => 'required|string|max:255|unique:units,kd_unit',
            'nama_unit' => 'required|string|max:255',
        ]);

        Unit::create($request->all());

        return redirect()->route('units.index')
                        ->with('success', 'Unit berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Unit $unit)
    {
        // Mengarah ke folder 'unit'
        return view('unit.show', compact('unit'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Unit $unit)
    {
        // Mengarah ke folder 'unit'
        return view('unit.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'kd_unit' => 'required|string|max:255|unique:units,kd_unit,' . $unit->id,
            'nama_unit' => 'required|string|max:255',
        ]);

        $unit->update($request->all());

        return redirect()->route('units.index')
                        ->with('success', 'Unit berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Unit $unit)
    {
        $unit->delete();

        return redirect()->route('units.index')
                        ->with('success', 'Unit berhasil dihapus.');
    }
}