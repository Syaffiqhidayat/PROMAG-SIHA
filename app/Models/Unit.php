<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    use HasFactory;

    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'kd_unit',
        'nama_unit',
    ];

        public function mutasis()
    {
        return $this->hasMany(Mutasi::class);
    }

    public function hardwares()
        {
            return $this->hasMany(Hardware::class);
        }    

     public function kerusakans()
        {
            return $this->hasMany(Hardware::class);
        }    
}
