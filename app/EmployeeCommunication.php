<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EmployeeCommunication extends Model
{
	protected $fillable = [
		'tanggal','employee_id','name','department','no_hp','no_telp','no_alternatif','keterangan','rencana_mudik', 'tanggal_berangkat','tanggal_kembali','test_type','departure','tanggal_departure', 'tanggal_arrived','arrived','created_by'

	];
}
