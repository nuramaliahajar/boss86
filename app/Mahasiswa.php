<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $fillable = ['nim', 'nama', 'alamat', 'tgl_lahir', 'no_tlpn', 'k_jurusan', 'email'];
    public $incrementing = false;
    protected $primaryKey = 'nim';
    protected $table = 'mahasiswa';
    protected $dates = ['tgl_lahir'];

    public function jurusan()
    {
    	return $this->hasOne(Jurusan::class, 'k_jurusan', 'k_jurusan');
    }

    public function mahasiswa_semester()
    {
    	return $this->hasManyThrough(Semester::class, Mahasiswa_semester::class, 'semester_id', 'nim');
    }
}
