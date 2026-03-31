<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerusakan extends Model
{
    use HasFactory;

     /**
     * fillable
     *
     * @var array
     */
    protected $fillable = [
        'tgl_respon',
        'tgl_requst',
        'waktu_respon',
        'waktu_requst',
        'laporan',
        'tindakan',
        'hardware_id',   
        'unit_id',       
        'user_id',            
    ];

     protected $casts = [
        'tgl_request'  => 'date',
        'tgl_response' => 'date',
    ];

               public function units()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
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
