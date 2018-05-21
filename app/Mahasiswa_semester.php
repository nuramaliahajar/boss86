<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa_semester extends Model
{
    protected $fillable = ['semester_id', 'nim', 'status'];
    public $incrementing = false;
    protected $table = 'mahasiswa_semester';
    public $timestamps = false;
}
