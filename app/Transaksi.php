<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
    protected $fillable = ['barcode', 'k_jurusan', 'nidn', 'kode_kls', 'semester_id'];
    public $incrementing = false;
    protected $primaryKey = 'barcode';
    protected $table = 'transaksi';
}
