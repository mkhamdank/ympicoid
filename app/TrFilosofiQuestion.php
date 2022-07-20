<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrFilosofiQuestion extends Model
{
     protected $fillable = [
	  'question','answer', 'right_answer'
	];
}
