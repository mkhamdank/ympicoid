<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pkb extends Model
{
    protected $fillable = [
		'periode', 'employee_id', 'agreement', 'question','answer',   'created_by'
	];
}
