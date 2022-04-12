<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Announcement extends Model
{
	use SoftDeletes;

	protected $table = 'announcements';

    protected $fillable = [
		'tanggal', 'images', 'created_by'
	];
}
