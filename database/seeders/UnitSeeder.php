<?php

namespace Database\Seeders;

use App\Models\unit; 
use Illuminate\Database\Seeder;


class UnitSeeder extends Seeder
{
    public function run(): void
    {
        $data = [

            [
                'kd_unit' => 'AJN',
                'nama_unit' => 'ANJUNGAN',
            ],
            [
                'kd_unit' => 'AKD',
                'nama_unit' => 'AKREDITASI',
            ],
            [
                'kd_unit' => 'FAR-RAJAL',
                'nama_unit' => 'FARMASI-RAWATJALAN',
            ],
            [
                'kd_unit' => 'FAR-RANAP',
                'nama_unit' => 'FARMASI-RAWATINAP',
            ],
            [
                'kd_unit' => 'CSSD',
                'nama_unit' => 'CSSD',
            ],
            [
                'kd_unit' => 'GZ',
                'nama_unit' => 'GIZI',
            ],
            [
                'kd_unit' => 'GPT',
                'nama_unit' => 'GPT',
            ],
            [
                'kd_unit' => 'GBS/VK',
                'nama_unit' => 'GBS/VK',
            ],
            [
                'kd_unit' => 'IBS',
                'nama_unit' => 'IBS',
            ],
            [
                'kd_unit' => 'ICU',
                'nama_unit' => 'ICU',
            ],
            [
                'kd_unit' => 'IGD',
                'nama_unit' => 'IGD',
            ],
            [
                'kd_unit' => 'KA.CSMX',
                'nama_unit' => 'KA.CASEMIX',
            ],
            [
                'kd_unit' => 'KA.KU',
                'nama_unit' => 'KA.KEUANGAN',
            ],
            [
                'kd_unit' => 'KA.UM',
                'nama_unit' => 'KA.UMUM',
            ],
            [
                'kd_unit' => 'KA.WADIR',
                'nama_unit' => 'KA.WADIR',
            ],
            [
                'kd_unit' => 'KA.SPI',
                'nama_unit' => 'KA.SPI',
            ],
            [
                'kd_unit' => 'KA.KOM',
                'nama_unit' => 'KA.KOMITE',
            ],
            [
                'kd_unit' => 'KA.KEP',
                'nama_unit' => 'KA.KEPERAWATAN',
            ],
            [
                'kd_unit' => 'KSR',
                'nama_unit' => 'KASIR',
            ],
            [
                'kd_unit' => 'LAB',
                'nama_unit' => 'LABORATORIUM',
            ],
            [
                'kd_unit' => 'LDRY',
                'nama_unit' => 'LAUNDRY',
            ],
            [
                'kd_unit' => 'LOG-FAR',
                'nama_unit' => 'LOGISTIK-FARMASI',
            ],
            [
                'kd_unit' => 'LOG-UM',
                'nama_unit' => 'LOGISTIK-UMUM',
            ],
            [
                'kd_unit' => 'MLTZM',
                'nama_unit' => 'MULTAZAM',
            ],
            [
                'kd_unit' => 'NNT',
                'nama_unit' => 'NEONATUS',
            ],
            [
                'kd_unit' => 'NFS/GSP Lt3',
                'nama_unit' => 'NIFAS/GSP Lt3',
            ],
            [
                'kd_unit' => 'RA',
                'nama_unit' => 'RA',
            ],
            [
                'kd_unit' => 'RDLG',
                'nama_unit' => 'RADIOLOGI',
            ],
            [
                'kd_unit' => 'RAJAL',
                'nama_unit' => 'RAWAT-JALAN',
            ],
            [
                'kd_unit' => 'RDU',
                'nama_unit' => 'RDU',
            ],
            [
                'kd_unit' => 'REKDIS',
                'nama_unit' => 'REKAM-MEDIS',
            ],
            [
                'kd_unit' => 'STPM',
                'nama_unit' => 'SATPAM',
            ],
            [
                'kd_unit' => 'TI',
                'nama_unit' => 'TI',
            ],
            [
                'kd_unit' => 'TPPRJ/TPPRI',
                'nama_unit' => 'TPPRJ/TPPRI',
            ],

            
        ];
         unit::insert($data);   
    }
}