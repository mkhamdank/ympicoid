<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizLog extends Model
{
    protected $fillable = [
		'question_code','answer_date','employee_id','name','department','question','answer','latitude','longitude','village','city','province','ip_address','mac_address'
	];
}
