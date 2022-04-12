<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmergencySurvey extends Model
{
    protected $fillable = [
		'tanggal', 'employee_id', 'name', 'department', 'jawaban','nama','hubungan', 'keterangan'
	];
}
