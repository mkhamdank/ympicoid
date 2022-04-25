<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class McuSurvey extends Model
{
    protected $fillable = [
        'tanggal','employee_id','name','department', 'jawaban'
    ];
}
