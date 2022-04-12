<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SurveyLog extends Model
{
    protected $fillable = [
		'survey_code','tanggal','employee_id','name','department','question','answer','poin','total','keterangan'
	];
}
