<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KodeEtikAnswer extends Model
{
    protected $fillable = [
		'periode', 'employee_id', 'agreement', 'question','answer', 'created_by','created_at'
	];
}
