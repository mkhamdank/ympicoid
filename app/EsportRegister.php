<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EsportRegister extends Model
{
    protected $fillable = [
		'category',
		'team_name',
		'phone_no',
		'no_urut',
		'player_index',
		'employee_id',
		'name',
		'department',
		'section',
		'created_by',

	];
}
