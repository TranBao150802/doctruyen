<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Truyen extends Model {
	use HasFactory;
	public $timestamps = false;
	protected $fillable = [
		'tentruyen', 'motatruyen', 'kichhoat', 'slug_truyen', 'hinhanh', 'danhmuc_id', 'tacgia', 'theloai_id',
	];
	protected $primaryKey = 'id';
	protected $table = 'truyen';

	public function danhmuctruyen($value='')
	{
		return $this->belongsTo('App\Models\Danhmuctruyen', 'danhmuc_id', 'id');
	}

	public function chapter($value='')
	{
 		return $this->hasMany('App\Models\Chapter', 'truyen_id', 'id');
 	}

 	public function theloai($value='')
	{
 		return $this->belongsTo('App\Models\Theloai', 'theloai_id', 'id');
 	}

}
