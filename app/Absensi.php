<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $fillable = ['barcode', 'nim', 'kehadiran', 'status', 'tanggal'];
    public $incrementing = false;
    protected $table = 'absensi';
    protected $dates = ['tanggal'];

    public function mahasiswa()
    {
        return $this->belongsTo(Mahasiswa::class, 'nim', 'nim');
    }

    public function transaksi()
    {
        return $this->belongsTo(Transaksi::class, 'barcode', 'barcode');
    }
}
