<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = ['barcode', 'nim', 'kehadiran', 'tanggal'];
    public $incrementing = false;
    protected $table = 'absensi';

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'barcode', 'barcode');
    }
}
