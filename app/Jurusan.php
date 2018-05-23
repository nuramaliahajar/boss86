<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $fillable = ['k_jurusan', 'jurusan'];
    public $incrementing = false;
    protected $primaryKey = 'k_jurusan';
    protected $table = 'jurusan';
}
