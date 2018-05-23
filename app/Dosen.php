<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    protected $fillable = ['nidn', 'nama', 'alamat', 'tgl_lahir', 'no_tlpn', 'email'];
    public $incrementing = false;
    protected $primaryKey = 'nidn';
    protected $table = 'dosen';
    protected $dates = ['tgl_lahir'];
}
