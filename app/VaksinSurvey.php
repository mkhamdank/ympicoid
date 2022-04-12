<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaksinSurvey extends Model
{
    protected $fillable = [
		'tanggal', 'employee_id', 'name', 'department', 'vaksin_1','vaksin_2','vaksin_3','call_vaksin_3', 'jenis_vaksin', 'jenis_vaksin_3', 'created_by'
	];
}
