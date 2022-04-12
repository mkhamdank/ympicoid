<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SummaryQuantity extends Model
{
    protected $fillable = [
    	'type',
    	'quantity'
    ];
}
