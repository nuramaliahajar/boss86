<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['barcode', 'k_jurusan', 'nidn', 'kode_mk', 'kode_kls', 'semester_id'];
    public $incrementing = false;
    protected $primaryKey = 'barcode';
    protected $table = 'transaksi';

    public function jurusan()
    {
        return $this->belongsTo(Jurusan::class, 'k_jurusan', 'k_jurusan');
    }

    public function dosen()
    {
        return $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }

    public function kelas()
    {
        return $this->belongsTo(Kelas::class, 'kode_kls', 'kode_kls');
    }

    public function semester()
    {
        return $this->belongsTo(Semester::class);
    }

    public function matakuliah()
    {
        return $this->hasManyThrough(Mata_kuliah::class, Dosen::class, 'nidn', 'nidn', 'nidn', 'nidn');
    }
}
