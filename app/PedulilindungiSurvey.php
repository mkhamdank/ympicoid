<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PedulilindungiSurvey extends Model
{
    protected $fillable = [
		'tanggal', 'employee_id', 'name', 'department', 'result_survey','created_by'
	];
}
