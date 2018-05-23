<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    protected $fillable = ['kode_kls', 'kelas'];
    public $incrementing = false;
    protected $primaryKey = 'kode_kls';
    protected $table = 'kelas';
}
