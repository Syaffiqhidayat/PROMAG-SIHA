<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mutasi extends Model
{
    use HasFactory;

    
    /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'keterangan',
        'unit_asal_id',
        'unit_tujuan_id',
        'hardware_id',
        'user_id',            

    ];

    public function units()
        {
            return $this->belongsTo(Unit::class, 'unit_id');
        }
         public function units1()
        {
            return $this->belongsTo(Unit::class, 'unit_asal_id');
        }
         public function units2()
        {
            return $this->belongsTo(Unit::class, 'unit_tujuan_id');
        }


    public function hardwares()
        {
            return $this->belongsTo(Hardware::class, 'hardware_id');
        } 

               public function users()
    {
        return $this->belongsTo(User::class, 'user_id');
    }        

}
