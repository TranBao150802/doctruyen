<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Danhmuctruyen extends Model {
	use HasFactory;

	public $timestamps = false;
	protected $fillable = [
		'tendanhmuc', 'motadanhmuc', 'kichhoat', 'slug_danhmuc',
	];
	protected $primaryKey = 'id';
	protected $table = 'danhmuc';

	public function truyen($value='')
	{
		return $this->hasMany('App\Models\Truyen', 'danhmuc_id','id');
	}
}
