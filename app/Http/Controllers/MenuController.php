<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\Hardware;
use App\Models\Unit;
use App\Models\Ip;


class MenuController extends Controller
{
        public function index($kd_barang)
    {
        $menus = Hardware::with('units')
                    ->where('kd_barang', $kd_barang)
                    ->firstOrFail();

        $ip = Ip::where('hardware_id', $menus->id)->first();

        return view('menu.index', compact('menus', 'ip'));
    }


    public function show(string $kd_barang)
    {
        $menu = Menu::with('hardware')->findOrFail($kd_barang);
        $hardware = Hardware::all();
        $unit  = Unit::all();
        $ip = Ip::all();
        return view('hardware.show', compact('menu', 'hardware', 'unit', 'ip'));
    }
}