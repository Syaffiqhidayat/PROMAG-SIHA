<?php

namespace App\Models;

use App\Http\Controllers\UnitController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;


            public function hardwares()
        {
            return $this->belongsTo(Hardware::class, 'hardware_id');
        } 

            public function units()
        {
            return $this->belongsTo(Unit::class, 'unit_id');
        }
 

}
