<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mata_kuliah extends Model
{
    protected $fillable = ['kode_mk', 'nama', 'nidn', 'sks'];
    public $incrementing = false;
    protected $primaryKey = 'kode_mk';
    protected $table = 'mata_kuliah';

    public function dosen()
    {
        $this->belongsTo(Dosen::class, 'nidn', 'nidn');
    }
}
