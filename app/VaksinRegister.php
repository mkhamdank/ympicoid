<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaksinRegister extends Model
{
    protected $fillable = [
		'tanggal', 'employee_id', 'name', 'department', 'birth_date', 'answer', 'poin', 'total', 'created_by'
	];
}
