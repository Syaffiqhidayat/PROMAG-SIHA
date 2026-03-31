<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Hardware extends Model
{
    use HasFactory;

    protected $table = 'hardwares';

    protected $fillable = [
        'kd_barang',
        'no_iventaris',
        'nama_barang',
        'jenis_barang',
        'merek',
        'tipe',
        'spek',
        'keterangan',
        'unit_id',
        'tanggal_masuk',
    ];

    protected $casts = [
        'tanggal_masuk' => 'date',
    ];

    // ── Relasi ───────────────────────────────────────────────────────

    public function units()
    {
        return $this->belongsTo(Unit::class, 'unit_id');
    }

    public function mutasis()
    {
        return $this->hasMany(Mutasi::class);
    }

    // FIX: relasi ke Kerusakan (bukan Hardware)
    public function kerusakans()
    {
        return $this->hasMany(Kerusakan::class, 'hardware_id');
    }

    // ── Accessor umur ────────────────────────────────────────────────

    // FIX: pakai 'tanggal_masuk' (sesuai fillable) + null-check
    public function getUmurTahunAttribute(): int
    {
        if (!$this->tanggal_masuk) return 0;
        return Carbon::parse($this->tanggal_masuk)->diffInYears(now());
    }

    public function getUmurLabelAttribute(): string
    {
        if (!$this->tanggal_masuk) return '-';
        $tahun = $this->umur_tahun;
        $bulan = Carbon::parse($this->tanggal_masuk)->diffInMonths(now()) % 12;
        return $tahun . ' tahun' . ($bulan > 0 ? " {$bulan} bulan" : '');
    }

    // ── Scope hardware tua ───────────────────────────────────────────

    public function scopeUmurWarning($query)
    {
        return $query->whereDate('tanggal_masuk', '<=', now()->subYears(5));
    }

    public function scopeUmurDanger($query)
    {
        return $query->whereDate('tanggal_masuk', '<=', now()->subYears(7));
    }
}