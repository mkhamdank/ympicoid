<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrFilosofiAnswer extends Model
{
    protected $fillable = [
	 'employee_id', 'question','answer', 'created_by','created_at'
	];
}
