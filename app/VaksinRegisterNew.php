<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VaksinRegisterNew extends Model
{
    protected $fillable = [
		'tanggal', 'employee_id', 'name', 'department', 'birth_place','birth_date','card_id','address','no_hp' ,'jumlah_keluarga', 'keluarga_hubungan' , 'keluarga_name' , 'keluarga_ktp' , 'keluarga_birth_place', 'keluarga_birth_date','keluarga_address','keluarga_no_hp','call_vaksin_3', 'created_by','remark'
	];
}
