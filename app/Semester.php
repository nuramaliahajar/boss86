<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Semester extends Model
{
    protected $fillable = ['semester'];
    protected $table = 'semester';

    public function getSemesterAttribute($value) {
    	return ucfirst($value);
    }
}
