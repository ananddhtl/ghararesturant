<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;
    protected $fillable = [
		'img',
		'file_id',
		'name',
		'post',
		'description',
		'sub_description2',
		'qualification',
		'facebook',
		'instagram',
		'twitter'
	];
	public function files()
	{
		return $this->belongsTo(Files::class, "file_id");
	}
}
